<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Facade\FlareClient\Http\Response;

class FileUpload extends Controller
{
  public function downloadFile(){
   return view('file-upload');
  }

  public function createForm(){
    $files = File::all();

    return view('file-upload', compact('files'));
  }

  public function fileUpload(Request $req){

        $req->validate([
        'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
        ]);

        $fileModel = new File;

        if($req->file()) {

            $fileName = time().'_'.$req->file->getClientOriginalName();
            $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
            $fileModel->name = time().'_'.$req->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()

            ->with('success','El archivo se a subido.')
            ->with('file', $fileName);
        }
   }

  public function download(file $file){

    $files=public_path().$file->file_path;

      if(file_exists($files)){
      return response()->download($files, $file->name);
      } else{
        echo('Ha habido un error');
      }
  }
}