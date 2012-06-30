<?
require 'db.php';
$jumper_codeline_id = $_GET['jumper_codeline_id'];
$jumper_bundle = $_GET['jumper_bundle'];
// start of getting branch info
$sqlcodeline = "SELECT codeline_name FROM codeline WHERE codeline_id = $jumper_codeline_id ";
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
$sql = "SELECT e.mail_subjectline AS mail_subjectline, e.mail_date AS mail_date, e.body_id AS body_id, mail_reduced_subject AS mail_reduced_subject "
. " FROM email AS e  "
. " WHERE e.codeline_id = $jumper_codeline_id  AND e.bundle = $jumper_bundle";

$rs = mysql_query($sql, $connect) or die("You have entered invalid values");
$num_rows = mysql_num_rows($rs);

if ($num_rows)
{

	while ($fetch = mysql_fetch_assoc($rs))
	{

	?>
	
	<h3 class="ui-widget-header ui-corner-all"><?echo $mail_subjectline = $fetch['mail_subjectline'];?></h3>
				<p>
					<p><?=$fetch['mail_reduced_subject']?>		
					</p>
					<p>
					<a target="_blank" href="mail.php?body_id=<?=$fetch['body_id']?>"><img src="email.png" border="0"></a>
					</p>
					 <?=$fetch['mail_date']?>
	</p>
	
				
	<?
	}
}
else
{
	echo "No results";

}
?>