<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only('changeImage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function changeImage()
    {

        $image = ImageModel::latest()->first();
        return view('homepage_photo_add', compact('image'));
    }
}
