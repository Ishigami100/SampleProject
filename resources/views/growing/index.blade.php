<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/glow.css') }}">
  <title>grow</title>
  <style media="screen">
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
  <div class="t1">
    <img src="{{ asset('image/title.png') }}" width="100%" height="auto" alt="">
    <p>Lv.20</p>
  </div>

  <div class="t2">
    <img src="{{ asset('image/title.png') }}" width="55%" height="auto" alt="">
    <p>ステータス</p>
  </div>

  <div class="sample2">
    <ul id="nav">
      <li class="b1"><a href="draw/draw2.html" target="_blank" > 
        <img src ="{{ asset('image/b1.png') }}" alt = "" width = "90%" height ="auto" border = "0">
        <p>えさ</p>
      </a></li>
      <li class="b2"><a href="draw/draw2.html" target="_blank" > 
        <img src ="{{ asset('image/b2.png') }}" alt = "" width = "90%" height ="auto" border = "0">
        <p>遊び</p>
      </a></li>
      <li class="b3"><a href="draw1.html" target="_blank" > 
        <img src ="{{ asset('image/b3.png') }}" alt = "" width = "90%" height ="auto" border = "0">
        <p>ガチャ</p>
      </a></li>
      <li class="b4"><a href="{{ url('/growing/furniture_kind_select') }}" > 
        <img src ="{{ asset('image/b4.png') }}" alt = "" width = "90%" height ="auto" border = "0">
        <p>インテリア</p>
      </a></li>
      </ul>
      
  </div>

  <div class="m1">
    <img src="{{ asset('image/monster.png') }}"alt = "" width = "300%" height ="auto" border = "0">
  </div>

  <div class="back">
    <li><a href="{{ url('/home') }}"> 
      <img src ="{{ asset('image/back.png') }}" alt = "" width = "8%" height ="auto" border = "0">
    </a></li>
  </div>


</body>
</html>

@section('content')
@endsection