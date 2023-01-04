<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/script.css')}}">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
</head>
<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img src="images/main_logo.png"></a></h1>
            <div class="menu-block black">
                <div class="menu-trigger">
                    <div class="">{{$auth->username}}さん<img src="images/arrow.png"></div>
                    <div class="arrow" >∧</div>
                </div>
                <div class="g-navi">

                    <ul>
                        <li><a href="/top">ホーム</a></li>
                        <li><a href="/profile">プロフィール</a></li>
                        <li><a href="/logout">ログアウト</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{$auth->username}}さんの</p>
                <div>
                フォロー数
                {{$follow_count}}名
                </div>
                    <div class="btn blue"><a href="follow-list">フォローリスト</a>
                    </div>
                <div>
                フォロワー数
                {{$follower_count}}名
                </div>
                    <div class="btn blue"><a href="follower-list">フォロワーリスト</a>
                    </div>
            </div>
                <div class="btn blue"><a href="search">ユーザー検索</a>
                </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>