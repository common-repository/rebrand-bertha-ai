jQuery(document).ready(function() {
	
	jQuery('.bai-wl-setting-tabs').on('click', '.bai-wl-tab', function(e) {
		e.preventDefault();
		var id = jQuery(this).attr('href');
		jQuery(this).siblings().removeClass('active');
		jQuery(this).addClass('active');
		jQuery('.bai-wl-setting-tabs-content .bai-wl-setting-tab-content').removeClass('active');
		jQuery('.bai-wl-setting-tabs-content').find(id).addClass('active');
	});
	
});
 
