<?php
	error_reporting(0);
	include("config.inc.php");
	$id=$_REQUEST['id'];
	$qry="select * from gallery_photos where photo_category=".$id;
	$res=mysql_query($qry);
    $i=$_REQUEST['id'];
	if(isset($_REQUEST['id1']))
	{
		$a=$_REQUEST['id1'];
		$del="select * from gallery_photos where photo_id=".$a;
		$res_del=mysql_query($del);
		$row_del=mysql_fetch_array($res_del);
		
		if($row_del["photo_filename"]!="") {  
		$photo=$row_del["photo_filename"];
		unlink("photos/".$photo);
		unlink("photos/".tb_.$photo);
		}
		
		$del=$_REQUEST['id1'];
		$query = "delete from gallery_photos where photo_id=".$del;
		$res_q=mysql_query($query);
		if($res_q)
		{
			header("location:uploadimage.php");
		}
	
	}
?>

<html>

<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Kunal Arts Admin</title>	
	<link rel="stylesheet" href="./css/screen.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="./css/plugin.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
	<link rel="stylesheet" href="./css/custom.css" type="text/css" media="screen" title="no title" charset="utf-8" />	
		
</head>

<body>
	
<div id="wrapper">
	
	<div id="header">
		<img src="././images/kunal.jpg" width="60" height="60">
		<h1>Kunal Admin</h1>
	</div> <!-- #header -->	
		<?php
		include("header.php");
		?> <!-- #nav -->
	
	
	<div id="content" class="xfluid">
				<div class="gall">
				<?php
	
				while($row=mysql_fetch_array($res))
				{
					echo "<img src='photos/tb_$row[1]'>";
					echo "<span class='close'><a href='?id1=$row[0]'>X</a></span>";					
				}
				
				?>
				</div>
				
		</div>
        </div>
        </div>

				
	<div id="footer">
		
		<p>Copyright &copy; 2012 <a href="">Wavetechline</a>, all rights reserved.</p>
		
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->

</body>

</html>