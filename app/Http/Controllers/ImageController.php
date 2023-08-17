<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use File;

class ImageController extends Controller
{
    public function showImage($path,$filename)
    {
        $url = storage_path("app/" . $path . "/image/" . $filename);

        if (!File::exists($url)) {
            abort(404);
        }

        $file = File::get($url);
        $type = File::mimeType($url);
        return new Response($file, 200, ['Content-Type' => $type]);
    }
}