$(document).ready(function(){
	$('.numeric').numeric({negative:false});
});

// numeric() function
(function(a){a.fn.numeric=function(b,c){if(typeof b==="boolean"){b={decimal:b}}b=b||{};if(typeof b.negative=="undefined")b.negative=true;var d=b.decimal===false?"":b.decimal||".";var e=b.negative===true?true:false;var c=typeof c=="function"?c:function(){};return this.data("numeric.decimal",d).data("numeric.negative",e).data("numeric.callback",c).keypress(a.fn.numeric.keypress).keyup(a.fn.numeric.keyup).blur(a.fn.numeric.blur)};a.fn.numeric.keypress=function(b){var c=a.data(this,"numeric.decimal");var d=a.data(this,"numeric.negative");var e=b.charCode?b.charCode:b.keyCode?b.keyCode:0;if(e==13&&this.nodeName.toLowerCase()=="input"){return true}else if(e==13){return false}var f=false;if(b.ctrlKey&&e==97||b.ctrlKey&&e==65)return true;if(b.ctrlKey&&e==120||b.ctrlKey&&e==88)return true;if(b.ctrlKey&&e==99||b.ctrlKey&&e==67)return true;if(b.ctrlKey&&e==122||b.ctrlKey&&e==90)return true;if(b.ctrlKey&&e==118||b.ctrlKey&&e==86||b.shiftKey&&e==45)return true;if(e<48||e>57){var g=a(this).val();if(g.indexOf("-")!=0&&d&&e==45&&(g.length==0||a.fn.getSelectionStart(this)==0))return true;if(c&&e==c.charCodeAt(0)&&g.indexOf(c)!=-1){f=false}if(e!=8&&e!=9&&e!=13&&e!=35&&e!=36&&e!=37&&e!=39&&e!=46){f=false}else{if(typeof b.charCode!="undefined"){if(b.keyCode==b.which&&b.which!=0){f=true;if(b.which==46)f=false}else if(b.keyCode!=0&&b.charCode==0&&b.which==0){f=true}}}if(c&&e==c.charCodeAt(0)){if(g.indexOf(c)==-1){f=true}else{f=false}}}else{f=true}return f};a.fn.numeric.keyup=function(b){var c=a(this).value;if(c&&c.length>0){var d=a.fn.getSelectionStart(this);var e=a.data(this,"numeric.decimal");var f=a.data(this,"numeric.negative");if(e!=""){var g=c.indexOf(e);if(g==0){this.value="0"+c}if(g==1&&c.charAt(0)=="-"){this.value="-0"+c.substring(1)}c=this.value}var h=[0,1,2,3,4,5,6,7,8,9,"-",e];var i=c.length;for(var j=i-1;j>=0;j--){var k=c.charAt(j);if(j!=0&&k=="-"){c=c.substring(0,j)+c.substring(j+1)}else if(j==0&&!f&&k=="-"){c=c.substring(1)}var l=false;for(var m=0;m<h.length;m++){if(k==h[m]){l=true;break}}if(!l||k==" "){c=c.substring(0,j)+c.substring(j+1)}}var n=c.indexOf(e);if(n>0){for(var j=i-1;j>n;j--){var k=c.charAt(j);if(k==e){c=c.substring(0,j)+c.substring(j+1)}}}this.value=c;a.fn.setSelection(this,d)}};a.fn.numeric.blur=function(){var b=a.data(this,"numeric.decimal");var c=a.data(this,"numeric.callback");var d=this.value;if(d!=""){var e=new RegExp("^\\d+$|\\d*"+b+"\\d+");if(!e.exec(d)){c.apply(this)}}};a.fn.removeNumeric=function(){return this.data("numeric.decimal",null).data("numeric.negative",null).data("numeric.callback",null).unbind("keypress",a.fn.numeric.keypress).unbind("blur",a.fn.numeric.blur)};a.fn.getSelectionStart=function(a){if(a.createTextRange){var b=document.selection.createRange().duplicate();b.moveEnd("character",a.value.length);if(b.text=="")return a.value.length;return a.value.lastIndexOf(b.text)}else return a.selectionStart};a.fn.setSelection=function(a,b){if(typeof b=="number")b=[b,b];if(b&&b.constructor==Array&&b.length==2){if(a.createTextRange){var c=a.createTextRange();c.collapse(true);c.moveStart("character",b[0]);c.moveEnd("character",b[1]);c.select()}else if(a.setSelectionRange){a.focus();a.setSelectionRange(b[0],b[1])}}}})(jQuery)