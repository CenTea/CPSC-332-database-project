<html>
 <head>
  <title>CPSC332</title>
 </head>
<?php
	$serv = ‘’;
	$username = ‘’;
	$password = ‘’;
	$link = mysqli_connect($serv,$username,$password);
	$dbname=’’;
	Mysqli_select_db($link,$dbname);
?>
<body>
<p>
	<h1>Database</h1>
	CPSC332 Final Project</p>
<br><br>
For Professors: <br>	
<form method=”post”>
	Professor SSN: <br>
	<input type=”text” name = “SSN”>
	<input type= “submit” value=”Search”>
</form>
<?php
$sql = ‘SELECT CTitle, SectionClass, Mdays, BeginTime, EndTime FROM Courses, Sections WHERE Sections.TeacherID = $_POST[“SSN”], Courses.CNumber = Sections.Mcourse’;
If($result = mysqli_query($link,$sql)){
	If(mysqli_num_rows($result>0)){
	echo “<table>”;
	echo “<tr>”;
	echo “<th>Course</th>”;
	echo “<th>Classroom</th>”;
	echo “<th>Meeting Days </th>”;
	echo “<th>Begins</th>”;
	echo “<th>Ends</th>”;
	echo “</tr>”;
	while($row=mysqli_fetch_array($result)){
	echo “<tr>”;
	echo “<td>” . $row[‘SectionClass’] . “</td>”;
	echo “<td>” . $row[‘Mdays’] . “</td>”;
	echo “<td>” . $row[‘BeginTime’] . “</td>”;
	echo “<td>” . $row[‘EndTime’] . “</td>”;
	echo “</tr>”;
}	
	echo “</table>”;
	myslqi_free_result($result);
	}}
?><br>
Grades: <br>
<form method =”post”>
	Course Number:<br>
	<input type=”text” name = “CSN”> <br>
	Section Number:<br>
	<input type=”text” name=”SECN”>
	<input type=”submit” value=”Search”>
</form>
<?php
$sql = ‘SELECT StudentGrade COUNT(*) FROM Enrollment WHERE Enrollment.CourseSection= $_POST[“SECN”], Enrollement.CourseID = $_POST[“CSN”] GROUP BY StudentGrade’;
if($result = mysqli_query($link,$sql)){
	if(mysqli_num_rows($result>0)){
	echo “<table>”;
	echo “<tr>”;
	echo “<th>Grades</th>”;
	echo “</tr>”;
	while($row=mysqli_fetch_array($result)){
	echo “<tr>”;
	echo “<td>” . $row[‘StudentGrade’] . “</td>”;
	echo “</tr>”;
}
	echo ”</table>”;
	}}
?><br><br>
For Students:<br>
<form method = “post”>
	Course Number:<br>
	<input type=”text” name=”SCSN”>
	<input type=”submit” value=”Search”>
</form>
<?php
$sql = ‘SELECT SectionNum, SectionClass, MDays, BeginTime, EndTime, Seats FROM Sections WHERE Sections.MCourse = $_POST[“SCSN”]’;
If($result = mysqli_query($link,$sql)){
	If(myqli_num_rows($result>0)){
	echo “<table>”;
	echo “<tr>”;
	echo “<th>Section</th>”;
	echo “<th>Classroom</th>”;
	echo “<th>Days</th>”;
	echo “<th>Begins</th>”;
	echo “<th>Ends</th>”;
	echo “<th>Seats</th>”;
	echo “</tr>”;
	while($row=mysqli_fetch_array($result)){
	echo “<tr>”;
	echo “<td>” . $row[‘SectionNum’] . “</td>”;
	echo “<td>” . $row[‘SectionClass’] . “</td>”;
	echo “<td>” . $row[‘Mdays’] . “</td>”;
	echo “<td>” . $row[‘BeginTime’] . “</td>”;
	echo “<td>” . $row[‘EndTime’] . “</td>”;
	echo “<td>” . $row[‘Seats’] . “</td>”;
	echo “</tr>” ;
	}
	echo “</table>”;}}
?> <br>
<form method=”post”>
	Campus Wide ID: <br>
	<input type = “text” name=”CWID”>
	<input type = “submit” value=”Search”>
</form>
<?php
$sql = ‘SELECT CourseID, StudentGrade FROM Enrollment WHERE Enrollment.StudentID = $_POST[“CWID”]’;
If($result = mysqli_query($link,$sql)){
	If(mysqli_num_rows($result>0)){
	echo “<table>”;
	echo “<tr>”;
	echo “<th>Course</th>”;
	echo “<th>Grade</th>”;
	echo “</tr>”;
	while(mysqli_fetch_array($result)){
	echo “<tr>”;
	echo “<td>” . $row[‘CourseID’] . “</td>”;
	echo “<td>” . $row[‘StudentGrade’] . “</td>”;
	echo “</tr>”;
	}
	echo “</table>”;
	}
	}
?>
</body>
</html>
