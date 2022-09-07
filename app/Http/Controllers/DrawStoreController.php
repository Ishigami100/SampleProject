<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //追加
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Models\Image;

class DrawStoreController extends Controller
{


    public function upload(Request $request)
    {

        // 画像保存
        $image = $request->input("uploadfile");  // your base64 encoded

        //base64をデコードする前の下準備
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);  // 空白を'+'に変換

        //ユーザ情報の取得とファイル名の確定
        $user = $request->input("user");  // your base64 encoded
        $imageName =$user.'.'.'png';

        \File::put(storage_path(). '/app/public/' . $imageName, base64_decode($image));

       $check_user =DB::table('images')->where('users_name',$user)->exists();
        if($check_user!=true){
        // ファイル情報をDBに保存
        $imageData = new Image();
        $imageData->create([
            'users_name' => $user,
            'filename'=> $imageName,
            'path'=>'http://18.206.0.5/storage/'.$imageName,
        ]);
        }
    }


}
