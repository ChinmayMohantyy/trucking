$(document).ready(function() {
	initParsley();
	initInputMasks();

	var eq = getValueForSelect($('#tt').val());
	$('#truckType').selectpicker('val', eq);

	$("#truckType").change(function () {
		$('#eq-errors').hide();
		$('button[data-id="truckType"]').removeClass('parsley-error');
	});
	
	$("#minDist").change(function () {
		checkMinMaxDistance();
	});
	$("#maxDist").change(function () {
		checkMinMaxDistance();
	});
	$( "#puAddr" ).keyup(function() {
		checkOrigin(false);
	});

	$('#puAddr').blur(function (e) {
		if($('#puAddr').val() == '') {
			$('#puCity').val('');
			$('#puState').val('');
			$('#puCountry').val('');
			$('#puZip').val('');
			$('#puAddrLat').val('');
			$('#puAddrLon').val('');
		}
		
		calculateDistance();
	});
	$('#doAddr').blur(function (e) {
		if($('#doAddr').val() == '') {
			$('#doCity').val('');
			$('#doState').val('');
			$('#doCountry').val('');
			$('#doZip').val('');
			$('#doAddrLat').val('');
			$('#doAddrLon').val('');
		}
		
		calculateDistance();
	});
	
	initLanePointControl(0, 'pu', 'areas,postalCode', 'country');
	initLanePointControl(1, 'do', 'areas,postalCode', '');


	$('#loadSizeList a').click(function (e) {
		var value = $(e.target).html();
		var sz = $(e.target).attr('data-id');
		$('#loadSizeBtn').html(value);
		$('#loadSize').val(sz);
	});

	$('.postAndNextBtn').click(function() {
		$('#action').val('postNext');
		$('#form').submit();
	});
	$('.postCloseBtn').click(function() {
		$('#action').val('postClose');
		$('#form').submit();
	});
	
	var dateControl = $('#availDate');
	var dateMin = moment().startOf('day');
	var date = null;

	var dateVal = dateControl.val();
	if(dateVal != null && dateVal.length > 0)
		date = moment(dateVal, "MM/DD/YY");

	$('#availDate').datetimepicker({
    	format: 'MM/DD/YY',
    	showClear:true,
    	minDate:dateMin,
    	defaultDate:date
    });
	
	initTakeContacts();
	initTags();
	initDoStates();
	
	//fix for parsley
	var index = 0;
	$('input[type=checkbox]').each(function() {
		$(this).attr('id', 'ch_fix_' + index++);
	});
	
	$('#refNum').focus();
});
function initInputMasks() {
	$('.weight-inputmask').inputmask({ 'alias': 'numeric' , 'suffix': ' lbs', 'groupSeparator': ',', 'autoGroup': true, 'placeholder': '', 'undoOnEscape': false });
	$('.weight-inputmask').focusout(function() {
		var value = $(this).val();
		value = value.replace('lbs', '').replace(',', '').replace(' ', '');
		if(value == '')
			$(this).val('');
	});

	$('.length-inputmask').inputmask({ 'alias': 'numeric' , 'suffix': ' ft', 'groupSeparator': ',', 'autoGroup': true, 'placeholder': '', 'undoOnEscape': false });
	$('.length-inputmask').focusout(function() {
		var value = $(this).val();
		value = value.replace('ft', '').replace(',', '').replace(' ', '');
		if(value == '')
			$(this).val('');
	});
	
	$('.rate-inputmask').inputmask({ 'alias': 'numeric' , 'prefix': '$ ', 'autoGroup': true, 'placeholder': '', 'digits':'2', 'digitsOptional':'false', 'undoOnEscape': false });
	$('.rate-inputmask').focusout(function() {
		var value = $(this).val();
		value = value.replace('$', '').replace(',', '').replace(' ', '');
		if(value == '')
			$(this).val('');
	});

	$('.distance-inputmask').inputmask({ 'alias': 'numeric' , 'suffix': ' mi', 'groupSeparator': ',', 'autoGroup': true, 'placeholder': '', 'undoOnEscape': false });
	$('.distance-inputmask').focusout(function() {
		var value = $(this).val();
		value = value.replace('mi', '').replace(',', '').replace(' ', '');
		if(value == '')
			$(this).val('');
	});
}
function initParsley() {
	$('#form').parsley()
	.on('form:submit', function() {
		var tt = getSelectValue('#truckType');
		$('#tt').val(tt);
		
		if(!checkEquipment()) {
			return false;
		}
		if(!checkOrigin(true)) {
			return false;
		}
		if(!checkMinMaxDistance()) {
			return false;
		}

		var arr = $("#descTag").tagsinput('items');
		var desc = '';
		for(var i=0; i< arr.length; i++) {
			desc += arr[i];
			if(i < arr.length - 1)
				desc += '@@@';
		}
		$('#desc').val(desc);
		
		btnProgress('.postCloseBtn');
		
		blockForm();
	})
	.on('form:error', function() {
		checkEquipment();
//		checkOrigin();
		checkMinMaxDistance();
		$('.postAndNextBtn').removeAttr('disabled', 'disabled');
	});
}
// function checkEquipment() {
// 	$('#eq-errors').hide();
// 	$('button[data-id="truckType"]').removeClass('parsley-error');
	
// 	var eq = getSelectValue('#truckType');
// 	if(eq === '') {
// 		$('#eq-errors').show();
// 		$('button[data-id="truckType"]').addClass('parsley-error');
// 		setTimeout(function () {
// 			$([document.documentElement, document.body]).animate({
// 		        scrollTop: $('button[data-id="truckType"]').offset().top
// 		    }, 200);
// 		}, slow);

// 		return false;
// 	}
// 	return true;
// }
function initTakeContacts(){ 
	$('.take-contacts').click(function() {
		btnProgress('.take-contacts');
		blockContacts();

		$.post(_getTakeContactsAjaxUrl, 
				{ 
				}, 
				function(responseJson) {
			try{
				var data = getAuthorizedData(responseJson);
				if(data == null)
					return;

				btnProgressRemove('.take-contacts');
				unblockContacts();

				$('#contName').val(data.name);
				$('#contPhone').val(data.phone);
				$('#contEmail').val(data.email);
			}
			catch(err){
				console.debug("Exception", err);
			}
		});
	});
}

function blockForm() {
	var block_ele = $('#form');
    $(block_ele).block({
        message: '<div class="ft-refresh-cw icon-spin font-medium-2"></div>',
        timeout: 0,
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.6,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
}
function blockContacts() {
	var block_ele = $('#contacts');
    $(block_ele).block({
        message: '',
        timeout: 0,
        overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.6,
            cursor: 'wait'
        },
        css: {
            border: 0,
            padding: 0,
            backgroundColor: 'transparent'
        }
    });
}
function unblockContacts() {
	var block_ele = $('#contacts');
    $(block_ele).unblock();
}

function initTags() {
	var defaultOptions = {
	    trimValue: true,
	    delimiter: '@@@',
	    confirmKeys: [13],
	    allowDuplicates: false
    };
	
	$('#descTag').tagsinput(defaultOptions);
	
	
	$('#tags-zone').on('click', function () {
		$('#tags-zone input').focus();
	});
	
	$('#descTag').on('itemAdded', function(event) {
		tagPlaceholder();
	});
	$('#descTag').on('itemRemoved', function(event) {
		tagPlaceholder();
	});
}
function tagPlaceholder() {
	var arr = $("#descTag").tagsinput('items');
	if(arr.length == 0) {
		$('#tags-zone .bootstrap-tagsinput input').attr('placeholder', 'A short description');
		$('#tags-zone .bootstrap-tagsinput input').attr('style', 'width: 200px');
	}
	else {
		$('#tags-zone .bootstrap-tagsinput input').removeAttr('placeholder');
		$('#tags-zone .bootstrap-tagsinput input').removeAttr('style');
	}
}


function initLanePointControl(index, prefix, resultType, filter) {
	var input = $('#' + prefix + 'Addr');
	if(input.length == 0)
		return false;
	
	$('#' + prefix + 'Addr').hereAutocomplete({
		outControl: '#' + prefix + 'AC',
		maxResults: 5,
		latResultControl: '#' + prefix + 'AddrLat',
		lonResultControl: '#' + prefix + 'AddrLon',
		resultType: resultType,
		resultSelectorPrefix: '#' + prefix,
		filter: filter,
		onKeyDown: function () {
			//calculateDistance();
			$('#dist').val('');
		},
		onSelected: function (locationId) {
			getCoordinates(locationId, '#' + prefix + 'AddrLat', '#' + prefix + 'AddrLon', '#' + prefix + 'City', '#' + prefix + 'State', '#' + prefix + 'Country', '#' + prefix + 'Zip', null, null);
		},
		onEnterPress: function (locationId) {
			getCoordinates(locationId, '#' + prefix + 'AddrLat', '#' + prefix + 'AddrLon', '#' + prefix + 'City', '#' + prefix + 'State', '#' + prefix + 'Country', '#' + prefix + 'Zip', null, null);
		}
	});

	return true;
}

function getCoordinates_complete(prefix) {
	calculateDistance();
}

function calculateDistance() {
	var latPu = null;
	var lonPu = null;
	var latDo = null;
	var lonDo = null;
	
	var isError = false;
	try {
		$('#dist').val('0');
		
		//check exact addresses
		var puAddr = $('#puAddr').val();
		var puCity = $('#puCity').val();
		var puZip = $('#puZip').val();
		var doAddr = $('#doAddr').val();
		var doCity = $('#doCity').val();
		var doZip = $('#doZip').val();
		if( puAddr == '' || doAddr == '' || puAddr.indexOf(";") >= 0 || doAddr.indexOf(";") >= 0 ) {
//		if( (puCity == null || puCity.length == 0) || (doCity == null || doCity.length == 0) ) {
			$('#distBlock').hide();
			$('#minmaxBlock').show();
			$('#dist').val('');
		}
		else {
			$('#distBlock').show();
			$('#minmaxBlock').hide();
			$('#minDist').val('');
			$('#maxDist').val('');
		}
		
		var val = $('#puAddrLat').val();
		if(val == '')
			isError = true;
		else
			latPu = parseFloat(val);
		
		val = $('#puAddrLon').val();
		if(val == '')
			isError = true;
		else
			lonPu = parseFloat(val);
		
		val = $('#doAddrLat').val();
		if(val == '')
			isError = true;
		else
			latDo = parseFloat(val);
		
		val = $('#doAddrLon').val();
		if(val == '')
			isError = true;
		else
			lonDo = parseFloat(val);
	}
	catch(ex){}
	
	if(isError || latPu == null || lonPu == null || latDo == null || lonDo == null) {
		$('#dist').val('0');
		return;
	}
	
	inputProgressRemove('#dist', false);
	inputProgress('#dist', false);
	
	$.get(_getDistanceAjaxUrl, { 
			lat1 : latPu, lon1 : lonPu, lat2 : latDo, lon2 : lonDo
		}, 
	function(responseJson) {
		try{
			inputProgressRemove('#dist', false);

	        var data =  jQuery.parseJSON(responseJson);
	        var distance = data.distance;
	        
	        if(distance == null) {
	    		$('#dist').val('0');
	    		return;
	        }
	        	
    		$('#dist').val(distance);
		}
		catch(err){
			isInSearch = false;
		}
	 });
}


//states
function initDoStates() {
    $('#do-states-ms').multiselect({
    	buttonClass: 'btn btn-default',
        enableClickableOptGroups: true,
        enableCollapsibleOptGroups: true,
        enableFiltering: true,
        includeResetOption: true,
        collapseOptGroupsByDefault: true,
        enableHTML: true,
        enableCaseInsensitiveFiltering: true,
        templates: {
            button: '<button id="do-states-btn" type="button" class="btn btn-default btn-st" title="Search by state"  data-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-double-down"></i></button>'
        },
        onChange: function(option, checked, select) {
        	setStatesToAddress('#do-states-ms', '#doAddr');
        	
    		$('#doCity').val('');
    		$('#doState').val('');
    		$('#doCountry').val('');
    		$('#doZip').val('');
    		$('#doAddrLat').val('');
    		$('#doAddrLon').val('');
        	calculateDistance();
        }
    });
    
    $('#do-states-btn').click(function() {
        setStatesFromAddress('#do-states-ms', '#doAddr');
        hideSelectUnchecked('#do-states-ms');
   	});
    $('#do-states-btn + ul .btn-block').click(function() {
    	$('#doAddr').val('');
   	});
}
function setStatesFromAddress(select, input) {
	var str = $(input).val();
	var sel = $(select);
	
	sel.multiselect('deselectAll', false);
	
	if(str.indexOf(";") >= 0)
	{
		str = str.toUpperCase();
		str = str.trim();
		var selArr = str.split(';');
		for(var i=0; i< selArr.length; i++)
		{
			try{
				var value = selArr[i];
				value = value.trim();
				if(value != '')
					sel.multiselect('select', value);
			}	
			catch(ex){}
		}
	}
}
function hideSelectUnchecked(select)
{
	var grArr = [];
	var opArr = [];
	
	var grIndex = 0;
	
	//get all goups
	var selectUl = $(select + ' + div .multiselect-container');
	var liList = selectUl.children();
	for(var i=2; i< liList.length; i++)
	{
		var li = liList[i];
		
		if($(li).hasClass('multiselect-group'))
		{
			grArr[grIndex] = li;
			opArr[grIndex] = [];
			grIndex++;
			continue;		
		}
		else
		{
			opArr[grIndex-1][opArr[grIndex-1].length] = li;
		}
	}
	
	//if one child is checked = open group (display all child li)
	for(var i=0; i < grArr.length; i++)
	{
		var openedCount = 0;
		for(var j=0; j < opArr[i].length; j++)
		{
			var li = opArr[i][j];
			if($(li).hasClass('active'))
				openedCount++;
		}
		var showGroup = false;
		if(openedCount > 0 && openedCount != opArr[i].length)
			showGroup = true;
		for(var j=0; j < opArr[i].length; j++)
		{
			var li = opArr[i][j];
			if(showGroup)
				$(li).css('display', 'list-item');
			else
				$(li).css('display', 'none');
		}
	}
}
function setStatesToAddress(select, input, dist) {
	var selArr = [];
	
	var selectedOptions = $(select + ' option:selected');
	$.each(selectedOptions, function( index, item ) {
		selArr[selArr.length] = item.value;
	});
	
	var str = '';
	for(var i=0; i< selArr.length; i++)
		str += selArr[i] + '; ';
	
	$(input).val(str);

	$(dist).prop('disabled', str.indexOf(";") >= 0);
	$(dist).selectpicker('refresh');
}
function checkMinMaxDistance() {
	var minDistS = $('#minDist').val();
	var maxDistS = $('#maxDist').val();

	$('#dist-errors').hide();
	
	if(minDistS == '' || maxDistS == '')
		return true;

	minDistS = minDistS.replace('mi', '').replace(',', '').replace(' ', '');
	maxDistS = maxDistS.replace('mi', '').replace(',', '').replace(' ', '');

	var minDist = parseInt(minDistS);
	var maxDist = parseInt(maxDistS);

	if(maxDist <= minDist) {
		$('#dist-errors').show();
		setTimeout(function () {
			$([document.documentElement, document.body]).animate({
		        scrollTop: $('#minmaxBlock').offset().top
		    }, 200);
		}, 100);
		return false;
	}
	return true;
}
function checkOrigin(isScroll) {
	var origin = $('#puAddr').val();

	$('#puAddr-errors').hide();
	$('#puAddr').removeClass('parsley-error');
	
	origin = origin.trim();

	if(origin == '')
		return true;
	
	if(origin.indexOf(';') == 0)
		origin = origin.substring(1, origin.length);
	if(origin.indexOf(';') == origin.length-1)
		origin = origin.substring(0, origin.length - 1);
	
	var oArr = origin.split(';');
	
	if(oArr.length > 1) {
		$('#puAddr-errors').html('<ul class="parsley-errors-list filled" id="parsley-id-13"><li class="parsley-required">Origin cannot contain multiple states.</li></ul>');
		$('#puAddr-errors').show();
		$('#puAddr').addClass('parsley-error');

		if(isScroll) {
			setTimeout(function () {
				$([document.documentElement, document.body]).animate({
			        scrollTop: $('label[for="puAddr"]').offset().top}, 200);
			}, slow);
		}
		return false;
	}
	return true;
}