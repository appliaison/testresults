<?php

require 'db.php';

$codeline_id = $_GET['codeline_id'];

$type_id = $_GET['type_id'];

$iteration = $_GET['iteration'];

$base = $iteration * 30;

$offset = $base + 30;

$increment = 30;
// start of getting branch info
$sqlcodeline = "SELECT codeline_name FROM codeline WHERE codeline_id = $codeline_id ";
$rscodeline = mysql_query($sqlcodeline, $connect);
$fetchcodeline = mysql_fetch_assoc($rscodeline);
$codeline_name = $fetchcodeline['codeline_name'];
function convert_xml2array(&$result,$root,$rootname='root')
{
   
    $n=count($root->children());

    if ($n>0){

        /**
         * start of the correction
         */
        if (!isset($result[$rootname]['@attributes'])){
            $result[$rootname]['@attributes']=array();
            foreach ($root->attributes() as $atr=>$value){
                $result[$rootname]['@attributes'][$atr]=(string)$value;
            }           
        }
        /**
         *  end of the correction
         */
       
         foreach ($root->children() as $child){
             $name=$child->getName();    
             convert_xml2array($result[$rootname][],$child,$name);                         
         }
    } else {       
        $result[$rootname]= (array) $root;
        if (!isset($result[$rootname]['@attributes'])){
            $result[$rootname]['@attributes']=array();
        }
    }
}
function get_array_fromXML($xml)
{       
   
    $result=array();   
   
    $doc=simplexml_load_string($xml);    
   
    convert_xml2array($result,$doc);    
   
    return $result['root'];   
}

class xml  {
    var $parser;
    var $pointer;
    var $dom;
    function xml() {
        $this->pointer =& $this->dom;
        $this->parser = xml_parser_create();
        xml_set_object($this->parser, $this);
        xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
        xml_set_element_handler($this->parser, "tag_open", "tag_close");
        xml_set_character_data_handler($this->parser, "cdata");
    }

    function parse($data) {
        xml_parse($this->parser, $data);
    }

    function tag_open($parser, $tag, $attributes) {
        $this->pointer[$tag] = Array(
            '_parent'   => &$this->pointer,
            '_content'  => null,
            '_attributes' => $attributes,
        );
        $this->pointer =& $this->pointer[$tag];
    }

    function cdata($parser, $cdata) {
        $this->pointer['_content'] .= $cdata;
    }

    function tag_close($parser, $tag) {
        $this->pointer =& $this->pointer['_parent'];
        unset($this->pointer[$tag]['_parent']);
    }

} // end xml class

// end of getting branch info
// commenting here to get rid of the double-bundle problem 
//$sql = "SELECT DISTINCT e.bundle AS bundle, e.status AS status FROM email AS e"
//. " WHERE e.codeline_id = $codeline_id  AND e.type_id = $type_id ORDER BY bundle DESC LIMIT 0, $offset ";

$sqltotalbundles = "SELECT DISTINCT e.bundle AS bundle FROM email AS e"
. " WHERE e.codeline_id = $codeline_id  AND e.type_id = $type_id ORDER BY bundle DESC ";
$rstotalbundles = mysql_query($sqltotalbundles, $connect);
$numtotalbundles = mysql_num_rows($rstotalbundles);

$sql = "SELECT DISTINCT e.bundle AS bundle FROM email AS e"
. " WHERE e.codeline_id = $codeline_id  AND e.type_id = $type_id ORDER BY bundle DESC LIMIT $base, $increment ";

$rs = mysql_query($sql, $connect);
$counter = 0;
while ($fetch = mysql_fetch_assoc($rs))
{
	$counter++;
	$bundle = $fetch['bundle'];
	// start of getting branch info 
	
	$url = "http://indy/IndyServlets/servlet/scmbuildinfo/GetSCMBundleInfo?codeline=" . $codeline_name . "&bundle=" . $bundle;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$content = curl_exec($ch);
		curl_close($ch);


		$xml_parser = new xml();
		$xml_parser->parse($content);
		$dom = $xml_parser->dom;
	
		$branch = $dom['codelines']['codeline']['bundle']['branch']['_content'];
		
	
	// end of getting branch info 
	?>
	
	<div  id="<? echo "accord" . $counter; ?>"  class="accord">
	<h3><a><?php echo $fetch['bundle'];  ?> 	
	<?
	// try to find the net-status of this bundle 
	$sqlnetstatus = "SELECT e.body_id AS body_id, e.mail_date AS mail_date, "
	. " e.mail_subjectline AS mail_subjectline, hh.handheld_id AS handheld_id, "
	. " h.handheld_name AS handheld_name, e.status AS status"
    . " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE e.codeline_id = $codeline_id AND e.bundle = $bundle ORDER BY e.mail_id";
	
	$rsnetstatus = mysql_query($sqlnetstatus, $connect);
	$num_yes = 0;
	$num_nos = 0;
	while ($fetchnetstatus = mysql_fetch_assoc($rsnetstatus))
	{
		if ($fetchnetstatus['status'] == 'Y') $num_yes++;
		if ($fetchnetstatus['status'] == 'N') $num_nos++;
		
	}
	
	echo "<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/>";
	echo $num_yes;
	echo "&nbsp;&nbsp;&nbsp;";
	echo "<img src='images/x.png' width='13px' title='rejected' alt='rejected'/>";
	echo $num_nos;
	
	
	
	
	
	?><? echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; 
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	
	echo $branch; 
	
	//$indyarray = get_array_fromXML($content);

	//$devicesarray = $indyarray[0]['codeline'][0]['bundle'][5]['devices'];
	//$count = 0;
	//$length = sizeof($devicesarray);


	
	
	?></a></h3>
	<?
	
	$sql2 = "SELECT e.body_id AS body_id, e.mail_date AS mail_date, "
	. " e.mail_subjectline AS mail_subjectline, hh.handheld_id AS handheld_id, "
	. " h.handheld_name AS handheld_name, e.status AS status"
    . " FROM email AS e "
	. " LEFT JOIN hh_link AS hh ON hh.mail_id = e.mail_id "
	. " LEFT JOIN handheld AS h ON h.handheld_id = hh.handheld_id "
	. " WHERE e.codeline_id = $codeline_id AND e.bundle = $bundle ORDER BY e.mail_id";

	
	$rs2 = mysql_query($sql2, $connect);
	$counter2 = 0;
	

	$counter2 ++;
	?>		

			<div class="accord2" >
			<?
		

			
			?>
			<?
			while ($fetch2 = mysql_fetch_assoc($rs2))
			{
			?>
			<!-- start of mails for this bundle -->
			<h3><a href="#"><?=$fetch2['mail_subjectline']?></a></h3>
			<div>
				<p><?=$fetch2['handheld_name']?>
				
				</p>
				<p>
				<a target="_blank" href ="mail.php?body_id=<?=$fetch2['body_id']?>" ><img src="email.png" border="0" /></a>
				</p>
				 <? echo $fetch2['mail_date']; 
				 
				echo "<br/>" . "Load Supported devices from Indy : ";	
			
				for ($count=0; $count < $length-1; $count++)
				{
					
					$device_name = $devicesarray[$count]['device'][0];
					$link = 'http://indy/Load/index.jsp?branch=' . $codeline_name . '&build=' . $bundle . '&device=' .$device_name . '&build_mode=scm';
					
					echo '<a target="_blank" href="' . $link .  '">' . $device_name . '</a>';
					
					echo "&nbsp;&nbsp;";
					
				}
			
				 
				 ?>
			</div>
			<!-- end of mails for this bundle -->
			<?
			}
			?>		
			</div>
		
		
	</div>
	<?php
	
	
}
$iteration++;
if (($numtotalbundles > 0) && ($offset < $numtotalbundles))
{
?>
<!-- start of more -->
<div class="accord2">	

<h3><a onclick="populate_bundles_generic('<?=$codeline_id?>', '<?=$type_id?>', <?=$iteration?>)">
next
</a> </h3>

	
</div>
<!-- end of more -->
<?
}
?>
