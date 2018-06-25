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
<ul class="nav navbar-nav" id="top-nav">
         <li class="current">
                 <a href="<?php echo get_site_url(); ?>">
                 <?php if (qtrans_getLanguage()=='ja'){ ?>
                    トップ
                  <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    Top
                  <?php }else if (qtrans_getLanguage()=='en'){ ?>
                    Top page
                  <?php } ?>
                  </a>
                </a>
              </li>

              <li>
                <?php
                  switch_to_blog(3); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/column-index'; ?>">
                  <?php if (qtrans_getLanguage()=='ja'){ ?>
                    コラム / ブログ
                    <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                        Articles cổ vũ tìm việc
                    <?php }else if (qtrans_getLanguage()=='en'){ ?>
                       Articles / Blog
                    <?php } ?>
                  </a>
                  <?php restore_current_blog();
                ?>
                 
              </li>

               <li  class="nav-parrent">
                <?php
                  switch_to_blog(2); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/'; ?>">
                  <?php if (qtrans_getLanguage()=='ja'){ ?>
                    求人情報検索
                  <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    Tìm kiếm việc làm
                  <?php }else if (qtrans_getLanguage()=='en'){ ?>
                    Job search
                  <?php } ?>
                  </a>
                  <?php restore_current_blog();
                ?>
                  
                   <ul class="sub-nav">
                    <li>
                      <?php
                  switch_to_blog(3); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/interviews'; ?>">
                  <?php if (qtrans_getLanguage()=='ja'){ ?>
                    利用者インタビュー
                  <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    Phản ánh của khách hàng
                  <?php }else if (qtrans_getLanguage()=='en'){ ?>
                    Interview
                  <?php } ?>
                </a>
                  <?php restore_current_blog();
                ?>
              </li>
                    <li>
                      <?php
                  switch_to_blog(2); ?> 
                  <a href="<?php echo get_site_url().'/job-apply'; ?>">
                  <?php if (qtrans_getLanguage()=='ja'){ ?>
                    応募フォーム
                  <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    Nộp đơn xin việc
                  <?php }else if (qtrans_getLanguage()=='en'){ ?>
                    Application Form
                  <?php } ?>
                </a>
                  <?php restore_current_blog();
                ?>
               </li>
                   </ul>
               </li>
               <li>
                <?php
                  switch_to_blog(3); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/about'; ?>">
                  <?php if (qtrans_getLanguage()=='ja'){ ?>
                    企業概要
                  <?php }else if (qtrans_getLanguage()=='vi'){ ?>
                    Thông tin doanh nghiệp
                  <?php }else if (qtrans_getLanguage()=='en'){ ?>
                    Corporate Profile
                  <?php } ?>
                </a>
                  <?php restore_current_blog();
                ?>
               </li>
               <li class="employer">
                <?php
                  switch_to_blog(3); ?> 
                  <a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/'; ?>">
                  <?php if (qtrans_getLanguage()=='ja'){ ?>
                      採用企業の皆さまへ
                  <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
                      Nhà tuyển dụng
                  <?php }else if (qtrans_getLanguage()=='en'){ ?> 
                      For employers
                  <?php } ?>
                </a>
                  <?php restore_current_blog();
                ?>
               </li>
               <?php  
             if (function_exists('qtrans_generateLanguageSelectCode')) {
                //print_r(qtrans_generateLanguageSelectCode('hreflang'));
                  echo qtrans_generateLanguageSelectCode('short');
              }
            ?>
       </ul>
