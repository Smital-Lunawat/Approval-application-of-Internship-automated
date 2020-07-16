<?php
include("connect.php");
session_start();
$id=$_SESSION['id'];
if(isset($_POST['Result']))
{
// $Student_name = $_POST['Student_name'];
// $Date = date('Y-m-d', strtotime($_POST['Date']));
$Industrial_Supervisor = $_POST['Industrial_Supervisor'];
$Title = $_SESSION['topic'];
$Supervisor_Email = $_POST['Supervisor_Email'];
$Internship_type = $_POST['Internship_type'];
$Organization_name = $_SESSION['company_name'];
$Organization_Address = $_POST['Organization_Address'];
$Faculty_Coordinator = $_POST['Faculty_Coordinator'];
$Department = $_POST['Department'];
$Start_date = date('Y-m-d', strtotime($_SESSION['start_date']));
$End_date = date('Y-m-d', strtotime($_SESSION['end_date']));
$Experience = $_POST['Experience'];


for ($i = 1; $i <= 15; $i++)
{
  ${"Q_no_".$i} = $_POST['Q_no_'.$i];
}
// $Q_no_1 = $_POST['Q_no_1'];
// $Q_no_2 = $_POST['Q_no_2'];
// $Q_no_3 = $_POST['Q_no_3'];
// $Q_no_4 = $_POST['Q_no_4'];
// $Q_no_5 = $_POST['Q_no_5'];
// $Q_no_6 = $_POST['Q_no_6'];
// $Q_no_7 = $_POST['Q_no_7'];
// $Q_no_8 = $_POST['Q_no_8'];
// $Q_no_9 = $_POST['Q_no_9'];
// $Q_no_10 = $_POST['Q_no_10'];
// $Q_no_11 = $_POST['Q_no_11'];
// $Q_no_12 = $_POST['Q_no_12'];
// $Q_no_13 = $_POST['Q_no_13'];
// $Q_no_14 = $_POST['Q_no_14'];
// $Q_no_15 = $_POST['Q_no_15'];
$overall_experience = $_POST['overall_experience'];

// $query = "INSERT INTO `feedback` (`Student name`, `Date`, `Industrial Supervisor`, `Title`, `Supervisor Email`, `Type`,
// `Organization Name`, `Organization Address`, `Faculty Coordinator`, `Department`, `Start date`, `End date`,
// `Experience related to your major area of study`, `Q_no_1`, `Q_no_2`, `Q_no_3`, `Q_no_4`, `Q_no_5`, `Q_no_6`,
// `Q_no_7`, `Q_no_8`, `Q_no_9`, `Q_no_10`, `Q_no_11`, `Q_no_12`, `Q_no_13`, `Q_no_14`, `Q_no_15`, `Considering your overall experience, how would you rate this internship?`) VALUES ('$Student_name', '$Date', '$Industrial_Supervisor', '$Title',
//   '$Supervisor_Email', '$Internship_type', '$Organization_name', '$Organization_Address', '$Faculty_Coordinator', '$Department', '$Start_date',
//    '$End_date', '$Experience', '$Q_no_1', '$Q_no_2', '$Q_no_3', '$Q_no_4', '$Q_no_5', '$Q_no_6', '$Q_no_7', '$Q_no_8', '$Q_no_9', '$Q_no_10', '$Q_no_11', '$Q_no_12', '$Q_no_13', '$Q_no_14', '$Q_no_15', '$overall_experience')";

$query = "INSERT INTO `feedback` (`Industrial Supervisor`, `Title`, `Supervisor Email`, `Type`, `Organization Name`, `Organization Address`, `Faculty Coordinator`, `Department`, `Start date`, `End date`, `Experience related to your major area of study`, `Q_no_1`, `Q_no_2`, `Q_no_3`, `Q_no_4`, `Q_no_5`, `Q_no_6`, `Q_no_7`, `Q_no_8`, `Q_no_9`, `Q_no_10`, `Q_no_11`, `Q_no_12`, `Q_no_13`, `Q_no_14`, `Q_no_15`, `Considering your overall experience, how would you rate this int`) VALUES ('$Industrial_Supervisor', '$Title',
'$Supervisor_Email', '$Internship_type', '$Organization_name', '$Organization_Address', '$Faculty_Coordinator', '$Department', '$Start_date',
 '$End_date', '$Experience', '$Q_no_1', '$Q_no_2', '$Q_no_3', '$Q_no_4', '$Q_no_5', '$Q_no_6', '$Q_no_7', '$Q_no_8', '$Q_no_9', '$Q_no_10', '$Q_no_11', '$Q_no_12', '$Q_no_13', '$Q_no_14', '$Q_no_15', '$overall_experience')";

$query_run = mysqli_query($conn,$query);
if($query_run)
{
  $sql = "UPDATE internship_data SET feedback = 'Done' WHERE internship_data.id = $id";
  if($conn->query($sql)){
      echo "Done!";
  }else{
      echo "$conn->error";
  }
     header("location: page_2.php");
    // echo '<script type="text/javasript"> alert("Data Saved") </script>';
    echo '<script language="javascript">';
    echo 'alert("message successfully sent")';
    echo '</script>';
}
else
{
    echo '<script type="text/javasript"> alert("Data Not Saved") </script>';
}
// echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
// <strong>Success!!!</strong>
// <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//     <span aria-hidden="true">&times;</span>
// </button>
// </div>';
}
?>
