<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/glow.css') }}">
  <title>furniture select</title>
  <style media="screen">
    body {
     background-color: #486d46;            /* 背景色 */
    /* 背景はテーブルから持ってくる */
     background-image: url("{{ asset('image/home.png') }}"); /* 画像 */
     background-size: cover;               /* 全画面 */
     background-attachment: fixed;         /* 固定 */
     background-position: center center;   /* 縦横中央 */
    }
  </style>
</head>

<body>
    <div>
        aaaa  {{$room->user_name}}
    </div>
  <div class="sample2">
    <ul id="nav">
      <li class="b1"><a href="{{ url('/growing/furniture_kind_select/chair') }}" >
        <img src ="{{ asset('image/b1.png') }}" alt = "" width = "90%" height ="auto" border = "0">
        <p>いす</p>
      </a></li>
      <li class="b2"><a href="{{ url('/growing/furniture_kind_select/desk') }}" > 
        <img src ="{{ asset('image/b2.png') }}" alt = "" width = "90%" height ="auto" border = "0">
        <p>つくえ</p>
      </a></li>
      <li class="b3"><a href="{{ url('/growing/furniture_kind_select/wall') }}" > 
        <img src ="{{ asset('image/b3.png') }}" alt = "" width = "90%" height ="auto" border = "0">
        <p>壁紙</p>
      </a></li>
      <li class="b4"><a href="{{ url('/growing/furniture_kind_select/floor') }}" > 
        <img src ="{{ asset('image/b4.png') }}" alt = "" width = "90%" height ="auto" border = "0">
        <p>じゅうたん</p>
      </a></li>
      </ul>
  </div>

{{-- モンスター、部屋の内装もテーブルから持ってくる。 --}}
  <div class="m1">
    <img src="{{ asset('image/monster.png') }}"alt = "" width = "300%" height ="auto" border = "0">
  </div>

  <div class="back">
    <li><a href="{{ url('/growing') }}"> 
      <img src ="{{ asset('image/back.png') }}" alt = "" width = "8%" height ="auto" border = "0">
    </a></li>
  </div>


</body>
</html>

@section('content')
@endsection