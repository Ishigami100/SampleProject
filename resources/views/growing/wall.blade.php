<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('css/glow.css') }}">
  <link rel="stylesheet" href="{{ asset('css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('css/furniture_set.css') }}">
  <link rel="stylesheet" href="{{ asset('css/slide.css') }}">
  <title>grow</title>
  <style media="screen">
    body {
     background-color: #486d46;            /* 背景色 */
     background-image: url("{{ asset('image/furniture/wall/'.$rooms->wall.'.png') }}"); /* 画像 */
     background-size: cover;               /* 全画面 */
     background-attachment: fixed;         /* 固定 */
     background-position: center center;   /* 縦横中央 */
    }
    button{
      width: 12em;
      height: 12em;
      border-radius: 50%;
      border: 2px solid transparent;
    }
    .left{
      text-align: left;
    }
  </style>
</head>

<body class="layer">
 <header>
 <div class="back left backbutton">
 <li><a href="{{ url('/growing/furniture_kind_select') }}"> 
      <img src ="{{ asset('image/back.png') }}" alt = "" width = "8%" height ="auto" border = "0">
    </a></li>
  </div>
 </header>
 <main>
  {{-- 家具たち配置お願いします。 --}}
  <div style="vertical-align bottom">
    <div class="desk">
      <img src="{{ asset('image/furniture/desk/'.$rooms->desk.'.png') }}" width="60%" height="auto" class="desk-img" alt="">
    </div>
    <div class="chair">
      <img src="{{ asset('image/furniture/chair/'.$rooms->chair.'.png') }}" width="50%" height="auto" class="chair-img" alt="">
    </div>
    <div class="floor">
      <img src="{{ asset('image/furniture/floor/'.$rooms->floor.'.png') }}" width="70%" height="10%" class="floor-img" alt="">
    </div>
  </div>
  {{-- 家具ここまで --}}

  {{-- 壁セレクト部分 --}}
  <div class="sample2 buttons">
    <ul class="button">
    <div class="slide-wrap">
      <form action="" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="itemID" value="0">
        <li>
        <div class="slide-box">
          <button type="submit">
            <img src="{{ asset('image/furniture/wall/0.png') }}" width="100%" height="auto" alt="">
          </button>
        </div>
        </li>
      </form>
      @foreach ($walls as $item)
      <form action="" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="itemID" value="{{ $item->itemID }}">
        <li>
        <div class="slide-box">
          <button type="submit">
            <img src="{{ asset('image/furniture/wall/'.$item->itemID.'.png') }}" width="100%" height="auto" alt="">
          </button>
        </div>
        </li>
      </form>
      @endforeach
  </div>
    </ul>
  </div>

  <div class="m1 monster">
    <img src="{{asset("storage/".Auth::user()->name.".png?".random_int(0,99999999))}}" width="50%" height="auto">
  </div>
  </main>

  <footer>
  
  </footer>
</body>
</html>

@section('content')
@endsection