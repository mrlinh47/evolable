<form action="<?php echo site_url( '/'.qtranxf_getLanguage().'/jobs/'); ?>" method="get">
	<div class="box-sl">
		<?php
        	$plocations = get_locations();
        ?>
		<select class="sl-1" name="location">
			<option value=""><?php echo __('[:ja]勤務地[:en]Job Location[:vi]Nơi làm việc'); ?></option>
			<?php
                foreach ($plocations as $key => $arlocation) {

                	if($arlocation[0]->parent == 0){
                		?>
							<optgroup label="<?php echo $arlocation[0]->name ?>">
								<option value="<?php echo $arlocation[0]->term_id ?>" <?php echo (isset($_GET['location']) && $_GET['location'] == $arlocation[0]->term_id) ? 'selected' : '' ?>><?php echo $arlocation[0]->name ?></option>
								<?php
									unset($plocations[$key]);
									foreach ($plocations as $key1 => $arlocation1) {
										if($arlocation1[0]->parent == $arlocation[0]->term_id){
										?>
											<option value="<?php echo $arlocation1[0]->term_id ?>" <?php echo (isset($_GET['location']) && $_GET['location'] == $arlocation1[0]->term_id) ? 'selected' : '' ?>><?php echo $arlocation1[0]->name ?></option>
										<?php
											unset($plocations[$key1]);
										}
									}
								?>
							</optgroup>
                		<?php
                	}


				 }
			 ?>
		</select>
	</div>
	<div class="box-sl">
		<?php

            // $positions = get_terms('job-position');
			$lpocations = get_positions();
        ?>

		<select class="sl-1" name="position">
			<option value=""><?php echo __('[:ja]職種[:en]Job categories[:vi]Ngành nghề'); ?></option>

            <?php
            	foreach ($lpocations as $key => $arposition) {
                	if($arposition[0]->parent == 0){
                		?>
							<optgroup label="<?php echo $arposition[0]->name ?>">
								<option value="<?php echo $arposition[0]->term_id ?>" <?php echo (isset($_GET['position']) && $_GET['position'] == $arposition[0]->term_id) ? 'selected' : '' ?>><?php echo $arposition[0]->name ?></option>
								<?php
									unset($lpocations[$key]);
									foreach ($lpocations as $key1 => $arposition1) {
										if($arposition1[0]->parent == $arposition[0]->term_id){
										?>
											<option value="<?php echo $arposition1[0]->term_id ?>" <?php echo (isset($_GET['position']) && $_GET['position'] == $arposition1[0]->term_id) ? 'selected' : '' ?>><?php echo $arposition1[0]->name ?></option>
										<?php
											unset($lpocations[$key1]);
										}
									}
								?>
							</optgroup>
                		<?php
                	}
				 }
            ?>
		</select>
	</div>
	<div class="box-sl">
		<select class="sl-1"  name="salary">
			<option value=""><?php echo __('[:ja]年収下限[:en]Salary[:vi]Mức lương'); ?></option>
			<?php $salaries = array(100,150,200,250,300,350,400,450,500,550,600,650,700,750,800,850,900,950,1000);
	            foreach($salaries as $sal){ ?>
	            <option value="<?php echo $sal ?>" <?php echo (isset($_GET['salary']) && $_GET['salary'] == $sal) ? 'selected' : '' ?>><?php echo $sal ?>万円</option>
            <?php }?>
		</select>
	</div>
	<div class="box-search">
		<input type="text" class="search-adv" id="keyword" name="keyword" value="<?php if (isset($_GET['keyword'])) echo $_GET['keyword']; ?>" placeholder="<?php echo __('[:ja]フリーワードで検索[:en]Enter search keywords[:vi]Nhập từ khóa tìm kiếm'); ?>">
	</div>
	<div class="submit">
		<input type="submit" value="<?php echo __('[:ja]検索[:en]Search[:vi]Tìm kiếm'); ?>" class="sub-adv">
	</div>
	<!-- <a class="btn btn-orange w100p js-submit" href="#"><i class="fa fa-search" aria-hidden="true"></i>検索</a> -->
</form>
