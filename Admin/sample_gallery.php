<?php
	error_reporting(0);
	include("config.inc.php");
	$qry="select * from gallery_category";
	$res=mysql_query($qry);
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
		
		<a name="line"></a>
		<div id="gallery_wrapper" class="portlet x8">
			
			<div class="portlet-header">
				<h4>Image Gallery</h4>
			</div> 
						
			<div>
				
				<div>
				<table>
				
				<tr class="maintr">
				<td width="35%">Category Name</td>
				<td width="45%">Caption</td>
				<td width="">Action</td>
				</tr>
				
				<?php
	
				while($row=mysql_fetch_array($res))
				{
					echo "<tr>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td><a href='viewimage.php?id=$row[0]'>View</a></td>";
					echo "<td><a href='contact.php?id1=$row[1]'>Delete</a></td>";
					echo "</tr>";
					
				}
				
				?>

				
				</table>

			</div>

			</div> <!-- .portlet-content -->
		</div> <!-- .portlet -->
		
		
		<div class="portlet x4">
			
			<div class="portlet-header">
				<div class="up">
				<form action="" method="post">
				<input type="submit" value="Upload Photos" name="upload" />
				<input type="submit" value="Add Category" name="addcat" />
				</form>
				</div>
			</div> <!-- .portlet-header -->
			
			<div class="portlet-content">
			
				<?php
					if(isset($_REQUEST['upload']))
					{
						include("preupload.php");
					}
					if(isset($_REQUEST['addcat']))
					{
						include("addcat.php");
					}
				?>
			</div> <!-- .portlet-content -->
			
		</div> <!-- .portlet -->

	</div> <!-- #content -->
	
	<div id="footer">
			<p>Copyright &copy; 2012 <a href="javascript:;">Wavetechline</a>, all rights reserved.</p>
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


</body>

</html>