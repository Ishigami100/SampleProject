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
    </head>
    <body>
        <header>
           <li><a href="../HOME.html" class="btn-back" target="_blank">戻る
</a>
</li> 

            <a href="#" class="btn-rate">提供割合</a>
        </header>
        <div class="gacha">
            <div class="container">
                <div style="text-align: center">
                    <img src="../image/2518886.png">
                    <div class="btn-gacha">
                        <a href="#" class="btn-gacha1">1回ガチャる</a>
                        <a href="#" class="btn-gacha10">10回ガチャる</a>
                    </div>
                </div>
                
            </div>
        </div>
    </body>
</html>


@endsection
