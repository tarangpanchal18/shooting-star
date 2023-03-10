<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Exhibition;
use App\Models\OpenCall;
use App\Models\Page;
use App\Models\Shop;
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
            'pageData' => Page::findOrFail(1),
        ]);
    }

    public function artist() {
        return view('artists', [
            'pageName' => 'Artists',
            'pageData' => Artist::where('status', 'Active')->get(),
        ]);
    }

    public function artist_detail(Artist $artist) {
        return view('artists_detail', [
            'pageName' => $artist->artist_name,
            'pageData' => $artist,
        ]);
    }

    public function exhibition() {
        $pageData = Exhibition::where('status', 'Active')->orderBy('start_date', 'desc')->get();
        $pageData->reject(function ($data) {
            if ($data->start_date <= date('Y-m-d') && $data->end_date >= date('Y-m-d'))
                return true;
        })->map(function ($data) {
            $data->isExpired = false;
            if ($data->end_date < date('Y-m-d')) {
                $data->isExpired = true;
            }
        });
        $currentExhibition = Exhibition::where('start_date', '<=', date('Y-m-d'))
            ->where('end_date', '>=', date('Y-m-d'))
            ->where('status', 'Active')
            ->first();

        return view('exhibition', [
            'pageName' => 'Exhibitions',
            'pageData' => $pageData,
            'activeExhibition' => $currentExhibition,
        ]);
    }

    public function exhibition_detail(Exhibition $exhibition) {
        return view('exhibition_detail', [
            'pageName' => $exhibition->title,
            'exhibition' => $exhibition,
        ]);
    }

    public function shop(Request $request) {
        $shopData = Shop::where('status', 'Active');
        if ($request->search) {
            $shopData->where('item_title', 'LIKE', '%'. $request->search .'%');
        }
        if ($request->artist) {
            $shopData->where('artist_id', $request->artist);
        }
        $shopData = $shopData->get();

        return view('shop', [
            'pageName' => 'Shop',
            'artistData' => Artist::where('status', 'Active')->get(),
            'pageData' => $shopData,
            'search' => [
                'keyword' => $request->search,
                'artistId' => $request->artist,
            ],
        ]);
    }

    public function opencall() {
        $data = OpenCall::where('end_date', '>=', date('Y-m-d'))
            ->where('status', 'Active')
            ->get();

        return view('opencall', [
            'pageName' => 'Open Call',
            'pageData' => $data,
        ]);
    }

    public function contact() {
        return view('contact', [
            'pageName' => 'Contact',
            'pageData' => Page::findOrFail(2),
        ]);
    }

}
