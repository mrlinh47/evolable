<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <title><?php wp_title(''); echo !is_home()?' | ':'外国人人材やグローバル人材の紹介ならエボラブルアジアエージェント';  bloginfo( 'name' ); ?></title>
    <?php if(is_home()){?>
    <meta content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" name="description">
    <meta content="転職,求人,求人情報,中途採用、海外、グローバル人材、外国人採用、Web業界、エボラブルアジアエージェント、Evolable Asia Agent" name="keywords">
     <!-- FACE BOOK start -->
    <meta property="og:title" content="エボラブルアジアエージェント 企業TOP" />
    <meta property="og:description" content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" />
    <?php }elseif(is_page(10)){?>
    <meta content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" name="description">
    <meta content="転職,求人,転職サイト,求人情報,中途採用、グローバル人材、外国人採用、Web業界、エボラブルアジアエージェント、Evolable Asia Agent" name="keywords">
     <!-- FACE BOOK start -->
    <meta property="og:title" content="エボラブルアジアエージェント インタビュー" />
    <meta property="og:description" content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" />
    <?php }elseif(is_page(8)){?>
    <meta content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" name="description">
    <meta content="転職,求人,転職サイト,求人情報,中途採用、グローバル人材、外国人採用、Web業界、エボラブルアジアエージェント、Evolable Asia Agent" name="keywords">
     <!-- FACE BOOK start -->
    <meta property="og:title" content="エボラブルアジアエージェント ブログニュース" />
    <meta property="og:description" content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" />
    <?php }elseif(is_page(6)){?>
    <meta content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" name="description">
    <meta content="転職,求人,転職サイト,求人情報,中途採用、グローバル人材、外国人採用、Web業界、エボラブルアジアエージェント、Evolable Asia Agent" name="keywords">
     <!-- FACE BOOK start -->
    <meta property="og:title" content="エボラブルアジアエージェント 企業概要" />
    <meta property="og:description" content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" />
    <?php }elseif(is_page(4)){?>
    <meta content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" name="description">
    <meta content="転職,求人,転職サイト,求人情報,中途採用、グローバル人材、外国人採用、Web業界、エボラブルアジアエージェント、Evolable Asia Agent" name="keywords">
     <!-- FACE BOOK start -->
    <meta property="og:title" content="エボラブルアジアエージェント サービス" />
    <meta property="og:description" content="国内外の優秀な人材をご紹介いたします。御社の成長戦略実現をサポートさせていただくパートナーとして、単なる人材の紹介に留まらず、採用計画・人材配置・外国人採用定着のノウハウなど、人事戦略全般についてご相談を承ります。" />
    <?php }?>
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="エボラブルアジアエージェント" />
    <meta property="og:url" content="https://agent.evolable.asia" />
    <!-- <meta property="og:image" content="http://server1.evolable.asia:8084/kigyo/wp-content/uploads/2017/09/facebook-opg.png" /> -->
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/imageog.png" />
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <script type="text/javascript">
        var template_url = "<?php echo get_template_directory_uri(); ?>";
    </script>
    <?php wp_head();?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NPPSS2W');</script>
    <!-- End Google Tag Manager -->

    <!-- css new -->

        <!-- CSS Files
================================================== -->
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/new/css/bootstrap.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/new/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/new/css/font-awesome.css" media="screen" />
<link href="<?php echo get_template_directory_uri(); ?>/new/css/owl.carousel.css" rel="stylesheet">
<link href="<?php echo get_template_directory_uri(); ?>/new/css/owl.theme.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/new/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/new/css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/new/css/responsive.css">
<!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="<?php echo get_template_directory_uri(); ?>/new/js/modernizr.custom.js"></script>

</head>

<?php 
    $classNav = "";
    if(is_home() || is_front_page()){
        $classNav = "front_pageNav";
    }
?>
<body <?php body_class(); ?>>
<div id="top"></div>