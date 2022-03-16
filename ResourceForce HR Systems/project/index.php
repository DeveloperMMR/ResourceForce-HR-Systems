<!DOCTYPE html>
<html>
    <head>
        <title>NYU CRUD</title>
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
    </head>
	
    <body>
        <?php require_once 'process.php'; ?>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?=$_SESSION['msg_type']?>">
                <?php 
                    echo $_SESSION['message']; 
                    unset($_SESSION['message']);
                ?>
            </div>
        <?php endif ?>
        <div class="container">
        <?php
            $mysqli = new mysqli('localhost','root','','hr') or die(mysqli_error($mysqli));
            $result = $mysqli->query("SELECT * FROM department") or die($mysqli->error);
            //pre_r($result);
            ?>
            <div class="row justify-content-center">
                <table class="SimpleClass">
                    <thead>
                        <tr>                          
                            <th> <b> <p style="font-size:30px"> ResourceForce HR Systems</p> </b></th> 
                        </tr>
                    </thead>
					  <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
						<table width='80%' border=0>
						<tr bgcolor='#800080'>
						<th bgcolor="#800080"><font color="#fff">Department Table</font></th>
                        </tr>
                    </thead>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Department ID</th>
                            <th>Group Name</th>
							<th>Name</th>
                            <th colspan="2">Action</th>
							
                        </tr>
                    </thead>





            <?php
                while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['DepartmentID']; ?></td>
                        <td><?php echo $row['GroupName']; ?></td>
						<td><?php echo $row['Name']; ?></td>
                        <td>






                            <a href="index.php?edit=<?php echo $row['DepartmentID']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete=<?php echo $row['DepartmentID']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>





            <!--update or edit contenet-->
        <div class="row justify-content-center">
        <form action="process.php" method="POST">
            <div class="form-group">
            <label>Department ID</label>
            <input type="text" name="DepartmentID" class="form-control" 
                   value="<?php echo $DepartmentID; ?>" placeholder="Enter Department ID">
            </div>
            <div class="form-group">
            <label>Group Name</label>
            <input type="text" name="GroupName" 
                   value="<?php echo $GroupName; ?>" class="form-control" placeholder="Enter Group Name">
            </div>
            <div class="form-group">
            <label>Name</label>
            <input type="text" name="Name" 
                   value="<?php echo $Name; ?>" class="form-control" placeholder="Please Enter Name">
            </div>
            <div class="form-group">
            <?php 
            if ($update == true): 
            ?>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            <?php else: ?>
                <button type="submit" class="btn btn-primary" name="save">Save</button>
            <?php endif; ?>
            </div>
        </form>
        </div>
            <!---end content---->



<!--MohaiMinur Rahman Code-->

<?php 
    $dbresult = $mysqli->query("SELECT * FROM employee") or die($mysqli->error);

 ?>

    <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                        <table width='80%' border=0>
                        <tr bgcolor='#800080'>
                        <th bgcolor="#800080"><font color="#fff">Employee Table</font></th>
                        </tr>
                    </thead>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>EntityID</th>
                            <th>LoginID</th>
                            <th>JobTitle</th>
                            <th>BirthDate</th>
                            <th>MaritalStatus</th>
                            <th>Gender</th>
                            <th>Hire Date</th>
                            <th>Vacation Hours</th>
                            <th>SickLeaveHours</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>





            <?php
                while ($dta = $dbresult->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $dta['BusinessEntityID']; ?></td>
                        <td><?php echo $dta['LoginID']; ?></td>
                        <td><?php echo $dta['JobTitle']; ?></td>
                        <td><?php echo $dta['BirthDate']; ?></td>
                        <td><?php echo $dta['MaritalStatus']; ?></td>
                        <td><?php echo $dta['Gender']; ?></td>
                        <td><?php echo $dta['HireDate']; ?></td>
                        <td><?php echo $dta['VacationHours']; ?></td>
                        <td><?php echo $dta['SickLeaveHours']; ?></td>





                        <td>
                            <a href="index.php?edits=<?php echo $dta['BusinessEntityID']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?deletes=<?php echo $dta['BusinessEntityID']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>


           <!--update or edit contenet-->
           <?php 

           if (isset($_GET['edits'])){
    $employee = $_GET['edits'];
    $results = $mysqli->query("SELECT * FROM employee WHERE BusinessEntityID=$employee") or die($mysqli->error());

    $employeedb = mysqli_fetch_assoc($results);
};
?>



<?php
 if(isset($_POST['updates'])){

     $EntityID = $_POST['EntityID'];
     $LoginID = $_POST['LoginID'];
     $JobTitle = $_POST['JobTitle'];
     $BirthDate = $_POST['BirthDate'];
     $MaritalStatus = $_POST['MaritalStatus'];
     $Gender = $_POST['Gender'];
     $HireDate = $_POST['HireDate'];
     $VacationHours = $_POST['VacationHours'];
     $SickLeaveHours = $_POST['SickLeaveHours'];


     $sql_employee=$mysqli->query("UPDATE employee SET LoginID='$LoginID', JobTitle='$JobTitle', BirthDate='$BirthDate', MaritalStatus='$MaritalStatus', Gender='$Gender', HireDate='$HireDate', VacationHours='$VacationHours', SickLeaveHours='$SickLeaveHours' WHERE BusinessEntityID='$EntityID'");


        if($sql_employee){
            $_SESSION['message'] = "Record has been updated!";
        }else{
            $_SESSION['msg_type'] = "warning";
        }
   
}

  ?>  

           
        <div class="row justify-content-center">
        <form method="Post">
            <div class="form-group">
            <label>Entity ID</label>
            <input type="text" name="EntityID" class="form-control" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['BusinessEntityID'];}; ?>" placeholder="Enter EntityID">
            </div>
            <div class="form-group">
            <label>Login ID</label>
            <input type="text" name="LoginID" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['LoginID'];};?>" class="form-control" placeholder="Enter Login ID">
            </div>
            

            <div class="form-group">
                
                <label>JobTitle</label>
            <input type="text" name="JobTitle" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['JobTitle'];}; ?>" class="form-control" placeholder="Enter Job Title">
            </div>
            <div class="form-group">
                <label>Birth Date</label>
            <input type="text" name="BirthDate" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['BirthDate'];}; ?>" class="form-control" placeholder="Enter Birth Date">
            </div>
            <div class="form-group">
                <label>Marital Status</label>
            <input type="text" name="MaritalStatus" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['MaritalStatus'];}; ?>" class="form-control" placeholder="Enter MaritalStatus">
            </div>
            <div class="form-group">
                <label>Gender</label>
            <input type="text" name="Gender" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['Gender'];}; ?>" class="form-control" placeholder="Enter Gender">
            </div>
            <div class="form-group">
                <label>Hire Date</label>
            <input type="text" name="HireDate" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['HireDate'];}; ?>" class="form-control" placeholder="Enter Hire Date">
            </div>
            <div class="form-group">
            <label>Vacation Hours</label>
            <input type="text" name="VacationHours" class="form-control" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['VacationHours'];}; ?>" placeholder="Enter Vacation Hours">
            </div>
            <div class="form-group">
            <label>Sick Leave Hours</label>
            <input type="text" name="SickLeaveHours" class="form-control" 
                   value="<?php if(!empty($employeedb)){ echo $employeedb['SickLeaveHours'];}; ?>" placeholder="Enter Sick Leave Hours">
            </div>
            <button type="submit" class="btn btn-primary" name="updates">Save</button>

            
        </form>
        </div>
            <!---end content----> 












            <?php 
    $db3rd = $mysqli->query("SELECT * FROM employeedepartmenthistory") or die($mysqli->error);

 ?>

    <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                        <table width='80%' border=0>
                        <tr bgcolor='#800080'>
                        <th bgcolor="#800080"><font color="#fff">Employee Department History</font></th>
                        </tr>
                    </thead>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>BusinessEntity ID</th>
                            <th>Department ID</th>
                            <th>Shift ID</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>





            <?php
                while ($dta = $db3rd->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $dta['BusinessEntityID']; ?></td>
                        <td><?php echo $dta['DepartmentID']; ?></td>
                        <td><?php echo $dta['ShiftID']; ?></td>
                        <td><?php echo $dta['StartDate']; ?></td>
                        <td><?php echo $dta['EndDate']; ?></td>
                        





                        <td>
                            <a href="index.php?edit_EDH=<?php echo $dta['BusinessEntityID']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete_EDH=<?php echo $dta['BusinessEntityID']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>

<?php 

    if (isset($_GET['edit_EDH'])){
    $employeeedh = $_GET['edit_EDH'];
    $resultsedh = $mysqli->query("SELECT * FROM employeedepartmenthistory WHERE BusinessEntityID=$employeeedh") or die($mysqli->error());

    $employeeedhdb = mysqli_fetch_assoc($resultsedh);
    };
?>



<?php
 if(isset($_POST['update_edh'])){

     $BusinessEntityID = $_POST['BusinessEntityID'];
     $DepartmentID = $_POST['DepartmentID'];
     $ShiftID = $_POST['ShiftID'];
     $StartDate = $_POST['StartDate'];
     $EndDate = $_POST['EndDate'];
     


     $sql_employee=$mysqli->query("UPDATE employeedepartmenthistory SET DepartmentID='$DepartmentID', ShiftID='$ShiftID', StartDate='$StartDate', EndDate='$EndDate' WHERE BusinessEntityID='$BusinessEntityID'");


        if($sql_employee){
            $_SESSION['message'] = "Record has been updated!";
        }else{
            $_SESSION['msg_type'] = "warning";
        }
   
}

  ?>






<div class="row justify-content-center">
        <form method="POST">
            <div class="form-group">
            <label>BusinessEntity ID</label>
            <input type="text" name="BusinessEntityID" class="form-control" 
                   value="<?php if(!empty($employeeedhdb)){ echo $employeeedhdb['BusinessEntityID'];}; ?>" placeholder="Enter BusinessEntity ID">
            </div>
            <div class="form-group">
            <label>Department ID</label>
            <input type="text" name="DepartmentID" 
                   value="<?php if(!empty($employeeedhdb)){echo $employeeedhdb['DepartmentID'];}; ?>" class="form-control" placeholder="Enter Department ID">
            </div>
            <div class="form-group">
            <label>Shift ID</label>
            <input type="text" name="ShiftID" 
                   value="<?php if(!empty($employeeedhdb)){echo $employeeedhdb['ShiftID'];}; ?>" class="form-control" placeholder="Please Enter Shift ID">
            </div>
            <div class="form-group">
            <label>Start Date </label>
            <input type="text" name="StartDate" 
                   value="<?php if(!empty($employeeedhdb)){echo $employeeedhdb['StartDate'];}; ?>" class="form-control" placeholder="Please Enter Start Date">
            </div>
            <div class="form-group">
            <label>End Date</label>
            <input type="text" name="EndDate" 
                   value="<?php if(!empty($employeeedhdb)){echo $employeeedhdb['EndDate'];}; ?>" class="form-control" placeholder="Please Enter End Date">
            </div>
            <div class="form-group">
    
                <button type="submit" class="btn btn-primary" name="update_edh">Save</button>
            </div>
        </form>
        </div>




<!-- 4th table -->

<?php 
    $db4th = $mysqli->query("SELECT * FROM employeepayhistory") or die($mysqli->error);

 ?>

    <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                        <table width='80%' border=0>
                        <tr bgcolor='#800080'>
                        <th bgcolor="#800080"><font color="#fff">Employee Pay History</font></th>
                        </tr>
                    </thead>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Entity ID</th>
                            <th>RateChange Date</th>
                            <th>Rate</th>
                            <th>Pay Frequency</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>





            <?php
                while ($dta = $db4th->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $dta['BusinessEntity']; ?></td>
                        <td><?php echo $dta['RateChangeDate']; ?></td>
                        <td><?php echo $dta['Rate']; ?></td>
                        <td><?php echo $dta['PayFrequency']; ?></td>





                        <td>
                            <a href="index.php?edit_4th=<?php echo $dta['BusinessEntity']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete_4th=<?php echo $dta['BusinessEntity']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>


<?php 

    if (isset($_GET['edit_4th'])){
    $employeee_4th = $_GET['edit_4th'];
    $resultse_4th = $mysqli->query("SELECT * FROM employeepayhistory WHERE BusinessEntity=$employeee_4th") or die($mysqli->error());

    $employeeedb_4th = mysqli_fetch_assoc($resultse_4th);
    };
?>




<?php
 if(isset($_POST['update_4th'])){

     $BusinessEntity = $_POST['BusinessEntity'];
     $RateChangeDate = $_POST['RateChangeDate'];
     $Rate = $_POST['Rate'];
     $PayFrequency = $_POST['PayFrequency'];
     


     $sql_employee=$mysqli->query("UPDATE employeepayhistory SET RateChangeDate='$RateChangeDate', Rate='$Rate', PayFrequency='$PayFrequency' WHERE BusinessEntity='$BusinessEntity'");


        if($sql_employee){
            $_SESSION['message'] = "Record has been updated!";
        }else{
            $_SESSION['msg_type'] = "warning";
        }
   
}

  ?>







<div class="row justify-content-center">
        <form method="POST">
            <div class="form-group">
            <label>Business Entity</label>
            <input type="text" name="BusinessEntity" class="form-control" 
                   value="<?php if(!empty($employeeedb_4th)){ echo $employeeedb_4th['BusinessEntity'];}; ?>" placeholder="Enter BusinessEntity ID">
            </div>
            <div class="form-group">
            <label>Rate Change Date</label>
            <input type="text" name="RateChangeDate" 
                   value="<?php if(!empty($employeeedb_4th)){echo $employeeedb_4th['RateChangeDate'];}; ?>" class="form-control" placeholder="Enter Department ID">
            </div>
            <div class="form-group">
            <label>Rate</label>
            <input type="text" name="Rate" 
                   value="<?php if(!empty($employeeedb_4th)){echo $employeeedb_4th['Rate'];}; ?>" class="form-control" placeholder="Please Enter Shift ID">
            </div>
            <div class="form-group">
            <label>Pay Frequency</label>
            <input type="text" name="PayFrequency" 
                   value="<?php if(!empty($employeeedb_4th)){echo $employeeedb_4th['PayFrequency'];}; ?>" class="form-control" placeholder="Please Enter Start Date">
            </div>
            
            <div class="form-group">
    
                <button type="submit" class="btn btn-primary" name="update_4th">Save</button>
            </div>
        </form>
        </div>







<!-- 4th table end-->

<!--5th table-->
<?php 
    $db5th = $mysqli->query("SELECT * FROM jobcandidate") or die($mysqli->error);

 ?>

    <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                        <table width='80%' border=0>
                        <tr bgcolor='#800080'>
                        <th bgcolor="#800080"><font color="#fff">Job Candidate</font></th>
                        </tr>
                    </thead>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>JobCandidate ID </th>
                            <th>Business Entity </th>
                            <th>ResumeSubmitted</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>





            <?php
                while ($dta = $db5th->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $dta['JobCandidateID']; ?></td>
                        <td><?php echo $dta['BusinessEntity']; ?></td>
                        <td><?php echo $dta['ResumeSubmitted']; ?></td>





                        <td>
                            <a href="index.php?edit_5th=<?php echo $dta['JobCandidateID']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete_5th=<?php echo $dta['JobCandidateID']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>



<?php 

    if (isset($_GET['edit_5th'])){
    $employeee_5th = $_GET['edit_5th'];
    $resultse_5th = $mysqli->query("SELECT * FROM jobcandidate WHERE JobCandidateID=$employeee_5th") or die($mysqli->error());

    $employeeedb_5th = mysqli_fetch_assoc($resultse_5th);
    };
?>

<?php
 if(isset($_POST['update_5th'])){

     $JobCandidateID  = $_POST['JobCandidateID'];
     $BusinessEntity = $_POST['BusinessEntity'];
     $ResumeSubmitted = $_POST['ResumeSubmitted'];
     


     $sql_employee=$mysqli->query("UPDATE jobcandidate SET BusinessEntity='$BusinessEntity', ResumeSubmitted='$ResumeSubmitted' WHERE JobCandidateID='$JobCandidateID'");


        if($sql_employee){
            $_SESSION['message'] = "Record has been updated!";
        }else{
            $_SESSION['msg_type'] = "warning";
        }
   
}

  ?>




  <div class="row justify-content-center">
        <form method="POST">
            <div class="form-group">
            <label>Job Candidate ID</label>
            <input type="text" name="JobCandidateID" class="form-control" 
                   value="<?php if(!empty($employeeedb_5th)){ echo $employeeedb_5th['JobCandidateID'];}; ?>" placeholder="Enter Job Candidate ID">
            </div>
            <div class="form-group">
            <label>Business Entity</label>
            <input type="text" name="BusinessEntity" 
                   value="<?php if(!empty($employeeedb_5th)){echo $employeeedb_5th['BusinessEntity'];}; ?>" class="form-control" placeholder="Enter Business Entity">
            </div>
            <div class="form-group">
            <label>Resume Submitted</label>
            <input type="text" name="ResumeSubmitted" 
                   value="<?php if(!empty($employeeedb_5th)){echo $employeeedb_5th['ResumeSubmitted'];}; ?>" class="form-control" placeholder="Please Enter Resume">
            </div>
            
            <div class="form-group">
    
                <button type="submit" class="btn btn-primary" name="update_5th">Save</button>
            </div>
        </form>
</div>


<!--5th tabble end-->

<!-- 6th table-->

<?php 
    $db6th = $mysqli->query("SELECT * FROM shift") or die($mysqli->error);

 ?>

    <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                        <table width='80%' border=0>
                        <tr bgcolor='#800080'>
                        <th bgcolor="#800080"><font color="#fff">Shift</font></th>
                        </tr>
                    </thead>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Shift ID</th>
                            <th>Name</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>





            <?php
                while ($dta = $db6th->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $dta['ShiftID']; ?></td>
                        <td><?php echo $dta['Name']; ?></td>
                        <td><?php echo $dta['StartTime']; ?></td>
                        <td><?php echo $dta['EndTime']; ?></td>





                        <td>
                            <a href="index.php?edit_6th=<?php echo $dta['ShiftID']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete_6th=<?php echo $dta['ShiftID']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>

<?php 

    if (isset($_GET['edit_6th'])){
    $employeee_6th = $_GET['edit_6th'];
    $resultse_6th = $mysqli->query("SELECT * FROM shift WHERE ShiftID='$employeee_6th'") or die($mysqli->error());

    $employeeedb_6th = mysqli_fetch_assoc($resultse_6th);
    };
?>

<?php
 if(isset($_POST['update_6th'])){

     $ShiftID = $_POST['ShiftID'];
     $Name = $_POST['Name'];
     $StartTime = $_POST['StartTime'];
     $EndTime = $_POST['EndTime'];
     


     $sql_employee=$mysqli->query("UPDATE shift SET Name='$Name', StartTime='$StartTime', EndTime='$EndTime' WHERE ShiftID='$ShiftID'");


        if($sql_employee){
            $_SESSION['message'] = "Record has been updated!";
        }else{
            $_SESSION['msg_type'] = "warning";
        }
   
}

  ?>

  <div class="row justify-content-center">
        <form method="POST">
            <div class="form-group">
            <label>Shift ID </label>
            <input type="text" name="ShiftID" class="form-control" 
                   value="<?php if(!empty($employeeedb_6th)){ echo $employeeedb_6th['ShiftID'];}; ?>" placeholder="Enter Shift ID">
            </div>
            <div class="form-group">
            <label>Name</label>
            <input type="text" name="Name" 
                   value="<?php if(!empty($employeeedb_6th)){echo $employeeedb_6th['Name'];}; ?>" class="form-control" placeholder="Enter Name">
            </div>
            <div class="form-group">
            <label>Start Time</label>
            <input type="text" name="StartTime" 
                   value="<?php if(!empty($employeeedb_6th)){echo $employeeedb_6th['StartTime'];}; ?>" class="form-control" placeholder="Please Start Time">
            </div>
            <div class="form-group">
            <label>End Time</label>
            <input type="text" name="EndTime" 
                   value="<?php if(!empty($employeeedb_6th)){echo $employeeedb_6th['EndTime'];}; ?>" class="form-control" placeholder="Please Enter End Time">
            </div>
            
            <div class="form-group">
    
                <button type="submit" class="btn btn-primary" name="update_6th">Save</button>
            </div>
        </form>
</div>

<!-- 6th table end -->

<!--7th table-->

<?php 
    $db7th = $mysqli->query("SELECT * FROM sponsorship") or die($mysqli->error);

 ?>

    <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                        <table width='80%' border=0>
                        <tr bgcolor='#800080'>
                        <th bgcolor="#800080"><font color="#fff">Sponsorship</font></th>
                        </tr>
                    </thead>
            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Sponsorship ID</th>
                            <th>BusinessEntity ID</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                    </thead>





            <?php
                while ($dta = $db7th->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $dta['SponsorshipID']; ?></td>
                        <td><?php echo $dta['BusinessEntityID']; ?></td>





                        <td>
                            <a href="index.php?edit_7th=<?php echo $dta['SponsorshipID']; ?>"
                               class="btn btn-info">Edit</a>
                            <a href="process.php?delete_7th=<?php echo $dta['SponsorshipID']; ?>"
                               class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>    
                </table>
            </div>


<?php 

    if (isset($_GET['edit_7th'])){
    $employeee_7th = $_GET['edit_7th'];
    $resultse_7th = $mysqli->query("SELECT * FROM 
    Sponsorship WHERE SponsorshipID='$employeee_7th'") or die($mysqli->error());

    $employeeedb_7th = mysqli_fetch_assoc($resultse_7th);
    };
?>



<?php
 if(isset($_POST['update_7th'])){

     $SponsorshipID = $_POST['SponsorshipID'];
     $BusinessEntityID = $_POST['BusinessEntityID'];
     


     $sql_employee=$mysqli->query("UPDATE Sponsorship SET BusinessEntityID='$BusinessEntityID' WHERE SponsorshipID='$SponsorshipID'");


        if($sql_employee){
            $_SESSION['message'] = "Record has been updated!";
        }else{
            $_SESSION['msg_type'] = "warning";
        }
   
}

  ?>

  <div class="row justify-content-center">
        <form method="POST">
            <div class="form-group">
            <label>Sponsorship ID</label>
            <input type="text" name="SponsorshipID" class="form-control" 
                   value="<?php if(!empty($employeeedb_7th)){ echo $employeeedb_7th['SponsorshipID'];}; ?>" placeholder="Enter Sponsorship ID">
            </div>
            <div class="form-group">
            <label>Business Entity ID</label>
            <input type="text" name="BusinessEntityID" 
                   value="<?php if(!empty($employeeedb_7th)){echo $employeeedb_7th['BusinessEntityID'];}; ?>" class="form-control" placeholder="Enter Name">
            </div>
            
            <div class="form-group">
    
                <button type="submit" class="btn btn-primary" name="update_7th">Save</button>
            </div>
        </form>
</div>




<!--7th table end-->


<!--MMR Code End -->


            <?php
            
            function pre_r( $array ) {
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
        ?>
        
        
        </div>
    </body>


    <style type="text/css">
        
        .form-group{
            display: inline-block;
        }

    </style>