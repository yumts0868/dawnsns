<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="crossorigin="anonymous"></script>
    <script src="{{ asset('/js/script.js') }}"></script>
</head>
<body>
    <header>
    <div class ="wrapper clear">
        <div id = "header-left">
        <h1><a href="/top"><img class="mainlogo" src="images/main_logo.png"></a></h1>
        </div>
                <div id="header-right">
                    <p>{{$username}}さん<img class="icon" src="images/dawn.png"></p>
                <ul class="accordion-area">
                    <li><section>
                            <h3 class="title"></h3>
                            <div class="box">
                    <li class="box-title"><a href="/top">ホーム</a></li>
                    <li class="box-title"><a href="/profile">プロフィール編集</a></li>
                    <li class="box-title"><a href="/logout">ログアウト</a></li>
                    </div>
                            </section></li>
                </ul>
                </div>
    </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{$username}}さんの</p>
                <div>
                <p>フォロー数</p>
                <p>{{$countFollow}}名</p>
                </div>
                <p class="btn"><a href="/follow-list">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>{{$countFollower}}名</p>
                </div>
                <p class="btn"><a href="/follower-list">フォロワーリスト</a></p>
            </div>
            <p class="btn"><a href="/search">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="JavaScriptファイルのURL"></script>
    <script src="JavaScriptファイルのURL"></script>
</body>
</html>
