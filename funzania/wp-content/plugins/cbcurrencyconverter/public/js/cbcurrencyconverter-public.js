(function ($) {
	"use strict";

	$(document).ready(function () {
		$('.cbcurrencyconverter_cal_wrapper').each(function (index, element) {

			//hide the result window first
			$(element).find('.cbcurrencyconverter_result').hide();

			$(element).find(".cbcurrencyconverter_cal_from").chosen({
				disable_search_threshold: 5,
				width                   : "99%"
			});

			$(element).find(".cbcurrencyconverter_cal_to").chosen({
				disable_search_threshold: 5,
				width                   : "99%"

			});

			$(element).on('click', '.cbcurrencyconverter_calculate', function (e) {
				e.preventDefault();


				var $this = $(this);
				var $parent = $this.parents('.cbcurrencyconverter_cal_wrapper');
				var button_ref = $this.attr('data-ref');
				var button_busy = $this.attr('data-busy');
				var decimalpoint = $this.attr('data-decimalpoint');


				var cbcurrencyconverter_data = {};


				cbcurrencyconverter_data['nonce'] = cbcurrencyconverter.nonce;
				cbcurrencyconverter_data['decimal'] = decimalpoint;
				cbcurrencyconverter_data['ref'] = button_ref;

				cbcurrencyconverter_data['cbcurconvert_error'] = '';

				cbcurrencyconverter_data['cbcurconvert_amount'] = $this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_cal_amount').val();
				cbcurrencyconverter_data['cbcurconvert_from'] = $this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_cal_from').val();
				cbcurrencyconverter_data['cbcurconvert_to'] = $this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_cal_to').val();


				// validation check
				if (cbcurrencyconverter_data['cbcurconvert_to'] == '') {
					cbcurrencyconverter_data['cbcurconvert_error'] = cbcurrencyconverter.empty_selection;
				}

				if (cbcurrencyconverter_data['cbcurconvert_from'] == '') {
					cbcurrencyconverter_data['cbcurconvert_error'] = cbcurrencyconverter.empty_selection;
				}

				if (cbcurrencyconverter_data['cbcurconvert_error'] == '' && (cbcurrencyconverter_data['cbcurconvert_to'] == cbcurrencyconverter_data['cbcurconvert_from'])) {
					cbcurrencyconverter_data['cbcurconvert_error'] = cbcurrencyconverter.same_selection;
				}


				if (cbcurrencyconverter_data['cbcurconvert_error'] == '' && button_busy == '0') {

					$this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_result').html('');
					$this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_result').hide();

					$this.attr('data-busy', '1');
					$this.addClass('cbcurrencyconverter_active');

					$.ajax({
						type    : "post",
						dataType: "json",
						url     : cbcurrencyconverter.ajaxurl,
						data    : {action: "currrency_convert", cbcurrencyconverter_data: cbcurrencyconverter_data},
						success : function (data, textStatus, XMLHttpRequest) {

							$this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_result').show();

							$this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_result').html(cbcurrencyconverter_data['cbcurconvert_amount'] + ' ' + cbcurrencyconverter_data['cbcurconvert_from'] + ' = ' + data + ' ' + cbcurrencyconverter_data['cbcurconvert_to']);

							$this.attr('data-busy', '0');
							$this.removeClass('cbcurrencyconverter_active');
						}
					});// end of ajax
				}// end of if error msg null
				else {

					$this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_result').show();
					$this.parents('.cbcurrencyconverter_cal_wrapper').find('.cbcurrencyconverter_result').html(cbcurrencyconverter_data['cbcurconvert_error']);
				}
			});
		});
	});// end of function

}(jQuery));