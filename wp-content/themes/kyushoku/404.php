<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Page Not Found</title>
        <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto:700" rel="stylesheet">
        <!-- Favicon
        ============================================== -->
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri();?>/new/img/favicon.png">
        <style>
            .page-404{text-align:center;padding:80px 0;}    
            .page-404 h1{font-size:200px;font-weight:900;margin:30px 0;color:#64bbde;}
            .page-404 span{font-weight:bold;}
            .page-404 a{font-weight:bold;display:block;text-align:center;}
        </style>
    </head>
    <body>
        <div class="page-404">
            <img src="<?php echo get_template_directory_uri();?>/new/img/logo-404.png" >
            <h1>404</h1>
            <span>URLが間違っているか、ページが削除されたようです。</span>
            <a href="<?php echo bloginfo('url') ?>">トップページへ戻る</a>
        </div>
    </body>
</html>