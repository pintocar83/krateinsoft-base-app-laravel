<?php
namespace App\Http\Controllers\Views\Products;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProductsControllerView extends Controller
{

    public function index(){
        return view('products.index',[
        ]);
    }
}
