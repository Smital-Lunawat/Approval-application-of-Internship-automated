<?php
include("connect.php");
session_start();
if($_SESSION['letter'] == "yes"){
    $id = $_POST['id'];
}else{
    $id = $_SESSION['id'];
}
$sql = "SELECT * FROM internship_data WHERE internship_data.id = '$id'";
$result = $conn->query($sql);
$data = mysqli_fetch_array($result);
$dept = substr($data['roll_no'], 2, 2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Letter</title>
    <link rel="icon" type="image/png" href="http://www.dypatil.edu/mumbai/rait/wp-content/uploads/2015/02/favicon.png">
    <link rel="stylesheet" href="css/finalcss.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container-letter">
    <h3 align="center">RELIEVING LETTER OF STUDENT</h3><br><br>
    <h5 id="letter_spacing">To,</h5>
    <h5 id="letter_spacing"><strong><?php echo $data['company_name'];?></strong></h5><br>
    
    <h5 id="letter_spacing">Subject: Relieving letter of student and Industry.</h5><br>
    <h5 id="letter_spacing">Dear Sir,</h5>
    <h5 id="letter_spacing">Kindly refer your letter/e-mail dated <strong><?php echo date("m-d-Y") ?></strong> on the above cited subject. As permitted by your good self the following students will undergo Industrial Internship in your esteemed organization under your sole guidance & directions:</h5>
    <table align="center" border="1px" id="letter_spacing">
        <tr>
            <th width="5%">Sr. No.</th>
            <th width="10%">Name of Student</th>
            <th width="5%">Roll No.</th>
            <th width="5%">Branch</th>
        </tr>
        <tr>
            <td>1</td>
            <td><?php echo $_SESSION['fname']." ".$_SESSION['mname']." ".$_SESSION['lname'];?></td>
            <td><?php echo $data['roll_no'];?></td>
            <td><?php echo $dept; ?></td>
        </tr>
    </table><br>
    <h5 id="letter_spacing">This training being an essential part of the curriculum, the following guidelines have been prescribed in the curriculum for the training. You are therefore, requested to please issue following guidelines to the concerned manager/Industrial Supervisor.
        <ol>
            <li>Internship schedule may be prepared and a copy of the same may be sent to us.</li>
            <li>Each student is required to prepare Internship diary and report.</li>
            <li>Kindly check the Internship diary of the student daily.</li>
            <li>Issue instruction regarding working hours during training and maintenance of the attendance record.</li>    
        </ol>	
        </h5><br>
    <h5 style="background-color:#e6e6e6;border:1px solid black;" id="letter_spacing">You are requested to evaluate the student’s performance on the basis of grading i.e. Excellent, Very Good, Satisfactory and Non Satisfactory on the below mentioned factors. The performance report may please be forwarded to the undersigned on completion of training in sealed envelope.</h5><br>
    <table align="center" border="1px" id="letter_spacing">
        <tr>
            <th width="1%">Sr. No</th>
            <th width="10%">Name of Students</th>
            <th width="10%">Evaluation Ranking</th>
        </tr>
        <tr>
            <td>a</td>
            <td>Attendance and general behaviour</td>
            <td></td>
        </tr>
        <tr>
            <td>b</td>
            <td>Relation with workers and supervisors</td>
            <td></td>
        </tr>
        <tr>
            <td>c</td>
            <td>Initiative and efforts in learning</td>
            <td></td>
        </tr>
        <tr>
            <td>d</td>
            <td>Knowledge and skills improvement</td>
            <td></td>
        </tr>
        <tr>
            <td>e</td>
            <td>Contribution to the organization</td>
            <td></td>
        </tr>
    </table><br>
    <h5 id="letter_spacing">Your efforts in this regard will positively enhance knowledge and practical skills of the students, your cooperation will be highly appreciated and we shall feel obliged.</h5>
    <h5 id="letter_spacing">The students will abide by the rules and regulation of the organization and will maintain a proper discipline with keen interest during their Internship. The students will report to you on dated <strong><?php echo $data['starting_date'];?></strong> along with a copy of this letter.</h5><br>
    <h5 id="letter_spacing">Yours sincerely,</h5><br><br>
    <h5 id="letter_spacing">Head of the Department</h5>
    
    
    
    
</div>
</body>
</html>
