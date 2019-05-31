
jQuery.ajaxSetup({
    contentType  :"application/json",
    dataType  : "json",
});

window.API = {
	baseUrl : "https://asanovici.com/ip2019/api/",
	validateResponse : function(response){
		if(!response){
			console.log('expected parameter response');
			return false;
		}
		if(
			!typeof response === 'object' || 
			!response.hasOwnProperty('success') || 
			!response.hasOwnProperty('message') || 
			!response.hasOwnProperty('data') 
		){
			console.log('invalid response format');
			return false;
		}
		return true;
	}
}