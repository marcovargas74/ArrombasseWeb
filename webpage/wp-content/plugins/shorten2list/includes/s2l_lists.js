jQuery(document).ready(function () {
	jQuery('#maillists td img.delete').click(function(){
               jQuery(this).closest('tr').remove();
        });
		
	jQuery('#maillists img.addit').click(function(){
		jQuery('#maillists tbody>tr:last').clone(true).insertAfter('#maillists tbody>tr:last');
	});
});