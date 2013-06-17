$(function() {
	$('#writeTab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	});
	
	$("#katbarang").autocomplete({ 
		source: base_url + "/module/barang/conf/kategori_barang",
		minLength: 0, 
		select: function(event, ui) { 
			$('#kategoriid').val(ui.item.id); 
			$('#kategori').val(ui.item.value);
		} 
	});  
	
	$( ".tgl" ).datepicker({
			dateFormat: 'yy-mm-dd',
			changeMonth: true,
			changeYear: true,
			showButtonPanel: true
		});
		
	
	$("#manufacture").autocomplete({ 
		source: base_url + "/module/barang/conf/manufacture",
		minLength: 0, 
		select: function(event, ui) { 
			$('#manufactureid').val(ui.item.id); 
			$('#manufacture').val(ui.item.value);
		} 
	});  
	
	$("#chkgenerate").click(function(){
	  if ($('#kodebarang').attr('disabled') == "disabled" ) {
		$('#kodebarang').removeAttr('disabled');
      }else {
		$("#kodebarang").attr('disabled', 'disabled');      
      }
	});
	
	
		
	$('.undangan .btn').on('click', function(e) {
		e.preventDefault();
		var $this = $(this);
		var $collapse = $this.closest('.collapse-group').find('.collapse');
		$collapse.collapse('toggle');
	});
	
	$("#dkategori").tokenInput( base_url + "/module/barang/conf/kategori_barang", {
			preventDuplicates: true,
			 theme: 'facebook'
	 });
	  
	$(".tagBarang").tagsManager({		
		prefilled:"",
		preventSubmitOnEnter: true,
		 blinkBGColor_1: '#FFFF9C',
		blinkBGColor_2: '#CDE69C',
		hiddenTagListName: 'hidBarang'
	});
	
	$(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});  
	
  });
	
	
