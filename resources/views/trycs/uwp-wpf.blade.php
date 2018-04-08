@extends('trycs.layout')
@include('trycs.content-top')

@section('content')
<div class="container">
    <h1>はじめに</h1>
    <div class="row">
       <div class="col-md-12">
                <h1>uwpとかwpfとか</h1>
                <p>
                    windowsの開発は大きく分けると３パターンあります。
                    <br> windows form、wpf、uwpですね。
                </p>
                <p>
                    windows formってのは旧VBとかVCとかその時代からあったアプリのこと。
                    <br> けっこう単純です。
                </p>
                <p>
                    wpf(Windows Presentation Foundation)ってのはxamlを使って開発するwindowsの
開発方式。
                    <br> ViewModelっていう機構があるためFormよりも煩雑にならず比較的使いやすい形式ですね。
                </p>
                <p>
                    uwp(Universal Windows Platform)ってのはwindows10用の開発方式。クロスプラットフォームなのでwindows phoneとかでも同じ形式で使えます。
                    <br> ストアで配布も可能。
                    <br> タブレットとかに重きを置いている分使えない機能も多数存在します。
                    <br> 書き込みできるディレクトリに制限があったりとなかなか曲者だけどその分セキュア。
                </p>
                <p>
                    もちろんmicrosoft的にはuwpを中心にしていきたいでしょうから、将来的を考えるとuwpを覚えるのがいいのですが、従来のwindowsのようなアプリを使いたいのならwpfを覚えるべきかと。
                    <br> ま、基本はどっちも同じです。
                    <br> ただ今から従来のwindows formやるのはあまりおすすめしないかなあ。
                </p>
           @include('trycs.content-bottom')
        </div>
    </div>
</div>
@stop

