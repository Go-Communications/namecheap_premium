jQuery(document).ready((function(t){var e,n,a;t(".tips, .help_tip").each((function(){var e=t(this).attr("data-tip");e&&t(this).tipTip({content:"",fadeIn:50,fadeOut:50,delay:200,enter:function(){t(tiptip_content).text(e)}})})),t("p.form-field-author").on("click","a.change-author",(function(){t(this).closest("p").find(".current-author").hide();var e=t(this).closest("p").find(".change-author");return e.show(),e.find(":input.wpjm-user-search").trigger("init.user_search"),!1})),t("#wpbody").on("init.user_search",":input.wpjm-user-search",(function(){var e={allowClear:!!t(this).data("allow_clear"),placeholder:t(this).data("placeholder"),minimumInputLength:t(this).data("minimum_input_length")?t(this).data("minimum_input_length"):"1",errorLoading:job_manager_admin_params.user_selection_strings.searching,inputTooShort:function(t){var e=t.minimum-t.input.length;return 1===e?job_manager_admin_params.user_selection_strings.input_too_short_1:job_manager_admin_params.user_selection_strings.input_too_short_n.replace("%qty%",e)},loadingMore:function(){return job_manager_admin_params.user_selection_strings.load_more},noResults:function(){return job_manager_admin_params.user_selection_strings.no_matches},searching:function(){return job_manager_admin_params.user_selection_strings.searching},templateResult:function(t){return t.text},templateSelection:function(t){return t.text},width:"100%",ajax:{url:job_manager_admin_params.ajax_url,dataType:"json",delay:1e3,data:function(t){return{term:t.term,action:"job_manager_search_users",security:job_manager_admin_params.search_users_nonce,page:t.page}},processResults:function(e){var n=[];return e&&e.results&&t.each(e.results,(function(t,e){n.push({id:t,text:e})})),{results:n,pagination:{more:e.more}}},cache:!0}};t(this).select2(e)})),t(":input.wpjm-user-search:visible").trigger("init.user_search"),t(document.body).on("click",".wp_job_manager_add_another_file_button",(function(e){e.preventDefault();var n=t(this).data("field_name"),a=t(this).data("field_placeholder"),i=t(this).data("uploader_button_text"),r=t(this).data("uploader_button"),o=t(this).data("view_button");t(this).before('<span class="file_url"><input type="text" name="'+n+'[]" placeholder="'+a+'" /><button class="button button-small wp_job_manager_upload_file_button" data-uploader_button_text="'+i+'">'+r+'</button><button class="button button-small wp_job_manager_view_file_button">'+o+"</button></span>")})),t(document.body).on("click",".wp_job_manager_view_file_button",(function(e){if(e.preventDefault(),!(i=t(this).data("download-url"))){a=t(this).closest(".file_url");var i=(n=a.find("input")).val()}i.indexOf("://")>-1?window.open(i,"_blank"):(n.addClass("file_no_url"),setTimeout((function(){n.removeClass("file_no_url")}),1e3))})),t(document.body).on("click",".wp_job_manager_upload_file_button",(function(i){i.preventDefault(),a=t(this).closest(".file_url"),n=a.find("input"),e||(e=wp.media.frames.file_frame=wp.media({title:t(this).data("uploader_title"),button:{text:t(this).data("uploader_button_text")},multiple:!1})).on("select",(function(){var a=e.state().get("selection").first().toJSON();t(n).val(a.url)})),e.open()}))})),jQuery(document).ready((function(t){var e="job_listing_type";t("#"+e+"checklist li :radio, #"+e+"checklist-pop :radio").on("click",(function(){var n=t(this),a=n.is(":checked"),i=n.val();t("#"+e+"checklist li :radio, #"+e+"checklist-pop :radio").prop("checked",!1),t("#in-"+e+"-"+i+", #in-popular-"+e+"-"+i).prop("checked",a)}))}));