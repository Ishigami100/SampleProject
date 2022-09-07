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
                        <p>所持金{{ $money }}円</p>
                        <form action="/gacha" method="post">
                            @csrf
                            <input class="btn btn-default form-control" type="submit" name="gacha1" value="1回ガチャ">
                            <input class="btn btn-default form-control" type="submit" name="gacha10" value="10回ガチャ">
                        </form>

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
