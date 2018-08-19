<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use function compact;
use Illuminate\Http\Request;
use function view;

class FrontController extends Controller
{
    public function index() {
        $shirts = Product::latest()->take(4)->get();
        $categories = Category::all()->groupBy('parent_id');

        // ----------------------- otional ------------------------
        $categories['root']=$categories[0];
        unset($categories[0]);
        // ----------------------- otional ------------------------

        return view('front.home', compact('shirts', 'categories'));
    }

    public function shirts() {
        $shirts = Product::all();
        return view('front.shirts', compact('shirts'));
    }

    public function shirt() {
        return view('front.shirt');
    }

}
