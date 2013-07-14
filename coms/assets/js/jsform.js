$(function(){
	
	$(".btn-delete-post").click(function(){
	
		var pid = $(this).parents('tr').data("id");
		var mod	= $(this).parents('table').data("id");
		
		if(confirm("Delete this entry? Once done, this action can not be undone.")) {
		
		var row = $(this).parents('tr');

		$.post(
			base_url + mod + '/delete',
			{id: pid},
			function(data){
				if(data.status.trim() == "OK")
					row.fadeOut();
				else alert(data.error);
			},
			"json"
			).error(function(xhr) {
				alert(xhr.responseText);
			});
			
		}
	});

	$('.myModal').modal({
		keyboard: false
	});
});

function makeSublist(parent,child,isSubselectOptional,childVal)
{
	$("body").append("<select style='display:none' id='"+parent+child+"'></select>");
	$('#'+parent+child).html($("#"+child+" option"));

	var parentValue = $('#'+parent).attr('value');
	$('#'+child).html($("#"+parent+child+" .sub_"+parentValue).clone());

	childVal = (typeof childVal == "undefined")? "" : childVal ;
	$("#"+child).val(childVal).attr('selected','selected');

	$('#'+parent).change(function(){
		var parentValue = $('#'+parent).attr('value');
		$('#'+child).html($("#"+parent+child+" .sub_"+parentValue).clone());
		//if(isSubselectOptional) $('#'+child).prepend("<option value='none' selected='selected'> -- Select -- </option>");
		//$('#'+child).trigger("change");
		$('#'+child).focus();
	});
	
	
}

$(document).ready(function()
{
	makeSublist('child','grandsun', true, '');
	makeSublist('parent','child', false, '1');	
});