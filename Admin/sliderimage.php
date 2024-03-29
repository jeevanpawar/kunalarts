<?php
	include("config.inc.php");
	error_reporting(0);
    // initialization
	$result_final = "";

	// List of our known photo types
	$known_photo_types = array( 
						'image/pjpeg' => 'jpg',
						'image/jpeg' => 'jpg',
						'image/gif' => 'gif',
						'image/bmp' => 'bmp',
						'image/x-png' => 'png'
					);
	
	// GD Function List
	$gd_function_suffix = array( 
						'image/pjpeg' => 'JPEG',
						'image/jpeg' => 'JPEG',
						'image/gif' => 'GIF',
						'image/bmp' => 'WBMP',
						'image/x-png' => 'PNG'
					);

	// Fetch the photo array sent by preupload.php
	$photos_uploaded = $_FILES['photo_filename'];

	// Fetch the photo caption array
	$photo_caption = $_POST['photo_caption'];

     			mysql_query( "INSERT INTO gallery_photos(`photo_filename`, `photo_caption`, `photo_category`) VALUES('0', '".addslashes($photo_caption[$counter])."', '".addslashes($_POST['category'])."')" );
				$new_id = mysql_insert_id();
				$filetype = $photos_uploaded['type'];
				$extention = $known_photo_types[$filetype];
				$filename = $photos_uploaded;

				mysql_query( "UPDATE gallery_photos SET photo_filename='".addslashes($filename)."' WHERE photo_id='".addslashes($new_id)."'" );

				// Store the orignal file
				copy($photos_uploaded['tmp_name'][$counter], $images_dir."/".$filename);

				// Let's get the Thumbnail size
				$size = GetImageSize( $images_dir."/".$filename );
				if($size[0] > $size[1])
				{
					$thumbnail_width = 170;
					$thumbnail_height = (int)(170 * $size[1] / $size[0]);
				}
				else
				{
					$thumbnail_width = (int)(170 * $size[0] / $size[1]);
					$thumbnail_height = 170;
				}
			
				// Build Thumbnail with GD 1.x.x, you can use the other described methods too
				$function_suffix = $gd_function_suffix[$filetype];
				$function_to_read = "ImageCreateFrom".$function_suffix;
				$function_to_write = "Image".$function_suffix;

				// Read the source file
				$source_handle = $function_to_read ( $images_dir."/".$filename ); 
				
				if($source_handle)
				{
					// Let's create an blank image for the thumbnail
				     	$destination_handle = ImageCreate ( $thumbnail_width, $thumbnail_height );
				
					// Now we resize it
			      	ImageCopyResized( $destination_handle, $source_handle, 0, 0, 0, 0, $thumbnail_width, $thumbnail_height, $size[0], $size[1] );
				}

				// Let's save the thumbnail
				$function_to_write( $destination_handle, $images_dir."/tb_".$filename );
				ImageDestroy($destination_handle );
				$result_final .= "<img src='".$images_dir. "/tb_".$filename."' /> File ".($counter+1)." Added<br />";
				header("location:uploadimage.php");
			

	// Print Result
echo <<<__HTML_END

<html>
<head>
	<title>Photos uploaded</title>
</head>
<body >
	
</body>
</html>

__HTML_END;
?>
