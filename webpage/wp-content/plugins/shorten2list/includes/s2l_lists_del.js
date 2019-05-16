var oTable;
var giRedraw = false;

jQuery(document).ready( function () {

/* Add a click handler to the rows - this could be used as a callback */
	jQuery("#maillists tbody").click(function(event) {
		$(oTable.fnSettings().aoData).each(function (){
			$(this.nTr).removeClass('row_selected');
		});
		$(event.target.parentNode).addClass('row_selected');
	});
	
/* Add a click handler for the delete row */
	jQuery('#mlDelete').click( function() {
		var anSelected = fnGetSelected( oTable );
		oTable.fnDeleteRow( anSelected[0] );
	} );
	
	oTable = jQuery('#maillists').dataTable();
				
});  // End jQuery.ready()

/* Get the rows which are currently selected */
function fnGetSelected( oTableLocal )
{
	var aReturn = new Array();
	var aTrs = oTableLocal.fnGetNodes();
	
	for ( var i=0 ; i<aTrs.length ; i++ )
	{
		if ( $(aTrs[i]).hasClass('row_selected') )
		{
			aReturn.push( aTrs[i] );
		}
	}
	return aReturn;
}
	