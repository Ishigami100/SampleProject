@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="ja">
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="0">

  <link rel="stylesheet" href="css/colorjoe.css">
  <link rel="stylesheet" href="css/Hidden_box.css">
  <link rel="stylesheet" href="css/style2.css">
  <link rel="stylesheet" href="css/button.css">
  <link rel="stylesheet" href="css/responsive.css">
  <title>draw</title>
  <style media="screen">
    *{
      /* 初期化 */
      margin:0px;padding:0px;
    }
    .sample1{
      background: pink;
      width: 400px;
      height: 650px;
      position:absolute;	
      bottom:75px;
      right:0px;
    }
    .sample2{
      position:absolute;	
      bottom:10px;
      right:10px;
    }
    </style>
</head>
<body>
  <h3> </h3>
  <div class="menu_block" clearfix::after>

    <div class="menu_left">
    <span id="layerd-canvas-area">
      <!-- "position: absolute;" を利用することで2つのcanvasを重ねている -->
      <!-- 2つのcanvasを重ねている理由は線の描画と、線の太さを表現する「○」を同時に行うため。 -->
      <canvas
        id="draw-area"
        width="650px"
        height="650px"
        style="border: 1px solid #000000; position: absolute;"></canvas>
      <canvas
        id="line-width-indicator"
        width="650px"
        height="650px"
        style="border: 1px solid #000000;"></canvas>
    </span>
    <div>
      文字の太さ
      <input
        id="range-selector"
        type="range"
        value="5"
        min="1"
        max="10"
        step="0.1">
      <!-- 現在の線の太さを表す数値を表示するための要素 -->
      <!-- input要素のスライドを動かすたびに値が更新される -->
      <span id="line-width">5</span>
    </div>
    <button id="back-button">↩︎ 一つ戻る</button>
      <button id="cancel-button">やり直し ↪︎</button>
      
    <div class="sample2">
      
    </div>
  
    <div>
      
      
    </div>
  

   
  </div>
  <!-- 線の太さを変更するために <input type="range">を利用する -->
  <!-- ドキュメント: https://developer.mozilla.org/ja/docs/Web/HTML/Element/Input/range -->
  <!-- 参考になるサイト: https://itsakura.com/html5-range -->
 

  

<div class="menu_right">

  <li><a href="/home" >
    <label id="home-button">🏠HOMEに戻る
    </label>
  </a>
</li>
  <button id="save-button">保存</button>
  <button id="clear-button">☀︎ 全消し</button>
<br>
  <span id="color-palette"></span>


  <br>
  <button id="eraser-button"> 消しゴムモード</button>
  <pre><font face="ゴシック体" color="black">＊カラーパレットを動かすとペンモードに戻るよ！</font></pre>
</div>

<div>
  
</div>

<p id=user hidden>{{ Auth::user()->name }}</p>
</div>

<script src="{{ asset('/js/colorjoe.min.js') }}"></script>
<script src="{{ asset('/js/main.js') }}"></script>
</body>
</html>


@endsection
