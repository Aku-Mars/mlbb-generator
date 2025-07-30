<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Build;
use Spatie\Browsershot\Browsershot;

class BuildController extends Controller
{
    public function download(Build $build)
    {
        $view = view('builds.build-image', ['build' => $build])->render();

        $image = Browsershot::html($view)
            ->windowSize(600, 600) // Adjust size as needed
            ->setDelay(1000) // Wait for images to load
            ->screenshot();

        return response($image)->header('Content-Type', 'image/png');
    }
}
