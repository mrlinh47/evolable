<?php
if( !isset( $_GET['id'] ) && $_GET['id'] != '' ) {
	wp_die();
}
global $wp;
$job_id = $_GET['id'];
$lang = qtranxf_getLanguage();
$output = array();
if( isset( $_POST ) && !empty( $_POST ) ) {
	$validate = true;
	add_filter( 'upload_dir', 'wp_jobs_upload_dir' );
	$upload_dir = wp_upload_dir();
	$base_dir = $upload_dir['path']; //print_r($upload_dir); die();

	if( $_POST['name'] == '' ) {
		$validate = false;
		$output['name'] = 'error';
	}
	if( $_POST['phone_number'] == '' ) {
		$validate = false;
		$output['phone_number'] = 'error';
	}
	if( !is_email( $_POST['email'] ) ) {
		$validate = false;
		$output['email'] = 'error';
	}

	if( $_FILES["file_cv"]['name'] != '' ) {
		$file1 = $_FILES["file_cv"]['name'];
		$path1 = $base_dir.'/'.$file1;
	} else {
		$file1 = '';
		$path1 = '';
	}

	if( $_FILES["file_other"]['name'] != '' ) {
		$file2 = $_FILES["file_other"]['name'];
		$path2 = $base_dir.'/'.$file2;
	} else {
		$file2 = '';
		$path2 = '';
	}

	if( $validate == true ) {
		$cv_file = '';
		$other_file = '';

		if( move_uploaded_file( $_FILES["file_cv"]["tmp_name"], $path1 ) ) {
			$cv_file = $upload_dir['url'].'/'.$file1;
		}

		if( move_uploaded_file( $_FILES["file_other"]["tmp_name"], $path2 ) ) {
			$other_file = $upload_dir['url'].'/'.$file2;
		}
		$arrData =  array(
			'apply_date' => date( 'Y-m-d H:i:s' ),
			'name' => $_POST['name'],
			'phone_number' => $_POST['phone_number'],
			'email' => $_POST['email'],
			'expected_salary' => $_POST['expected_salary'],
			'job_id' => $_POST['job_id'],
			'job_no' => $_POST['job_no'],
			'job_title' => $_POST['job_title'],
			'cv_file' => $cv_file,
			'other_file' => $other_file,
			'request' => $_POST['request'],
			'language' => $lang
		);
		$wpdb->insert( $wpdb->prefix.'job_candidates',$arrData);
	}
}
$job_apply_wpnonce = wp_create_nonce('job_apply_wpnonce');
get_header();
get_sidebar();
?>
<div class="right-content">
	<div id="job-apply">
		<div class="breadcrumb-bg">
			<h2>
			<?php if (qtrans_getLanguage()=='ja'){ ?>
	            応募フォーム
	        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
	            TRANG ỨNG TUYỂN
	        <?php }else if (qtrans_getLanguage()=='en'){ ?>
	            APPLICANT FORM
	        <?php } ?>
			</h2>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="btn-section btn-3">
						<li><a href="<?php echo get_site_url(); ?>">
						<?php if (qtrans_getLanguage()=='ja'){ ?>
				            求人情報検索
				        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
				            Tìm kiếm công việc
				        <?php }else if (qtrans_getLanguage()=='en'){ ?>
				            Search job
				        <?php } ?>
				     	</a></li>
						<li>
							<a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/columns'; ?>">
						<?php if (qtrans_getLanguage()=='ja'){ ?>
			                コラム
			            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
			                Column
			            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
			                Column
			            <?php } ?>
					    </a></li>
							<li>
								<?php switch_to_blog(3); ?> 
								<a href="<?php echo get_site_url().'/'.qtranxf_getLanguage().'/interviews'; ?>">
							<?php if (qtrans_getLanguage()=='ja'){ ?>
					            INTERVIEW
					        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
					            INTERVIEW
					        <?php }else if (qtrans_getLanguage()=='en'){ ?>
					            INTERVIEW
					        <?php } ?>
					    </a>
					<?php restore_current_blog(); ?></li>
					<?php if($job_id) : ?><li><a href="<?php echo get_permalink($job_id); ?>" class="view-more-btn">
					<?php if (qtrans_getLanguage()=='ja'){ ?>
			                詳細に戻る
			            <?php }else if (qtrans_getLanguage()=='vi'){ ?> 
			                Quay lại
			            <?php }else if (qtrans_getLanguage()=='en'){ ?> 
			                Back
			            <?php } ?>
			        </a></li>
			    <?php endif; ?>
					</ul>
				</div>
			</div>
			<?php if($job_id) : ?>
			<div id="cont-apply-job" class="row company-if">
				<div class="col-md-4">
					<h1>
					<?php if (qtrans_getLanguage()=='ja'){ ?>
			            こちらに応募する場合、
						下記をご記入ください。
			        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
			            こちらに応募する場合、
						下記をご記入ください。
			        <?php }else if (qtrans_getLanguage()=='en'){ ?>
			            こちらに応募する場合、
						下記をご記入ください。
			        <?php } ?>
	        		</h1>

				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-4">
							<?php
							if( get_field('default_image', $job_id) ) {
								$src = get_field('default_image', $job_id);
							} else {
								$src = get_template_directory_uri()."/images/apply_job/img_job.jpg";
							} ?>
		                    <img class="img-responsive" src="<?php echo $src; ?>"/>
						</div>
						<div class="col-md-8">
							<h2><?php echo get_post_field( 'post_title', $job_id ); ?> </h2>
							<p>■No.<?php echo get_post_meta( $job_id, 'job_no', true ); ?></p>

					        <div class="toogle-benefit">
	            					<p>■<?php echo mb_strimwidth(wp_strip_all_tags(get_post_meta( $job_id, 'benefits', true )), 0, 80, '...'); ?></p>
	                         	</div>

							
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
		</div>

	    <div class="form-content gray-bg">
			<div id="apply-form" class="container-fluid">
			    <div class="container">
			        <div class="row">
			            <div class="col-xs-12 col-md-12 col-lg-12">
			                <form action="" method="POST" enctype="multipart/form-data;charset=utf-8" class="row cont-apply-form">
			                	<input type="hidden" name="action" value="job_apply">
			                	<input type="hidden" name="_wpnonce" id="_wpnonce" value="<?php echo $job_apply_wpnonce; ?>">
			                	<input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
			                	<input type="hidden" name="job_no" value="<?php echo get_post_meta( $job_id, 'job_no', true ); ?>">
			                	<input type="hidden" name="job_title" value="<?php echo get_post_field( 'post_title', $job_id ); ?>">
			                	<!-- <input type="hidden" name="url" value="<?php echo home_url( add_query_arg( array(), $wp->request ) ); ?>"> -->
			                    <div class="panel-default">

			                        <div class="panel-body body-apply-form">
			                            <div class="row">

			                                <div class="col-md-6">
			                                    <div class="form-horizontal">
			                                        <div class="row form-group">
			                                            <label class="col-md-offset-1 col-xs-4 col-sm-4 col-md-3 control-label required" for="name">
			                                            <span><?php echo __('[:ja]お名前[:en]Name[:vi]Họ và tên'); ?></span>
			                                            <span class="txt-red txt-required"><?php echo __('[:ja]「必須」[:en][Required][:vi][Bắt buộc]'); ?></span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="name" name="name" type="text" placeholder="" class="form-control input-md <?php echo isset( $output['name'] ) ? 'error' : ''; ?>">
			                                            </div>
			                                        </div>
			                                        <div class="row form-group">
			                                            <label class="col-md-offset-1 col-xs-4 col-sm-4 col-md-3 control-label required" for="email">
			                                            <span><?php echo __('[:ja]<dt class="sp-only-fs">メールアドレス</dt>[:en]Email[:vi]Email'); ?></span>
			                                            <span class="txt-red txt-required"><?php echo __('[:ja]「必須」[:en][Required][:vi][Bắt buộc]'); ?></span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="email" name="email" type="text" placeholder="" class="form-control input-md <?php echo isset( $output['email'] ) ? 'error' : ''; ?>">
			                                            </div>
			                                        </div>
			                                        <div class="row form-group have-fileupload">
			                                            <label class="col-md-offset-1 col-xs-4 col-sm-4 col-md-3 control-label" for="file_cv">
			                                            <span>CV</span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="file_cv" name="file_cv" class="input-file" type="file">
			                                                <label for="file_cv" class=""><?php echo __('[:ja]ファイルを選択[:en]Choose file[:vi]Chọn tập tin'); ?></label>
			                                                <span class="btn btn-default"><span class="glyphicon glyphicon-ok"></span></span>
			                                                <p id="des_file_cv" class="txt-ex cv-description"><?php _e('[:ja].doc, .docx, .pdf, .xls, .xlsx, .zip, .rarのファイル形式のみをアップしてください[:vi]Chúng tôi chấp nhận .doc .docx, .pdf,.xls, .xlsx, .zip, .rar[:en]We accept .doc .docx, .pdf, .xls, .xlsx, .zip, .rar');?></p>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>

			                                <div class="col-md-6">
			                                    <div class="form-horizontal">
			                                        <div class="row form-group">
			                                            <label class="col-xs-4 col-sm-4 col-md-3 control-label required" for="phone_number">
			                                            <span><?php echo __('[:ja]電話番号[:en]Phone[:vi]Số điện thoại'); ?></span>
			                                            <span class="txt-red txt-required"><?php echo __('[:ja]「必須」[:en][Required][:vi][Bắt buộc]'); ?></span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="phone_number" name="phone_number" type="number" placeholder="" class="form-control input-md <?php echo isset( $output['phone_number'] ) ? 'error' : ''; ?>">
			                                            </div>
			                                        </div>
			                                        <div class="row form-group">
			                                            <label class="col-xs-4 col-sm-4 col-md-3 control-label" for="expected_salary"><?php echo __('[:ja]希望年収 <br>[万円][:en]Desired salary[:vi]Mức lương mong muốn'); ?></label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="expected_salary" name="expected_salary" type="number" placeholder="" class="form-control input-md">
			                                            </div>
			                                        </div>
			                                        <div class="row form-group have-fileupload">
			                                            <label class="col-xs-4 col-sm-4 col-md-3 control-label" for="file_other">
			                                            <span><?php echo __('[:ja]その他添付<br class="sp-only-460">ファイル[:en]Other file[:vi]Tài liệu đính kèm'); ?></span>
			                                            </label>
			                                            <div class="col-xs-8 col-sm-8 col-md-8">
			                                                <input id="file_other" name="file_other" class="input-file" type="file">
			                                                <label for="file_other" class=""><?php echo __('[:ja]ファイルを選択[:en]Choose file[:vi]Chọn tập tin'); ?></label>
			                                                <span class="btn btn-default"><span class="glyphicon glyphicon-ok"></span></span>
			                                                <p id="des_file_other" class="txt-ex cv-description"><?php _e('[:ja].doc, .docx, .pdf, .xls, .xlsx, .zip, .rarのファイル形式のみをアップしてください[:vi]Chúng tôi chấp nhận .doc .docx, .pdf,.xls, .xlsx, .zip, .rar[:en]We accept .doc .docx, .pdf, .xls, .xlsx, .zip, .rar');?></p>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>

			                            </div>
			                            <div class="row">
			                                <div class="col-md-12">
			                                    <div class="form-horizontal">
			                                        <div class="row form-group form-group-comment">
			                                            <label class="col-xs-12 col-sm-4 col-md-2 control-label lb-comment" for="request"><?php echo __('[:ja]その他ご要望[:en]Other wishes[:vi]Mong muốn khác'); ?></label>
			                                            <div class="col-xs-12 col-sm-8 col-md-10 ">
			                                                <textarea class="form-control" id="request" name="request"></textarea>
			                                            </div>
			                                        </div>
			                                    </div>
			                                </div>
			                                <div class="col-md-12">
			                                    <div class="term-content">
			                                    	<?php echo __('[:ja]
			                                    	"株式会社エボラブルアジアエージェント（以下「当社」といいます。）は、ご利用者様からの信頼を第一と考え、ご利用者様個人に関わる情報を正確、かつ機密に取り扱うことは、当社にとって重要な責務であると考えております。そのために、ご利用者様の個人情報に関する「個人情報保護方針」を制定し、個人情報の取り扱い方法について、全社員及び関連会社への徹底を実践してまいります。その内容は以下の通りです。なお、既に当社で保有し利用させて頂いている個人情報につきましても、本方針に従ってご利用者様の個人情報の取り扱いを実施致します。<br>

個人情報の取り扱いについて<br>
(1)個人情報の取得当社は個人情報を適法かつ公正な手段により取得致します。お客様に個人情報の提供をお願いする場合は、事前に取得の目的、利用の内容を開示した上で、当社の正当な事業の範囲内で、その目的の達成に必要な限度において、個人情報を取得致します。<br><br>
 
(2)個人情報の利用および共同利用当社がお預かりした個人情報は、利用目的に沿った範囲内で利用致します。利用目的については、以下の「利用目的の範囲」の内、当法人の正当な事業の範囲内でその目的の達成に必要な事項を利用目的と致します。<br><br>
 
●利用目的の範囲について<br>
・Webサイト構築、保守・サポート業務を行う場合<br>
・業務上のご連絡をする場合<br>
・当社が取り扱う商品及びサービスに関するご案内をする場合<br>
・お客様からのお問い合せまたはご依頼等への対応をさせて頂く場合<br>
・その他、お客様に事前にお知らせし、ご同意を頂いた目的の場合<br><br>
 
●上記目的以外の利用について<br>
上記以外の目的で、お客様の個人情報を利用する必要が生じた場合には、法令により許される場合を除き、その利用について、お客様の同意を頂くものとします。<br><br>
 
(3)個人情報の第三者提供<br>
当社は、お客様の同意なしに第三者へお客様の個人情報の提供は行いません。但し個人情報に適用される法律その他の規範により、当社が従うべき法令上の義務等の特別な事情がある合は、この限りではありません。<br>
 
(4)個人情報の開示・修正等の手続<br>
お客様からご提供頂いた個人情報に関して、照会、訂正、削除を要望される場合は、お問い合わせ先窓口までご請求ください。当該ご請求が当社の業務に著しい支障をきたす場合等を除き、お客様ご本人によるものであることが確認できた場合に限り、合理的な期間内に、お客様の個人情報を開示、訂正、削除 致します。<br><br>
 
(5)個人情報の開示等に要する手数料開示請求者（お客様ご本人と認められる方）に対し開示等に要する手数料のご負担をお願いする場合がありますが、その場合はあらかじめその旨を明らかにしご負担頂くことと致します。<br><br>

個人情報の保護に関する法令・規範の遵守について当社は、当社が保有する個人情報に関して適用される個人情報保護関連法令及び規範を遵守します。また本方針は、日本国の法律、その他規範により判断致しま <br>す。本方針は当社の個人情報の取り扱いに関しての基本的な方針を定めるものであり当社は本方針に則って個人情報保護法等の法令・規範に基づく個人情報の保 護に努めます。<br><br>

個人情報の安全管理措置について当社は、個人情報への不正アクセス、個人情報の紛失、破壊、改ざん、漏えい等から保護し、正確性及び安全性を確保するために管理体制を整備し、適切な安全対策を実施致します。個人情報を取り扱う事務所内への部外者の立ち入りを制限し、当社の個人情報保護に関わる役員・職員等全員に対し教育啓発活動を実施するほか、管理責任者を置き個人情報の適切な管理に努めます。<br><br><br>

継続的な改善について当社は、個人情報保護への取組みについて、日本国の従うべき法令の変更、取り扱い方法、環境の変化に対応するため、継続的に見直し改善を実施致します。<br><br>

お問い合わせ個人情報の取り扱いに関するお問い合わせは、こちらまでご連絡下さい。<br><br>
 
【個人情報取扱い窓口】株式会社エボラブルアジアエージェント agent@evolable.asia<br><br>

2015年5月27日"<br>[:en]demo[:vi]Dưới đây là những điều khoản về chính sách bảo mật mà công ty Evolable Asia Agent quy định về việc sử dụng thông tin bảo mật ở những dịch vụ cung cấp trên trang web Evolable Asia Agent. Điều 1: Thông tin bảo mật 1.Khái niệm “thông tin cá nhân” trong thông tin bảo mật chỉ những thông tin cá nhân được luật pháp bảo vệ, là những thông tin có liên quan đến một cá nhân đang tồn tại bao gồm họ tên, ngày tháng năm sinh, địa chỉ, số điện thoại, địa chỉ liên lạc hoặc những thông tin khác. 2. Thông tin đặc điểm và thông tin lý lịch trong thông tin bảo mật là những thông tin khác với “thông tin cá nhân” quy định ở trên bao gồm: thông tin nhận dạng của các thiết bị đầu cuối, thông tin vị trí, thông tin cookies, địa chỉ IP của người dùng, tuổi tác, nghề nghiệp, giới tính, mã bưu điện, môi trường sử dụng, phương pháp sử dụng, ngày giờ sử dụng, từ khóa tìm kiếm, lịch sử quảng cáo và các trang đã truy cập, những sản phẩm đã mua hoặc những dịch vụ đã sử dụng. Điều 2: Phương pháp thu thập thông tin bảo mật 1. Công ty sẽ hỏi những thông tin cá nhân như tên họ người dùng, ngày tháng năm sinh, địa chỉ, số điện thoại, địa chỉ mail, số giấy phép lái xe. Hoặc thu thập từ đối tác kinh doanh hoặc từ những ghi chép trong quá trình trao đổi bao gồm những thông tin cá nhân của người dùng đã được thực hiện giữa đối tác và người dùng. 2. Công ty sẽ tiến hành thu thập những thông tin đặc điểm, thông tin lí lịch về người dùng như máy chủ hoặc phần mềm đã sử dụng, lịch sử quảng cáo, lịch sử các trang đã truy cập, từ khóa tìm kiếm,ngày giờ sử dụng, phương pháp sử dụng, hoàn cảnh sử dụng (bao gồm thông tin thiết lập các loại khi sử dụng, tình trạng truyền tin của các thiết bị cuối trong trường hợp thông qua thiết bị cuối di động), địa chỉ IP, thông tin cookies, thông tin vị trí, thông tin thiết bị cuối khi người dùng xem hoặc sử dụng dịch vụ của nhà cung cấp hoặc của công ty. Điều 3: Mục đích thu thập và sử dụng thông tin cá nhân Mục đích của công ty về việc sử dụng và thu thập thông tin cá nhân được nêu như sau: (1) Mục đích hiển thị những thông tin như họ tên, địa chỉ, nơi liên lạc những dịch vụ đã sử dụng hoặc những thông tin liên quan đến chúng nhằm thực hiện việc xem lại hiện trạng sử dụng, chỉnh sửa, xem lại những thông tin mà người dùng đã tự mình đăng kí . (2) Mục đích sử dụng thông tin nơi liên lạc như địa chỉ, họ tên để liên lạc khi cần thiết, để gửi các sản phẩm cho người dùng hoặc trong các trường hợp sử dụng địa chỉ mail để liên lạc, thông báo cho người dùng. (3) Mục đích sử dụng thông tin như họ tên, ngày tháng năm sinh, địa chỉ, số điện thoại, số tài khoản ngân hàng, số giấy phép lái xe, kết quả chuyển phát thư bảo đảm…để tiến hành xác nhận với chính người dùng. (4) Mục đích làm cho hiển thị trên màn hình nhập liệu những thông tin đã đăng ký với công ty, và chuyển tiếp các dịch vụ dựa trên chỉ thị của người dùng (bao gồm cả những dịch vụ đối tác đã cung cấp) để người dùng có thể nhập dữ liệu 1 cách dễ dàng. (5) Mục đích sử dụng thông tin để xác định đặc điểm cá nhân như địa chỉ, họ tên, tình trạng sử dụng để từ chối sự sử dụng người dùng với mục đích bất chính, không thích hợp hoặc người dùng vi phạm điều khoản sử dụng dịch vụ này làm phát sinh thiệt hại do bên thứ 3 hoặc chậm trễ thanh toán. (6) Mục đích sử dụng những thông tin liên lạc, tình trạng sử dụng dịch vụ của người dùng, những thông tin cần thiết khi công ty cung cấp dịch vụ cho người dùng như thông tin liên quan đến yêu cầu thanh toán, nội dung trao đổi liên lạc để giải đáp những trao đổi, thắc mắc từ người dùng. (7) Mục đích kết hợp với những mục đích sử dụng được nêu ở trên. Điều 4: Cung cấp những thông tin cá nhân cho bên thứ 3 1. Ngoài những trường hợp được công ty nêu dưới đây, nếu không có được sự đồng ý trước từ người dùng thì không được cung cấp thông tin cá nhân cho bất cứ bên thứ 3 nào. Tuy nhiên, trừ trường hợp được luật bảo vệ thông tin cá nhân hoặc các điều luật khác cho phép. (1) Trường hợp dựa trên cơ sở quy định của pháp luật. (2) Trường hợp cần thiết bảo hộ tài sản, thân thể, tính mạng con người nhưng gặp khó khăn trong việc nhận được sự chấp thuận của chính người đó. (3) Trường hợp cần duy trì sự phát triển lành mành của trẻ em hoặc cải thiện vệ sinh cộng nhưng gặp khó khăn trong việc nhận được sự chấp thuận của chính người đó. (4) Trường hợp cần hợp tác với cơ quan nhà nước, chính quyền địa phương hoặc những người nhận ủy thác để thực hiện những công vụ theo quy định của pháp luật mà việc có sự đồng ý của chính người đó có nguy cơ cản trở việc thực hiện những công việc tương ứng. (5) Trường hợp những mục được công bố hoặc thông báo được quy định dưới đây: + Cung cấp cho bên thứ 3 vì mục đích sử dụng + Những dữ liệu phải cung cấp cho bên thứ 3 + Phương pháp hoặc cách thức để cung cấp cho bên thứ 3. + Theo yêu cầu của chính người đó về việc tạm ngưng cung cấp thông tin cá nhân cho bên thứ 3 2. Không kể đến những mục đã được quy định ở trên,những trường hợp được nêu dưới đây thì không dành cho bên thứ 3. (1)Trong trường hợp được công ty ủy thác 1 phần hoặc toàn bộ việc xử lý thông tin trong phạm vi cần thiết nhằm đạt được mục đích sử dụng. (2)Trong trường hợp được cung cấp thông tin cá nhân để tiếp tục công việc do vấn đề hợp nhất công ty hoặc những lí do khác. (3)Trong trường hợp phải sử dụng chung thông tin cá nhân giữa những người được chỉ định thì phải thông báo trước cho người đó hoặc để chính người đó biết tình hình sơ lược về biệt hiệu hoặc tên của người có trách nhiệm quản lý thông tin cá nhân tương ứng hoặc mục đích sử dụng của người sử dụng, phạm vị sử dụng của những người cùng sử dụng, cũng như những mục được sử dụng chung. Điều 5: Công khai thông tin cá nhân 1. Khi nhận được yêu cầu công khai thông tin cá nhân của chính chủ, công ty sẽ không trì hoãn mà công khai ngay cho người đó.Tuy nhiên khi công bố những thông tin cá nhân cũng gặp 1 trong những trường hợp như quyết định không công bố hoặc chỉ công bố 1 phần hoặc toàn bộ, trong những trường hợp đó công ty sẽ nhanh chóng thông báo cho người đó. (1). Trong trường hợp có nguy cơ gây ra thiệt hại về tính mạng, thân thể, tài sản hoặc các lợi ích, quyền lợi khác cho bên thứ 3 hoặc chính người đó. (2). Trong trường hợp có nguy cơ gây ảnh hưởng trở ngại cho những hoạt động của công ty. (3). Trường hợp vi phạm pháp luật khác. 2. Đối với những thông tin ngoài thông tin cá nhân như thông tin lí lịch hoặc thông tin đặc điểm thì không liên quan đến những quy định ở trên, về nguyên tắc là không được công bố. Điều 6: Chỉnh sửa và xóa bỏ thông tin cá nhân 1. Người dùng có thể yêu cầu công ty xóa bỏ hoặc đính chính thông tin cá nhân do những thủ tục được công ty quy định trong trường hợp thông tin cá nhân mà công ty lưu giữ bị nhầm lẫn. 2. Trong trường hợp đã phán đoán có sự cần thiết với yêu cầu đó sau khi tiếp nhận yêu cầu như đã nêu trên, công ty sẽ nhanh chóng tiến hành xóa bỏ hoặc chỉnh sửa thông tin cá nhân rồi thông báo với người dùng. Điều 7: Đình chỉ việc sử dụng thông tin cá nhân Nếu như người dùng yêu cầu công ty xóa bỏ hoặc đình chỉ việc sử dụng thông tin cá nhân vì những lí do như thông tin cá nhân được sử dụng quá phạm vi mục đích sử dụng hoặc lấy thông tin bằng những thủ đoạn bất chính thì công ty sẽ nhanh chóng tiến hành những điều tra cần thiết, sau đó dựa vào kết quả điều tra đó đế tiến hành đình chỉ việc sử dụng thông tin cá nhân, thông báo cho nạn nhân. Tuy nhiên, đối với những trường hợp có phát sinh chi phí lớn để đình chỉ việc sử dụng thông tin cá nhân,trường hợp khó khăn trong việc tiến hành đình chỉ quyền sử dụng khác với quyền sử dụng đó, trường hợp có thể lấy những biện pháp thay thế cần thiết để bảo toàn lợi ích quyền lợi của nạn nhân thì sẽ tiến hành biện pháp thay thế tạm thời. Điều 8: Thay đổi chính sách bảo mật 1. Nội dung của chính sách bảo mật có thể thay đổi mà không cần thông báo cho người dùng. 2. Chính sách bảo mật sau khi thay đổi, trừ những trường hợp được công ty quy định riêng thì sẽ có hiệu lực từ thời điểm được đăng tải lên trang web này. Điều 9: Địa chỉ liên hệ Đối với những thắc mắc có liên quan đến vấn đề bảo mật,vui lòng liên hệ qua địa chỉ sau. Địa chỉ: Shibadaimon Center Building,10 floor,Shibadaimon 1-10-11,Minato-ku,Tokyo: Tên công ty: Evolable Asia Agent.,ltd Bộ phận phụ trách:Bộ phận quản lý Email: agent@evolable.asia'); ?>
			                                    </div>
			                                </div>
			                                <div class="col-xs-12 col-sm-12 col-md-12">
			                                    <div class="text-center">
			                                          <button id="btnSubmit" data-toggle="modal" data-target="#myConfirm" class="btn btn-default text-uppercase big-btn" >
			                                          <?php if (qtrans_getLanguage()=='ja'){ ?>
											            エントリーする
											        <?php }else if (qtrans_getLanguage()=='vi'){ ?>
											            エントリーする
											        <?php }else if (qtrans_getLanguage()=='en'){ ?>
											            エントリーする
											        <?php } ?>
			                                          </button>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>
		</div>
	</div>

	<div id="myConfirm" class="container-fluid modal fade" role="dialog" style="display: none;">
	   <div class="modal-dialog">
	      <!-- Modal content-->
	      <div class="modal-content">
	         <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal">×</button>
	            <h4 class="modal-title"><?php echo __("[:ja]以下の内容がメールで送信されます[:en]Content validation[:vi]Xác nhận thông tin trước khi gửi"); ?></h4>
	         </div>
	         <div class="modal-body">
	            <div class="panel-body body-apply-form">
	               <div class="row">
	                  <div class="col-md-6">
	                     <div class="form-horizontal">
	                        <div class="row form-group">
	                           <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-3  required" for="nameInput">
	                           <span><?php echo __("[:ja]お名前[:en]Name[:vi]Họ và tên"); ?></span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="name">

	                           </div>
	                        </div>
	                        <div class="row form-group email-confirm">
	                           <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-3  required" for="emailInput">
	                           <span><?php echo __("[:ja]メールアドレス[:en]Email[:vi]Email"); ?></span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="email">

	                           </div>
	                        </div>
	                        <div class="row form-group have-fileupload">
	                           <label class="col-full col-md-offset-1 col-xs-4 col-sm-4 col-md-3 " for="cvFile">
	                           <span>CV</span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="file_cv">
	                           		<span id="fileCvName"></span>
	                           </div>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="col-md-6">
	                     <div class="form-horizontal">
	                        <div class="row form-group">
	                           <label class="col-full col-xs-4 col-sm-4 col-md-3 control-label required" for="phoneInput">
	                           <span><?php echo __("[:ja]電話番号[:en]Phone[:vi]Số điện thoại"); ?></span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="phone_number">

	                           </div>
	                        </div>
	                        <div class="row form-group">
	                           <label class="col-full col-xs-4 col-sm-4 col-md-3 control-label" for="salaryInput"> <span><?php echo __("[:ja]希望年収 [万円][:en]Desired salary[:vi]Mức lương mong muốn"); ?></span></label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="expected_salary">

	                           </div>
	                        </div>
	                        <div class="row form-group have-fileupload">
	                           <label class="col-full col-xs-4 col-sm-4 col-md-3 control-label" for="docFile">
	                           <span><?php echo __("[:ja]その他 添付ファイル[:en]Other file[:vi]Tài liệu đính kèm"); ?></span>
	                           </label>
	                           <div class="col-xs-8 col-sm-8 col-md-8" for="file_other">
	                              <span id="fileOtherName"></span>
	                           </div>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="col-md-12 cmt-other">
	                     <div class="form-horizontal">
	                        <div class="row form-group form-group-comment">
	                           <label class="col-full col-xs-12 col-sm-4 col-md-2 lb-comment" for="txt-comment"><span><?php echo __("[:ja]その他ご要望[:en]Other wishes[:vi]Mong muốn khác"); ?></span></label>
	                           <div class="col-xs-12 col-sm-8 col-md-10" for="request">

	                           </div>
	                        </div>
	                     </div>
	                  </div>
	                  <div class="col-xs-12 col-sm-12 col-md-12 box-confirm-btn">
	                     <div class="confirm-btn">
	                        <button type="button" data-target="#mySuccess" data-toggle="modal" data-dismiss="modal" class="btn btn-default text-uppercase"><img src="<?php echo get_template_directory_uri(); ?>/images/apply_job/confirm-btn-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" alt=""></button>
	                     </div>
	                     <div class="confirm-btn">
	                        <button type="button" data-toggle="modal" data-dismiss="modal" class="btn btn-default text-uppercase"><img src="<?php echo get_template_directory_uri(); ?>/images/apply_job/confirm-return-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png" alt=""></button>
	                     </div>
	                  </div>
	               </div>
	            </div>
	         </div>
	      </div>
		</div>
	</div>

	<div id="mySuccess" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title"><?php echo __("[:ja]この度はご応募頂き、誠にありがとうございます[:en]Thank you very much for your entry this time[:vi]Nộp đơn ứng tuyển thành công"); ?></h4>
				</div>
				<div class="modal-body">
					<p><?php echo __("[:ja]改めて担当者よりご連絡をさせていただきます<br>
					   3日以上経っても連絡がない場合は、お手数ですが、以下のメールアドレスまでお問い合わせください。<br>
					   agent@evolable.asia[:en]We will contact you again from the person in charge.<br>
						If you do not hear from us after 3 days or more, please contact us at the following e-mail address.<br>
						agent@evolable.asia[:vi]Cảm ơn bạn đã nộp đơn ứng tuyển. <br>
						Chúng tôi sẽ liên hệ đến bạn trong thời gian sớm nhất. <br>
						Trường hợp sau 3 ngày không nhận được sự liên hệ vui lòng liên hệ với chúng tôi theo e-mail agent@evolable.asia"); ?>
					</p>
				</div>
				<div class="modal-footer">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-default"><img src="<?php echo get_template_directory_uri(); ?>/images/apply_job/close-popup-<?php echo __('[:ja]ja[:en]en[:vi]vi'); ?>.png"></a>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
?>
<script type="text/javascript">
(function($){
	$('#file_cv,#file_other').on('change', function(){
		//alert(this.files[0].size);
		var ext = $(this).val().split('.').pop().toLowerCase();
		if ($.inArray(ext, ['doc','docx','pdf','zip','rar','xls','xlsx']) == -1){
			$(this).closest('div').find('.cv-description').addClass('error');
		}else{
			$(this).closest('div').find('.cv-description').removeClass('error');
		}
	});
})(jQuery);
</script>