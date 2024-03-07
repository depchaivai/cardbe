<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ImageService;

class ImageController extends Controller
{
    public function uploadImages(Request $request, ImageService $imageService)
    {
        $request->validate([
            'photos' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $images = $request->file('photos');
        if (!$images) {
            return back()->with('error', 'Please choose images to upload.');
        }
        $uploadedImages = $imageService->uploadImages($images);
        if (!$uploadedImages) {
            return back()->with('error', 'No images were uploaded.');
        }
        return back()->with('success', 'Images uploaded successfully.');
    }
}
