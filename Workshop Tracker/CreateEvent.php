<!DOCTYPE html>
<html>
	<head>
		<title>Workshops</title>
	<head>
	<body style="background-color:lightblue">
			<form action="CreateEvent.php" method="get">
			<center>
				<fieldset>
				<legend><b><u><h2>Department Details</h2></u></b></legend>
				<table width="500px">
				<tr>
					<td>
						<label>Department :
					</td>
					<td>
						<select name="inputbranch1" >
						<option value="select" selected="true" disabled="disabled">-----------Select----------</option>
						<option value="ComputerScience">Computer Science</option>
						<option value="Mechanical">Mechanical</option>
						<option value="Civil">Civil</option>
						<option value="EEE">EEE</option>
						<option value="ECE">ECE</option>
						<option value="InformationScience">Information Science</option>
						<option value="Chemical">Chemical</option>
						</select>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Academic Year :
					</td>
					<td>
						<input type="text" name="inputyear" required/> <br />
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Semester :
					</td>
					<td>
						<select name="inputsem">
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
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Date :
					</td>
					<td>
						<input type="date" name="inputdate" /><br />
						</label>
					</td>
				</tr>
				</table>
				</fieldset>
				</center>
				<center>
				<fieldset>
				<legend><h2><u><b>Instructor Details</b></u></h2></legend>
				<table width="500px">
				<tr>
					<td>
						<label>Instructor's Name :
					</td>
					<td>
						<input type="text" name="inputinstr" required/><br />
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Contact Number :
					</td>
					<td>
						<input type="text" name="inputinstrnumber" required/><br />
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Institution Name :
					</td>
					<td>
						<input type="text" name="inputinstname" required/><br />
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Instructor's Department :
					</td>
					<td>
						<select name="inputbranch2">
						<option value="select" selected="true" disabled="disabled">-----------Select----------</option>
						<option value="ComputerScience">Computer Science</option>
						<option value="Mechanical">Mechanical</option>
						<option value="Civil">Civil</option>
						<option value="EEE">EEE</option>
						<option value="ECE">ECE</option>
						<option value="InformationScience">Information Science</option>
						<option value="Chemical">Chemical</option>
						</select>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Years of Experience :
					</td>
					<td>
						<input type="text" name="inputexp" required/><br />
						</label>
					</td>
				</tr>
				</table>
				</fieldset>
				</center>
				<center>
				<fieldset>
				<legend><h2><u><b>Event Details</b></u></h2></legend>
				<table width="500px">
				<tr>
					<td>
						<label>Topic Name :
					</td>
					<td>
						<input type="text" name="inputtopic" required/><br />
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Type of Activity :
					</td>
					<td>
						<select name ="inputtype" required/>
						<option value="select" selected="true" disabled="disabled">-----------Select----------</option>
						<option value="workshop">Workshop</option>
						<option value="conference">Conference</option>
						</select>
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>No of Days :
					</td>
					<td>
						<input type="text" name="inputnodays" required/><br />
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>Venue :
					</td>
					<td>
						<input type="text" name="inputvenue" required/><br />
						</label>
					</td>
				</tr>
				<tr>
					<td>
						<label>College Name :
					</td>
					<td>
						<input type="text" name="inputcollegename" required/><br />
						</label>
					</td>
				</tr>
				</table>
				<input type="submit" name="btnsubmit" value="Submit"/>
				<br />
				<br/>
				<a href="http://localhost/WT%20Assignment/Welcome.php">Click Here to go Back</a>
				</fieldset>
				</center>
			</form>
		</center>
		<?php
		if(isset($_REQUEST['btnsubmit']))
		{
			$branch=$_REQUEST['inputbranch1'];
			$year=$_REQUEST['inputyear'];
			$sem=$_REQUEST['inputsem'];
			$date=$_REQUEST['inputdate'];
			$instr_name=$_REQUEST['inputinstr'];
			$number=$_REQUEST['inputinstrnumber'];
			$inst_name=$_REQUEST['inputinstname'];
			$ibranch=$_REQUEST['inputbranch2'];
			$exper=$_REQUEST['inputexp'];
			$topic=$_REQUEST['inputtopic'];
			$type=$_REQUEST['inputtype'];
			$days=$_REQUEST['inputnodays'];
			$venue=$_REQUEST['inputvenue'];
			$college=$_REQUEST['inputcollegename'];
			$num_phone=strlen($number);
			$connection = mysqli_connect("localhost","root","","wt");
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
			$preparedstmt = "INSERT INTO 
			table_workshop(dept_name,acad_year,sem,date,instr_name,cont_num,inst_name,instr_branch,
			years_exp,topic,type_activity,no_days,venue,college_name) 
			VALUES 
			('$branch','$year','$sem','$date','$instr_name',
			'$number','$inst_name','$ibranch','$exper','$topic',
			'$type','$days','$venue','$college')";
			
			$query = mysqli_query($connection,$preparedstmt ) or die(mysqli_connect_error($connection));
			echo "Record Inserted Successfully";
			mysqli_close($connection);
		}
		else echo "Enter valid phone number";
		}
		?>
	</body>
</html>