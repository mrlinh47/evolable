<?php if (qtrans_getLanguage()=='ja'){ ?>
    <img src="<?php echo get_template_directory_uri(); ?>/new/img/search-w.png" > 求人情報を検索する
<ul class="search-list-btn">
    <li><a href="#place-box" class="fancybox">勤務地から探す</a></li>
    <li><a href="#job" class="fancybox">職種から探す</a></li>
    <li><a href="#key-word" class="fancybox">キーワードから探す</a></li>
</ul>
<?php }else if (qtrans_getLanguage()=='vi'){ ?> 
    <img src="<?php echo get_template_directory_uri(); ?>/new/img/search-w.png" > Tìm kiếm thông tin công việc
<ul class="search-list-btn">
    <li><a href="#place-box" class="fancybox">Tìm kiếm từ nơi làm việc</a></li>
    <li><a href="#job" class="fancybox">Tìm kiếm theo nghề nghiệp</a></li>
    <li><a href="#key-word" class="fancybox">Tìm kiếm theo từ khóa</a></li>
</ul>
<?php }else if (qtrans_getLanguage()=='en'){ ?> 
   <img src="<?php echo get_template_directory_uri(); ?>/new/img/search-w.png" > Search job
<ul class="search-list-btn">
    <li><a href="#place-box" class="fancybox">Workplace</a></li>
    <li><a href="#job" class="fancybox">Occupation</a></li>
    <li><a href="#key-word" class="fancybox">Keyword</a></li>
</ul>
<?php } ?>