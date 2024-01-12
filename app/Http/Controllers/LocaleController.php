<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function select(Request $request)
    {
        $method = $request->method();
        $locale = $request->id;
        session(["locale" => $locale]);
        app()->setLocale($locale);

        if($method==="GET"){
            return redirect()->back();
        }
        return ["success" => true];
    }
}
