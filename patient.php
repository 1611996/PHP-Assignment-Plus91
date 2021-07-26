<html>
    <head><h3> Patient Details</h3></head>
    <style>
          #blueTable th {
   padding-top: 12px;
   padding-bottom: 12px;
   text-align: left;
   background-color: #5592bb;
   color: white;
}
body{
    text-align:center;
    border-style: solid;

}

    #name{
        margin-top:20px;
    }

    
}


    </style>
    <body>


<?php

$conn=  mysqli_connect("localhost","id16788929_gaurigodase","Sudip@123456","id16788929_gauri");
if (isset($_GET['insert'])){
    $name=$_GET['name'];
    $DBO=$_GET['date'];
    $age=$_GET['age'];
    $address=$_GET['address'];
    $city=$_GET['city'];
    $state=$_GET['state'];
    
    $sql="INSERT INTO `patient`(`name`, `dateofbirth`, `age`, `address`, `city`, `state`) VALUES ('$name','$DBO','$age','$address','$city','$state')";
    
    if(mysqli_query($conn,$sql)){
        echo "Data Inserted";
    }
}

if(isset($_GET['submit1'])){
    $idU=$_GET['patid'];
    
    $nameU=$_GET['patname'];
    $DOBU=$_GET['Birth'];
    $ageU=$_GET['age'];
    $addressU=$_GET['address'];
    $cityU=$_GET['city'];
    $stateU=$_GET['state'];
    
    
    $query11="UPDATE `patient` SET `name`='$nameU',`dateofbirth`='$DOBU',`age`='$ageU',`address`='$addressU',`city`='$cityU',`state`='$stateU' WHERE id='$idU'" ;
    
     
     
      if(mysqli_query($conn,$query11)){
          echo "updated";
      }}
      
 if (isset($_GET['delete'])){
   $idg=$_GET['patid'];
    
    $namg=$_GET['tblName'];
    $DOBg=$_GET['tbldob'];
    $ageg=$_GET['tblage'];
    $addressg=$_GET['tbladdress'];
    $cityg=$_GET['tblcity'];
    $stateg=$_GET['tblstate'];
    
    $query2="DELETE FROM `patient` WHERE id='$idg'";
    
    if(mysqli_query($conn,$query2)){
       echo "<script>alert(Data Deleted)</script>";
     
    }
}

    
    $query1="SELECT * FROM `patient`";
    
    echo"<form method='GET' action=''><table class='blueTable'id='blueTable' cellpadding='4' border='1' style=width:50% style=display: inline-block;>	
	<thead><tr><th style='width:1%;white-space:nowrap;'>Name</th><th>DOB</th><th>Age</th><th>Address</th><th>City</th><th>State</th><th colspan=2>
Action</th></tr></thead>";
	   
    $result=mysqli_query($conn,$query1);
         while ($row = mysqli_fetch_assoc($result)) {
           echo "<tr>
<input type='hidden' name='patid' value=".$row["id"].">           
<td ><input type='hidden' name='tblName' value=".$row["name"].">" . $row["name"] ."</td>
<td ><input type='hidden' name='tbldob' value=".$row["dateofbirth"].">" . $row["dateofbirth"]. "</td>
<td ><input type='hidden' name='tblage' value=".$row["age"].">" . $row["age"]. "</td>
<td ><input type='hidden' name='tbladdress' value=".$row["address"].">".$row["address"]."</td>
<td ><input type='hidden' name='tblcity' value=".$row["city"].">".$row["city"]."</td>
<td ><input type='hidden' name='tblstate' value=".$row["state"].">" . $row["state"] . "</td>
<td><a href=><input type='submit' name='edit' value=Edit></a></td>
<td><a href=><input type='submit' name='delete' value=delete></a></td>

</tr>";
}
echo "</table></form>";





if(isset($_GET['edit'])){
    $idp=$_GET['patid'];
    
    $namep=$_GET['tblName'];
    $DOBP=$_GET['tbldob'];
    $agep=$_GET['tblage'];
    $addressp=$_GET['tbladdress'];
    $cityp=$_GET['tblcity'];
    $statep=$_GET['tblstate'];
    
    $sql1="select * from patient where id='$idp'";
     
      if(mysqli_query($conn,$sql1)){
        
    
    
  echo"  <form method='GET'  action=''>
 <div class='table-responsive text-nowrap'>
  <table class='table table-borderless shadow p-2 mb-2 mt-3'>
    <tbody>
      <tr>
        <input type='hidden' name='patid' value='$idp'>
      <th>Patient Name:</th>
        <th><input type='text'  class='form-control' name='patname' id='patname' value='$namep' autocomplete='off' ></th>
      </tr>
      <tr>
        <th>Date of Birth:</th>
        <th><input type='text'  class='form-control' name='Birth' id='Birth' value='$DOBP'  autocomplete='off' ></th>
        <th>Age:</th>
        <th><input type='text'  class='form-control' name='age' id='age' value='$agep' autocomplete='off' ></th>
        </tr>
         <tr>
          <th>Address:</th>
        <th><input type='text'  class='form-control' name='address' id='address' value='$addressp' autocomplete='off' ></th>
        <th>City:</th>
        <th><input type='text'  class='form-control' name='city' id='city' value='$cityp' autocomplete='off' ></th>
        </tr>
        <th>State:</th>
        <th><input type='text'class='form-control' name='state' id='state' value='$statep' autocomplete='off'> </th>
    
    
    </tbody>
  </table>
      </div> ";
     

}
 echo"<input type='submit' class='btn btn-primary' name='submit1' id='submit1' value ='Update'></form>\n";


}

else{
    
  
    
      echo" <div id=name><form method=GET action='' style=display: inline-block; style=margin-left:20px;>
      <table class='table table-borderless shadow p-2 mb-2 mt-3'>
    <tbody>
      <tr>
           
            <th>Patient_Name:</th>
            <th><input type='text' name='name' id='name'></th>
            
        </tr>
        <tr>
            <th>Patient DOB:</th>
             <th><input type='date' name='date' id='date'></th>
            <th>Patient_Age:</th>
            <th><input type='number' name='age' id='age' ></th>
        </tr>   
        <tr>
            <th>Patient_Address:</th>
            <th><textarea  name='address' id='address' rows='4' cols='20'></textarea></th>
             <th>Patient_City:</th>
            <th><input type='text' name='city' id='city'></th>
        </tr>
           <tr>
            <th>Patient_State:</th>
            <th><input type='text' name='state' id='state' ></th>
           <th> <input type='submit' name='insert' id='insert' value='Create'></th>
            
            </tr>
    
            </form> </div>";
}


?>
    </body>
</html>
