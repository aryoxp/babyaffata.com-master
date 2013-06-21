function makeSublist(parent,child,isSubselectOptional,childVal)
{
	$("body").append("<select style='display:none' id='"+parent+child+"'></select>");
	$('#'+parent+child).html($("#"+child+" option"));

	var parentValue = $('#'+parent).attr('value');
	$('#'+child).html($("#"+parent+child+" .sub_"+parentValue).clone());

	childVal = (typeof childVal == "undefined")? "" : childVal ;	
	//$("#"+child).val(childVal).attr('selected','selected');

	$('#'+parent).change(function(){
		var parentValue = $('#'+parent).attr('value');
		$('#'+child).html($("#"+parent+child+" .sub_"+parentValue).clone());
		if(isSubselectOptional) $('#'+child).prepend("<option value='none' selected='selected'>Please Select...</option>");		
		$('#'+child).trigger("change");		
		$('#'+child).focus();
	});
	
}

function childSubmit(id, mod){
	var parent = 'parent';
	var child	= 'child';
	var parentValue = $('#'+parent).attr('value');
	
	//alert($(".sub_"+parentValue).val());
	$("#"+child).removeAttr('selected');
	$(".sub_"+parentValue).removeAttr('selected');

	if(id!="none"){
		//alert($(".sub_"+parentValue).val(id).attr('selected','selected'));
		if(id==$(".sub_"+parentValue).val()){
			$(".sub_"+parentValue).val(id).attr('selected','selected');
		
		}
		//location.href=base_url + mod + '/' + parentValue + '/' + id;	
	}
	//alert(id);
}	

$(document).ready(function()
{
	makeSublist('child','grandsun', true, '');
	makeSublist('parent','child', true, '');
});