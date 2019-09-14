<!DOCTYPE html>
<html>
	<head>
		<title>Update</title>
	</head>
	<body style="background-color:lightblue">
		<form action="Update.php" method="post">
			<fieldset>
				<legend><b><u><h2>Update</h2></u></b></legend>
				<center>
						<label>SNO :
						<input type="text" name="txtserial" required/> <br/> <br/>
						</label>
						<label>Dept Name :
						<select name="inputbranch1" required/>
						<option value="select" selected="true" disabled="disabled">-----------Select----------</option>
						<option value="ComputerScience">Computer Science</option>
						<option value="Mechanical">Mechanical</option>
						<option value="Civil">Civil</option>
						<option value="EEE">EEE</option>
						<option value="ECE">ECE</option>
						<option value="InformationScience">Information Science</option>
						<option value="Chemical">Chemical</option>
						</select>
						<br />
						<br />
						</label>
						<label>Academic Year :
						<input type="text" name="txtyear" required/> <br/> <br/>
						</label>
						<label>Semester :
						<select name="inputsem" required/>
						<option value="select" selected="true" disabled="disabled">-----------Select----------</option>
						<option value="I">I</option>
						<option value="II">II</option>
						<option value="III">III</option>
						<option value="IV">IV</option>
						<option value="V">V</option>
						<option value="VI">VI</option>
						<option value="VII">VII</option>
						<option value="VIII">VIII</option>
						</select>	
						<br/> <br/>
						</label>
						<label>Date :
						<input type="date" name="txtdate" required/> <br/> <br/>
						</label>
						<label>Instructor name :
						<input type="text" name="txtinstrname" required/> <br/> <br/>
						</label>
						<label>Instructor's Number :
						<input type="text" name="txtnum" required/> <br/> <br/>
						</label>
						<label>Institute name :
						<input type="text" name="txtinstname" required/> <br/> <br/>
						</label>
						<label>Instructor branch :
						<select name="inputbranch2" required/>
						<option value="select" selected="true" disabled="disabled">-----------Select----------</option>
						<option value="ComputerScience">Computer Science</option>
						<option value="Mechanical">Mechanical</option>
						<option value="Civil">Civil</option>
						<option value="EEE">EEE</option>
						<option value="ECE">ECE</option>
						<option value="InformationScience">Information Science</option>
						<option value="Chemical">Chemical</option>
						</select>
						<br/> <br/>
						</label>
						<label>Years of Experience :
						<input type="text" name="txtexper" required/> <br/> <br/>
						</label>
						<label>Topic :
						<input type="text" name="txttopic" required/> <br/> <br/>
						</label>
						<label>Type :
						<select name ="inputtype" required/>
						<option value="select" selected="true" disabled="disabled">-----------Select----------</option>
						<option value="workshop">Workshop</option>
						<option value="conference">Conference</option>
						</select>
						<br/> <br/>
						</label>
						<label>No of Days :
						<input type="text" name="txtdays" required/> <br/> <br/>
						</label>
						<label>Venue :
						<input type="text" name="txtvenue" required/> <br/> <br/>
						</label>
						<label>College Name :
						<input type="text" name="txtcollege" required/> <br/> <br/>
						</label>
						
						<input type="submit" name="btnupdate" value="Update"/>
						<br/>
						<br/>
						<a href="http://localhost/WT%20Assignment/Welcome.php" style="text-color:black">Click Here to go Back</a>
						</center>
			</fieldset>
		</form>
		<br/>
		
		
		<?php
		if(isset($_POST['btnupdate']))
		{
			$sid=$_POST['txtserial'];
			$deptname=$_POST['inputbranch1'];
			$year=$_POST['txtyear'];
			$sem=$_POST['inputsem'];
			$edate=$_POST['txtdate'];
			$instrname=$_POST['txtinstrname'];
			$num=$_POST['txtnum'];
			$instname=$_POST['txtinstname'];
			$ibranch=$_POST['inputbranch2'];
			$exper=$_POST['txtexper'];
			$topic=$_POST['txttopic'];
			$type=$_POST['inputtype'];
			$days=$_POST['txtdays'];
			$venue=$_POST['txtvenue'];
			$college=$_POST['txtcollege'];
			$connection = mysqli_connect("localhost","root","");
			if($year>=2020 || $year <=2000)
			{
				echo "Enter year between 2000 and 2020";
				exit();
			}
			if ($exper < 1 && $exper> 50)
			{
				echo "Enter valid experience";
				exit();
			}
			if($num_phone==10)
			{
			mysqli_select_db($connection,"wt");
			if(! $connection){
				die('Could Not connect :'.mysqli_error());
			}
			$stmt = "SELECT * FROM table_workshop WHERE sid = $sid";
			$query1 = mysqli_query($connection,$stmt);
			if(mysqli_num_rows($query1) > 0)
				{
					$query2="UPDATE table_workshop 
					SET dept_name='$deptname',	acad_year=$year, sem='$sem',	date='$edate',	
					instr_name='$instrname',	cont_num=$num,	inst_name='$instname',	instr_branch='$ibranch',
					years_exp=$exper, topic='$topic',	type_activity='$type',	no_days=$days,	
					venue='$venue',	college_name='$college'  
					WHERE sid = $sid";
					if (mysqli_query($connection, $query2)) {
						echo "Record updated successfully";
						} 						
						else {
								echo "Error updating record: " . mysqli_error($connection);
							}
				}
			else
				{
					echo "No records to Update : Do not Exist";
					
        }
			mysqli_close($connection);
			
		}
		else{
			echo "Enter valid Number";
		}
		}
		?>