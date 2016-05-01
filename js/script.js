(function ($) {
	var strID='chessSlider',sx=false,so=null;
	
	var onMouseDown=function(e){
		e.stopPropagation();
		e.preventDefault();
		if(e.button===0){
			sx=e.offsetX;
			so=$(this);
		};
		return false;
	};
	var onMouseUp=function(e){
		e.stopPropagation();
		e.preventDefault();
		if (so){
			var parent = so.data('parent'), data = parent.data(strID),i,mindelta=999999,index=0;

			for(i=0;i<data.config.arx.length;++i){
				var delta = Math.abs(data.config.arx[i] - so.position().left);
				if (delta < mindelta){
					mindelta=delta;
					index=i;
				}
			};
			parent.chessSlider('setValue',data.config.values[index]);
		};
		sx=false;
		so=null;
		return false;
	};
	var onMouseMove=function(e){
		e.stopPropagation();
		e.preventDefault();
		if (sx !== false){
			if(e.buttons>0){
				var newX = so.position().left - sx + e.offsetX;
				if (newX>0 && newX < so.data('parent').width()){
					so.css({left:newX+'px'});
				};
			}
			else{
				onMouseUp(e);
			};
		};
		return false;
	};
	var onClick=function(e){
		e.stopPropagation();
		e.preventDefault();
		var el=$(this);
		el.data('parent').chessSlider('setValue',el.text());
		return false;
	};
	var methods = {
		init: function (options) {
			var config = $.extend({
				values:[1,2],
				current:0,
				onChange:null,
				delta:100,
				scroll:null,
				arx:[]
			},options);
			return this.each(function () {
				var $this = $(this), data = $this.data(strID);
				if (!data) {
					config.delta = 100 / (config.values.length-1);
					var i,w,width=$this.width();
					$this.append('<div class="scale"></div>');
					for(i=config.values.length-1,w=100;i>=0;--i,w-=config.delta){
						var s=$('<span/>',{text:config.values[i],data:{parent:$this},click:onClick});
						$this.append($('<div/>',{class:'lb',css:{width:w+'%'}}).append(s));
						config.arx[i] = width*w/100;
					};
					if (config.current+1>config.values.length){
						config.current=config.values.length-1;
					}
					else if(config.current<0){
						config.current=0;
					}
					config.scroll=$('<div/>',{'class':'scroll',css:{left:(config.current*config.delta)+'%'},data:{'parent':$this}}).mousedown(onMouseDown).mouseup(onMouseUp).mousemove(onMouseMove).mouseleave(onMouseUp);
					$this.append(config.scroll);
					$(this).data(strID, {
						target: $this,
						config: config
					});
				}
			});
		},
		getValue: function ( ) {
			var $this = $(this), data = $this.data(strID);	
			if (data) {
				return data.values[data.current];
			}
		},
		setValue: function (value) { 
			var $this = $(this), data = $this.data(strID);	
			if (data) {
				var nValue = data.config.values.indexOf(parseInt(value));
				if (nValue>-1){
					data.config.current=nValue;
					data.config.scroll.css({left:(data.config.current*data.config.delta)+'%'});
				}
			}
		}
	};
	$.fn.chessSlider = function (method) {

		if (methods[method]) {
			return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
		} else if (typeof method === 'object' || !method) {
			return methods.init.apply(this, arguments);
		} else {
			$.error('Метод с именем ' + method + ' не существует для jQuery.chessSlide');
		}

	};

})(jQuery);

tab = {
	links: [],
	tabs: [],
	idx: [],
	curTab: null,
	curLink: null,
	cur: 0
};
tab.init = function () {
	var tabset = $('#info');
	tabset.find('h2').each(function (idx, el) {
		var elm = $(el).click(tab.onSelect);
		tab.links.push(elm);
		tab.idx[elm.attr('id')] = idx;
	});
	tabset.find('div').each(function (idx, el) {
		tab.tabs.push($(el));
	});
	tab.links[tab.cur].addClass('active');
	tab.tabs[tab.cur].addClass('active');
};
tab.indexOf = function (el) {

};
tab.onSelect = function (e) {
	e.preventDefault();
	e.stopPropagation();
	var lnk = $(this), id = tab.idx[lnk.attr('id')];
	if (id === tab.cur)
		return false;
	tab.links[tab.cur].removeClass('active');
	tab.tabs[tab.cur].removeClass('active');
	tab.cur = id;
	tab.links[tab.cur].addClass('active');
	tab.tabs[tab.cur].addClass('active');
	return false;
};

chess = {
	desk: null,
	abc: 'ABCDEFGHIJKLMNOP',
	config: {
		width: 8,
		height: 8
	}
};
chess.onLoad = function (option) {
	$.extend(chess.config, option);
	chess.desk = $('#desk');
	var hRuler1 = $('<div/>', {id: 'rulerTop', class: 'h-ruler'}), hRuler2 = $('<div/>', {id: 'rulerBottom', class: 'h-ruler'});
	var hRuler3 = $('<div/>', {id: 'rulerLeft', class: 'v-ruler'}), hRuler4 = $('<div/>', {id: 'rulerRight', class: 'v-ruler'});
	var x, y;
	for (x = 0; x < chess.config.width; ++x) {
		hRuler1.append($('<div/>', {text: chess.abc[x]}));
		hRuler2.append($('<div/>', {text: chess.abc[x]}));
	}
	;
	for (y = chess.config.height; y > 0; --y) {
		hRuler3.append($('<div/>', {text: y}));
		hRuler4.append($('<div/>', {text: y}));
	}
	;
	var deskin = $('<div/>', {id: 'deskin'}), i = 0;
	for (x = 0; x < chess.config.width; ++x) {
		for (y = chess.config.height; y > 0; --y) {
			var className = ((i % 2) ? 'dark' : 'light'), cell = $('<div/>', {class: 'cell ' + className});
			++i;
			deskin.append(cell);
		}
		;
		++i;
	};

	chess.desk.append(hRuler1).append(hRuler2).append(hRuler3).append(hRuler4).append(deskin);
};
chess.init = function () {

};

$(document).ready(function () {
	tab.init();
	chess.onLoad({});
	$('#players').chessSlider({values:[2,4]});
	$('#deskwidth').chessSlider({values:[8,10,12,16]});
	$('#deskheight').chessSlider({values:[8,10,12,16]});
});