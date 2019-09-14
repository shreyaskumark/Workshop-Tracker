<!DOCTYPE html>
<html>
	<head>
		<title>Read</title>
	</head>
	<body style="background-color:yellow">
		<form action="Read.php" method="post">
			<fieldset>
				<legend><b><u><h2>Display</h2></u></b></legend>
				<center>
						<label>Enter Topic</label>
						
						<input type="text" name="txtsearch">
						<br/>
						<br/>
						<input type="submit" name="btndisp" value="Display" />
						<input type="submit" name="btndisp2" value="Display All" />
						<br/>
						<br/>
						<a href="http://localhost/WT%20Assignment/Welcome.php">Click Here to go Back</a>
			</center>
			</fieldset>
		</form>
		<br/>
		
<?php
if(isset($_POST['btndisp']))
{
	$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con,'wt');
	$search=$_POST['txtsearch'];
	$preparestmt= "SELECT * FROM table_workshop WHERE topic='$search'";
	$query = mysqli_query($con,$preparestmt) or die(mysql_error());
	$stmt = "SELECT * 
			 FROM table_workshop
			 ORDER BY sid;";
	$query2 = mysqli_query($con,$stmt);
	if(mysqli_num_rows($query) > 0)
	{echo"<table border='1'>";
	echo"<tr><td>S.No</td><td>Dept</td><td>Year</td><td>Sem</td><td>Date</td><td>Instructor Name</td><td>Number</td>
	<td>Institution Name</td><td>Institution Dept</td><td>Experience</td><td>Topic</td><td>Type</td><td>Days</td><td>Venue</td><td>College</td></tr>";
	}
	else
	echo"No records to display<br/>";
	echo "Displaying Specific Records with Topic = '$search'";
	while($row = mysqli_fetch_assoc($query))
		{
	echo"<tr><td>{$row['sid']}</td><td>{$row['dept_name']}</td><td>{$row['acad_year']}</td><td>{$row['sem']}</td><td>{$row['date']}</td><td>{$row['instr_name']}
	</td><td>{$row['cont_num']}</td><td>{$row['inst_name']}</td><td>{$row['instr_branch']}</td><td>{$row['years_exp']}</td><td>{$row['topic']}</td><td>
	{$row['type_activity']}</td><td>{$row['no_days']}</td><td>{$row['venue']}</td><td>{$row['college_name']}</td></tr>";
		}
		echo"</table>";
	}
	if(isset($_POST['btndisp2']))
	{
	$con = mysqli_connect('localhost','root','');
	mysqli_select_db($con,'wt');
	$preparestmt= "SELECT * 
				   FROM table_workshop
				   ORDER by sid;";
	$query = mysqli_query($con,$preparestmt) or die(mysql_error());
	$stmt = "SELECT * 
			 FROM table_workshop 
			 order by sid;";
	$query2 = mysqli_query($con,$stmt);
	if(mysqli_num_rows($query) > 0)
	{
	echo"<table border='1'>";
	echo"<tr><td>S.No</td><td>Dept</td><td>Year</td><td>Sem</td><td>Date</td><td>Instructor Name</td><td>Number</td>
	<td>Institution	Name</td><td>Instructor Dept</td><td>Experience</td><td>Topic</td><td>Type</td>
	<td>Days</td><td>Venue</td><td>College</td></tr>";
	}
	else
	echo"No records to display";
	echo "Displaying All Records in the Database";
	while($row = mysqli_fetch_assoc($query)){
	echo"<tr><td>{$row['sid']}</td><td>{$row['dept_name']}</td><td>{$row['acad_year']}</td><td>{$row['sem']}</td><td>{$row['date']}</td><td>{$row['instr_name']}
	</td><td>{$row['cont_num']}</td><td>{$row['inst_name']}</td><td>{$row['instr_branch']}</td><td>{$row['years_exp']}</td><td>{$row['topic']}</td><td>
		{$row['type_activity']}</td><td>{$row['no_days']}</td><td>{$row['venue']}</td><td>{$row['college_name']}</td></tr>";
	}
	}
	?>
	</body>
</html>