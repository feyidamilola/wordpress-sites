"use strict";
jQuery(document).ready(function($){
    jQuery('.brando_upload_image').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();

  			var thumburl = uploaded_image.attributes.sizes.thumbnail;
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#image_url').val(image_url);
            $('img').attr("src",thumburl.url);
            $('img').css("display","block");
        });
    });
    jQuery('.brando_remove_button').click(function () {
		var remove_parent = jQuery(this).parent();
		remove_parent.find('input[type="hidden"]').val('');
		remove_parent.find('.upload_image_screenshort').slideUp();
	});

    // Remove ads from themesettings header.
    setTimeout(function(){ 
        if($( '#redux-header' ).find(".rAds")){
            $(".rAds").remove();
        }
    }, 1000);

    /* Brando Licence - START CODE */
    $( '.brando-licence' ).on( 'click', function(e) {
        e.preventDefault();

        if( $( this ).attr( 'disabled' ) ){
            return false;
        }

        var currentVar = $(this);
        currentVar.parent().find( 'img' ).css("display","inline-block");
        var data = {
            action: 'brando_active_theme_licence',
        };

        var request = $.getJSON({
            url: ajaxurl,
            type: "POST",
            data: data
        });
        request.success(function(response) {
            response && response.status ? window.location = response.url : alert( brando_licence_messages.response_failed );
        });

        request.fail(function(jqXHR, textStatus) {
            alert( 'Request failed: ' + textStatus );
        });

    });

    /* Brando Licence - END CODE */
    
    /* Hide Licence Activation Message Cookie - START CODE */

    var BrandoSetCookie = function ( c_name, value, exdays ) {
      var exdate = new Date();
      exdate.setDate( exdate.getDate() + exdays );
      var c_value = encodeURIComponent( value ) + ((null === exdays) ? "" : "; expires=" + exdate.toUTCString());
      document.cookie = c_name + "=" + c_value;
    };
    $( document ).on( 'click', '.brando-license-activation-message .notice-dismiss', function( event ) {
      event.preventDefault();
      BrandoSetCookie( 'brando_hide_activation_message', 'hide', 30 );
    } );

    /* Hide Licence Activation Message Cookie - END CODE */
});
	