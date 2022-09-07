@extends('layouts.app')

@section('content')

    
    <form method="post"> <label>アイテム名： <input id="name" type="text" name="item_name" value=""></label> <label>パラム： <input id="comment" type="text" name="param" value=""></label> <input type="submit" name="submit" value="送信"> </form>
    

@endsection
