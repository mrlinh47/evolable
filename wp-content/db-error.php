<?php // custom WordPress database error page tutorial @ digwp.com
    header('HTTP/1.1 503 Service Temporarily Unavailable');
    header('Status: 503 Service Temporarily Unavailable');
    header('Retry-After: 3600'); // 1 hour = 3600 seconds
?>

<!DOCTYPE HTML>

<html dir="ltr" lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sorry, we have too many visitors!</title>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto:700" rel="stylesheet">
<link rel="stylesheet" href="/wp-content/themes/kigyo/error/css/style.css">
    </head>
    <body>

        <div class="error-block">
            <div class="container">
                <div class="inner">
                    <h1 class="logo">
                          <img src="/wp-content/themes/kigyo/error/images/logo.png" alt="Evolable Asia" class="img-responsive">
                    </h1>
                    <div class="warning-block">
                        <h2 class="">503</h2>
                        <div class="content">
                            <b>只今大変混みあっています。<br>恐れ入りますが、しばらく時間をおいて再度アクセスをお願いいたします。<br><a href="/">トップページへ戻る</a></b>
                            <p>Sorry, we have too many visitors! Please try again later.<br><a href="/">Go to Home</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

