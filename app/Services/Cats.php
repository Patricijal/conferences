<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Cats
{
    public function storeImage($image): string
    {
        $directory = public_path('cat-images');

        // Ensure directory exists
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Get original file extension
        $extension = $image->getClientOriginalExtension();

        // Generate base filename from original name (without extension)
        $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $baseFilename = Str::slug($originalName);

        // Initial filename
        $filename = $baseFilename . '.' . $extension;
        $counter = 1;

        // Check if file exists and generate unique name
        while (File::exists($directory . '/' . $filename)) {
            $filename = $baseFilename . '-' . $counter . '.' . $extension;
            $counter++;
        }

        // Move the file to public/cat-images
        $image->move($directory, $filename);

        // Return only the filename for database
        return $filename;
    }
}
