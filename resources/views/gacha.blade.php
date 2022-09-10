@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ガチャ</title>
        <link rel="stylesheet" href="{{asset('css/stylesheet.css') }}">
        <link rel="stylesheet" href="{{asset('css/responsive.css') }}">
        <style media="screen">
         body {
            margin:0 auto;
            background-color: #ffffff;            /* 背景色 */
            background-image: url("image/home.png"); /* 画像 */
            background-size: cover;               /* 全画面 */
            background-attachment: fixed;         /* 固定 */
            background-position: center center;   /* 縦横中央 */
         }
         </style>

    </head>
    <body>
        <header>
           <li><a href="{{ url('/home') }}" class="btn-back"><font color="orange">🏠ホームへ戻る</font>
</a>
</li> 

            <a href="#" class="btn-rate"><font color="orange">提供割合</font></a>
        </header>
        <div class="gacha">
            <div class="container">
                <div style="text-align: center">
                    <img src="../image/2518886.png" width="56%" height="56%">
                    <div class="btn-gacha">
                     <p>所持金{{ $money }}円</p>
                     <form action="/gacha" method="post">
                        @csrf
                        <input class="btn btn-default form-control" type="submit" name="gacha1" value="1回ガチャ" color="pink" width="10%" height="10%">
                        <input class="btn btn-default form-control" type="submit" name="gacha10" value="10回ガチャ" color="skyblue" width="10%" height="10%">
                     </form>

                      <!--  <span><a href="#" class="btn" width="10%" height="10%"><font color="pink">1回ガチャる</font></a></span>
                        <span><a href="#" class="btn" width="10%" height="10%"><font color="skyblue">10回ガチャる</font></a><span>-->
                        <p>
                          @foreach($result as $res)

                          {{ $res }}
                          @endforeach
                        </p>
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>


@endsection
