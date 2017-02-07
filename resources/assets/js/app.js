require('./bootstrap');

/*! ========================================================================
 * Bootstrap Toggle: bootstrap-toggle.js v2.2.0
 * http://www.bootstraptoggle.com
 * ========================================================================
 * Copyright 2014 Min Hur, The New York Times Company
 * Licensed under MIT
 * ======================================================================== */
+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.toggle"),f="object"==typeof b&&b;e||d.data("bs.toggle",e=new c(this,f)),"string"==typeof b&&e[b]&&e[b]()})}var c=function(b,c){this.$element=a(b),this.options=a.extend({},this.defaults(),c),this.render()};c.VERSION="2.2.0",c.DEFAULTS={on:"On",off:"Off",onstyle:"primary",offstyle:"default",size:"normal",style:"",width:null,height:null},c.prototype.defaults=function(){return{on:this.$element.attr("data-on")||c.DEFAULTS.on,off:this.$element.attr("data-off")||c.DEFAULTS.off,onstyle:this.$element.attr("data-onstyle")||c.DEFAULTS.onstyle,offstyle:this.$element.attr("data-offstyle")||c.DEFAULTS.offstyle,size:this.$element.attr("data-size")||c.DEFAULTS.size,style:this.$element.attr("data-style")||c.DEFAULTS.style,width:this.$element.attr("data-width")||c.DEFAULTS.width,height:this.$element.attr("data-height")||c.DEFAULTS.height}},c.prototype.render=function(){this._onstyle="btn-"+this.options.onstyle,this._offstyle="btn-"+this.options.offstyle;var b="large"===this.options.size?"btn-lg":"small"===this.options.size?"btn-sm":"mini"===this.options.size?"btn-xs":"",c=a('<label class="btn">').html(this.options.on).addClass(this._onstyle+" "+b),d=a('<label class="btn">').html(this.options.off).addClass(this._offstyle+" "+b+" active"),e=a('<span class="toggle-handle btn btn-default">').addClass(b),f=a('<div class="toggle-group">').append(c,d,e),g=a('<div class="toggle btn" data-toggle="toggle">').addClass(this.$element.prop("checked")?this._onstyle:this._offstyle+" off").addClass(b).addClass(this.options.style);this.$element.wrap(g),a.extend(this,{$toggle:this.$element.parent(),$toggleOn:c,$toggleOff:d,$toggleGroup:f}),this.$toggle.append(f);var h=this.options.width||Math.max(c.outerWidth(),d.outerWidth())+e.outerWidth()/2,i=this.options.height||Math.max(c.outerHeight(),d.outerHeight());c.addClass("toggle-on"),d.addClass("toggle-off"),this.$toggle.css({width:h,height:i}),this.options.height&&(c.css("line-height",c.height()+"px"),d.css("line-height",d.height()+"px")),this.update(!0),this.trigger(!0)},c.prototype.toggle=function(){this.$element.prop("checked")?this.off():this.on()},c.prototype.on=function(a){return this.$element.prop("disabled")?!1:(this.$toggle.removeClass(this._offstyle+" off").addClass(this._onstyle),this.$element.prop("checked",!0),void(a||this.trigger()))},c.prototype.off=function(a){return this.$element.prop("disabled")?!1:(this.$toggle.removeClass(this._onstyle).addClass(this._offstyle+" off"),this.$element.prop("checked",!1),void(a||this.trigger()))},c.prototype.enable=function(){this.$toggle.removeAttr("disabled"),this.$element.prop("disabled",!1)},c.prototype.disable=function(){this.$toggle.attr("disabled","disabled"),this.$element.prop("disabled",!0)},c.prototype.update=function(a){this.$element.prop("disabled")?this.disable():this.enable(),this.$element.prop("checked")?this.on(a):this.off(a)},c.prototype.trigger=function(b){this.$element.off("change.bs.toggle"),b||this.$element.change(),this.$element.on("change.bs.toggle",a.proxy(function(){this.update()},this))},c.prototype.destroy=function(){this.$element.off("change.bs.toggle"),this.$toggleGroup.remove(),this.$element.removeData("bs.toggle"),this.$element.unwrap()};var d=a.fn.bootstrapToggle;a.fn.bootstrapToggle=b,a.fn.bootstrapToggle.Constructor=c,a.fn.toggle.noConflict=function(){return a.fn.bootstrapToggle=d,this},a(function(){a("input[type=checkbox][data-toggle^=toggle]").bootstrapToggle()}),a(document).on("click.bs.toggle","div[data-toggle^=toggle]",function(b){var c=a(this).find("input[type=checkbox]");c.bootstrapToggle("toggle"),b.preventDefault()})}(jQuery);
//# sourceMappingURL=bootstrap-toggle.min.js.map

var currentSwitch;

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
	
	$('.action.delete-edit, .action.delete-list').click(function(e){
		e.preventDefault();
		var el = $(this);
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
				if($(el).hasClass('delete-edit'))
					$('#delete_form').submit()
				else if($(el).hasClass('delete-list'))
					$('#delete_form').attr('action', $(el).attr('href')).submit(); 
			}
		);
	});
	
	$('.action.delete-user').click(function(e){
		e.preventDefault();
		var el = $(this);
		swal({
			title: "Atenção!",
			text: "Tem a certeza que pretende permanentemente eliminar o utilizador?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Sim, tenho a certeza",
			cancelButtonText: "Cancelar",
			closeOnConfirm: false
			},
			function(){
				$('#delete_form').attr('action', $(el).attr('href')).submit();
			}
		);
	});
	
	$('.action.delete-orders, .action.delete-orders-list').click(function(e){
		e.preventDefault();
		var el = $(this);
		swal({
			title: "Atenção!",
			text: "Tem a certeza que pretende permanentemente apagar a encomenda?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Sim, tenho a certeza",
			cancelButtonText: "Cancelar",
			closeOnConfirm: false
			},
			function(){
				if($(el).hasClass('delete-orders'))
					$('#delete_form').submit()
				else if($(el).hasClass('delete-orders-list'))
					$('#delete_form').attr('action', $(el).attr('href')).submit(); 
			}
		);
	});
	
	$('.switch-prom').parent().click(function(){
		currentSwitch = $(this);
		swal({
			title: "Atenção!",
			text: "Tem a certeza que pretende alterar o estado do produto?",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Sim, tenho a certeza",
			cancelButtonText: "Cancelar",
			closeOnConfirm: true
			},
			function(){
				setTimeout(function(){
					var status = $(currentSwitch).find('.switch-prom').prop('checked');
					var data = {
						'product_id' : $(currentSwitch).find('.switch-prom').attr('_product_id')
					};
					var url;

					if(status)
						url = $(currentSwitch).find('.switch-prom').attr('_url')
					else {
						url = $(currentSwitch).find('.switch-prom').attr('_url') + '/' + data.product_id;
						data._method = 'DELETE'
					}
					
					$.ajax({
						url: url,
						type: 'post',
						dataType: 'json',
						data: data,
						success: function(data) {
							createMessage(data.message, 200);
							currentSwitch = null;
						},
						error: function(){
							$(currentSwitch).find('.switch-prom').bootstrapToggle('toggle');
							createMessage('Orocceu um erro desconhecido', 500);
							currentSwitch = null;
						}
					});
				},300);
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
				
				console.log('file:');
				console.log(file);
				// call the callback and populate the Title field with the file name
				cb(blobInfo.blobUri(), { title: file.name, src : file.src });
			};

			input.click();
		},
		file_browser_callback: function(field_name, url, type, win) {
			console.log("file_browser_callback");
			console.log(field_name);
			console.log(url);
			console.log(type);
			console.log(win);
			win.document.getElementById(field_name).value = 'my browser value';
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


var createMessage = function(message, type) {
	if(type == 200)
		$('h1').before('<div class="alert alert-success">' + message + '</div>');
	if(type == 500)
		$('h1').before('<div class="alert alert-danger">' + message + '</div>');
	setTimeout(function(){
		$('.alert').remove();
	},3000);
}