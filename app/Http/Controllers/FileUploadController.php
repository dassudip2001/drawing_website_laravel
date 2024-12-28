<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


class FileUploadController extends Controller
{

    public function upload(Request $request){
        $request->validate([
            // 10 mb max
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);
        // check if the request has an image
        if (!$request->hasFile('image')) {
            return response()->json([
                'error' => 'No image uploaded'
            ], 400);
        }

        // upload image to the local storage and return the path
        $uploadedFile = $request->file('image');
        if(!$uploadedFile->isValid()){
            return response()->json([
                'error' => 'Invalid file upload'
            ], 400);
        }
        $path = Cloudinary::upload($uploadedFile->getRealPath())->getSecurePath();


        // flash message
        flash()
            ->options([
                'timeout' => 3000, // 3 seconds
                'position' => 'bottom-right',
            ])->success('Image uploaded successfully');

        return response()->json([
            'success' => 'You have successfully uploaded an image',
            'path' => $path
        ], 200);
    }
}
