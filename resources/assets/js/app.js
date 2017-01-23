require('./bootstrap');
$(document).ready(function(){
	
	/********************************
	**** events *********************
	********************************/
	
	$('input[type="checkbox"]').change(function(){
		if($(this).prop('checked')){
			$(this).val('true');
		}else{
			$(this).val('false');
		}
	});
	
	$('.action.schedule').click(function(){
		if($('.schedule-box').hasClass('hidden')) {
			$('.schedule-box').removeClass('hidden');
			$('.action.schedule').text('desligar');
		} else {
			$('.schedule-box').addClass('hidden');
			$('.action.schedule').text('ligar');
			$('#date_on_sale_to, #date_on_sale_from').val("");
		}
	});
	
	$('.action.sku').change(function(){
		$('.sku-box').hasClass('hidden')
			? $('.sku-box').removeClass('hidden')
			: $('.sku-box').addClass('hidden');
	});
	
	$('.action.delete-edit').click(function(){
		swal({
			title: "Atenção!",
			text: "Tem a certeza que pretende permanentemente apagar o produto?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Sim, tenho a certeza",
			cancelButtonText: "Cancelar",
			closeOnConfirm: false
			},
			function(){
				$('#delete_form').submit();
			}
		);
	});
	
	/********************************
	**** END events *****************
	********************************/
	
	/********************************
	**** editors ********************
	********************************/
	
	tinymce.init({
		selector:'.big-text-editor',
		menubar: false,
		min_height: 300,
		language: 'pt_PT',
		plugins: 'link image code',
		file_browser_callback_types: 'file image media',
		image_title: false,
		// enable automatic uploads of images represented by blob or data URIs
		// URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
		//images_upload_url: 'postAcceptor.php',
		// here we add custom filepicker only to Image dialog
		file_picker_types: 'image',
		// and here's our custom image picker
		file_picker_callback: function(cb, value, meta) {
			var input = document.createElement('input');
			input.setAttribute('type', 'file');
			input.setAttribute('accept', 'image/*');

			// Note: In modern browsers input[type="file"] is functional without 
			// even adding it to the DOM, but that might not be the case in some older
			// or quirky browsers like IE, so you might want to add it to the DOM
			// just in case, and visually hide it. And do not forget do remove it
			// once you do not need it anymore.

			input.onchange = function() {
				var file = this.files[0];

				// Note: Now we need to register the blob in TinyMCEs image blob
				// registry. In the next release this part hopefully won't be
				// necessary, as we are looking to handle it internally.
				var id = 'blobid' + (new Date()).getTime();
				var blobCache = tinymce.activeEditor.editorUpload.blobCache;
				var blobInfo = blobCache.create(id, file);
				blobCache.add(blobInfo);

				// call the callback and populate the Title field with the file name
				cb(blobInfo.blobUri(), { title: file.name });
			};

			input.click();
		},
		images_upload_url: '/wordpress/upload',
		automatic_uploads: true

	});
	
	tinymce.init({
		selector:'.short-text-editor',
		menubar: false,
		min_height: 150,
		language: 'pt_PT',
		plugins: 'link code',
	});
	
	/********************************
	**** END editors ****************
	********************************/
	
});