jQuery(document).ready(function ($){
    
    $('.radio-post-template-wrapper').hover(function(){
        if($(this).attr('available')=='pro'){
        	$('.pro-tmp-msg').show();
        }else{
        	$('.pro-tmp-msg').hide();
        }
    },function(){
    	$('.pro-tmp-msg').hide();
    });

    var upgrade_notice = '<div class="notice-up">';
    upgrade_notice += '<a class="upgrade-pro-demo" target="_blank" href="http://8degreethemes.com/demos/?theme=maggie-pro">View Maggie PRO</a></div>';
    jQuery('#customize-info').append(upgrade_notice);

    $('#accordion-section-homepage_block_option_section_four').append(
        '<div class="user_sticky_note">'+
        '<h3 class="sticky_title">Note:</h3>'+
        '<span class="sticky_info_row">If you have been using this theme in previously setup site.Please Regenerate Thumbnails, so that everythings fits in design.</span>'+
        '</div>'
        );

    /** Ajax Plugin Installation **/
	$(".install").on('click', function (e) {
		e.preventDefault();
		var el = $(this);

		is_loading = true;
    	el.addClass('installing');
    	var plugin = $(el).attr('data-slug');
    	var plugin_file = $(el).attr('data-file');
    	var ajaxurl = maggieWelcomeObject.ajaxurl;
    	var plhref = $(el).attr('href');
    	var newPlhref = plhref.split('&');
    	var plNonce = newPlhref[newPlhref.length-1];
    	var newPlhref = plNonce.split('=');
    	var plNonce = newPlhref[newPlhref.length-1];
    	if(plNonce==''){
    		var plNonce = maggieWelcomeObject.admin_nonce;
    	}

		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'maggie_lite_plugin_installer',
				plugin: plugin,
				plugin_file: plugin_file,
				nonce: plNonce,
			},
			success: function(response) {

		   		if(response == 'success'){
			   		
				   		el.attr('class', 'installed button');
				   		el.html(maggieWelcomeObject.installed_btn);
			   			
		   		}

		   		el.removeClass('installing');
		   		is_loading = false;
		   		//location.reload();
			},
			error: function(xhr, status, error) {
	  		console.log(status);
	  		el.removeClass('installing');
	  		is_loading = false;
			}
		});
	});

	/** Ajax Plugin Installation (Offlines) **/
	$('.install-offline').on('click', function (e) {
		e.preventDefault();
		var el = $(this);

		is_loading = true;
    	el.addClass('installing');

		var file_location = el.attr('href');
		var github = $(el).attr('data-github');
		var slug = $(el).attr('data-slug');
		var file = el.attr('data-file');
		$.ajax({
			type: 'POST',
			url: ajaxurl,
			data: {
				action: 'maggie_lite_plugin_offline_installer',
				file_location: file_location,
				file: file,
				slug: slug,
				github: github,
				dataType: 'json'
			},
			success: function(response) {

		   		if(response == 'success'){
			   		
			   		el.attr('class', 'installed button');
			   		el.html(maggieWelcomeObject.installed_btn);
			   			
		   		}

		   		is_loading = false;
		   		location.reload();
			},
			error: function(xhr, status, error) {
	  		el.removeClass('installing');
	  		is_loading = false;
			}
		});
	});

	/** Ajax Plugin Activation **/
	$(".activate").on('click', function (e) {
		
		var el = $(this);
		var plugin = $(el).attr('data-slug');

    	var ajaxurl = maggieWelcomeObject.ajaxurl;
    	
    	
		$.ajax({
	   		type: 'POST',
	   		url: ajaxurl,
	   		data: {
	   			action: 'maggie_lite_plugin_activation',
	   			plugin: plugin,
	   			nonce: maggieWelcomeObject.activate_nonce,
	   			dataType: 'json'
	   		},
	   		success: function(response) {
		   		if(response){
			   		if(response.status === 'success'){
				   		el.attr('class', 'installed button');
				   		el.html(maggieWelcomeObject.installed_btn);
			   		}
		   		}
		   		is_loading = false;
		   		location.reload();
	   		},
	   		error: function(xhr, status, error) {
	      		console.log(status);
	      		is_loading = false;
	   		}
	   	});
	});

	/** Ajax Plugin Activation Offline **/
	$('.activate-offline').on('click', function (e) {
		e.preventDefault();
		
		var el = $(this);
		var plugin = $(el).attr('data-slug');

		$.ajax({
	   		type: 'POST',
	   		url: ajaxurl,
	   		data: {
	   			action: 'maggie_lite_plugin_offline_activation',
	   			plugin: plugin,
	   			nonce: maggieWelcomeObject.activate_nonce,
	   			dataType: 'json'
	   		},
	   		success: function(response) {
		   		if(response){
			   		el.attr('class', 'installed button');
			   		el.html(maggieWelcomeObject.installed_btn);
		   		}
		   		is_loading = false;
		   		location.reload();
	   		},
	   		error: function(xhr, status, error) {
	      		console.log(status);
	      		is_loading = false;
	   		}
	   	});
	});
});