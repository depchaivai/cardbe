<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Info;
use App\Controllers\AdminController;
use App\Models\Submited;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/feedback', function(Request $request) {
    $gname = $request->input('gname');
        $gsubmit = $request->input('gsubmit');
        $gmessage = $request->input('gmessage');
        $goriginname = $request->input('goriginname');
        $submitted = Submited::create([
            'gname' => $gname,
            'gsubmit' => $gsubmit,
            'gmessage' => $gmessage,
            'goriginname' => $goriginname
        ]);
        return ['success' => true];
});
Route::get('/info', function() {
    $info = Info::all();
    return $info;
});
Route::get('/album', function() {
    $albumPath = public_path('album');
    $images = glob($albumPath . '/*');
    $imageLinks = [];

    foreach ($images as $image) {
        $imageLinks[] = asset('album/' . basename($image));
    }

    return $imageLinks;
});