(function(window, document, $) {
	'use strict';

	// Year yyyy
	$('.year-inputmask').inputmask("yyyy", {'undoOnEscape': false});

	// Date dd/mm/yyyy
	$('.date-inputmask').inputmask("dd/mm/yyyy", {'undoOnEscape': false});

	//Phone mask
	$('.phone-inputmask').inputmask("(999) 999-9999", {'undoOnEscape': false});

	// Another Date mm-dd-yyyy
	$('.international-inputmask').inputmask("+9(999)999-9999", {'undoOnEscape': false});

	//Phone with extra
	$('.xphone-inputmask').inputmask("(999) 999-9999 / x999999", {'undoOnEscape': false});

	// Purchase Order
	$('.purchase-inputmask').inputmask("aaaa 9999-****", {'undoOnEscape': false});

	// Credit Card Number
	$('.cc-inputmask').inputmask("9999 9999 9999 9999", {'undoOnEscape': false});

	// SSN
	$('.ssn-inputmask').inputmask("999-99-9999", {'undoOnEscape': false});

	// ISBN
	$('.isbn-inputmask').inputmask("999-99-999-9999-9", {'undoOnEscape': false});

	// Currency in USD
	$('.currency-inputmask').inputmask("$9999", {'undoOnEscape': false});

	// Percentage
	$('.percentage-inputmask').inputmask("99%", {'undoOnEscape': false});

	// Decimal
	$('.decimal-inputmask').inputmask({ "alias": "decimal" , "radixPoint": ".", 'undoOnEscape': false});

	// Email mask
	$('.email-inputmask').inputmask({
		mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
		greedy: false,
		onBeforePaste: function (pastedValue, opts) {
			pastedValue = pastedValue.toLowerCase();
			return pastedValue.replace("mailto:", "");
		},
		definitions: {
			'*': {
				validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
				cardinality: 1,
				casing: "lower"
			}
		}
	});

	// Optional Mask
	$('.optional-inputmask').inputmask("(99) 9999[9]-9999");

	// JIT Masking
	$('.jit-inputmask').inputmask("mm-dd-yyyy",{ jitMasking: true });

	// Oncomplete
	$('.oncomplete-inputmask').inputmask("d/m/y",{ "oncomplete": function(){ alert('inputmask complete'); } });

	// Onincomplete
	$('.onincomplete-inputmask').inputmask("d/m/y",{ "onincomplete": function(){ alert('inputmask incomplete'); } });

	// Oncleared
	$('.oncleared-inputmask').inputmask("d/m/y",{ "oncleared": function(){ alert('inputmask cleared'); } });

})(window, document, jQuery);