<!DOCTYPE html>
<html>
	<head>
		<title>Delete</title>
	</head>
	<body style="background-color:white">
		<form action="Delete.php" method="post">
			<fieldset>
				<legend><b><u><h2>Delete</h2></u></b></legend>
				<center>
						<label>Enter Serial No :
						<input type="text" name="txtsid" required/> <br/> <br/>
						</label>
						<input type="submit" name="btndelete" value="Delete"/>
						<br/>
						<br/>
						<a href="http://localhost/WT%20Assignment/Welcome.php">Click Here to go Back</a>
			</center>
			</fieldset>
		</form>
		<br/>
		<?php
		if(isset($_POST['btndelete']))
		{	
			$connection = mysqli_connect("localhost","root","");
			mysqli_select_db($connection,"wt");
			$delete=$_POST['txtsid'];
			if(! $connection){
				die('Could Not connect :'.mysqli_error());
			}
			$stmt = "SELECT * FROM table_workshop WHERE sid = $delete LIMIT 1";
			$query = mysqli_query($connection,$stmt);
			if(mysqli_num_rows($query) > 0)
				{
					$query="DELETE FROM table_workshop WHERE sid='$delete'";
					mysqli_query($connection,$query);
					echo "Deleted the Specified Record Successfully";
				}
			else
				{
					echo "No records to delete : Do not exist";
					
        }
		mysqli_close($connection);
    }       
		?>