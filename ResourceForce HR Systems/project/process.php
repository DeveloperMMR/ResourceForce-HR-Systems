<?php

session_start();

$mysqli = new mysqli('localhost', 'root','', 'hr') or die(mysqli_error($mysqli));

$DepartmentID = 0;
$update = false;
$GroupName = '';
$Name = '';

if (isset($_POST['save'])){
    $DepartmentID = $_POST['DepartmentID'];
    $GroupName = $_POST['GroupName'];
	$Name = $_POST['Name'];
    
    $mysqli->query("INSERT INTO department (DepartmentID, GroupName, Name) VALUES('$DepartmentID', '$GroupName' ,'$Name')") or
            die($mysqli->error);
        
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";
    
    header("location: index.php");
    
}

if (isset($_GET['delete'])){
    $DepartmentID = $_GET['delete'];
    $mysqli->query("DELETE FROM department WHERE DepartmentID=$DepartmentID") or die($mysqli->error());
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    
    header("location: index.php");
}

if (isset($_GET['edit'])){
    $DepartmentID = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM department WHERE DepartmentID=$DepartmentID") or die($mysqli->error());
    //if (count($result)==1){
    //    $row = $result->fetch_array();
    //    $DepartmentID = $row['DepartmentID'];
    //    $GroupName = $row['GroupName'];
	if ($result && $row = $result->fetch_array()){
        $DepartmentID = $row['DepartmentID'];
        $GroupName = $row['GroupName'];
		$Name = $row['Name'];
    }
}

if (isset($_POST['update'])){
    $DepartmentID = $_POST['DepartmentID'];
    $GroupName = $_POST['GroupName'];
	$Name = $_POST['Name'];
    
    $mysqli->query("UPDATE department SET GroupName='$GroupName', Name='$Name' WHERE DepartmentID=$DepartmentID") or
            die($mysqli->error);
    
    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";
    
    header('location: index.php');
}
?>

<?php 
  if (isset($_GET['deletes'])){
    $employee = $_GET['deletes'];
    $mysqli->query("DELETE FROM employee WHERE BusinessEntityID=$employee");
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
};
?>

<?php 
  if (isset($_GET['delete_EDH'])){
    $employeedph = $_GET['delete_EDH'];
    $mysqli->query("DELETE FROM employeedepartmenthistory WHERE BusinessEntityID=$employeedph");
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
};
?>


<?php 
  if (isset($_GET['delete_4th'])){
    $employee_4th = $_GET['delete_4th'];
    $mysqli->query("DELETE FROM employeepayhistory WHERE BusinessEntity=$employee_4th");
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
};
?>

<?php 
  if (isset($_GET['delete_5th'])){
    $employee_5th = $_GET['delete_5th'];
    $mysqli->query("DELETE FROM jobcandidate WHERE JobCandidateID=$employee_5th");
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
};
?>

<?php 
  if (isset($_GET['delete_6th'])){
    $employee_6th = $_GET['delete_6th'];
    $mysqli->query("DELETE FROM shift WHERE ShiftID=$employee_6th");
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
};
?>


<?php 
  if (isset($_GET['delete_7th'])){
    $employee_7th = $_GET['delete_7th'];
    $mysqli->query("DELETE FROM 
Sponsorship WHERE SponsorshipID=$employee_7th");
    
    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";
    header("location:index.php");
};
?>

