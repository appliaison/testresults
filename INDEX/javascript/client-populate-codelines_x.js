function populate_codelines()
{
	
	var codeline = codeline;


	var rnd = Math.random();
	
	document.getElementById("accordion1_return").innerHTML ='';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		
		try{
			// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} catch (e){
			// Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} catch (e){
					// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}

		
		// Create a function that will receive data sent from the server
	ajaxRequest.onreadystatechange = function(){
		if(ajaxRequest.readyState == 4){
			
			
			document.getElementById("accordion1_return").innerHTML = ajaxRequest.responseText;
					$(function() {
			$("#accordion11").accordion({
				collapsible: true,
				active: true,
				autoHeight: false
			});
			$("#accordion12").accordion({
				collapsible: true,
				autoHeight: false
				
			});
			$("#accordion13").accordion({
				collapsible: true,
				autoHeight: false
			});
		
			});
		
		}
	}
	ajaxRequest.open("GET", "server/server-return-active-codelines.php?rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
}

