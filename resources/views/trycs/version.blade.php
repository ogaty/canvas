@extends('trycs.layout')
@include('trycs.content-top')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-12">
                <h1>winとmacの違い</h1>
                <p>
                    wpfやuwpでは、xamlと呼ばれるファイルでレイアウトを作成します。
                    <br> xamlは普通のxmlファイルなのでhtml的な知識があればすぐに取得できるかと。
                    <br> 過去のformアプリケーションは絶対座標なのでオブジェクトごとの間隔とかずれとかが気になりがちですが、こいつはずれを気にするこ
とないのが楽ですね。
                    <br>
                </p>
                <p>
                    面倒なことにwpfでは使えるけどuwpでは使えないコンテナも存在します。(tableとかmenuとか)
                    <br> このあたりをどうするかは悩みどころですね。
                </p>
                <p>
                    一方MacではFormアプリケーションに近く、StoryBoardにドラッグしてコンテナを配置します。
                    <br> んでOutlet(変数)とかアクションとかを結びつけてアプリを作っていきます。
                    <br> いちいちXCode呼ぶのが面倒な反面、swiftよりもc#のほうが言語が分かりやすくて汎用性が効くのが良いところ。
                    <br> C#でMacやiOSは作れるけど、swiftでWindowを作ろうなんて人はいないでしょ。
                </p>
           @include('trycs.content-bottom')
        </div>
    </div>
</div>
@stop
