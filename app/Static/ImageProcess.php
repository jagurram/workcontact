<?php
/**
 * Created by PhpStorm.
 * User: e7250
 * Date: 28/06/18
 * Time: 11:25
 */

namespace App;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ImageProcess
{

    private function __construct() {}

    public static function init()
    {

    }

    public static function RenameAndMove(Request $request,$nameStorage)
    {
        
        return Storage::disk($nameStorage)->put($request->photo_path);

    }

}