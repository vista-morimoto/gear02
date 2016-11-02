// --------------------------------------------------------------------
// Author  : mashimonator
// Create  : 2009/09/03
// Update  : 2009/09/14
// Description : 画像が指定した最大幅を超える場合は縮小して表示する
// --------------------------------------------------------------------

var imageSizeFix = {

	//-----------------------------------------
	// 設定値
	//-----------------------------------------
	maxWidth : 650,
	dynamicSwitch : false,
	useClListener : false,
	targetClass : 'sizefix',

	//-----------------------------------------
	// 画像リサイズ処理
	//-----------------------------------------
	fix : function() {
		var elm = imageSizeFix.getTargetElements( 'img', imageSizeFix.targetClass );
		var len = elm.length;
		for (var i = 0; i < len; i++) {
			var img = imageSizeFix.getOriginalSize( elm[i] );
			if ( imageSizeFix.dynamicSwitch && elm[i].width && elm[i].width != '' ) {
				// 最大幅をhtml内のwidthから取得
				imageSizeFix.maxWidth =  +elm[i].width;
			}
			if ( img.width > imageSizeFix.maxWidth ) {
				// 最大幅を超えている場合はリサイズ
				imageSizeFix.removeSize( elm[i] );
				elm[i].setAttribute( 'width', imageSizeFix.maxWidth );
			} else {
				// 最大幅を超えていない場合は元画像サイズで表示
				imageSizeFix.removeSize( elm[i] );
			}
		}
	},

	//-----------------------------------------
	// Safari判定
	//-----------------------------------------
	isSafari : function() {
		Saf=/a/.__proto__=='//';
		if ( Saf ) {
			return true;
		} else {
			return false;
		}
	},

	//-----------------------------------------
	// GoogleChrome判定
	//-----------------------------------------
	isChrome : function() {
		Chr=/source/.test((/a/.toString+''));
		if ( Chr ) {
			return true;
		} else {
			return false;
		}
	},

	//-----------------------------------------
	// img要素のサイズ指定を削除する
	//-----------------------------------------
	removeSize : function( image ) {
		if ( image.width && image.width != '' ) {
			image.removeAttribute('width');
		}
		if ( image.height && image.height != '' ) {
			image.removeAttribute('height');
		}
	},

	//-----------------------------------------
	// 画像の本来のサイズを取得する
	//-----------------------------------------
	getOriginalSize : function( image ) {
		var run, mem, w, h, key = 'actual';
		// for Firefox, Safari, Google Chrome
		if ( 'naturalWidth' in image) {
			return { width:image.naturalWidth, height:image.naturalHeight };
		}
		// HTMLImageElement
		if ( 'src' in image ) {
			if ( image[key] && image[key].src === image.src ) {
				return image[key];
			}
			if ( document.uniqueID ) { 
				// for IE
				run = image.runtimeStyle;
				mem = { w:run.width, h:run.height }; // keep runtimeStyle
				run.width  = 'auto'; // override
				run.height = 'auto';
				w = image.width;
				h = image.height;
				run.width  = mem.w; // restore
				run.height = mem.h;
			} else {
				// for Opera and Other
				mem = { w:image.width, h:image.height }; // keep current style
				image.removeAttribute('width');
				image.removeAttribute('height');
				w = image.width;
				h = image.height;
				image.width  = mem.w; // restore
				image.height = mem.h;
			}
			return image[key] = { width:w, height:h, src:image.src };
		}
		// HTMLCanvasElement
		return { width:image.width, height:image.height };
	},

	//-----------------------------------------
	// ターゲットタグを取得する
	//-----------------------------------------
	getTargetElements : function( tag, cls ) {
		var elements = new Array();
		var targetElements = document.getElementsByTagName( tag.toUpperCase() );
		for (var i = 0; i < targetElements.length; i++) {
			if ( targetElements[i].className.match(cls) ) {
				elements[elements.length] = targetElements[i];
			}
		}
		return elements;
	},

	//-----------------------------------------
	// イベントに関数を付加する
	//-----------------------------------------
	addEvent : function( target, event, func ) {
		try {
			target.addEventListener(event, func, false);
		} catch (e) {
			target.attachEvent('on' + event, func);
		}
	}

}


// --------------------------------------------------------------------
// Author  : mashimonator
// Create  : 2009/07/22
// Update  : 2009/07/22
// Description : クロスブラウザでDOMContentLoadedのイベントリスナーを提供する
// --------------------------------------------------------------------
var clListener = {
	isAlreadyDetect : false,
	isAlreadyExec : false,
	funcList : [],
	//-----------------------------------------
	// DOMContentLoadedイベントで実行する関数を登録する
	//-----------------------------------------
	add : function( func ) {
		if ( clListener.isAlreadyExec ) {
			func.call();
		} else {
			clListener.funcList.push( function(){ return func.call(); } );
		}
	},
	//-----------------------------------------
	// DOMContentLoadedイベントを検知する
	//-----------------------------------------
	detectEvent : function() {
		// check
		if ( clListener.isAlreadyDetect ) {
			return;
		} else {
			clListener.isAlreadyDetect = true;
		}
		// detect
		if ( document.addEventListener ) {
			// for Mozilla, Opera and webkit
			document.addEventListener('DOMContentLoaded', function(){
				document.removeEventListener('DOMContentLoaded', arguments.callee, false);
				clListener.exec();
			}, false);
		} else if ( document.attachEvent ) {
			// for IE(iframe)
			document.attachEvent('onreadystatechange', function(){
				if ( document.readyState === 'complete' ) {
					document.detachEvent('onreadystatechange', arguments.callee);
					clListener.exec();
				}
			});
			// for IE
			if ( document.documentElement.doScroll && window == window.top ) (function(){
				if ( clListener.isAlreadyExec ) return;
				try {
					document.documentElement.doScroll('left');
				} catch( error ) {
					setTimeout(arguments.callee, 0);
					return;
				}
				clListener.exec();
			})();
		}
	},
	//-----------------------------------------
	// 登録された関数を実行する
	//-----------------------------------------
	exec : function() {
		if ( !clListener.isAlreadyExec ) {
			clListener.isAlreadyExec = true;
			if ( clListener.funcList ) {
				var len = clListener.funcList.length;
				for (var i = 0; i < len; i++) {
					clListener.funcList[i].apply();
				}
				clListener.funcList = null;
			}
		}
	}
}


// exec imageSizeFix
if ( imageSizeFix.useClListener ) {
	// detect event
	clListener.detectEvent();
	if ( imageSizeFix.isSafari() || imageSizeFix.isChrome() ) {
		// for Safari, Google Chrome --onload
		imageSizeFix.addEvent( window, 'load',  imageSizeFix.fix );
	} else {
		// for IE, FireFox, Opera --DOMContentLoaded
		clListener.add( imageSizeFix.fix );
	}
} else {
	// for all browser --onload
	imageSizeFix.addEvent( window, 'load',  imageSizeFix.fix );
}
