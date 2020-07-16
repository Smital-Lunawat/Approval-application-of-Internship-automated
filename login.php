<?php
include("connect.php");
session_start();
$roll_no = $_POST['roll_no'];
$serial_no = $_POST['serial_no'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$mname = $_POST['middle_name'];
$year = $_POST['year'];
$batch = $_POST['batch'];
$division = $_POST['division'];
$pass = $_POST['pass'];
$phone_no = $_POST['phone_no'];
$email = $_POST['email'];
$otp = $_POST['otp'];
$el_1 = $_POST['el_1'];
$el_2 = $_POST['el_2'];
$sem = $_POST['sem'];


if(!empty($fname) || !empty($lname) || !empty($roll_no) || !empty($serial_no) || !empty($phone_no) || !empty($pass)){

        $SELECT = "SELECT Roll_no From stu_record Where Roll_no = ? Limit 1";
        $INSERT = "INSERT Into stu_record(Roll_no,Serial_no,Last_Name,First_Name,Middle_Name,Year,Division,Batch,Password,Phone_no,emailid,OTP,EL_1,EL_2,sem) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s",$roll_no);
        $stmt->execute();
        $stmt->bind_result($roll_no);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        
        if($rnum !=0){
            echo $rnum;
            
            $_SESSION['fname']=$fname;
            $_SESSION['mname']=$mname;
            $_SESSION['lname']=$lname;
            $_SESSION['roll_no']=$roll_no;
            header('location:page_2.php');
        }
        else{
            echo $rnum;
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sissssssiissssi",$roll_no,$serial_no,$lname,$fname,$mname,$year,$division,$batch,$pass,$phone_no,$email,$otp,$el_1,$el_2,$sem);
            $stmt->execute();
            $_SESSION['fname']=$fname;
            $_SESSION['mname']=$mname;
            $_SESSION['lname']=$lname;
            $_SESSION['roll_no']=$roll_no;
            header('location:page_2.php');
        }
        $stmt->close();
        $conn->close();
    
}else{
    echo "All field are required";
    die();
}
?>