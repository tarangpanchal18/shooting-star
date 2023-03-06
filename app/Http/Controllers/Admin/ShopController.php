<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateShopItems;
use App\Models\Artist;
use App\Models\Shop;
use App\Repositories\UploadFileRepository;

class ShopController extends Controller
{
    /**
     * Constructor Function
     *
     * @param App\Repositories\UploadFileRepository $uploadFileRepository
     */
    public function __construct(public UploadFileRepository $uploadFileRepository)
    {
        $this->uploadFileRepository = $uploadFileRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.shop_item.index', [
            'shop_items' => Shop::orderBy('id', 'DESC')->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shop_item.create', [
            'action' => "Add",
            'method' => "POST",
            'artistList' => Artist::where('status', 'Active')->get(),
            'formUrl' => route('admin.shop.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateShopItems $request)
    {
        $data = $request->validated();
        if ($file = $request->file('item_filename')) {
            $data['item_filename'] = $this->uploadFileRepository->uploadFile('shop', $file);
        }
        Shop::create($data);

        return redirect()->route('admin.shop.index')
            ->with('success', 'Data Added Successfully !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        return view('admin.shop_item.create', [
            'action' => "Edit",
            'method' => "PUT",
            'shop' => $shop,
            'artistList' => Artist::where('status', 'Active')->get(),
            'formUrl' => route('admin.shop.update', $shop['id'])
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(CreateShopItems $request, Shop $shop)
    {
        $data = $request->validated();
        if ($file = $request->file('item_filename')) {
            unlink(Shop::UPLOAD_PATH.$shop->item_filename);
            $data['item_filename'] = $this->uploadFileRepository->uploadFile('shop', $file);
        }
        $shop->update($data);

        return redirect()->route('admin.shop.index')
            ->with('success', 'Data Updated Successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        $path = public_path(Shop::UPLOAD_PATH);
        unlink($path.'/'.$shop->item_filename);
        $shop->delete();

        return redirect()->route('admin.shop_item.index')
            ->with('success', 'Data Updated Successfully !');
    }
}
