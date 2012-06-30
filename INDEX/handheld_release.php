<script type="text/javascript">
	$(function() {

		$("#accordion_5_0_0").accordion({
			collapsible: true,
			active: false,
			autoHeight: false
				
		});
		});
		
</script>

<div id="returned_value"></div>
<?
//$accepted = num_accepted_for_this_typename("Handheld");

//$rejected = num_rejected_for_this_typename("Handheld");	
	
?>	

<!-- start of stats bar -->
<div class="demo">
<div id="accordionstats" style="font-size:13px";>
<h3><a href="#"><?


echo "Handheld Release  : Under Development ";
/*
echo "<img src='images/tick.png' width='13px' title='accepted' alt='accepted'/>";
echo  $accepted;
echo "&nbsp;&nbsp;&nbsp;&nbsp;";

echo "<img src='images/x.png' width='13px' title='rejected' alt='rejected'/>";
echo $rejected;
*/
echo "<br />";
?></a>
</h3>
<div>
<?php
function display_upload_form()
{
echo <<<DISPLAY_UPLOAD_FORM


    <form method="post" action="index.php?type=handheld_release" enctype="multipart/form-data">

    <p>Select a file.<br />
    <input type="file" name="myfile" tabindex="1" /> 

    <input type="hidden" name="execute" value="1" />
	<button class="fg-button ui-state-default ui-corner-all" type="submit">Upload</button></p>

    
	

    </form>


DISPLAY_UPLOAD_FORM;
}
// File Upload ****************************************************************

function execute_upload()
{
	//echo "Executing upload";
    // root path
    $path = $_SERVER['DOCUMENT_ROOT'];

    // upload directory. path will originate from root.
    $dirname = '/testresults_test/uploads';

    // permission settings for newly created folders
    ///$chmod = 0755;
	$chmod = 0777;

    // create file vars to make things easier to read.
    $filename = $_FILES['myfile']['name'];
    $filesize = $_FILES['myfile']['size'];
    $filetype = $_FILES['myfile']['type'];
    $file_tmp = $_FILES['myfile']['tmp_name'];
    $file_err = $_FILES['myfile']['error'];
    $file_ext = strrchr($filename, '.');

    // check if user actually put something in the file input field.
    if (($file_err == 0) && ($filesize != 0))
    {
        // Check extension.
        if (!$file_ext)
        {
            unlink($file_tmp);
            die('File must have an extension.');
        }

        // extra check to prevent file attacks.
        if (is_uploaded_file($file_tmp))
        {
            /*
            * check if the directory exists
            * if it doesnt exist, make the directory
            */
            $dir = $path . $dirname;

            if (!is_dir($dir))
            {
                $dir = explode('/', $dirname);

                foreach ($dir as $sub_dir)
                {
                    $path .= '/' . $sub_dir;
                    if (!is_dir($path))
                    {
                        if (!mkdir($path, $chmod))
                        {
                            unlink($file_tmp);
                            die('<strong>Error:</strong> Directory does not exist and was unable to be created.');
                        }
                    }
                }
            }

            /*
            * copy the file from the temporary upload directory
            * to its final detination.
            */
			
			$filename_no_extension = substr($filename, 0, strrpos($filename, '.')); 
			$now = date("Y-m-d-G-i-s");
			$newfilename = $filename_no_extension . $now . ".xls";
			
            if (@move_uploaded_file($file_tmp, $dir . '/' . $newfilename))
            {
                // success!
                echo "
                <p>Uploaded!</p>
                <p><strong>View File:</strong> <a href=\"$dirname/$filename\">$newfilename</a></p>
                ";
				// this is where we need to parse and write to db
				error_reporting(E_ALL);
				require_once 'Classes/PHPExcel/IOFactory.php';
				$reader = PHPExcel_IOFactory::createReader('Excel2007');
				$reader->setReadDataOnly(true);
				$objPHPExcel = PHPExcel_IOFactory::load("uploads/$newfilename");
				$objWorksheet = $objPHPExcel->getActiveSheet();
				$hhrr_filename = $newfilename;
				
				$hhrr_filetitle = $objWorksheet->getCellByColumnAndRow(0, 2)->getValue();
				
				$hhrr_codeline = $objWorksheet->getCellByColumnAndRow(4, 5)->getValue();
				$hhrr_branch = $objWorksheet->getCellByColumnAndRow(4, 6)->getValue();
				$hhrr_core_bundles = $objWorksheet->getCellByColumnAndRow(4, 7)->getValue();
				
				$hhrr_release_bundles = $objWorksheet->getCellByColumnAndRow(4, 8)->getValue();
				
				$hhrr_type = $objWorksheet->getCellByColumnAndRow(4, 9)->getValue();
				$hhrr_cprs_used = $objWorksheet->getCellByColumnAndRow(4, 10)->getValue();
			
				// put this at beginning of your script
				$saveTimeZone = date_default_timezone_get();
				date_default_timezone_set('UTC'); // PHP's date function uses this value!
				
				

				$hhrr_test_start_date = $objWorksheet->getCellByColumnAndRow(4, 11)->getValue();
				$hhrr_test_start_date = PHPExcel_Shared_Date::ExcelToPHP($hhrr_test_start_date); // 1007596800 (Unix time)
				$hhrr_test_start_date = date('m.d.Y', $hhrr_test_start_date);
				
				$hhrr_test_report_date = $objWorksheet->getCellByColumnAndRow(4, 12)->getValue();
				$hhrr_test_report_date = PHPExcel_Shared_Date::ExcelToPHP($hhrr_test_report_date); // 1007596800 (Unix time)
				$hhrr_test_report_date = date('m.d.Y', $hhrr_test_report_date);
				
				
				/*
				echo "Filename : " . $hhrr_filename . "<br/>";
				echo "Filetitle : " . $hhrr_filetitle . "<br/>";
				echo "Codeline : " . $hhrr_codeline . "<br/>";
				echo "Branch: " . $hhrr_branch . "<br/>";
				echo "Core Bundles : " . $hhrr_core_bundles . "<br/>";
				echo "Core Release Bundles : " . $hhrr_release_bundles . "<br/>";
				echo "Handheld Type : " . $hhrr_type . "<br/>";
				echo "CPRs Used : " . $hhrr_cprs_used . "<br/>";
				*/
				
				require 'db.php';
				$sql = "INSERT INTO hh_release_reports (hhrr_filename, hhrr_codeline, hhrr_branch, hhrr_core_bundles, hhrr_release_bundles, hhrr_type, hhrr_cprs_used, hhrr_test_start_date, hhrr_test_report_date, hhrr_filetitle) "
				. " VALUES ('$hhrr_filename', '$hhrr_codeline', '$hhrr_branch', '$hhrr_core_bundles', '$hhrr_release_bundles', '$hhrr_type', '$hhrr_cprs_used', '$hhrr_test_start_date', '$hhrr_test_report_date', '$hhrr_filetitle') ";
				
				$rs = mysql_query($sql, $connect);
				
				// put this at the end of your script
				date_default_timezone_set($saveTimeZone);

				
				/*
				$objPHPExcel = PHPExcel_IOFactory::load("test.xls");
				$objWorksheet = $objPHPExcel->getActiveSheet();
				
				$rownumber1 = $objWorksheet->getRowIterator()
				
				echo '<table>' . "\n";
				$rowcount = 0;
				
				foreach ($objWorksheet->getRowIterator() as $row) 
				
				{
					$rowcount++;
					echo '<tr>' . "\n";

					$cellIterator = $row->getCellIterator();
					$cellIterator->setIterateOnlyExistingCells(false);
					foreach ($cellIterator as $cell) 
					{
					echo '<td>' . $cell->getValue() . '</td>' . "\n";
					}
					echo '</tr>' . "\n";
				}
				echo '</table>' . "\n";
				*/
				
				// this is where we need to parse and write to db
            }
            else
            {
                // error moving file. check file permissions.
                unlink($file_tmp);
                echo '<strong>Error:</strong> Unable to move file to designated directory.';
            }
        }
        else
        {
            // file seems suspicious... delete file and error out.
            unlink($file_tmp);
            echo '<strong>Error:</strong> File does not appear to be a valid upload. Could be a file attack.';
        }
    }
    else
    {
        // Kill temp file, if any, and display error.
        if ($file_tmp != '')
        {
            unlink($file_tmp);
        }
	//echo $file_err;
        switch ($file_err)
        {
            case '0':
                echo 'That is not a valid file. 0 byte length.';
                break;

            case '1':
                echo 'This file, at ' . $filesize . ' bytes, exceeds the maximum allowed file size as set in <em>php.ini</em>. '.
                'Please contact your system admin.';
                break;

            case '2':
                echo 'This file exceeds the maximum file size specified in your HTML form.';
                break;

            case '3':
                echo 'File was only partially uploaded. This could be the result of your connection '.
                'being dropped in the middle of the upload.';

            case '4':
                echo 'You did not upload anything... Please go back and select a file to upload.';
                break;
        }
    }
}

if (isset($_POST['execute']))
{
    execute_upload();
}
else
{
    display_upload_form();
}

?>
</div>
</div>
</div>
<!-- end of stats bar -->
<div class="demo">
<div id="accordion_5_0_0">
<h3><a href="#">5.0.0</a></h3>
<div>
<div id="accordion" class="accord">

	<?
	require 'db.php';
	$sql = "SELECT * FROM hh_release_reports ORDER BY hhrr_id DESC";
	$rs = mysql_query($sql, $connect);
	
	
	while ($fetch = mysql_fetch_assoc($rs))
	{
	
	?>
	<h3>

	<!-- <a onclick="populate_otasl('<?=$fetch['mail_id']?>')"> -->
	<a onchange="#">
	<?

	?>
	<? echo $fetch['hhrr_branch'];?></a></h3>
	
	<div id="accordion<? echo $fetch['hhrr_codeline'] . " "  . $fetch['hhrr_branch']; ?>_return"> 
	  <div>
		 <a target="_blank" href ="uploads/<?=$fetch['hhrr_filename']?>" ><img src="images/excel.png" border="0" width="40px"/> </a>
	  <? echo $fetch['hhrr_filetitle']; ?> for <? echo $fetch['hhrr_type']; ?>
	

	  
	  </div>
	</div>
   
	
	<?
	}
	
	?>

	
</div>

</div><!-- End demo -->
</div>
</div>

</body>

</html>-->
