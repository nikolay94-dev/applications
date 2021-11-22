<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;

class ImageService
{
    public function uploadImage(UploadedFile $image): string
    {
        $imageName = time().'.'.$image->extension();

        $image->move(public_path('images'), $imageName);

        return $imageName;
    }
}
