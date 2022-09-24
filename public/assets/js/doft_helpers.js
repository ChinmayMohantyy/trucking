$(document).ready(function() {
    $('#ftSubscribeBtn').click(function (){
		var contact = $('#ftSubscribeInput').val();
		btnProgress('#ftSubscribeBtn');
		$.get('/ajax/subscribe-news', 
				{ contact : contact
				}, 
				function(responseJson) {
					btnProgressRemove('#ftSubscribeBtn');
	
					var data =  jQuery.parseJSON(responseJson);
	
			        if(data.isSuccess) {
			        	$('#ftSubscribeInput').val('');
						toastr.success('Contact <b>' + contact + '</b> successfully added to Newsletters list', 'Succcess', {"timeOut": 7000, "extendedTimeOut": 7000, "newestOnTop": true, "progressBar": true});
			        }
			        else {
						toastr.error('Contact format is incorrect', 'Error', {"timeOut": 7000, "extendedTimeOut": 7000, "newestOnTop": true, "progressBar": true});
			        }
				 });
	});
	
	$('[data-toggle="popover"]').on('click', function (e) {
	    $('[data-toggle="popover"]').not(this).popover('hide');
	});
	
	gtag_log_event();
	
	doft_checkbox();
});

var __lastScrollTop = 0;
$(window).scroll(function(event){
   var st = $(this).scrollTop();
   if (st > __lastScrollTop){
	   //down
//		if($body.hasClass('menu-open'))
			closeLeftMenu();
   } else {
	   //up
   }
   __lastScrollTop = st;
});
function closeLeftMenu() {
	var body = $('body');
    // Toggle menu
	if(typeof $.app === 'undefined')
		return;
	
    $.app.menu.hide();
	if(! body.hasClass('menu-open'))
		return;

    setTimeout(function(){
        $(window).trigger( "resize" );
    },200);

    if($('#collapsed-sidebar').length > 0){
        setTimeout(function(){
            if(body.hasClass('menu-expanded') || body.hasClass('menu-open')){
                $('#collapsed-sidebar').prop('checked', false);
            }
            else{
                $('#collapsed-sidebar').prop('checked', true);
            }
        },1000);
    }
}


function resetAllCookies()
{
	var cookies = document.cookie.split(";");
	for(var i=0; i < cookies.length; i++) {
	    var equals = cookies[i].indexOf("=");
	    var name = equals > -1 ? cookies[i].substr(0, equals) : cookies[i];
	    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
	}
}

function resetCookie(name)
{
	$.removeCookie(name, { path: '/' });
//	$.removeCookie(name, { path: '/panel' });
//	$.removeCookie(name, { path: '/panel/' });
}

function setCookie(name, value)
{
	var date = new Date();
	date.setTime(date.getTime() + (10 * 365 * 24 * 60 * 60 * 1000));
	 
	$.cookie(name, value, { expires: date, path: '/' });
//	$.cookie(name, value, { expires: date, path: '/panel' });
//	$.cookie(name, value, { expires: date, path: '/panel/' });
}
function getCookie(name) {
	return $.cookie(name);
}
function getCookieWithDef(name, defValue)
{
	var c = $.cookie(name);
	if(c == null || c === 'undefined')
		return defValue;
		
	return c;
}

String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(escapeRegExp(search), 'g'), replacement);
};
function escapeRegExp(str) {
    return str.replace(/([.*+?^=!:${}()|\[\]\/\\])/g, "\\$1");
}

function isRetina(){
	return (window.devicePixelRatio > 1);
}

var usStatesShort = [ "AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA",
		"HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN", "MS", "MO", "MT", "NE", "NV",
		"NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", "SD", "TN", "TX", "UT", "VT", "VA",
		"WA", "DC", "WV", "WI", "WY", "PR" ];
var usStates = [ "Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida", "Georgia",
		"Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada",
		"New Hampshire", "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia",
		"Washington", "District of Columbia", "West Virginia", "Wisconsin", "Wyoming", "Puerto Rico" ];
function findStateNumByName(state) {
	state = state.toUpperCase();
	for (var i = 0; i < usStates.length; i++) {
		if (usStates[i].toUpperCase() == state)
			return i;
	}
	return -1;
}
function shortenStateName(state) {
	var stId = findStateNumByName(state);
	if(stId >= 0)
		state = usStatesShort[stId];

	return state;
}

function addCB(setId, id, name) {
	var str = "<div class='skin skin-square'><fieldset class='" + setId + "'><input type='checkbox' id='" + id + "' name='" + id + "'><label for='" + id + "'>" + name + "</label></fieldset></div>";
	return str;
}
function openAccordion(id, name) {
	var text = "<div class='panel panel-default accordeon expandible mb-1'><div class='panel-heading clickable collapsed' data-toggle='collapse' data-target='#" + id + "'><h4 class='panel-title accordion-toggle'><span>" + name + "</span></h4></div><div id='" + id + "' class='panel-collapse collapse'><div class='panel-body'>";
	return text;
}
function closeAccordion() {
	return "</div></div></div>";
}
function leEnableValue() {
	var btn = $('.jconfirm-buttons .btn-doft');
	if(leHasValue())
		btn.removeAttr('disabled');
	else
		btn.attr('disabled', true);
}
function leHasValue() {
	var val = $(".jconfirm-content textarea").val();
	if(val != "")
		return true;
	
	var hasValue = false;
	$('.jconfirm-content input[type=checkbox]').each(function () {
		if(this.checked)
			hasValue = true;
	});
	
	var value = $('#lb-newprice').val();
	value = value.replace('$', '').replace(',', '').replace(' ', '');
	if(value !== '')
		hasValue = true;
	
	return hasValue;
}

function btnProgress(btnSelector) {
	var btn = $(btnSelector);
	btn.attr('disabled', 'disabled');
	if(typeof btn.attr('type') !== 'undefined' && btn.attr('type') == 'submit') {
		btn.attr('data-type', btn.attr('type'));
		btn.attr('type', 'button');
	}
	var icon = $(btnSelector + ' > i');
	if(icon.length) {
		btn.attr('data-iconclass', icon.attr('class'));
		icon.attr('class', 'fas fa-sync-alt fa-spin');
	}
	else
		btn.prepend('<i class="fas fa-sync-alt fa-spin"></i> ');
}
function btnProgressRemove(btnSelector) {
	var btn = $(btnSelector);
	btn.removeAttr('disabled');
	if(typeof btn.attr('data-type') !== 'undefined');
		btn.attr('type', btn.attr('data-type'));
	 
	var icon = $(btnSelector + ' > i');
	
	var iconClass = btn.attr('data-iconclass');
	if(typeof iconClass !== 'undefined' && iconClass != null && iconClass.length > 0) {
		icon.attr('class', iconClass);
		btn.removeAttr('data-iconclass');
	}	
	else
		icon.remove();
}
function inputProgress(inputSelector) {
	inputProgress(inputSelector, true); 
}
function inputProgress(inputSelector, enableDisable) {
	var input = $(inputSelector);
	if(enableDisable)
		input.attr('disabled', 'disabled');

	input.before('<span class="far fa-sync-alt fa-spin right-progress"></span>');
}
function inputProgressRemove(inputSelector) {
	inputProgressRemove(inputSelector, true); 
}
function inputProgressRemove(inputSelector, enableDisable) {
	var input = $(inputSelector);
	if(enableDisable)
		input.removeAttr('disabled');

	var icon = input.parent().find("span.right-progress");
	if(icon.length)
		icon.remove();
}

//driver
function getAuthorizedData(responseJson){
	try {
		if(responseJson == null || responseJson.length == 0)
			return '';
		
        var data = jQuery.parseJSON(responseJson);
        if(data == null)
        	return '';
        
        if (typeof data._authError !== 'undefined' && data._authError) {
        	var url = window.location.pathname+window.location.search;//window.location;
        	url = encodeURIComponent(url);
        	document.location = data._authErrorUrl + "?url=" + url;
        	return null;
        }
        
        return data;
	}
	catch(ex) {
	}
	return '';
}
function go(url) {
	window.location.href=url;
}
function goTab(url) {
	window.open(url, '_blank');
}

function getSelectValue(selectId)
{
	var arr = $(selectId).val();
	if(arr == null)
		arr = [];
	if(!Array.isArray(arr))
		return arr;

	return getValueForAjax(arr);
}
function getValueForAjax(arr)
{
	var res = "";
	for(var i=0; i< arr.length; i++) {
		res += arr[i];
		if(i != arr.length-1)
			res+=','
	}
	return res;
}
function getValueForSelect(val)
{
	var arr = [];
	if(val == null || val.length == 0)
		return arr;
	
	arr = val.split(',');
	return arr;
}


$.fn.enterKey = function (fnc) {
    return this.each(function () {
        $(this).keypress(function (ev) {
            var keycode = (ev.keyCode ? ev.keyCode : ev.which);
            if (keycode == '13') {
                fnc.call(this, ev);
                
                if($(this).attr('no-submit') != 'undefined' && $(this).attr('no-submit') == 'true') {
	                ev.preventDefault();
	                return false;
                }
                return true;
            }
        })
    })
}

function blockElement(control, time) {
    $(control).block({
        message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
        timeout: time,
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
}
function unblockElement(control) {
    $(control).unblock();
}
function blockElementNoSpin(control, time) {
    $(control).block({
        message: '',
        timeout: time,
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.4,
            cursor: 'arrow'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
}

function limitText(field, maxChar){
    var ref = $(field),
        val = ref.val();
    if ( val.length >= maxChar ){
        ref.val(function() {
            console.log(val.substr(0, maxChar))
            return val.substr(0, maxChar);       
        });
    }
}
function enableAndFocus(ctrl) {
	if (ctrl.hasAttribute('readonly')) {
		ctrl.removeAttribute('readonly');
	    // fix for mobile safari to show virtual keyboard
	    ctrl.blur();    
	    ctrl.focus();  
	}
}

var _clickTime_action = 0;
function isClickReady() {
	var cur = new Date().getTime();
    if (cur - _clickTime_action < 1000)
        return false;

    _clickTime_action = cur;

    return true;
}

function openInNewTab(url, isFocus) {
  var win = window.open(url, '_blank');
  if(isFocus)
	  win.focus();
}

function blockPage() {
    $.blockUI({
        message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
        timeout: 0, //unblock after 2 seconds
        overlayCSS: {
            backgroundColor: '#FFF',
            opacity: 0.5,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
}
function unblockPage() {
	 $.unblockUI();
}

function paymentVerificationDialog_show(threeDSecureUrl, closeHandler) {
	var content = '<div class="embed-responsive embed-responsive-16by9">';
	content += '<iframe class="embed-responsive-item" src="' + threeDSecureUrl + '" allowfullscreen></iframe>';
	content += '</div>';
	
	
	var dialog = $.confirm({
        theme: 'modern',
        closeIcon: false,
        type: 'blue',
        title: "Payment Verification",
        content: content,
        columnClass: 'col-md-6 jconfirm-box-no-padding',
        buttons: {
            close: function () {
	        	if (typeof closeHandler === "function")
	        		closeHandler();
            },
        }
    });
}

//google tag events
function gtag_log_event() {
	if(_gtag_event === '' || _gtag_url === '')
		return;

	if(_gtag_event === 'signed-up')
		gtag_report_conversion('AW-697956572/JoWoCJ2Co-kBENzx58wC', _gtag_url);
	if(_gtag_event === 'subscribed')
		gtag_report_conversion('AW-697956572/rhhNCLeMjf4BENzx58wC', _gtag_url);
}
function gtag_report_conversion(sendTo, url) {
	var callback = function() {
		if (typeof (url) != 'undefined') {
			//window.location = url;
		}
	};
	gtag('event', 'conversion', {
		'send_to' : sendTo,
		'event_callback' : callback
	});
}

//parsley error
function addParsleyError(field, msg) {
	if($(field).hasClass('parsley-error'))
		return;
	
	$(field).addClass('parsley-error');
	
	var id = field.replaceAll('#', '');
	var errorBlock = '<ul class="parsley-errors-list filled" id="' + id + 'Error">';
	errorBlock += '<li class="parsley-required">' + msg + '</li>';
	errorBlock += '</ul>';
	$(field).after(errorBlock);
}
function removeParsleyError(field) {
	$(field).removeClass('parsley-error');
	$(field + 'Error').remove();
}
function removeAllParsleyErrors() {
	$('input').removeClass('parsley-error');
	$('.parsley-errors-list').remove();
}


//checkbox
function doft_checkbox() {
	//radiobutton
	$(document).on('change', '.doft-choice-block input[type=radio].doft-radio', function(event) {
		var el = $(this);
		var elId = el.attr('id');
		var parentId = el.attr('data-parent-id');

		$("input[data-parent-id='" + parentId + "']").each(function() {
			var element = $(this);
			
			if(element.attr('id') === elId)
		        $(element).parent().addClass('checked');
	        else
		        $(element).parent().removeClass('checked');
	    });		
	});
	//radiobutton
	$(document).on('change', '.doft-choice-block input[type=checkbox].doft-checkbox', function(event) {
		var el = $(this);
		
		if(el.is(":checked")) {
	        $(el).parent().addClass('checked');
		}
		else {
	        $(el).parent().removeClass('checked');
		}
	});
}
