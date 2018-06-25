<?php

get_header();
get_sidebar();
?>
<?php
	//display db admin

	/*while ( have_posts() ) : the_post();

		the_content();

	endwhile; // End of the loop.*/




?>
<!-- page search -->
<div class="right-content">
	<div class="breadcrumb-bg">
		<h2>
		<?php if (qtrans_getLanguage()=='ja'){ ?>
            求人情報検索
        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
            Tìm kiếm thông tin công việc
        <?php }else if (qtrans_getLanguage()=='en'){ ?>
            Search job
        <?php } ?>
    </h2>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="btn-section btn-3">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
		            <li><a class="current" href="#">勤務地から探す</a></li>
					<li><a href="#job" class="fancybox">職種から探す</a></li>
					<li><a href="#key-word" class="fancybox">キーワードから探す</a></li>
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    <li><a class="current" href="#">Nơi làm việc</a></li>
                    <li><a href="#job" class="fancybox">Nghề nghiệp</a></li>
                    <li><a href="#key-word" class="fancybox">Từ khóa</a></li>
		        <?php }else if (qtrans_getLanguage()=='en'){ ?>
                    <li><a class="current" href="#">Workplace</a></li>
                    <li><a href="#job" class="fancybox">Occupation</a></li>
                    <li><a href="#key-word" class="fancybox">Keyword</a></li>
		        <?php } ?>


				</ul>
			</div>
		</div>
		<div class="row search-work">
			<div class="col-md-12">
				<h2 class="green-txt">
				<?php if (qtrans_getLanguage()=='ja'){ ?>
		            勤務地から探す
		        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
		            Tìm kiếm nơi làm việc
		        <?php }else if (qtrans_getLanguage()=='en'){ ?>
		            Workplace
		        <?php } ?>
    			</h2>
				<div class="row nav nav-tabs">
                    <div class="col-md-4">
                        <ul>
                    	<?php if (qtrans_getLanguage()=='ja'){ ?>
				            <li class="active"><a data-toggle="tab" href="#tab1">地方から探す</a></li>
                            <li><a data-toggle="tab" href="#tab2">都道府県から探す</a></li>
                            <li><a data-toggle="tab" href="#tab3">海外から探す</a></li>
				        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
				            <li class="active"><a data-toggle="tab" href="#tab1">Vùng</a></li>
                            <li><a data-toggle="tab" href="#tab2">Quận</a></li>
                            <li><a data-toggle="tab" href="#tab3">Ở nước ngoài</a></li>
				        <?php }else if (qtrans_getLanguage()=='en'){ ?>
				            <li class="active"><a data-toggle="tab" href="#tab1">Region</a></li>
                            <li><a data-toggle="tab" href="#tab2">Prefecture</a></li>
                            <li><a data-toggle="tab" href="#tab3">Overseas</a></li>
				        <?php } ?>

                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <div class="maps-wraper">
                                        <div class="map-text-area">
                                            <img src="<?php echo get_template_directory_uri(); ?>/new/map-japan.png" usemap="#image-map">
                                            <map name="image-map" >
                                                <span class="lightred-txt area1">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    九州･沖縄地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Kyushu-Okinawa
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Kyushu-Okinawa
                                                <?php } ?></span>
                                                <span class="yellow-txt area2">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    中国地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Chugoku
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Chugoku
                                                <?php } ?>
                                                </span>
                                                <span class="pink-txt area3">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    関西地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Kansai
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Kansai
                                                <?php } ?>
                                                </span>
                                                <span class="green-txt area4">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    北陸･甲信越地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Hokuriku - Koushin
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Hokuriku - Koushin
                                                <?php } ?>
                                                </span>
                                                <span class="emeral-txt area5">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    四国地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Shikoku
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Shikoku
                                                <?php } ?>
                                                </span>
                                                <span class="lightblue-txt area6">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    東海地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Tokai
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Tokai
                                                <?php } ?>
                                            	</span>
                                                <span class="orange-txt area7">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    関東地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Kanto
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Kanto
                                                <?php } ?>
                                            	</span>
                                                <span class="sky-txt area8">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    東北地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Tohoku
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Tohoku
                                                <?php } ?>
                                            	</span>
                                                <span class="blue-txt area9">
                                                <?php if (qtrans_getLanguage()=='ja'){ ?>
                                                    北海道地方
                                                <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                                                    Hokkaido
                                                <?php }else if (qtrans_getLanguage()=='en'){ ?>
                                                    Hokkaido
                                                <?php } ?>
                                            	</span>

                                                <area id="kyushu-okinawa" value="108" href="#" coords="103,364,125,364,125,401,103,401,103,382,103,372" shape="poly">
                                                <area id="kyushu-okinawa" value="108" href="#" coords="131,289,149,289,149,293,204,293,204,382,176,390,176,376,168,376,168,386,151,386,151,348,155,348,155,319,151,319,151,334,131,334" shape="poly">

                                                <area id="shikoku" value="" href="#" coords="216,330,253,323,252,338,263,338,263,323,299,324,301,382,269,382,269,370,252,370,252,379,216,379,216,355" shape="poly">
                                                <area id="chugoku" value="" href="#" coords="208,281,231,263,289,263,289,313,208,313" shape="poly">

                                                <area id="kansai" value="107" href="#" coords="348,355,348,298,369,298,369,277,328,277,328,263,289,263,289,313,316,313,316,355" shape="poly">
                                                <area id="kansai" value="107" href="#" coords="304,316,313,316,313,330,304,330" shape="poly">

                                                <area id="tokai" value="124" href="#" coords="368,355,368,316,376,316,376,334,421,335,435,322,435,330,452,330,452,317,445,317,445,304,406,304,406,299,399,300,399,258,377,258,377,277,370,277,370,298,348,298,348,355" shape="poly">
                                                <area id="koushinetsu" value="351" href="#" coords="341,255,354,248,354,223,377,222,377,232,434,198,434,238,425,238,424,290,441,290,441,304,406,303,406,300,399,300,399,258,377,257,377,277,328,277,328,263,341,263" shape="poly">
                                                <area id="kanto" value="3" href="#" coords="474,316,474,293,480,293,480,316,474,316,510,316,509,267,502,260,501,238,425,238,424,290,441,290,441,304,445,304,445,317" shape="poly">
                                                <area id="tohoku" value="114" href="#" coords="471,106,494,106,494,125,507,134,507,169,501,174,501,238,434,238,434,115,458,115,458,120,471,120" shape="poly">
                                                <area id="hokkaido" value="350" href="#" coords="453,0,478,0,533,49,552,49,552,91,524,90,498,100,477,90,466,90,466,102,434,102,434,73,452,58" shape="poly">
                                            </map>
                                        </div>
                                    </div>
                                    <form id="form-maps" action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
                                        <input class="location-name" type="hidden" name="location" value="">
                                    </form>
                                </div>
                                <?php
								    $plocations = get_locations();
								?>
                                <div id="tab2" class="tab-pane fade">
                                    <ul class="search-job-list">
                                    	<?php foreach ($plocations as $key => $arlocation) { ?>
                                    	<?php if ($arlocation[0]->count > 0 && $arlocation[0]->parent != 0 && $arlocation[0]->parent != 353 && $arlocation[0]->parent != 354 && $arlocation[0]->parent != 355) { ?>
					                    <form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
					                        <input type="hidden" name="location" value="<?php echo $arlocation[0]->term_id ?>">
					                        <li><button type="submit"><?php echo $arlocation[0]->name ?></button></li>
					                    </form>
					                   	<?php } ?>
					                    <?php } ?>
                                    </ul>
                                </div>
                                <div id="tab3" class="tab-pane fade">
                                    <ul class="search-job-list">
                                    	<?php
                                    	$oj_id = 353;
										$oj_taxonomy_name = 'job-location';
										$term_children = get_term_children( $oj_id, $oj_taxonomy_name );
										?>
                                    	<?php foreach ( $term_children as $child ) { ?>
											<?php $term = get_term_by( 'id', $child, $oj_taxonomy_name ); ?>
											<form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
						                        <input type="hidden" name="location" value="<?php echo $child; ?>">
						                        <li><button type="submit"><?php echo $term->name ?></button></li>
						                    </form>
										<?php } ?>
                                    </ul>
                                </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>

<div class="group-link">
  	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul>
					<?php get_template_part( 'template-parts/navigation/navigation', 'grouplink' ); ?>
				</ul>
			 </div>
		</div>
	</div>
</div>


<div class="recruit-list">
  	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>
				<?php if (qtrans_getLanguage()=='ja'){ ?>
			            最新求人情報
			        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			           	Công việc mới nhất
			        <?php }else if (qtrans_getLanguage()=='en'){ ?>
			            Latest Work
			        <?php } ?></h2>

 					<?php echo do_shortcode( '[ajax_pagination post_type="jobs" posts_per_page="5" paged="1"]' ); ?>


			</div>
		</div>
	</div>
</div>

	<?php get_template_part( 'template-parts/content/content', 'recruitment' ); ?>
<?php
get_footer();