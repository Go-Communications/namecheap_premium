jQuery(document).ready((function(e){function i(){return"undefined"!=typeof tinymce&&null!=tinymce.get("job_description")}e(document.body).on("click",".job-manager-remove-uploaded-file",(function(){var i=e(this).closest(".fieldset-type-file").find("input[type=file][multiple][data-file_limit]");return e(this).closest(".job-manager-uploaded-file").remove(),i.trigger("update_status"),!1})),e(document.body).on("update_status",".fieldset-type-file input[type=file][multiple][data-file_limit]",(function(){var i=parseInt(e(this).data("file_limit"),10)-parseInt(e(this).siblings(".job-manager-uploaded-files").first().children(".job-manager-uploaded-file").length,10);i>0?e(this).prop("disabled",!1):e(this).prop("disabled",!0),e(this).data("file_limit_left",i)})),e(document.body).on("change",".fieldset-type-file input[type=file][multiple][data-file_limit]",(function(){var i=parseInt(e(this).data("file_limit"),10),t=i-parseInt(e(this).siblings(".job-manager-uploaded-files").first().children(".job-manager-uploaded-file").length,10),s=e(this).get(0);if(void 0!==s.files){var n=parseInt(s.files.length,10);if(i&&n>t){var a=job_manager_job_submission.i18n_over_upload_limit;e(this).data("file_limit_message")&&"string"==typeof e(this).data("file_limit_message")&&(a=e(this).data("file_limit_message")),a=a.replace("%d",i),s.setCustomValidity(a)}else s.setCustomValidity("");s.reportValidity()}return!0})),e(".fieldset-type-file input[type=file][multiple][data-file_limit]").trigger("update_status"),e(document.body).on("click","#submit-job-form .button.save_draft",(function(){var i=e(this).closest("#submit-job-form"),t=!0;return i.addClass("disable-validation"),setTimeout((function(){i.removeClass("disable-validation")}),1e3),i.find("div.draft-required input[required]").each((function(){if(e(this).get(0).reportValidity(),e(this).is(":invalid"))return t=!1,!1})),t})),e(document.body).on("submit",".job-manager-form",(function(t){e(this).hasClass("disable-validation")||!function(){if((s=e("#job_category")).length&&(!s.val()||!s.val().length)&&s.parent().hasClass("required-field")&&s.next().hasClass("select2")){e(this).find("input[type=submit]").blur();var t=e(".fieldset-job_category .select2-search__field");return t&&t.length&&(t[0].setCustomValidity(job_manager_job_submission.i18n_required_field),t[0].reportValidity()),!0}var s;if(function(){if(!i())return!1;var t=tinymce.get("job_description").getContent(),s=e("#job_description");return 0===t.length&&s.parents(".required-field").length&&s.parents(".required-field").is(":visible")}()){e(this).find("input[type=submit]").blur();var n=e("#job_description");return n.css({height:1,resize:"none",padding:0}),n.show(),n[0].setCustomValidity(job_manager_job_submission.i18n_required_field),n[0].reportValidity(),!0}return!1}()?e(this).hasClass("prevent-spinner-behavior")||(e(this).find(".spinner").addClass("is-active"),e(this).find("input[type=submit]").addClass("disabled").on("click",(function(){return!1}))):t.preventDefault()})),e("#job_category").on("select2:select",(function(){var i=e(".fieldset-job_category .select2-search__field");i&&i.length&&(i[0].setCustomValidity(""),i[0].reportValidity())})),setTimeout((function(){i()&&tinymce.get("job_description").on("Change",(function(){var i=e("#job_description");i.hide(),i[0].setCustomValidity(""),i[0].reportValidity()}))}),1e3)}));