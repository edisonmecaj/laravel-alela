function getAjax(path, post, func, type) {
	$.ajax({
		url: path,
		method: 'POST',
		data: post,
		dataType: type != undefined ? type : "html",
		success: function(response) {
			if (func != undefined) {
				func(response);
			}
		}
	});
}

function success(text, ms, func) {
	var alert = $("<div class='alert alert-success' style='z-index: 99999' role='alert'><center><a href='#' class='alert-link'>" + text + "</a></center></div>");
	$('body').append(alert);
	$(alert).css("position", "fixed");
	$(alert).css("width", "100%");
	$(alert).css("bottom", "0px");
	setTimeout(function() {
		$(alert).remove();
		if (func != undefined) {
			func();
		}
	}, ms);
}

function warning(text, ms, func) {
	var alert = $("<div class='alert alert-danger' style='z-index: 99999' role='alert'><center><a href='#' class='alert-link'>" + text + "</a></center></div>");
	$('body').append(alert);
	$(alert).css("position", "fixed");
	$(alert).css("width", "100%");
	$(alert).css("bottom", "0px");
	setTimeout(function() {
		$(alert).remove();
		if (func != undefined) {
			func();
		}
	}, ms);
}

function slideDown(selector, func){
	$(selector).slideDown("fast", function(){
		if(func != undefined){
			func();
		}
	});
}

function slideUp(selector, func){
	$(selector).slideUp("fast", function(){
		if(func != undefined){
			func();
		}
	});
}

function fadeIn(selector, func){
	$(selector).fadeIn("fast", function(){
		if(func != undefined){
			func();
		}
	});
}

function fadeOut(selector, func){
	$(selector).fadeOut("fast", function(){
		if(func != undefined){
			func();
		}
	});
}

function showLoading(){
	var loading = "<img class='loading-gif' src='images/loader.gif'/>";
	if($('.loading-gif').length == 0){
		$('body').append(loading);
	}
}

function hideLoading(){
	$(".loading-gif").remove();
}

function confirmModal(title, text, btn1, btn2, btn1Func, btn2Func, glob){
	var modal = $("<div class='modal fade' id='delModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>"
  	+"<div class='modal-dialog' role='document'>"
	 	+"<div class='modal-content'>"
			+"<div class='modal-header'>"
		  	+"<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>"
		  	+"<h4 class='modal-title' id='myModalLabel'>"+title+"</h4>"
			+"</div>"
			+"<div class='modal-body'>"
		  	+"<span>"+text+"</span>"
			+"</div>"
			+"<div class='modal-footer'>"
		  	+(btn1 != undefined || btn1 != null ? "<button type='button' class='my-modal-btn1 btn btn-success' data-dismiss='modal'>"+btn1+"</button>" : "")
		  	+(btn2 != undefined || btn2 != null ? "<button type='button' class='my-modal-btn2 btn btn-danger' data-dismiss='modal'>"+btn2+"</button>" : "")
			+"</div>"
	 	+"</div>"
  	+"</div>"
	+"</div>");
	$("body").append(modal);
	$(modal).modal("show");
	if(glob != undefined && glob != null){
		glob();
	}
	if(btn1Func != undefined || btn1Func != null){
		$(".my-modal-btn1").click(function(){
			btn1Func();
		});
	}
	
	if(btn2Func != undefined || btn2Func != null){
		$(".my-modal-btn2").click(function(){
			btn2Func();
		});
	}
	
	$(modal).on("hidden.bs.modal", function (e)
	{
		setTimeout(function(){ $(modal).remove(); }, 1000);
	});
}

function isNumber(input) {
    return !isNaN(input);
}

function decimalPlaces(num) {
  var match = (''+num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
  if (!match) { return 0; }
  return Math.max(0,(match[1] ? match[1].length : 0) - (match[2] ? +match[2] : 0));
}

var substringMatcher = function(strs) {
	return function findMatches(q, cb) {
		var matches, substringRegex;
		matches = [];
		substrRegex = new RegExp(q, 'i');
		$.each(strs, function(i, str) {
			if (substrRegex.test(str)) {
				matches.push(str);
			}
		});
		cb(matches);
	};
}

String.prototype.toProperCase = function () {
	return this.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
};

jQuery.fn.extend({
	numberInput: function(act) {
		$(this).keypress(function(e){
			var step = $(this).attr("step"); step = step == undefined ? 1 : step;
			var min = $(this).attr("min"); min = min == undefined ? 0 : min;
			var max = $(this).attr("max"); max = max == undefined ? 100 : max;
			switch((e.keyCode ? e.keyCode : e.which)){
				case 38: numUp(this); break; // up Arrow
				case 40: numDown(this); break; // down Arrow
			}
			function numUp(sel){
				var oldVal = $(sel).val();
				oldVal = oldVal == "" ? 0 : oldVal;
				var newVal = oldVal*1 + parseFloat(step);
				newVal = newVal.toFixed(decimalPlaces(step))*1;
				if(newVal <= max)
				{
					$(sel).val(newVal);
				}
				else if(oldVal < max && newVal > max)
				{
					$(sel).val(max);
				}
			}
			
			function numDown(sel){
				var oldVal = $(sel).val();
				oldVal = oldVal == "" ? 0 : oldVal;
				var newVal = oldVal - step;
				newVal = newVal.toFixed(decimalPlaces(step));
				if(newVal >= min)
				{
					$(sel).val(newVal);
				}
				else if(oldVal > min && newVal < min)
				{
					$(sel).val(min);
				}
			}
			
			if(act != undefined){
				act();
			}
		});
		
		$(this).keyup(function(){
			var val = $(this).val()*1;
			var step = $(this).attr("step"); step = step == undefined ? 1 : step;
			var min = $(this).attr("min"); min = min == undefined ? 0 : min;
			var max = $(this).attr("max"); max = max == undefined ? 100 : max;
			if(val < min)
			{
				$(this).val(min);
			}
			else if (val > max)
			{
				$(this).val(max);
			}
			if(act != undefined){
				act();
			}
		});
		
		$(this).change(function(){
			var val = $(this).val()*1;
			var step = $(this).attr("step"); step = step == undefined ? 1 : step;
			var min = $(this).attr("min"); min = min == undefined ? 0 : min;
			var max = $(this).attr("max"); max = max == undefined ? 100 : max;
			if(val < min || val == "")
			{
				$(this).val(min);
			}
			else if (val > max)
			{
				$(this).val(max);
			}
			if(act != undefined){
				act();
			}
		});
	}
});

$.extend(
{
    redirectPost: function(location, args)
    {
        var form = '';
        $.each( args, function( key, value ) {
            value = value.split('"').join('\"')
            form += '<input type="hidden" name="'+key+'" value="'+value+'">';
        });
        $('<form action="' + location + '" method="POST">' + form + '</form>').appendTo($(document.body)).submit();
    }
});

function refresh(){
	window.location = window.location;
}

$.fn.wrapInTag = function(opts) {

  var tag = opts.tag || 'strong'
    , words = opts.words || []
    , regex = RegExp(words.join('|'), 'gi') // case insensitive
    , replacement = '<'+ tag +'>$&</'+ tag +'>';

  return this.html(function() {
    return $(this).text().replace(regex, replacement);
  });
};

function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}