<!DOCTYPE html>
<html>
<head>
<title>Application</title>
</head>
<body style="background-color:gray">
 
	<center>
		<form action="Welcome.php" method="post">
		<fieldset>
		<legend><h2><b>Workshop/Conference Tracker</b></h2></legend>
		<center><p>Select your Choice</p></center>
		<table width="250px">
		<tr>
		<td>
		<input type="submit" name="btncreate" value="Create" />
		</td>
		<td>
		<input type="submit" name="btnread" value="Read" />
		</td>
		<td>
		<input type="submit" name="btnupdate" value="Update"/>
		</td>
		<td>
		<input type="submit" name="btndelete" value="Delete"/>
		</td>
		</tr>
		</table>
		</fieldset>
		
		</form>
	</center>
	
<?php
		if(isset($_POST['btncreate']))
		{
			header('location:CreateEvent.php');
		}
		if(isset($_POST['btnread']))
		{
			header('location:Read.php');
		}
		if(isset($_POST['btnupdate']))
		{
			header('location:Update.php');
		}	
		if(isset($_POST['btndelete']))
		{
			header('location:Delete.php');
		}	
?>
</body>
</html>