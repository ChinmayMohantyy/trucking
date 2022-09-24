var addr_ac_last = [];

$.fn.hereAutocomplete = function(options) {
	$(this).attr('ac_value', '');
	$(this).attr('ac_cur', '0');

	if(options.resultType == null)
		options.resultType = 'areas,postalCode'; 
	if(!options.filter == null)
		options.filter = ''; 
	
	var inputSelector = '#' + $(this).attr('id');
	var outChildClass = options.outControl.replace("#", "");
	
	//add events
	$(this).keyup(function(ev){
		doAutocomplete(ev, inputSelector, options.outControl, outChildClass, options);
	}).
	click(function() {
		var content = $(options.outControl).html();
		content = content.replace('\n', '').replace('\r', '').replace('\t', '').trim();
		if(content !== '')
			$(options.outControl).show();
	}).
	focusout(function() {
		setTimeout(function() {
			$(options.outControl).hide();
			$(this).attr('ac_cur', '0');
		}, 400);
    });

	$('body').on('click', "." + outChildClass, function(e) {
		$(inputSelector).val($(this).attr('data'));
		$(options.outControl).hide();
		$(this).attr('ac_cur', '0');

		if (options.onSelected)
			options.onSelected($(this).attr('data-id'));
	});
	
    $(this).on('input keydown', function(e) {
    	if (e.which !== 0 && !e.ctrlKey && !e.metaKey && !e.altKey) {
        	var keyCode = e.keyCode || e.which; 
        	if (keyCode == 9 || keyCode == 91)
        		return;
        	
            $(options.latResultControl).val('');
            $(options.lonResultControl).val('');
            
    		if (options.onKeyDown)
    			options.onKeyDown();
        }
    });
    $(this).on('input keyup', function(e) {
    	//enableDistFilter('#fromAddr', '#fromDist');

		if (options.onKeyUp)
			options.onKeyUp();
    });
    
	$(this).enterKey(function () {
		if($(options.outControl + ':hidden').length == 0) {
			var locationId = '';
			var ac_cur = parseInt($(inputSelector).attr('ac_cur'));
			var item = null;
			if(ac_cur == 0)
				item = $('.' + outChildClass).first();
			else 
				item = $("." + outChildClass + ':nth-child(' + ac_cur + ')');

			if(item != null) {
				var txt = item.attr('data');
				if (typeof txt === 'undefined' || !txt || txt.length == 0) {
					$(options.outControl).hide();
					if(options.onDoubleEnterPress)
						options.onDoubleEnterPress();
					return;
				}
				$(inputSelector).val(txt);
				locationId = item.attr('data-id');
			}
				
			$(options.outControl).hide();

			if (options.onEnterPress)
				options.onEnterPress(locationId);
			
			return;
		}
		$(options.outControl).hide();

		if (options.onDoubleEnterPress)
			options.onDoubleEnterPress();
		return;
	});
		
	return this;
}

var autocompleteRequest = null;
function doAutocomplete(ev, control, outCtrl, outChildClass, options) {
    var keycode = (ev.keyCode ? ev.keyCode : ev.which);
    if (keycode == '13')
    	return;

    if (keycode == '38') //UP
    {
    	var ac_cur = parseInt($(control).attr('ac_cur'));
    	ac_cur--;
    	ac_cur = acNavigate(control, outCtrl, outChildClass, ac_cur, $(control).attr('ac_value'));
    	$(control).attr('ac_cur', ac_cur);
    	
    	return;
    }
    if (keycode == '40') //DOWN
    {
    	var ac_cur = parseInt($(control).attr('ac_cur'));
    	ac_cur++;
    	ac_cur = acNavigate(control, outCtrl, outChildClass, ac_cur, $(control).attr('ac_value'));
    	$(control).attr('ac_cur', ac_cur);

    	return;
    }
    
	var query = $(control).val();

    var addrLast = addr_ac_last[control];
    if(typeof addrLast === 'undefined' || addrLast !== query) {
	    if(options.resultSelectorPrefix !== 'undefined') {
			$(options.resultSelectorPrefix + 'City').val('');
			$(options.resultSelectorPrefix + 'State').val('');
			$(options.resultSelectorPrefix + 'Country').val('');
			$(options.resultSelectorPrefix + 'Zip').val('');
			$(options.resultSelectorPrefix + 'AddrLat').val('');
			$(options.resultSelectorPrefix + 'AddrLon').val('');
			$(options.resultSelectorPrefix + 'Street').val('');
			$(options.resultSelectorPrefix + 'HouseNumber').val('');
			$(options.resultSelectorPrefix + 'IsChanged').val('');
		}
	}	
	addr_ac_last[control] = query;

	if(query.length == 0)
		return;
	
	if(query == $(control).attr('ac_value'))
		return;

	//Do autocomplete
	
	$(control).attr('ac_value', query);
	
	var isNum = /^\d+$/.test(query);

	if(typeof autocompleteRequest !== 'undefined' && autocompleteRequest != null)
		autocompleteRequest.abort();
	
	autocompleteRequest = $.get('/ajax/autocomplete-address', 
			{ 
				query : query,
				resultType: options.resultType,
				filter: options.filter
			}, 
			function(responseJson) {
				autocompleteRequest = null;
				
				var data =  jQuery.parseJSON(responseJson);
				var sArr = data.result;

				if(sArr == null || sArr.length == 0) {
					$(outCtrl).hide();
					return;
				}

				$(control).attr('ac_cur', '0');

				var res = '';
				for(var i=0; i< sArr.length; i++) {
					var obj = sArr[i];
					
					var resItem = '<div class="ac-item ' + outChildClass + '" data="' + obj.address + '" title="' + obj.address + '" data-id="' + obj.locationId + '"><span class="ac-icon ac-icon-marker"><i class="fa fa-map-pin"></i></span>';
					resItem += '<span class="ac-item-query">' + obj.autocompleteLine1 + '</span>';
					resItem += '<span>' + obj.autocompleteLine2 + '</span></div>';
					
					res += resItem;
				}
				
				$(outCtrl).html(res);
				$(outCtrl).show();
			}
	);
}
function acNavigate(control, outControl, outChildClass, index, defText){
	if($(outControl + ':hidden').length != 0)
		return;
	
	var childs = $(outControl).children();
	if(childs.length == 0)
		return index;
	
	childs.each(function () {
		$(this).removeClass('active');
	});
	
	if(index < 0)
		index = childs.length;
	if(index < 1 || index > childs.length)
	{
		$(control).val(defText);
		return 0;
	}
	
	var ctrl = $("." + outChildClass + ':nth-child(' + index + ')');
	ctrl.addClass('active');

	$(control).val(ctrl.attr('data'));

	return index;
}
function getCoordinates(locationId, latSelector, lonSelector, citySelector, stateSelector, countrySelector, zipSelector, streetSelector, houseNumberSelector) {
	return getCoordinates(locationId, latSelector, lonSelector, citySelector, stateSelector, countrySelector, zipSelector, streetSelector, houseNumberSelector, "");
}
function getCoordinates(locationId, latSelector, lonSelector, citySelector, stateSelector, countrySelector, zipSelector, streetSelector, houseNumberSelector, prefix) {
	if(locationId == null || locationId.length == 0) {
		$('#dist').val('0');
		return;
	}
	
	$.get('/ajax/get-coordinates', 
			{ 
				locationId : locationId
			}, 
			function(responseJson) {
				var data = jQuery.parseJSON(responseJson);
				var resp = data.response;
				
				if(resp == null)
					return;

				var resp1 = jQuery.parseJSON(resp);
				var response = resp1.response;

				if(response == null || response.view == null || response.view.length == 0 || 
						response.view[0].result.length == 0 || response.view[0].result[0].location == null)
				{
					$(latSelector).val('');
					$(lonSelector).val('');
					if (typeof getCoordinates_complete === "function")
						getCoordinates_complete(prefix);
					return;
				}
				
				var location = response.view[0].result[0].location;

				var lat = location.displayPosition.latitude;
				var lon = location.displayPosition.longitude;
				var city = location.address.city;
				var state = location.address.state;
				var country = location.address.country;
				var zip = location.address.postalCode;
				var street = location.address.street;
				var houseNumber = location.address.houseNumber;

				if(latSelector)
					$(latSelector).val(lat);
				if(lonSelector)
					$(lonSelector).val(lon);
				if(citySelector)
					$(citySelector).val(city);
				if(stateSelector)
					$(stateSelector).val(state);
				if(countrySelector)
					$(countrySelector).val(country);
				if(zipSelector)
					$(zipSelector).val(zip);
				if(streetSelector)
					$(streetSelector).val(street);
				if(houseNumberSelector)
					$(houseNumberSelector).val(houseNumber);
				
				if (typeof getCoordinates_complete === "function")
					getCoordinates_complete(prefix);
			}
	);
}