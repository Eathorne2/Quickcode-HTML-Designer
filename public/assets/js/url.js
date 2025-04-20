const url = {


	getParams: function() {

		let url = window.location.search;
	  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);
	  var obj = {};
	  if (queryString) {

	    queryString = queryString.split('#')[0];
	    var arr = queryString.split('&');

	    for (var i = 0; i < arr.length; i++) {
	      
	      var a = arr[i].split('=');
	      var paramName = a[0];
	      var paramValue = typeof (a[1]) === 'undefined' ? true : a[1];

	      paramName = paramName.toLowerCase();
	      if (typeof paramValue === 'string') paramValue = paramValue.toLowerCase();

	        if (!obj[paramName]) {
	          obj[paramName] = paramValue;
	        } else if (obj[paramName] && typeof obj[paramName] === 'string'){
	          obj[paramName] = [obj[paramName]];
	          obj[paramName].push(paramValue);
	        } else {
	          obj[paramName].push(paramValue);
	        }
	    }
	  }

	  return obj;
	},

	load_template: function(){

		//load template if its a template edit
		let slug = url.getParams().template;
		if(typeof slug != 'undefined')
		{
			let obj = {};
			obj.data_type = 'load_template';
			obj.slug = slug;

			IO.send_data(obj);
		}
	},

}


