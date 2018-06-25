<?php


function wp_jobs_upload_dir($dirs) {
    $y = date('Y');
    $m = date('m');

    $dirs['subdir'] = "/cv/{$y}/{$m}";
    $dirs['path'] = $dirs['basedir'] . "/cv/{$y}/{$m}";
    $dirs['url'] = $dirs['baseurl'] . "/cv/{$y}/{$m}";

    return $dirs;
}

function job_apply() {
	global $wpdb;
	$output = array();
	$lang = qtranxf_getLanguage();
	if( !wp_verify_nonce( trim( $_POST['_wpnonce'] ), 'job_apply_wpnonce' ) ) {
		$output['security'] = 'Security check not passed!';
	} else {
		$validate = true;
		add_filter( 'upload_dir', 'wp_jobs_upload_dir' );
		$upload_dir = wp_upload_dir();
		$base_dir = $upload_dir['path']; //print_r($upload_dir); die();
		$cname = $_POST['name'];
		$phoneNumber = $_POST['phone_number'];
		$email = $_POST['email'];
		$expectedSalary = $_POST['expected_salary'];
		$request = $_POST['request'];
		$jobTitle = $_POST['job_title'];
		$imageFileType = pathinfo($file1,PATHINFO_EXTENSION);
		$randomDigit=rand(0000,9999);
		if( $_POST['name'] == '' ) {
			$validate = false;
			$output['errors']['name'] = 'error';
		}
		if( $_POST['phone_number'] == '' ) {
			$validate = false;
			$output['errors']['phone_number'] = 'error';
		}
		if( !is_email( $_POST['email'] ) ) {
			$validate = false;
			$output['errors']['email'] = 'error';
		}
		if( $_FILES["file_cv"]['name'] != '' ) {
			$file1 = $randomDigit.'_file_cv_'.$_FILES["file_cv"]['name'];
			$path1 = $base_dir.'/'.$file1;
			$file_exts = array('pdf','doc','docx','xls','xlsx','zip','rar');
			$imageFileType = pathinfo($file1,PATHINFO_EXTENSION);
			if(!in_array($imageFileType, $file_exts)){
				$validate = false;
				$output['errors']['des_file_cv'] = 'error';
			}
		} else {
			$file1 = '';
			$path1 = '';
		}
		if( $_FILES["file_other"]['name'] != '' ) {
			$file2 = $randomDigit.'_file_other_'.$_FILES["file_other"]['name'];
			$path2 = $base_dir.'/'.$file2;
			$imageFileType2 = pathinfo($file2,PATHINFO_EXTENSION);
			if(!in_array($imageFileType2, $file_exts)){
				$validate = false;
				$output['errors']['des_file_other'] = 'error';
			}
		} else {
			$file2 = '';
			$path2 = '';
		}

		if( $validate == true ) {
			$output['success'] = true;
			if( $_POST['save_data'] == true ) {

				$cv_file = '';
				$other_file = '';
				if( move_uploaded_file( $_FILES["file_cv"]["tmp_name"], $path1 ) ) {
					$cv_file = $upload_dir['url'].'/'.$file1;
					//$imageFileType = pathinfo($cv_file,PATHINFO_EXTENSION);
				}
				if( move_uploaded_file( $_FILES["file_other"]["tmp_name"], $path2 ) ) {
					$other_file = $upload_dir['url'].'/'.$file2;
				}
				unset( $output['success'] );
				$to = ''.$_POST['email'].'';
				/*$headers = array( 
					'Content-type: text/html; charset=utf-8',
				    'CC: singo@moja-vn.com',
				    'CC: manhlinhbmt93@gmail.com'
				);*/
			    $headers = 'Content-type: text/html; charset=utf-8';
				if(function_exists('qtranxf_getLanguage')){
			        if (qtranxf_getLanguage() == "ja"){
						$sub = '【エボラブルアジアエージェント】求人のお申し込みありがとうございました。';
						$subAdmin = 'ホームページから求人のお申し込みがありました。';
						$message = ''.$cname.'様<br><br><br>
						この度は、求人にご応募いただき、誠にありがとうございます。<br>ご応募いただいた内容は次の通りです。
						<br><br><br>
						===【お問い合わせ内容】===<br><br>
						お名前: <strong>'.$cname.'</strong><br>
						電話番号: <strong>'.$phoneNumber.'</strong><br>
						メールアドレス: <strong>'.$email.'</strong><br>
						希望年収 [万円]: <strong>'.$expectedSalary.'</strong><br>
						その他ご要望: <strong>'.$request.'</strong><br><br><br>
						[お申し込みされた求人情報]<br><br>
						求人ID: <strong>'.$_POST['job_id'].'</strong><br>
						求人No: <strong>'.$_POST['job_no'].'</strong> <strong>'.$jobTitle.'</strong><br><br>
						ベトナム新規事業ビジネス責任者<br>セールス,グローバル職,運営,現場管理 日本　関東地方,東京 一般的なビジネススキル,コミュニケーション能力,日本語,チームワーク,海外勤務,マネジメント経験,ベトナム語<br><br>
						===========================================
						<br><br>
						ご応募いただきました求人につきましては、書類を確認の上、後ほどご回答いたします。<br>なお、求人内容によっては、ご回答まで数日かかる場合がございます。<br>恐れ入りますが、予めご了承くださいますようお願いいたします。<br>
						※このメールには返信できません。<br><br>
						＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
						<br><br>
						株式会社エボラブルアジアエージェント<br>住所：〒103-0025 東京都中央区日本橋茅場町3-5-3 日宝茅場町ビル7F2号<br>TEL : 03-6316-4865<br>HP : http://agent.evolable.asia/<br>';

			        } elseif (qtranxf_getLanguage() == "en"){
			            $sub = '[evolable asia agent] Cám ơn Anh/Chị đã apply vào vị trí tuyển dụng này';
			            $subAdmin = '[evolable asia agent] There was a job offer from the homepage';
						$message = 'Mr/Mrs: '.$cname.'<br><br><br>
						We appreciate you taking the time to apply for this position.<br>Here is your applications content.
						<br><br><br>
						===【Contact Content】===<br><br>
						Name: <strong>'.$cname.'</strong><br>
						Phone: <strong>'.$phoneNumber.'</strong><br>
						Mail Address: <strong>'.$email.'</strong><br>
						Desired salary: <strong>'.$expectedSalary.'</strong><br>
						Other wishes: <strong>'.$request.'</strong><br><br><br>
						[Recruitment information has been applied]<br><br>
						ID: <strong>'.$_POST['job_id'].'</strong><br>
						No: <strong>'.$_POST['job_no'].'</strong> <strong>'.$jobTitle.'</strong><br><br><br>
						Tokyo<br>Japananese (Business level)<br><br>
						===========================================
						<br><br>
						Regarding the job you want to apply,  we will contact you after we consider it.<br>Besides, the process may take several days depends on job description.<br>We would appreciate your kind understanding.<br><br>
						※Don'."'".'t reply this email<br><br>
						＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
						<br><br>
						Evolable Asia Agent<br>Address：7F-2 Nippo Kayabacho Building, 3-5-3 Nihombashi Kayabacho, Chuo-ku, Tokyo, Japan<br>zip: 103-0025<br>TEL : 03-6316-4865<br>HP : http://agent.evolable.asia/vn/<br>';
			        } else {
						$sub = '[evolable asia agent] Cám ơn Anh/Chị đã apply vào vị trí tuyển dụng này';
						$subAdmin = '[evolable asia agent] Có một đề nghị tuyển dụng từ trang chủ';
						$message = 'Mr/Mrs: '.$cname.'<br><br><br>
						Thành thật cám ơn Anh/Chị vì đã apply vào vị trí tuyển dụng này.<br>Dưới đây là nội dung mà Anh/Chị đã apply.
						<br><br><br>
						===【Nội dung mail】===<br><br>
						Họ và tên: <strong>'.$cname.'</strong><br>
						Số điện thoại: <strong>'.$phoneNumber.'</strong><br>
						Email: <strong>'.$email.'</strong><br>
						Mức lương mong muốn: <strong>'.$expectedSalary.'</strong><br>
						Các mong muốn khác: <strong>'.$request.'</strong><br><br><br>
						[Thông tin tuyển dụng đã apply]<br><br>
						ID tuyển dụng: <strong>'.$_POST['job_id'].'</strong><br>
						No tuyển dụng: <strong>'.$_POST['job_no'].'</strong> <strong>'.$jobTitle.'</strong><br><br><br>

						Tokyo<br>Japananese (Business level)<br><br>

						===========================================
						<br><br>
						Về job mà Anh/Chị đã đăng ký ứng tuyển thì chúng tôi xin được trả lời sau khi xem xét hồ sơ.<br>Ngoài ra, cũng tùy vào nội dung tuyển dụng mà có trường hợp mất vài ngày mới trả lời được.<br>Mong Anh/Chị thông cảm<br><br>
						※Không thể reply lại mail này<br><br>
						＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿＿
						<br><br>
						Công ty cổ phần Evolable Asia Agent<br>Địa chỉ：7F-2 Nippo Kayabacho Building, 3-5-3 Nihombashi Kayabacho, Chuo-ku, Tokyo, Japan<br>zip: 105-0012<br>TEL : 03-6316-4865 <br>HP : http://agent.evolable.asia/vi/<br>';
			        }
			    }
			    $arrFile = array($cv_file,$other_file);
			    foreach ($arrFile as $key => $value) {
		    		$attach_file = $value;
	                $path = str_replace(get_site_url(), '', $attach_file);
	                $attach_file_path = WP_CONTENT_DIR . str_replace('/wp-content', '', $path);
	                $attachments[] = $attach_file_path;
			    }
			    
			    wp_mail($to, $sub, stripslashes($message), $headers,$attachments );
			    wp_mail('kongnc1992@gmail.com,singo@moja-vn.com,manhlinhbmt93@gmail.com', $subAdmin, stripslashes($message), $headers, $attachments);//agent@evolable.asia
			    $arrData = array(
					'apply_date' => date( 'Y-m-d H:i:s' ),
					'name' => $cname,
					'phone_number' => $phoneNumber!=''?$phoneNumber:'',
					'email' => $email!=''?$email:'',
					'expected_salary' => $expectedSalary!=''?$expectedSalary:'0',
					'job_id' => $_POST['job_id']!=''?$_POST['job_id']:'',
					'job_no' => $_POST['job_no']!=''?$_POST['job_no']:'',
					'job_title' => $jobTitle!=''?$jobTitle:'',
					'cv_file' => $cv_file!=''?$cv_file:'',
					'other_file' => $other_file!=''?$other_file:'',
					'request' => $request!=''?$request:'',
					'language' => $lang
				);
				$wpdb->insert( $wpdb->prefix.'job_candidates',$arrData);
				$output['save'] = true;
			}
		}
	}

	echo json_encode($output);
	wp_die();
}
add_action( 'wp_ajax_job_apply', 'job_apply' );
add_action( 'wp_ajax_nopriv_job_apply', 'job_apply' );
