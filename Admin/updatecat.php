<?php
	error_reporting(0);
	include("config.inc.php");
	$qry="select * from gallery_category";
	$res=mysql_query($qry);
	
	$id=$_REQUEST['id'];
	$qry_up="select * from gallery_category where category_id=".$id;
	$res_up=mysql_query($qry_up);
	$row_up=mysql_fetch_array($res_up);

?>
<?php
	
	if(isset($_REQUEST['up']))
	{	
		$i=$_REQUEST['id'];
		
		$cat_name=$_POST['t1'];
		$cap=$_POST['t2'];
		$qry_cat="update gallery_category SET category_name='".$cat_name."', caption='".$cap."' where category_id=".$i;
		$res_cat=mysql_query($qry_cat);
		if($res_cat)
		{
			header("location:addcat.php");
		}
	}
	
	if(isset($_REQUEST['id1']))
	{
		$d=$_REQUEST['id1'];
		$qry_d="delete from gallery_category where category_id=".$d;
		$res_d=mysql_query($qry_d);
		if($res_d)
		{
			header("location:addcat.php");
		}
		else
		{
			echo "error";
		}
		
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
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
		<div id="gallery_wrapper" class="portlet x8">
			
			<div class="portlet-header">
				<h4>Image Gallery</h4>
			</div> 
						
			<div>
				
				<div>
				<table>
				<tr>
				<td width="35%">Category Name</td>
				<td width="45%">Caption</td>
				<td width="">Delete</td>
                
				</tr>
				
				<?php
				while($row=mysql_fetch_array($res))
				{
					echo "<tr>";
					echo "<td>".$row[1]."</td>";
					echo "<td>".$row[2]."</td>";
					echo "<td class='del'><a href='addcat.php?id1=$row[0]'>Delete</a></td>";
					echo "</tr>";
					
				}
				?>

				
				</table>

			</div>

			</div> <!-- .portlet-content -->
		</div>
        <div class="portlet x4">
			
			<div class="portlet-header">
				<h4>Update Category</h4>
			</div> 
        <div class="portlet-content">
        <form action="" method="post">
        <label>Caterogy Name:</label><br /><br />
        <input type="text" name="t1" size="25" value="<?php echo $row_up[1]; ?>"/><br /><br />
        <label>Caption:</label><br /><br />
        <textarea name="t2" rows="2"><?php echo $row_up[2]; ?></textarea></br><br />
        <div class="catb">
        <input type="submit" name="up" value="Update" />
        </div>
        </form>
        </div>
        </div>
        </div>
        
 <!-- .portlet -->

	</div> <!-- #content -->
	
	<div id="footer">
			Copyright &copy; 2012 <a href="javascript:;">Wavetechline</a>, all rights reserved.
	</div> <!-- #footer -->
	
</div> <!-- #wrapper -->


</body>
</html>
