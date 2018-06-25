<!doctype html>
<html <?php language_attributes(); global $wp;?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta name="format-detection" content="telephone=no">
	<?php
		$keyword = "転職,求人,中途,ITエンジニア,Webエンジニア,グローバル,海外,Evolable Asia Agent、エボラブルアジアエージェン";
		$description = "国内外の優良企業をご紹介いたします。あなたの成長戦略実現をサポートさせていただくパートナーとして、単なる紹介に留まらず、様々なことに関してついてご相談を承ります。";
	    if(function_exists('qtranxf_getLanguage')){
	        if (qtranxf_getLanguage() == "ja"){
	            $keyword = "転職,求人,中途,ITエンジニア,Webエンジニア,グローバル,海外,Evolable Asia Agent、エボラブルアジアエージェン";
	            $description = "国内外の優良企業をご紹介いたします。あなたの成長戦略実現をサポートさせていただくパートナーとして、単なる紹介に留まらず、様々なことに関してついてご相談を承ります。";
	        } elseif (qtranxf_getLanguage() == "en"){
	            $keyword = "Evolable Asia Agent, Job Change, Recruitment, Mid-career Recruitment, IT engineer, Web engineer, Global, Japan, Foreign recruitment,";
	            $description = "We introduce domestic and foreign excellent companies. As a partner who will support your realization of your growth strategy, we will consult about not only mere introduction but also various things.";
	        } else {
	            $keyword = "Evolable Asia Agent, Job Change, Recruitment, Mid-career Recruitment, IT engineer, Web engineer, Global, Japan, Foreign recruitment,";
	            $description = "We introduce domestic and foreign excellent companies. As a partner who will support your realization of your growth strategy, we will consult about not only mere introduction but also various things.";
	        }
	    }
	?>
	<?php
		if ( !is_home() ) {
			if ( is_archive('recruitment') ) {
				echo __("<title>");
					echo __("[:ja]求人情報 | Evolable Asia Agent[:en]Job Information | Evolable Asia Agent[:vi]Job Information | Evolable Asia Agent");
				echo __("</title>");
			}
		}
	?>
	<meta content="<?php echo $description;?>" name="description">
    <meta content="<?php echo $keyword;?>" name="keywords">
	<meta property="og:type" content="website" />
    <meta property="og:site_name" content="Evolable Asia Agent" />
    <?php $current_url = home_url(add_query_arg(array(),$wp->request));?>
    <meta property="og:url" content="<?php echo $current_url; ?>" />
<?php
	    $langCode =  qtranxf_getLanguage();
	    $langImg ='';
	    $ogImage ='';
	    $objPage = get_page_by_path('jobs');
	    if($langCode!='ja'):
	        $langImg ='_'.$langCode;
	    endif;
	    if(is_single() && $objPage->ID=993){
	    	if ( get_field('detail_image'.$langImg,$post_id) ) {
                $ogImage= get_field('detail_image'.$langImg,$post_id);
            }else if(get_field('default_image'.$langImg,$post_id) ){
                $ogImage= get_field('default_image'.$langImg,$post_id);
            }else if(get_field('detail_image', $post_id)){
               $ogImage= get_field('detail_image',$post_id);
            }
            else if(get_field('default_image', $post_id)){
                $ogImage= get_field('default_image', $post_id);
            }else{
            	$ogImage=get_template_directory_uri().'/images/imageog.png';
            }
	    }else{
	    	$ogImage=get_template_directory_uri().'/images/imageog.png';
	    }
    ?>
    <meta property="og:image" content="<?php echo $ogImage;?>" />
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/new/js//bootstrap.min.js"></script>
	<script type="text/javascript">
		var template_url = "<?php echo get_template_directory_uri(); ?>";
	</script>
	<?php wp_head(); ?>

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

<body <?php body_class(); ?>>
	<div id="top"></div>