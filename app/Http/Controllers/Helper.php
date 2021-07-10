<?php


namespace App\Http\Controllers;


use App\Models\ContentType;
use Illuminate\Support\Facades\Facade;

class Helper extends Facade
{
    public static function getTypeContent(){
        return ContentType::get();
    }
}
