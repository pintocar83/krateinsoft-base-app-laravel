<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function select(Request $request)
    {
        $locale=$request->id;
        session(["locale" => $locale]);
        app()->setLocale($locale);
        return ["success" => true];
    }
}
