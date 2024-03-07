<?php
namespace App\Services;
class ImageService
{
    public function uploadImages($images, $path = "public/images")
    {
        $uploadedImages = [];
        foreach ($images as $image) {
            if ($image->isValid()) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->storeAs($path, $imageName);
                $uploadedImages[] = $imageName;
            }
        }
        return $uploadedImages;
    }
}

?>