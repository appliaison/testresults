

<div style="width: 10em; text-align: center; margin: 20px auto;">
	
	</div>
<div class="demo-description">

<div id="sidebar">
<?php
function display_upload_form()
{
echo <<<DISPLAY_UPLOAD_FORM

    <html>
    <head>
    <title>Yet Another Upload Form</title>
    <style type="text/css" media="screen">
        <!--
        html body
        {background:#fff; font: 76%/1.5em arial, helvetica, sans-serif; color:#333;}

        input
        {color:#333;}
        -->
    </style>
    </head>

    <body>

    <form method="post" action="{$_SERVER['PHP_SELF']}" enctype="multipart/form-data">

    <p>Select a file.<br />
    <input type="file" name="myfile" tabindex="1" /></p>

    <p><input type="hidden" name="execute" value="1" /></p>

    <p><input type="submit" value="Upload File" tabindex="2" />

    </form>

    </body>
    </html>

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
            if (@move_uploaded_file($file_tmp, $dir . '/' . $filename))
            {
                // success!
                echo "
                <p>Uploaded!</p>
                <p><strong>View File:</strong> <a href=\"$dirname/$filename\">$filename</a></p>
                ";
				echo '<p>Click the link to translate xml to flat file</p>';
				echo '<p><strong>Translate to txt </strong>';
				echo '<a href="upload/index.php?filename='. $filename . '">'. 'Click here' .'</a></p>';
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
	echo $file_err;
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

// Logic Code *****************************************************************

if (isset($_POST['execute']))
{
    execute_upload();
}
else
{
    display_upload_form();
}

?>
<p>
<?
//mysql_close($connect);
?>

</div>  
</div><!-- End demo-description -->  
