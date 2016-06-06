/**
 * Last Update:2012-7-3
 */
function gid(id)
{
	return document.getElementById(id);
}

$.extend(ec.form.validator.defaults ,{
	errorClass : "error",
	autoFocus : false,
	errorFunction:function(obj , options){
		var css = "icon-error",
			msg = options.msg[options.type] || options.msg["default"];
		switch(options.type){
			case "require":
				css = "icon-warn";
				break;
		}
		
		$(options.msg_ct).html("<span class='vam "+css+"'>"+msg+"</span>");
		if(options.autoFocus)obj.focus();
	},
	successFunction:function(obj , options){
		$(options.msg_ct).html("<span class='vam icon-ok'>&nbsp;</span>");
	}
});
