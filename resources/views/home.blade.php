<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="0">
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
   background-image: url("{{ asset('image/furniture/wall/'.$rooms->wall.'.png') }}"); /* 画像 */
   background-size: cover;               /* 全画面 */
   background-attachment: fixed;         /* 固定 */
   background-position: center center;   /* 縦横中央 */
}

a {
  color: black;
}


    </style>
</head>
<body>
    <div class="sample2">
      <ul id="nav">
        <li><a href="{{ asset('../draw') }}"  > 
          <img src ="{{ asset('image/draw .png') }}" alt = "" width = "100%" height ="auto" border = "0">
        </a></li>
        <li><a href="{{ asset('../tasks') }}"  > 
          <img src ="{{ asset('image/todo.png') }}" alt = "" width = "100%" height ="auto" border = "0">
        </a></li>
        <li><a href="{{ url('/growing') }}" > 
          <img src ="{{ asset('image/ikusei.png') }}" alt = "" width = "100%" height ="auto" border = "0">
        </a></li>
        <li><a href="{{ asset('/gacha') }}"  > 
          <img src ="{{ asset('image/gacha.png') }}" alt = "" width = "100%" height ="auto" border = "0">
        </a></li>
        </ul>
      </div>

      <div class="container">
        <img src="{{ asset('image/tag.png') }}">
        <p> {{ Auth::user()->name }}</p>
      </div>
<a href="{{ url('/tasks') }}">
  <dl>
    <h2>Complete Tasks</h2>
    <div class="box">
      @if ($comp_tasks->isNotEmpty())
      <table border="1">
        <tbody>
            @foreach ($comp_tasks as $item)
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
  </dl>
</a>

  <a href="{{ url('/tasks') }}">
    <d2>
      <h2>Todo</h2>
      <div class="box">
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
    <img src="{{asset("storage/".Auth::user()->name.".png?".random_int(0,99999999))}}">
  </div>
</body>
</html>

@section('content')
@endsection
