<div id="returned_value"></div>
<?

require 'db.php';


$accepted = num_accepted_for_this_typename("OTASL");

$rejected = num_rejected_for_this_typename("OTASL");	
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#"><?


echo "OTASL   ";
echo "<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/>";
echo  $accepted;
echo "&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<img src='images/x.png' width='13px' title='rejected' alt='rejected'/>";
echo $rejected;

echo "<br />";
?></a>
</h3>
<div>

</div>
</div>
</div>
<!-- end of stats bar -->

<div class="demo">

<div id="accordion" class="accord">

	<?
	
	$sql = "SELECT e.mail_id AS mail_id, e.body_id AS body_id, e.mail_date AS mail_date, "
	. " e.mail_reduced_subject AS mail_reduced_subject, "
	. " e.mail_subjectline AS mail_subjectline, e.status AS status FROM email AS e "
	. " LEFT JOIN type AS t ON t.type_id = e.type_id "
    ." WHERE t.type_name LIKE '%OTASL%' AND t.active = 1 ORDER BY e.mail_id DESC LIMIT 0, 500";
	$rs = mysql_query($sql, $connect);
	
	
	while ($fetch = mysql_fetch_assoc($rs))
	{
	
	?>
	<h3>

	<!-- <a onclick="populate_otasl('<?=$fetch['mail_id']?>')"> -->
	<a onchange="#">
	<?
	if ($fetch['status']=='N')
	{
	echo "<img src='images/x.png' width='13px' title='rejected' alt='rejected'/>";
	
	}
	else
	{
	echo "<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/>";
	}
	?>
	<?=$fetch['mail_subjectline']?></a></h3>
	
	<div id="accordion<?=$fetch['mail_id']?>_return"> 
	  <div>
	  <p>
	  <a target="_blank" href ="mail.php?body_id=<?=$fetch['body_id']?>" ><img src="email.png" border="0" /></a>
	  
	  </p>
	  <? echo $fetch['mail_date']; ?>
	  </div>
	</div>
   
	
	<?
	}
	
	?>

	
</div>

</div><!-- End demo -->



<div class="demo-description">


</div><!-- End demo-description -->


</body>
<? mysql_close ($connect); ?>
</html>
