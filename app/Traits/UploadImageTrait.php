<?php

namespace App\Traits;
use Illuminate\Http\Request;
trait UploadImageTrait{
    public function upload(Request $request,$filename){
        $image=$request->file('photo')->getClientOriginalName();
        $path=$request->file('photo')->storeAs($filename,$image,'uploadImage');
        return $path;
    }
    public function uploadFile(Request $request, $filename, $fileField)
    {
        $file = $request->file($fileField)->getClientOriginalName();
        $path = $request->file($fileField)->storeAs($filename, $file, 'uploadImage');
        return $path;
    }
    public function deleteImage($imagePath)
    {
        if ($imagePath) {
            $fullImagePath = storage_path('app/public/uploads/' . $imagePath); 
            if (file_exists($fullImagePath)) {
                unlink($fullImagePath); 
            }
        }
    }
    public function deleteFile($filePath)
    {
        if ($filePath) {
            $fullFilePath = storage_path('app/public/uploads/' . $filePath);
            if (file_exists($fullFilePath)) {
                unlink($fullFilePath);
            }
        }
    }

}