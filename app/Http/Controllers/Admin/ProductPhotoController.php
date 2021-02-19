<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\ProductPhoto;

class ProductPhotoController extends Controller
{
    public function removePhoto(Request $request){
        $photoName = $request->get('photoName');

        //Remove dos arquivos
        if(Storage::disk('public')->exists($photoName)){
            Storage::disk('public')->delete($photoName);
        }

    //Remove a imagem do banco
    $removePhoto = ProductPhoto::where('image',$photoName);
    $productId = $removePhoto->first()->product_id;

    $removePhoto->delete();

    flash('Imagem removida com sucesso!')->success();
    return redirect()->route('admin.products.index', ['product' => $productId]);
    }
}
