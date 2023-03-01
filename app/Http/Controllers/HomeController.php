<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('index', [
            'pageName' => 'Home',
        ]);
    }

    public function about() {
        return view('about', [
            'pageName' => 'About us',
        ]);
    }

    public function artist() {
        return view('artists', [
            'pageName' => 'Artists',
        ]);
    }

    public function exhibition() {
        return view('exhibition', [
            'pageName' => 'Exhibitions',
        ]);
    }

    public function shop() {
        return view('shop', [
            'pageName' => 'Shop',
        ]);
    }

    public function opencall() {
        return view('opencall', [
            'pageName' => 'Open Call',
        ]);
    }

    public function contact() {
        return view('contact', [
            'pageName' => 'Contact',
        ]);
    }

}
