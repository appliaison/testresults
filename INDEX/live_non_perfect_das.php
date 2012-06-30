<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>TestResults</title>
<link href="css/topnav/live_css.css" rel="stylesheet" type="text/css" />
<link href="css/topnav/topnav.css" rel="stylesheet" type="text/css" />
<script src="jquery-1.2.6.js" type="text/javascript"></script>
<script src="lightbox-form.js" type="text/javascript"></script>
<script src="javascript/client-populate-bundles.js" type="text/javascript"></script>
<link type="text/css" href="jquery-ui-1.7.2.custom/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="jquery-ui-1.7.2.custom/development-bundle/ui/ui.accordion.js"></script>
<link type="text/css" href="jquery-ui-1.7.2.custom/development-bundle/demos/demos.css" rel="stylesheet" />


<style type="text/css">

BODY { background-color: black; }

</style>

<script type="text/javascript"> 
$(document).ready(function(){
 

//hide the all of the element with class msg_body
	$(".accordion_body").hide();
	//toggle the componenet with class msg_body
	$(".accordion_head").click(function(){
		$(this).next(".accordion_body").slideToggle(250);
	});

$("ul.subnav").parent().append("<span></span>"); //Only shows drop down trigger when js is enabled - Adds empty span tag after ul.subnav

$("ul.topnav li span").click(function() { //When trigger is clicked...
	
	//Following events are applied to the subnav itself (moving subnav up and down)
	$(this).parent().find("ul.subnav").slideDown('fast').show(); //Drop down the subnav on click

	$(this).parent().hover(function() {
	}, function(){	
		$(this).parent().find("ul.subnav").slideUp('slow'); //When the mouse hovers out of the subnav, move it back up
	});

	//Following events are applied to the trigger (Hover events for the trigger)
	}).hover(function() { 
		$(this).addClass("subhover"); //On hover over, add class "subhover"
	}, function(){	//On Hover Out
		$(this).removeClass("subhover"); //On hover out, remove class "subhover"
});

});

$(function () {
$('ul.spy').simpleSpy();
});

(function ($) {

$.fn.simpleSpy = function (limit, interval) {
limit = limit || 4;
interval = interval || 7000;

return this.each(function () {
	// capture a cache of all the list items
	// chomp the list down to limit li elements
	var $list = $(this),
		items = [], // uninitialised
		currentItem = limit,
		total = 0, // initialise later on
		height = $list.find('> li:first').height();
		
	// capture the cache
	$list.find('> li').each(function () {
		items.push('<li>' + $(this).html() + '</li>');
	});
	
	total = items.length;
	$list.wrap('<div class="spyWrapper" />').parent().css({ height : height * limit });
	$list.find('> li').filter(':gt(' + (limit - 1) + ')').remove();

	var data_to_push_array = new Array(5);
	data_to_push_array[0] = getajaxresponse(0);
	
	
	function getajaxresponse(n)
	{
		//start of ajaxRequest code	
		var ajaxRequest;  // The variable that makes Ajax possible!
	    var number = n;
		var rnd = Math.random();
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
				
				return ajaxRequest.responseText;

						
			}
		}
		ajaxRequest.open("GET", "server/server-livepusher-array.php?number="+number+"&rnd="+rnd, true);
		ajaxRequest.send(null); 	
	
	
	}
	//Infinite loop that adds the effect
    function spy() {
		var rnd = Math.random();
		//initialize it to display error state if Ajax fails
		
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
				
				// insert a new item with opacity and height of zero
				var $insert = $(data_to_push_array[0]).css({
					height : 0,
					opacity : 0,
					display : 'none'
				}).prependTo($list);
							
				// fade the LAST item out
				$list.find('> li:last').animate({ opacity : 0}, 1000, function () {
					// increase the height of the NEW first item
					$insert.animate({ height : height }, 1000).animate({ opacity : 1 }, 1000);
					
					// AND at the same time - decrease the height of the LAST item
					// $(this).animate({ height : 0 }, 1000, function () {
						// finally fade the first item in (and we can remove the last)
						$(this).remove();
					// });
				});
				
				currentItem++;
				if (currentItem >= total) {
					currentItem = 0;
				}
						
			}
		}
		ajaxRequest.open("GET", "server/server-livepusher.php?rnd="+rnd, true);
		ajaxRequest.send(null); 
		
		//Sets the timeout to call itself again
		setTimeout(spy, interval)
	}
	
	//Continues the loop by calling itself at intervals
	spy();
});
};

})(jQuery);





	
</script>
</head>

<body>

<?
require("navigator.php");
?>

<br/>
<br/>
<br/>
<br/>




<div style="width: 10em; text-align: center; margin: 20px auto;">
	
	</div>
<div class="demo-description">
<div id="sidebar">
	<ul id="livepusher" class="spy">
	
	<!-- this is where livepusher content goes TODO -->
	<?
	require 'db.php';
	$sql = "SELECT e.mail_id AS mail_id, e.mail_subjectline AS mail_subjectline, "
	. " e.mail_reduced_subject AS mail_reduced_subject, e.body_id AS body_id "
	. " FROM email AS e ORDER BY  mail_id DESC LIMIT 0, 5";

	$rs = mysql_query($sql, $connect);

	while ($fetch = mysql_fetch_assoc($rs))
	{
		$mail_id = $fetch['mail_id'];

		$mail_subjectline = $fetch['mail_subjectline'];

		$mail_reduced_subject = $fetch['mail_reduced_subject'];

		$body_id = $fetch['body_id'];
		
		?>
		<li>
		<a href="mail.php?body_id=<?=$body_id?>" title="View this email"><img width="70" height="70" src="images/1.png" title="" /></a>
		<h5><a href="mail.php?body_id=<?=$body_id?>" title="View this email"><?=$mail_reduced_subject?></a></h5>
		<p class="info">Nov 29th 2008 by <a href="mail.php?body_id=<?=$body_id?>" title="View this email">
		<?=$mail_subjectline?></a></p>
		<p class="tags"><a href="#" title='Accepted'>Accepted</a> <a href="#" title='Parsed'>Parsed</a></p>
		<p class="tags"></p>
		</li>
		<?
	}
	
	
	
?>

	
	
	

	<!-- this is where the livepusher content goes -->
	</ul>
</div>  
</div><!-- End demo-description -->  
</body>
</html>






</body>

</html>

