<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Request;


class GachaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {

        $user = Auth::user()->name;
        /*money*/
        $moneydata=DB::table('money')->where('username',$user)->get();
        foreach ($moneydata as $data) {
            $money=$data->number;
        }
        $count= DB::table('item_user')->where('username',$user)->where('flag',0)->get();
        //ガチャ切れ
        if ($count->isEmpty()) {
            $result[]='compleat!!';
            return view('gacha', compact('money','result'));
        }
        $result[]='ガチャ結果';
        return view('gacha', compact('money','result'));
        
        if (Request::get('gacha1')){
            $this->gacha1();
        }elseif (Request::get('gacha10')){
            $this->gacha10();
        }

       
    }
    
    public function gacha(){
        if (Request::get('gacha1')){//1回ガチャ
            
            /*username*/
            $user = Auth::user()->name;
            /*items*/
            $itemID= DB::table('item_user')->where('username',$user)->where('flag',0)->get();
            /*money*/
            $moneydata=DB::table('money')->where('username',$user)->get();
            foreach ($moneydata as $data) {
                $money=$data->number;
            }
            
            
            $item_ID = [];

            if($money>0){
                if (!$itemID->isEmpty()) {
                    foreach ($itemID as $item) {
                        $item_ID[] = $item->itemID;
                    }
                    $number = array_rand($item_ID);
                    //itemID
                    
                    $id = $item_ID[$number];
                    $itemname=DB::table('items')->where('id',$id)->get();
                    foreach ($itemname as $name) {
                        $result[]=$name->item_name;
                    }
            //        var_dump($result);

                    $itemID=DB::table('item_user')->where('itemID',$id)->update(['flag' => 1]);
                    $money--;
                    DB::table('money')->where('username',$user)->update(['number'=>$money]);

                    return view('gacha', compact('money','result'));
                    
                }else{
                    
                    $result[]='compleat!!';
                    return view('gacha', compact('money','result'));
                    
                }
            }else{
                $result[]='お金が足りません';
                return view('gacha', compact('money','result'));
            }
            
            
        }elseif (Request::get('gacha10')){//10回ガチャ
            //username取得
            $user = Auth::user()->name;
            /*money*/
            $moneydata=DB::table('money')->where('username',$user)->get();
            foreach ($moneydata as $data) {
                $money=$data->number;
            }
            //残りアイテム
            $count= DB::table('item_user')->where('username',$user)->where('flag',0)->get();
            //ガチャ切れ
            if ($count->isEmpty()) {
                $result[]='compleat!!';
                return view('gacha', compact('money','result'));
            }
            //残りアイテム数
            $j=0;
            foreach ($count as $a) {
                $j++;
            }
            if($j>10){
                $j=10;
            }

            $item_ID = [];
            if($money>9){
                for ($i = 0; $i < $j; $i++) {
                    $itemID= DB::table('item_user')->where('username',$user)->where('flag',0)->get();
                        foreach ($itemID as $item) {
                            $item_ID[] = $item->itemID;
                        }
                        $number = array_rand($item_ID);
                        //itemID
                    $id = $item_ID[$number];
                    $itemname=DB::table('items')->where('id',$id)->get();
                    foreach ($itemname as $name) {
                        $result[$i]=$name->item_name;
                    }

                        $itemID=DB::table('item_user')->where('itemID',$id)->update(['flag' => 1]);
                        $money=$money-1;
                        DB::table('money')->where('username',$user)->update(['number'=>$money]);
                        $itemID=[];
                        $item_ID=[];
                        
                    
                }
            }else{
                $result[]='お金が足りません';
                return view('gacha', compact('money','result'));
            }
            $result[$i++]='compleat!!';
            return view('gacha', compact('money','result'));
            

        }
    }
    
}

?>

