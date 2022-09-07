<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //追加
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use App\Models\Item;

class ItemStoreController extends Controller
{


    public function index(Request $request)
    {

        $item_name = $request->item_name;
        $param = $request->param;

        $check_item= \DB::table('items')->where('item_name',$item_name )->exists();
        // ファイル情報をDBに保存
        $itemData = new Item();
        $itemData->create([
            'item_name'=> $item_name,
            'param'=>  $param ,
        ]);
        return redirect('/manage_item');
    }


}
