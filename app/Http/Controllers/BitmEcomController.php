<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BitmEcomController extends Controller
{
    public function index()
    {
        return view('bitm_ecom.home.index');
    }

    public function category()
    {
        return view('bitm_ecom.category.index');
    }

    public function productDetail()
    {
        return view('bitm_ecom.product.index');
    }
}
