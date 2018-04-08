@extends('trycs.layout')
@include('trycs.content-top')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12">
           <h1>はじめに</h1>
           <p>
               昨今MacでもVisual Studioが使えるようになってきました。<br>
               もはや世の中はvisual studioでほぼほぼ完結してしまいます。<br>
           </p>
           <p>
               が、どうしてもuwp、wpf、xamarin.Mac、xamarin.Android等色々地味に違うのですよね。<br>
               同じVisualStudioなのに。
           </p>
           <p>
               ってことでvisual studioを使うポイントとか色々書いていきたいと思います。<br>
               とりあえずuwp、wpf、xamarin.Macあたりから。aspなんかは対象外で。
           </p>

           @include('trycs.content-bottom')
        </div>
    </div>
</div>
@stop
