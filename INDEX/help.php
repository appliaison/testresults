<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#"><?


echo "Help   ";

?></a>
</h3>
<div>


	
	<p>
        TestResults was created by <a href="http://go/svvtools">The SV&V Handhelds Tools Development Team</a>
        <br><br>
        If you have any questions, comments or concerns please don't hesistate to contact 
        <br />
		<a href="mailto:svvhhtoolsdev@rim.com?subject=[TestResultsQuestions]">
            
			
			SV&V Handhelds Tools Development Team
			
        </a>
    </p> 
	
		<p>
        Development Team 
		<br />
		<a href="mailto:ardas@rim.com?subject=[TestResultsQuestions]">Arunabh Das</a>
		<br />

		
       
    </p>
	
	
 
</div>
</div>
</div>
<div style="width: 10em; text-align: center; margin: 20px auto;">
	
	</div>
<div class="demo-description">

<div id="sidebar">
<h2>Parsers are currently ACTIVE</h2>
	<ul id="livepusher" class="spy">
	
	<!-- this is where livepusher content goes TODO -->
	<?
	require 'db.php';
	$sql = "SELECT e.mail_id AS mail_id, e.mail_subjectline AS mail_subjectline, "
	. " e.mail_reduced_subject AS mail_reduced_subject, e.body_id AS body_id, e.mail_date AS mail_date, e.status AS status "
	. " FROM email AS e ORDER BY  mail_date DESC LIMIT 0, 5";

	$rs = mysql_query($sql, $connect);

	while ($fetch = mysql_fetch_assoc($rs))
	{
		$mail_id = $fetch['mail_id'];

		$mail_subjectline = $fetch['mail_subjectline'];

		$mail_reduced_subject = $fetch['mail_reduced_subject'];

		$body_id = $fetch['body_id'];
		
		$mail_date = $fetch['mail_date'];
		
		?>
		<li>
		<a target="_blank" href="mail.php?body_id=<?=$body_id?>" title="View this email"><img width="60" src="images/bbappworld.png" title="" /></a>
		<h5><a target="_blank" href="mail.php?body_id=<?=$body_id?>" title="View this email"><?=$mail_reduced_subject?></a></h5>
		<p class="info"><?=$mail_date?> : <a target="_blank" href="mail.php?body_id=<?=$body_id?>" title="View this email">
		<?=$mail_subjectline?></a></p>
		<p class="tags">
		<? if ($fetch['status'] == 'Y')
		{
		echo '<a target="_blank" href="mail.php?body_id=' . $body_id . '"' .  'title="Accepted">Accepted</a>';
		}
		else
		{
		echo '<a target="_blank" href="mail.php?body_id=' . $body_id . '"' .  'title="Rejected">Rejected</a>';
		}
		?>
		
		<p class="tags"></p>
		</li>
		<?
	}
	
	
	
?>

	
	
	

	<!-- this is where the livepusher content goes -->
	</ul>
</div>  
</div><!-- End demo-description -->  

<script type="text/javascript">

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

	var data_to_push_array = new Array(6);
	for (var i=0; i<= 5 ; i++){
		getajaxresponse(i);
	}
	
	function doSomething() {}
	
	function myFuntion(){
		doSomething();
		setTimout(function() {doSomethingElse();}, 250);
		}
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
				
				data_to_push_array[n] = ajaxRequest.responseText;
				
						
			}
		}
		ajaxRequest.open("GET", "server/server-livepusher-array.php?number="+number+"&rnd="+rnd, true);
		ajaxRequest.send(null); 	
	
	
	}
	//Infinite loop that adds the effect
    function spy() {
				
		
		
		
		
				// insert a new item with opacity and height of zero
				var $insert = $(data_to_push_array[currentItem]).css({
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
						
		
	
		
		//Sets the timeout to call itself again
		setTimeout(spy, interval)
		setTimeout( function() {
			for (var i=0; i< 5 ; i++){
				getajaxresponse(i);
			}
		}, 1000);
	
	}
	
	setTimeout(function(){doSomethingElse();},290);
	function doSomethingElse() {
	spy();
	}
	//Continues the loop by calling itself at intervals
	
});
};

})(jQuery);

</script>
