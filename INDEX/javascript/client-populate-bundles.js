function populate_livepusher()
{
	
	var codeline_id = 0;


	var rnd = Math.random();
	
	//var return_div_name = "accordion" + codeline_id + "_return";
	
	var return_div_name = "clock";
	
	document.getElementById("accordion5_return").innerHTML ='';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-livepusher.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function populate_bundles_generic(codeline_id, type_id, iteration)
{
	
	var codeline_id = codeline_id;
	var type_id = type_id;
	var iteration = iteration;

	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	//the following line was messed up 
	// wtf
	//document.getElementById("accordion5_return").innerHTML ='';
	document.getElementById(return_div_name+'').innerHTML = '<img src="ajax-loader2.gif" />';
	//document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-bundles-generic.php?type_id="+type_id+"&codeline_id="+codeline_id+"&iteration="+iteration+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}
function populate_bundles_generic_unbounded(codeline_id, type_id)
{
	
	var codeline_id = codeline_id;
	var type_id = type_id;
	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	//the following line was messed up 
	// wtf
	//document.getElementById("accordion5_return").innerHTML ='';
	//document.getElementById(return_div_name+'').innerHTML = '';
	document.getElementById(return_div_name+'').innerHTML = '<img src="ajax-loader2.gif" />';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-bundles-generic-unbounded.php?type_id="+type_id+"&codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function populate_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	//the following line was messed up 
	// wtf
	//document.getElementById("accordion5_return").innerHTML ='';
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function populate_bundles_mvs(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-bundles-mvs.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 	
}


function populate_fermion_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-fermion-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function populate_simulator_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-simulator-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function populate_desktop_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-desktop-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function populate_macdesktop_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-desktop-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}
function populate_blackberrysmallbusinessserver_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-blackberrysmallbusinessserver-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}
function populate_bes_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-bes-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}
function populate_signingauthority_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-signingauthority-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}
function populate_mds_bundles(codeline_id)
{
	
	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-mds-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function populate_headrev_buildtype_bundles(codeline_id)
{

	var codeline_id = codeline_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + codeline_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	//document.getElementById(return_div_name+'').innerHTML = '';
	document.getElementById(return_div_name+'').innerHTML = '<img src="ajax-loader2.gif" />';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ codeline_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-headrev-buildtype-bundles.php?codeline_id="+codeline_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function populate_headrev_handheld_bundles(handheld_id)
{
	
	var handheld_id = handheld_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + handheld_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	//document.getElementById(return_div_name+'').innerHTML = '';
	document.getElementById(return_div_name+'').innerHTML = '<img src="ajax-loader2.gif" />';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ handheld_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accordion12").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-headrev-handheld-bundles.php?handheld_id="+handheld_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}
function populate_handheld_handheld_bundles(handheld_id)
{
	
	var handheld_id = handheld_id;


	var rnd = Math.random();
	
	var return_div_name = "accordion" + handheld_id + "_return";
	
	//var return_div_name = "accordion5_return";
	
	document.getElementById(return_div_name+'').innerHTML = '';
	document.getElementById(return_div_name+'').innerHTML = '<img src="ajax-loader2.gif" />';
	//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
		openhistorybox('test',1);
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
			//document.getElementById("accordion"+ handheld_id + "_return").innerHTML = ajaxRequest.responseText;
			document.getElementById(return_div_name+'').innerHTML = ajaxRequest.responseText;
			//document.getElementById("accordion11_return").innerHTML = ajaxRequest.responseText;
			
				$(function() {	
				$(".accord").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accord2").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				$(function() {	
				$(".accordion12").accordion({
				collapsible: true,
				active : true,
				autoHeight: false
				});
				});
				
				
		//setTimeout('closehistorybox();', 1000);
		closehistorybox();
		
		}
	}
	ajaxRequest.open("GET", "server/server-populate-handheld-handheld-bundles.php?handheld_id="+handheld_id+"&rnd="+rnd, true);
	ajaxRequest.send(null); 

	// end of sendRequest code 	
	
	// end of sendRequest code 
	 
	
}

function gradient(id, level)
{
	var box = document.getElementById(id);
	box.style.opacity = level;
	box.style.MozOpacity = level;
	box.style.KhtmlOpacity = level;
	box.style.filter = "alpha(opacity=" + level * 100 + ")";
	box.style.display="block";
	return;
}


function fadein(id) 
{
	var level = 0;
	while(level <= 1)
	{
		setTimeout( "gradient('" + id + "'," + level + ")", (level* 1000) + 10);
		level += 0.01;
	}
}
function openhistorybox(title,fadeparameter)
{
	var box = document.getElementById('historybox'); 
	document.getElementById('filter').style.display='block';
	if(fadeparameter)
	{
	 gradient("historybox", 0);
	 fadein("historybox");
	}
	else
	{ 	
	 box.style.display='block';
	} 

}

function closehistorybox()
{
	//document.getElementById('historybox').innerHTML = '';	
   document.getElementById('historybox').style.display='none';
   document.getElementById('filter').style.display='none';
   
}