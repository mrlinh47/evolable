(function($) {

	$("#search-work > .row .workingPlaces-list li > a").bind("click", function(e){
		e.preventDefault();
		var _id = $(this).attr("data-item");
		var text = $(this).text();
		jQuery.ajax({
			url: search_job.ajax_url,
			type: 'POST',
			data:{action: "eaa_search_job", id:_id},
			dataType: 'json',
			success: function(response){
				if(response.hasOwnProperty("has")){
					if(response.has == true){
						if(response.hasOwnProperty("data")){
							data = response.data;
							console.log(data);
							// $("#myModal h4.modal-title > span.word").html(data.term_parent.name);							
							$("#myModal h4.modal-title > span.word").html(text);
							$("#myModal .modal-body").html("");

							$.each(data.term_children, function(index, value){
								$("#myModal .modal-body").append(
										'<p>'+
											'<input type="checkbox" name="location[]" id="local-'+ index +'" value="'+ value.term_id +'">' +
											'<label for="local-'+ index +'">'+ value.name +'</label>' +
											'<span>'+ value.count +'</span>' +
										'</p>'
									);
							});
							
						}
					}
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				console.log(jqXHR, textStatus, errorThrown);
			}
		});
	});


	var locations = {};
	var positions = {};
	var skills = {};
	var salaries = {};

	$("#search-work .search-byTags .tags-list li a").bind("click", function(e){
		e.preventDefault();
		var _type_search = $(this).attr("data-item");
		var text = $(this).text();
		jQuery.ajax({
			url: search_job.ajax_url,
			type: 'POST',
			data:{action: "eaa_search_mutil", type_search:_type_search},
			dataType: 'json',
			// async: false,
			success: function(response){
				if(response.hasOwnProperty("has")){
					if(response.has == true){
						if(response.hasOwnProperty("data")){
							data = response.data;
							console.log(data);
							$("#SearchModal h4.modal-title > span.word1").html(text);
							// $("#SearchModal .step1 > h4 > span.word1").html(text);
							// $("#SearchModal .step2 > h4 > span.word1").html(text);
							// $("#SearchModal .modal-body").html("");
							$("#SearchModal .list-cate-popup").html("");
							$.each(data.term_parent, function(index, value){
								$("#SearchModal .list-cate-popup").append(
										'<a class="data-term" href="#" data-item="'+ value.term_id +'">'+ value.name +'</a>'
									);
							});

							$("#SearchModal .wr-checkbox").empty();
							$("#SearchModal .box-result").html("");

							if(_type_search == "job-location"){
								_type_search ="location";
							}

							if(_type_search == "job-position"){
								_type_search ="position";
							}

							if(_type_search == "job-skill"){
								_type_search ="skill";
							}

							if(_type_search == "job-salary"){
								_type_search ="salary";
							}

							if(_type_search == "salary"){
								$("#SearchModal .data-term").unbind("click").bind("click", function(e){
									$("#SearchModal .wr-checkbox").empty();
									e.preventDefault();
									var id_parent = $(this).attr("data-item");
									var name_parent = $(this).html();
									$("#SearchModal .wr-checkbox").append('<div class="cate-checkbox"><label>'+ name_parent +'</label></div>');


									$.each(data.term_child, function(index, values){
										if(index == id_parent){
											var count = 1;
											$.each(values, function(index1, values1){
												if(values1.hasOwnProperty('lv1')){
													if(count == 1){
														$("#SearchModal .wr-checkbox").append(
															'<div class="box-list-checkbox-1 data-count-'+ count +'">' +
																'<div class="list-checkbox">' +
																	'<div class="check-box-lv1"><input type="radio" name="'+ _type_search +'[]" id="data-input-'+ values1.lv1.term_id +'" value="'+ values1.lv1.value +'"> <label for="data-input-'+ values1.lv1.term_id +'">'+ values1.lv1.name +'</label></div>' +
																'</div>' +
															'</div>'
														);
													}else{
														$("#SearchModal .wr-checkbox").append(
															'<div class="box-list-checkbox-1 data-count-'+ count +'">' +
																'<div class="list-checkbox clearfix">' +
																	'<div class="check-box-lv1"><input type="radio" name="'+ _type_search +'[]" id="data-input-'+ values1.lv1.term_id +'" value="'+ values1.lv1.value  +'"> <label for="data-input-'+ values1.lv1.term_id +'">'+ values1.lv1.name +'</label></div>' +
																'</div>' +
															'</div>'
														);
													}
													
													if(values1.hasOwnProperty('lv2')){
														$.each(values1.lv2, function(index2, values2){
															$("#SearchModal .wr-checkbox .data-count-"+ count +" .list-checkbox").append(
																'<div class="check-box-lv2"><input type="radio" name="'+ _type_search +'[]" id="data-input-'+ values2.term_id +'" value="'+ values2.value +'"> <label for="data-input-'+ values2.term_id +'">'+ values2.name +'</label></div>'
															);
														});
													}
													
												}

												count++;
											});
										}
										
									});

									for (var key in salaries) {
										$("#SearchModal .wr-checkbox input#data-input-"+ salaries[key][0]).prop("checked", true);
									}
									$("#SearchModal .wr-checkbox input[type='radio']").bind("click", function(){
										$("#SearchModal .box-result").html("");
										var strNameTerm = "";
										if($(this).prop("checked") === false){
											if(typeof salaries["salary-"+$(this).val()] !== "undefined"){
												delete salaries["salary-"+$(this).val()];
											}
										}
										$("#SearchModal .wr-checkbox input[type='radio']").each(function(index){
											if($(this).prop("checked") === true){
												salaries = {};
												salaries["salary-"+$(this).val()] = [$(this).val(), $(this).next().html()];
											}
										});

										

										$("#form-search-custom input[type='hidden']").remove();

										console.log(salaries);
										for (var key in salaries) {

											strNameTerm += "<span class='tag'>" + salaries[key][1] + "</span> ";
											$("#form-search-custom").prepend(
													'<input type="hidden" name="salary" value="'+ salaries[key][0] +'">'
												);
										}

										
										$("#SearchModal .box-result").html(strNameTerm);
										
									});
								});
							}else{
								$("#SearchModal .data-term").unbind("click").bind("click", function(e){
									$("#SearchModal .wr-checkbox").empty();
									e.preventDefault();
									var id_parent = $(this).attr("data-item");
									var name_parent = $(this).html();
									$("#SearchModal .wr-checkbox").append('<div class="cate-checkbox"><input type="checkbox" class="checkall" name="'+ _type_search +'[]" value="'+ id_parent +'"> <label>'+ name_parent +'</label></div>');


									$.each(data.term_child, function(index, values){
										if(index == id_parent){
											var count = 1;
											$.each(values, function(index1, values1){
												if(values1.hasOwnProperty('lv1')){
													if(count == 1){
														$("#SearchModal .wr-checkbox").append(
															'<div class="box-list-checkbox-1 data-count-'+ count +'">' +
																'<div class="list-checkbox">' +
																	'<div class="check-box-lv1"><input type="checkbox" name="'+ _type_search +'[]" id="data-input-'+ values1.lv1.term_id +'" value="'+ values1.lv1.term_id +'"> <label for="data-input-'+ values1.lv1.term_id +'">'+ values1.lv1.name +'</label></div>' +
																'</div>' +
															'</div>'
														);
													}else{
														$("#SearchModal .wr-checkbox").append(
															'<div class="box-list-checkbox-1 data-count-'+ count +'">' +
																'<div class="list-checkbox clearfix">' +
																	'<div class="check-box-lv1"><input type="checkbox" name="'+ _type_search +'[]" id="data-input-'+ values1.lv1.term_id +'" value="'+ values1.lv1.term_id  +'"> <label for="data-input-'+ values1.lv1.term_id +'">'+ values1.lv1.name +'</label></div>' +
																'</div>' +
															'</div>'
														);
													}
													
													if(values1.hasOwnProperty('lv2')){
														$.each(values1.lv2, function(index2, values2){
															$("#SearchModal .wr-checkbox .data-count-"+ count +" .list-checkbox").append(
																'<div class="check-box-lv2"><input type="checkbox" name="'+ _type_search +'[]" id="data-input-'+ values2.term_id +'" value="'+ values2.term_id +'"> <label for="data-input-'+ values2.term_id +'">'+ values2.name +'</label></div>'
															);
														});
													}
													
												}

												count++;
											});
										}
										
									});

									if(_type_search == "location"){
										for (var key in locations) {
											$("#SearchModal .wr-checkbox input#data-input-"+ locations[key][0]).prop("checked", true);
										}
									}

									if(_type_search == "position"){
										
										for (var key in positions) {
											$("#SearchModal .wr-checkbox input#data-input-"+ positions[key][0]).prop("checked", true);
										}
									}

									if(_type_search == "skill"){
										
										for (var key in skills) {
											$("#SearchModal .wr-checkbox input#data-input-"+ skills[key][0]).prop("checked", true);
										}
									}

									if(_type_search == "salary"){
										
										for (var key in skills) {
											$("#SearchModal .wr-checkbox input#data-input-"+ skills[key][0]).prop("checked", true);
										}
									}

									$("#SearchModal .wr-checkbox .checkall").unbind("click").bind("click", function(e){
										var flags = false;
										$("#SearchModal .wr-checkbox input[type='checkbox']").not($(this)).each(function(index){
											if($(this).prop("checked") == true){
												flags = true;
											}
										});
										if($(this).prop("checked") == true){
											$("#SearchModal .wr-checkbox input[type='checkbox']").not($(this)).prop("checked", true);
										}else{
											$("#SearchModal .wr-checkbox input[type='checkbox']").not($(this)).prop("checked", false);
										}
									});

									$("#SearchModal .wr-checkbox .list-checkbox > div.check-box-lv1 input[type='checkbox']").unbind("click").bind("click", function(e){
										
										
										if($(this).prop("checked") == true){
											$(this).closest(".list-checkbox").find("input[type='checkbox']").not($(this)).prop("checked", true);
										}else{
											$(this).closest(".list-checkbox").find("input[type='checkbox']").not($(this)).prop("checked", false);
										}

										var flags = true;
										$("#SearchModal .wr-checkbox input[type='checkbox']").not(".checkall").each(function(index){
											if($(this).prop("checked") == false){
												flags = false;
											}
										});
										if(flags == false){
											$("#SearchModal .wr-checkbox .checkall").prop("checked", false);
										}else{
											$("#SearchModal .wr-checkbox .checkall").prop("checked", true);
										}					
									});

									$("#SearchModal .wr-checkbox .list-checkbox > div.check-box-lv2 input[type='checkbox']").unbind("click").bind("click", function(e){
										var flags = true;
										$(this).closest(".list-checkbox").find("div.check-box-lv2 input[type='checkbox']").each(function(){
											if($(this).prop("checked") == false){
												flags = false;
											}
										});

										if(flags == true){
											$(this).closest(".list-checkbox").find("div.check-box-lv1 input[type='checkbox']").prop("checked", true);
										}else{
											$(this).closest(".list-checkbox").find("div.check-box-lv1 input[type='checkbox']").prop("checked", false);
										}


										flags = true;
										$("#SearchModal .wr-checkbox input[type='checkbox']").not(".checkall").each(function(index){
											if($(this).prop("checked") == false){
												flags = false;
											}
										});

										if(flags == false){
											$("#SearchModal .wr-checkbox .checkall").prop("checked", false);
										}else{
											$("#SearchModal .wr-checkbox .checkall").prop("checked", true);
										}
									});

									
									$("#SearchModal .wr-checkbox input[type='checkbox']").bind("click", function(){
										$("#SearchModal .box-result").html("");
										var strNameTerm = "";
										if($(this).prop("checked") === false){
											if(_type_search == "location"){
												if(typeof locations["data-"+$(this).val()] != "undefined"){
													delete locations["data-"+$(this).val()];
												}
											}

											if(_type_search == "position"){
												if(typeof positions["data-"+$(this).val()] !== "undefined"){
													delete positions["data-"+$(this).val()];
												}
											}

											if(_type_search == "skill"){
												if(typeof skills["data-"+$(this).val()] !== "undefined"){
													delete skills["data-"+$(this).val()];
												}
											}
										}
										$("#SearchModal .wr-checkbox input[type='checkbox']").each(function(index){

											if($(this).prop("checked") === true){

												if(_type_search == "location"){
													locations["data-"+$(this).val()] = [$(this).val(), $(this).next().html()];
												}

												if(_type_search == "position"){
													positions["data-"+$(this).val()] = [$(this).val(), $(this).next().html()];
												}

												if(_type_search == "skill"){
													skills["data-"+$(this).val()] = [$(this).val(), $(this).next().html()];
												}
												
											}
										});

										

										$("#form-search-custom input[type='hidden']").remove();

										if(_type_search == "location"){
											console.log(locations);
											for (var key in locations) {

												strNameTerm += "<span class='tag'>" + locations[key][1] + "</span> ";
												$("#form-search-custom").prepend(
														'<input type="hidden" name="location[]" value="'+ locations[key][0] +'">'
													);
											}
										}

										if(_type_search == "position"){
											
											for (var key in positions) {
												strNameTerm += "<span class='tag'>" + positions[key][1] + "</span> ";
												$("#form-search-custom").prepend(
														'<input type="hidden" name="position[]" value="'+ positions[key][0] +'">'
													);
											}
										}

										if(_type_search == "skill"){
											
											for (var key in skills) {
												strNameTerm += "<span class='tag'>" + skills[key][1] + "</span> ";
												$("#form-search-custom").prepend(
														'<input type="hidden" name="skill[]" value="'+ skills[key][0] +'">'
													);
											}
										}

										
										$("#SearchModal .box-result").html(strNameTerm);
										
									});
								});
							}

							
							
						}
					}
				}
			},
			error: function(jqXHR, textStatus, errorThrown){
				console.log(jqXHR, textStatus, errorThrown);
			}
		});
	});
	
})(jQuery);
