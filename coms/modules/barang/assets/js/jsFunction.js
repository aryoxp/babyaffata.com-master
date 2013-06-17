$(function() {

	$(":checkbox.selectall").on('click', function(){			
		$(':checkbox[name="' + $(this).data('checkbox-name') + '"]').prop("checked", $(this).prop("checked"));        
	});
		
	/*$('#selectAll').click(function(){ 
		$("INPUT[type='checkbox']").attr('checked', $('#selectAll').is(':checked')); 
	}) 
	
	$('.checkall').click(function () {
			$(this).parents('fieldset:eq(0)').find(':checkbox').attr('checked', this.checked);
		});
	*/
	
	$('#writeTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
	
	
		 function split( val ) {
			return val.split( /,\s*/ );
		}

		function extractLast( term ) {
			return split( term ).pop();
		}
		
		 $( "#from" ).datepicker({
			defaultDate: "+1w",
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			$( "#to" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		
		$( "#to" ).datepicker({
			defaultDate: "+1w",
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
			$( "#from" ).datepicker( "option", "maxDate", selectedDate );
			}
		});
		
		

		$( "#date" ).datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true
		});
		
        $( ".date" ).datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true
		});
		
		$("#katbarang").autocomplete({ 
			source: base_url + "/module/barang/conf/kategori_barang",
			minLength: 0, 
			select: function(event, ui) { 
				$('#kategoriid').val(ui.item.id); 
				$('#kategori').val(ui.item.value);
			} 
		});  
		
		$("#manufacture").autocomplete({ 
			source: base_url + "/module/barang/conf/manufacture",
			minLength: 0, 
			select: function(event, ui) { 
				$('#manufactureid').val(ui.item.id); 
				$('#manufacture').val(ui.item.value);
			} 
		});  
		
				
		$("#demo-input-prevent-duplicates").tokenInput( base_url + "/module/barang/conf/pengampu", {
                preventDuplicates: true
            });
		
		$(".demo-hari").tokenInput( base_url + "/module/barang/conf/hari");
		 
			
		$("#tabs").tabs();
		$("#accordion").accordion({autoHeight: true,fillSpace: false});
		$("#tabs-child").tabs();
		$(".typeahead").typeahead();		
	
    });
	
	
