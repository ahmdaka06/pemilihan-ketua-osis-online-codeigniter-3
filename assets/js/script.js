$(document).ready(function(){
	/*======Sidebar=======*/	
	var getUrlParameter = function getUrlParameter(sParam) {
		var sPageURL = decodeURIComponent(window.location.search.substring(1)),
			sURLVariables = sPageURL.split('&'),
			sParameterName,
			i;

		for (i = 0; i < sURLVariables.length; i++ ) {
			sParameterName = sURLVariables[i].split('=');

			if ( sParameterName[0] === sParam ) {
				return sParameterName[1] === undefined ? true : sParameterName[1];
			}
		}
	};

	var page = getUrlParameter('p');

	if( page == 'dashboard' )$('#dashboard').attr('class', 'active');
	else if( page == 'calon' )$('#calon').attr('class', 'active');
	else if( page == 'data_pemilih' )$('#data').attr('class', 'active');
	else if( page == 'laporan' )$('#laporan').attr('class', 'active');

	// Load Dashboard
	$('#view-dashboard').load('admin/dashboard_view');

	$('#passSalah').hide();
	$('#passwordverif').focus(function(){
		$(this).css('border-color', '#d2d6de');
		$('#passSalah').hide();
	});

	// TinyMCE
	tinymce.init({
		selector:"textarea",
		menubar: false,
	    plugins: ["preview wordcount advlist autolink lists link image charmap preview pagebreak searchreplace insertdatetime, fullscreen hr , table,  directionality, emoticons, textcolor, colorpicker, textpattern, code"],
	    toolbar: "undo redo | fontselect fontsizeselect | styleselect | bullist numlist | forecolor backcolor emoticons | preview wordcount",
	    convert_urls: false,
	    theme_advanced_font_sizes : "8px,10px,12px,14px,16px,18px,20px,24px,32px,36px",
	});

	// Preview Image Before Upload
	function readURL(input) {
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#preview').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[0]);
		}
	}

	$('#foto').change(function(){
		readURL(this);
	});

});