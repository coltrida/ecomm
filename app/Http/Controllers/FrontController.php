<?php

namespace App\Http\Controllers;

use App\Product;
use function compact;
use Illuminate\Http\Request;
use function view;

class FrontController extends Controller
{
    public function index() {
        $shirts = Product::latest()->take(4)->get();
        return view('front.home', compact('shirts'));
    }

    public function shirts() {
        $shirts = Product::all();
        return view('front.shirts', compact('shirts'));
    }

    public function shirt() {
        return view('front.shirt');
    }

}
