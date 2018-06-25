<?php
/**
* Displays navleft navigation
*
* @package WordPress
* @subpackage Twenty_Seventeen
* @since 1.0
* @version 1.2
*/

?>
<li><a href="<?php echo get_site_url(); ?>">
  <?php if (qtrans_getLanguage()=='ja'){ ?>
          求人情報
      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
          Công việc
      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
          Search job
      <?php } ?>
    </a></li>
  <li>
    <?php switch_to_blog(2); ?> 
  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/columns'; ?>">
   <?php if (qtrans_getLanguage()=='ja'){ ?>
          転職のためのコラム
      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
          Column
      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
          Column
      <?php } ?>
      </a>
  <?php restore_current_blog();
?>
</li>
  <li>
    <?php switch_to_blog(3); ?> 
  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/interviews'; ?>">
   <?php if (qtrans_getLanguage()=='ja'){ ?>
          転職者インタビュー
      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
          Phản ánh của khách hàng
      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
          Interview
      <?php } ?>
      </a>
  <?php restore_current_blog();
?>
</li>

  <li><a href="<?php echo get_site_url(); ?>/job-apply/">
  <?php if (qtrans_getLanguage()=='ja'){ ?>
          応募フォーム
      <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
          Nộp đơn xin việc
      <?php }else if (qtrans_getLanguage()=='en'){ ?> 
          Application Form
      <?php } ?>
      </a></li>