jQuery(document).ready(function(){
	jQuery("#submitAjaxButton").click(function(){
		//alert("I HAVE BEEN CLICKED");
	var $basepath = Drupal.settings.basePath;

		jQuery.ajax({
			url:$basepath+'gethello',
			data:{
				name: jQuery("#edit-name").val(),
			},
			success: function(data){
			//data:value returned from server\
			//alert(data);
			jQuery("#msg-display-area").append(data);
			}
		});
	});
});