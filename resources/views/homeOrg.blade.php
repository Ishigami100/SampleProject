<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="{{ asset('css/alstyle_ex.css') }}">
  <title>home</title>
  <style media="screen">
    *{
      /* 初期化 */
      margin:0px;padding:0px;
    }
    dl {
        background: pink;
        background-image:  url("{{ asset('image/1.jpg') }}");
        border: solid 4px;
        border-color: rgb(221, 245, 5);
      width: 20%;
      height: 35%;
      position:absolute;	
      bottom:15%;
      right:78%;
    }

    d2 {
        background: rgb(133, 236, 145);
        background-image:  url("{{ asset('image/1.jpg')}}");
        border: solid 4px;
        border-color: rgb(221, 245, 5);
        width: 20%;
        height: 35%;
        position:absolute;	
        bottom:52%;
        right:78%;
    }

    div {
      display: flex;
      margin-top: 10px;
    }

    body {
   background-color: #486d46;            /* 背景色 */
   background-image: url("{{ asset('image/home.png') }}"); /* 画像 */
   background-size: cover;               /* 全画面 */
   background-attachment: fixed;         /* 固定 */
   background-position: center center;   /* 縦横中央 */
}

    </style>
</head>
<body>
  
    <div class="sample2">
      <ul id="nav">
        <li><a href="{{ asset('../draw') }}" target="_blank" > 
          <img src ="{{ asset('image/draw .png') }}" alt = "" width = "100%" height ="auto" border = "0">
        </a></li>
        <li><a href="{{ asset('../draw/draw2.html') }}" target="_blank" > 
          <img src ="{{ asset('image/button.jpg') }}" alt = "" width = "100%" height ="auto" border = "0">
        </a></li>
        <li><a href="{{ asset('../draw1.html') }}" target="_blank" > 
          <img src ="{{ asset('image/ikusei.png') }}" alt = "" width = "100%" height ="auto" border = "0">
        </a></li>
        <li><a href="{{ asset('gacha.html') }}" target="_blank" > 
          <img src ="{{ asset('image/gacha.png') }}" alt = "" width = "100%" height ="auto" border = "0">
        </a></li>
        </ul>
      </div>

      <div class="container">
        <img src="{{ asset('image/tag.png') }}">
        <p>name</p>
        <p class="tag">3日目</p>
      </div>

  <dl>
    <h2>掲示板</h2>
    <div>
      <dt>2020/11/07</dt>
      <dd><a href="#">aaa</a>
      </dd>
    </div>
    <div>
      <dt>2020/11/07</dt>
      <dd>
        <a href="#">aaa</a>
      </dd>
    </div>
  </dl>
  <a href="{{ url('/tasks') }}">
    <d2>
      <h2>to do</h2>
      @if ($tasks->isNotEmpty())
      <table border="1">
        <tbody>
            @foreach ($tasks as $item)
              <tr>
                  <div>
                  <td>
                    {{-- タスク名 --}}
                    {{ $item->name }}
                  </td>
                  <td>
                    {{-- 締め切り --}}
                    Due date -{{ $item->due_date }}
                  </td>
                </div>
              </tr>
            @endforeach
        </tbody>
      </table>
      @endif
      </div>
    </d2>    
  </a>
  <div class="m1">
    <img src="{{ asset('image/monster.png') }}">
  </div>
</body>
</html>

@extends('layouts.app')
@section('content')
@endsection
