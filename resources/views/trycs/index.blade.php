@extends('trycs.layout')

@section('title')
Try Visual Studio.
@stop

@section('content')
@include('trycs.header')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <ul>
                <li>
                    <a href="/trycs/first">はじめに</a>
                </li>
                <li>
                    <a href="/trycs/uwp-wpf.html">uwpとwpfの違い</a>
                </li>
                <li>
                    <a href="/trycs/version.html">Visual Studio WindowsとMacの違い</a>
                </li>
                <li>
                    <a href="/trycs/tags.html">(win)xamlのタグあれこれ</a>
                </li>
                <li>
                    <a href="/trycs/binding.html">(win)ViewModel Binding</a>
                </li>
                <li>
                    <a href="/trycs/storyboard.html">(mac)storyboardを使う</a>
                </li>
                <li>
                    <a href="/trycs/textview.html">(mac)NSTextViewを扱う</a>
                </li>
                <li>
                    <a href="/trycs/radio.html">(win/mac)Radioボタンを扱う</a>
                </li>
                <li>
                    <a href="/trycs/table.html">(win/mac)Tableを扱う</a>
                </li>
                <li>
                    <a href="/trycs/outline.html">(mac)OutlineViewを扱う</a>
                </li>
                <li>
                    <a href="/trycs/webview.html">(win/mac)WebViewを扱う</a>
                </li>
                <li>
                    <a href="/trycs/font.html">(win/mac)フォントを埋め込む</a>
                </li>
                <li>
                    <a href="/trycs/skia.html">(mac)skiaSharpを使う</a>
                </li>
            </ul>
        </div>
        <div class="col-md-4 col-sm-12">
            <ul>
                        <li>
                            <a href="/trycs/array.html">C#のarray</a>
                        </li>
                        <li>
                            <a href="/trycs/string.html">C#のstring format</a>
                        </li>
                        <li>
                            <a href="/trycs/null.html">nullかどうか判定（三項演算子）</a>
                        </li>
                        <li>
                            <a href="/trycs/file.html">(win/mac)ファイル操作</a>
                        </li>
                        <li>
                            <a href="/trycs/serialize.html">(win/mac)xmlパース(シリアライズ)</a>
                        </li>
                    </ul>
        </div>
        <div class="col-md-4 col-sm-12">
            <ul>
                        <li>
                            <a href="/trycs/segue.html">(mac)新しいウィンドウを開く</a>
                        </li>
                        <li>
                            <a href="/trycs/window.html">(win/mac)子ウィンドウを閉じる</a>
                        </li>
                        <li>
                            <a href="/trycs/messagebox.html">(win/mac)アラートダイアログを出す</a>
                        </li>
            </ul>
        </div>
    </div>
</div>
@stop

