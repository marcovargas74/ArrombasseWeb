jQuery(document).ready( function () {

	/* var oTable = jQuery('#maillists').dataTable(); */
				
	var keys = new KeyTable( {
		"table": document.getElementById('maillists'),
		"datatable": oTable
	} );

/* Add a new row */
	function fnClickAddRow() {
		oTable.fnAddData( [
			'<input type="text" class="widefat" name="mlname[]" value="" />',
			'<input type="text" class="widefat" name="mlfrom[]" value="" />',
			'<input type="text" class="widefat" name="mlto[]" value="" />',
			'<input type="text" class="widefat" name="mltrigger[]" value="featured" />' ] );
	
	}

});