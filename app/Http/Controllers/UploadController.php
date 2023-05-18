<?php
 
namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
 
use App\Models\Image;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
	public function upload(){
		$gambar = Image::get();
		return view('upload',['gambar' => $gambar]);
	}
 
	public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'notes' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'files';
		$file->move($tujuan_upload,$nama_file);

        $path = Storage::disk('s3')->put('files/' . $nama_file, public_path('files/' . $nama_file));
        $path = Storage::disk('s3')->url($path);
 
		Image::create([
			'file' => $nama_file,
			'notes' => $request->notes,
		]);

		Cache::put($nama_file, [
			'file' => $nama_file,
			'notes' => $request->notes
		]);
 
		return redirect()->back();
	}

    public function hapus($id){
		// hapus file
		$gambar = Image::where('id',$id)->first();
		File::delete('files/'.$gambar->file);
 
		// hapus data
		Image::where('id',$id)->delete();
 
		return redirect()->back();
	}

	public function testCache($nama_file){
		$cache = Cache::get($nama_file);

		if (empty($cache))
			return ['status' => 2, 'message' => 'Not found'];

		return ['status' => 1, 'message' => 'Data retrieved', 'data' => $cache];
	}
}