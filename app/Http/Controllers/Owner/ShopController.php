<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Requests\UploadImageRequest;

class ShopController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:owners');

        $this->middleware(function ($request, $next){

            $id = $request->route()->parameter('shop');
            if(!is_null($id)){
                $shopsOwnerId = Shop::findOrFail($id)->owner->id;
                $shopId = (int)$shopsOwnerId;
                $ownerId = Auth::id();
                if($shopId !== $ownerId){
                    abort(404);
                }
            }
            return $next($request);
        });
    }

    public function index()
    {
        // $ownerId = Auth::id();
        $shops = Shop::where('owner_id', Auth::id())->get();

        return view('owner.shops.index',
        compact('shops'));
    }

    public function edit($id)
    {
        $shop = Shop::findOrFail($id);
        return view('owner.shops.edit', compact('shop'));

    }

    public function update(UploadImageRequest $request, $id)
    {
        $imageFile = $request->image; //一時保存
        if(!is_null($imageFile) && $imageFile->isValid() ){
            // Storage::putFile('public/shops', $imageFile) リサイズなし
            // ImageManagerをインスタンス化する
            $manager = new ImageManager(new Driver());
            // 画像を読み込む
            $image = $manager->read($imageFile->getPathname());
            // 重複しないファイル名をつくる
            $fileName = uniqid(rand().'_');
            // 拡張子を取得
            $extension = $imageFile->extension();
            // 上記のファイル名と拡張子を合体
            $fileNameToStore = $fileName. '.' .$extension;

            $resizedImage = $image->resize(1920, 1080)->encode();

            // dd($manager, $image, $fileName, $extension, $resizedImage);
            Storage::put('public/shops/' . $fileNameToStore, $resizedImage );
        }
        return redirect()->route('owner.shops.index');
    }
}
