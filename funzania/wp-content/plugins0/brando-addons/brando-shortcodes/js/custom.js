!function($) {
	"use strict";
    /* jQuery Enable Click Event For Switch */
    $('.switch-option-enable').on('click',function(){    
      if (!$(this).hasClass('selected')) {
          var c = $(this).parent().find('select');
          $(this).parent().find('.selected').removeClass('selected');
          $(this).addClass('selected');
          c.val(1).trigger('change');
        }
    });

    /* jQuery Disable Click Event For Switch */
    $('.switch-option-disable').on('click',function(){
      if (!$(this).hasClass("selected")) {
          var c = $(this).parent().find('select');
          $(this).parent().find('.selected').removeClass("selected");
          $(this).addClass("selected");
          c.val(0).trigger('change');
        }
    });    

    /* jQuery For Preview Slider Image */
    $('.preview-image-hide').hide();
    $('.preview-image-show').show();
    $('.brando-preview-image-main').parent().parent().find('.wpb_element_label').hide();

    /* jQuery For add selected class for current type */
    $('.brando_portfolio_style,.slider_premade_style,.brando_portfolio_filter_style,.brando_block_premade_style,.brando_feature_type,.counter_or_chart,.brando_team_member_style,.brando_blog_premade_style,.brando_heading_type,.button_style,.accordian_pre_define_style,.brando_post_slider_style,.tabs_style,.brando_tab_content_premade_style,.brando_image_block_premade_style,.brando_testimonial_premade_style,.image_gallery_type,.popup_type,.brando_alert_massage_premade_style').bind('change keyup', function(e) {
      $(this).parent().parent().parent().find('.brando_preview_image_select option').removeAttr("selected");
      $(this).parent().parent().parent().find('.preview-image-hide').hide();
      var current_selected = $(this).val();
      if(current_selected){
        $(this).parent().parent().parent().find('.brando-preview-image-main .'+current_selected).show();
        $(this).parent().parent().parent().find('.brando_preview_image_select option[class="'+current_selected+'"]').attr('selected', 'selected');
      }
    });

    /* jQuery Click Event For Icon */
    $('.brando_icon_preview').on('click', function() {
        if( $(this).hasClass('active_icon') ){
          $(this).removeClass('active_icon');
          $(this).parent().parent().find('.brando_icon_field').val('');
        }else{
          $('.brando_icon_preview').removeClass('active_icon');
          $(this).addClass('active_icon');
          var selected_icon = $(this).children().attr('data-name');
          $(this).parent().parent().find('.brando_icon_field').val(selected_icon);
        }
    });


  /* File Upload For Menu */
  $(document).ready(function(){
      $(document).delegate(this, 'click', function (e) {
          if(e.target.className == 'button-secondary-cat'){
          e.preventDefault();
          var image = wp.media({ 
              title: 'Upload Image',
              // mutiple: true if you want to upload multiple files at once
              //multiple: false
          }).open()
          .on('select', function(e1){
              // This will return the selected image from the Media Uploader, the result is an object
              var uploaded_image = image.state().get('selection').first();
              var thumburl = uploaded_image.attributes.sizes.thumbnail;
              // We convert uploaded_image to a JSON object to make accessing it easier
              // Output to the console uploaded_image
              var image_url = uploaded_image.toJSON().url;
              // Let's assign the url value to the input field
              
              $('#'+e.target.id).parent().find('#thumb_image_url').val(thumburl.url);
              $('#'+e.target.id).parent().find('#image_url').val(image_url);
              $('#'+e.target.id).parent().find('img').attr("src",thumburl.url);
              $('#'+e.target.id).parent().find('img').css("display","block");
          });
        }
      });
      $(document).delegate(this, 'click', function (e) {
        if(e.target.className == 'brando_remove_button button-secondary-cat'){
          var remove_parent = jQuery(e.target).parent();
        remove_parent.find('input[type="hidden"]').val('');
        remove_parent.find('.upload_image_screenshort').slideUp();
        }
    });
  });

  /* For Desktop Custom Padding Settings */
  var brandoDesktopPadding = $( '.brando-desktop-custom-select' ).parent().find( '.brando-desktop-custom-select-value' ).val();
  if( brandoDesktopPadding ){ 
    $( '.brando-desktop-custom-select' ).find("option[value='" + brandoDesktopPadding +"']").attr('selected', true);
  }

  $( '.brando-desktop-custom-select' ).bind('change keyup', function(e) {
    var desktop_current_selected = $(this).val();
    $(this).parent().find( '.brando-desktop-custom-select-value' ).val( desktop_current_selected );

    if( desktop_current_selected == 'custom-desktop-padding' ) {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_desktop_padding]').removeClass('vc_dependent-hidden');
    } else {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_desktop_padding]').addClass('vc_dependent-hidden');
    }
  });

  /* For Mini Desktop Custom Padding Settings */
  var brandoMiniDesktopPadding = $( '.brando-mini-desktop-custom-select' ).parent().find( '.brando-mini-desktop-custom-select-value' ).val();
  if( brandoMiniDesktopPadding ){ 
    $( '.brando-mini-desktop-custom-select' ).find("option[value='" + brandoMiniDesktopPadding +"']").attr('selected', true);
  }
  $( '.brando-mini-desktop-custom-select' ).bind('change keyup', function(e) {
    var mini_desktop_current_selected = $(this).val();
    $(this).parent().find( '.brando-mini-desktop-custom-select-value' ).val( mini_desktop_current_selected );

    if( mini_desktop_current_selected == 'custom-mini-desktop-padding' ) {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mini_desktop_padding]').removeClass('vc_dependent-hidden');
    } else {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mini_desktop_padding]').addClass('vc_dependent-hidden');
    }
  });

  /* For Ipad Custom Padding Settings */
  var brandoIpadPadding = $( '.brando-ipad-custom-select' ).parent().find( '.brando-ipad-custom-select-value' ).val();
  if( brandoIpadPadding ){ 
    $( '.brando-ipad-custom-select' ).find("option[value='" + brandoIpadPadding +"']").attr('selected', true);
  }
  $( '.brando-ipad-custom-select' ).bind('change keyup', function(e) {
    var ipad_current_selected = $(this).val();
    $(this).parent().find( '.brando-ipad-custom-select-value' ).val( ipad_current_selected );

    if( ipad_current_selected == 'custom-ipad-padding' ) {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_ipad_padding]').removeClass('vc_dependent-hidden');
    } else {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_ipad_padding]').addClass('vc_dependent-hidden');
    }
  });

  /* For Mobile Custom Padding Settings */
  var brandoMobilePadding = $( '.brando-mobile-custom-select' ).parent().find( '.brando-mobile-custom-select-value' ).val();
  if( brandoMobilePadding ){ 
    $( '.brando-mobile-custom-select' ).find("option[value='" + brandoMobilePadding +"']").attr('selected', true);
  }
  $( '.brando-mobile-custom-select' ).bind('change keyup', function(e) {
    var mobile_current_selected = $(this).val();
    $(this).parent().find( '.brando-mobile-custom-select-value' ).val( mobile_current_selected );

    if( mobile_current_selected == 'custom-mobile-padding' ) {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mobile_padding]').removeClass('vc_dependent-hidden');
    } else {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mobile_padding]').addClass('vc_dependent-hidden');
    }
  });

  /* For Desktop Custom Margin Settings */
  var brandoDesktopMargin = $( '.brando-desktop-custom-margin-select' ).parent().find( '.brando-desktop-custom-margin-select-value' ).val();
  if( brandoDesktopMargin ){ 
    $( '.brando-desktop-custom-margin-select' ).find("option[value='" + brandoDesktopMargin +"']").attr('selected', true);
  }

  $( '.brando-desktop-custom-margin-select' ).bind('change keyup', function(e) {
    var desktop_current_margin_selected = $(this).val();
    $(this).parent().find( '.brando-desktop-custom-margin-select-value' ).val( desktop_current_margin_selected );

    if( desktop_current_margin_selected == 'custom-desktop-margin' ) {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_desktop_margin]').removeClass('vc_dependent-hidden');
    } else {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_desktop_margin]').addClass('vc_dependent-hidden');
    }
  });

  /* For Mini Desktop Custom Margin Settings */
  var brandoMiniDesktopMargin = $( '.brando-mini-desktop-custom-margin-select' ).parent().find( '.brando-mini-desktop-custom-margin-select-value' ).val();
  if( brandoMiniDesktopMargin ){ 
    $( '.brando-mini-desktop-custom-margin-select' ).find("option[value='" + brandoMiniDesktopMargin +"']").attr('selected', true);
  }
  $( '.brando-mini-desktop-custom-margin-select' ).bind('change keyup', function(e) {
    var mini_desktop_margin_current_selected = $(this).val();
    $(this).parent().find( '.brando-mini-desktop-custom-margin-select-value' ).val( mini_desktop_margin_current_selected );

    if( mini_desktop_margin_current_selected == 'custom-mini-desktop-margin' ) {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mini_desktop_margin]').removeClass('vc_dependent-hidden');
    } else {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mini_desktop_margin]').addClass('vc_dependent-hidden');
    }
  });

  /* For Ipad Custom Margin Settings */
  var brandoIpadMargin = $( '.brando-ipad-custom-margin-select' ).parent().find( '.brando-ipad-custom-margin-select-value' ).val();
  if( brandoIpadMargin ){ 
    $( '.brando-ipad-custom-margin-select' ).find("option[value='" + brandoIpadMargin +"']").attr('selected', true);
  }
  $( '.brando-ipad-custom-margin-select' ).bind('change keyup', function(e) {
    var ipad_margin_current_selected = $(this).val();
    $(this).parent().find( '.brando-ipad-custom-margin-select-value' ).val( ipad_margin_current_selected );

    if( ipad_margin_current_selected == 'custom-ipad-margin' ) {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_ipad_margin]').removeClass('vc_dependent-hidden');
    } else {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_ipad_margin]').addClass('vc_dependent-hidden');
    }
  });

  /* For Mobile Custom Margin Settings */
  var brandoMobileMargin = $( '.brando-mobile-custom-margin-select' ).parent().find( '.brando-mobile-custom-margin-select-value' ).val();
  if( brandoMobileMargin ){ 
    $( '.brando-mobile-custom-margin-select' ).find("option[value='" + brandoMobileMargin +"']").attr('selected', true);
  }
  $( '.brando-mobile-custom-margin-select' ).bind('change keyup', function(e) {
    var mobile_margin_current_selected = $(this).val();
    $(this).parent().find( '.brando-mobile-custom-margin-select-value' ).val( mobile_margin_current_selected );

    if( mobile_margin_current_selected == 'custom-mobile-margin' ) {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mobile_margin]').removeClass('vc_dependent-hidden');
    } else {
      $(this).parents('.vc_row').find( '[data-vc-shortcode-param-name=custom_mobile_margin]').addClass('vc_dependent-hidden');
    }
  });

}(window.jQuery);