<?php
session_start();

include 'connect.php';
//add login_header include '';
// Uploads files
	
	$roll_no = $_SESSION['roll_no'];
	$topic = $_POST['topic'];
	//echo $topic;
	$year = $_POST['year'];
	$gpa = $_POST['GPA'];
	$duration = $_POST['duration'];
	$letter = $_POST['letter'];
	$company_name = $_POST['company_name'];
	$starting_date = date('Y-m-d', strtotime($_POST['start_date']));
	$end_date = date('Y-m-d', strtotime($_POST['end_date']));
if (isset($_POST['submit']))
{ // if save button on the form is clicked
	$stmt = $conn->prepare("SELECT topic,roll_no,company_name,starting_date,end_date From internship_data Where topic = ? AND roll_no = ? AND company_name = ? AND starting_date = ? AND end_date = ?");
    $stmt->bind_param("sssss",$topic,$roll_no,$company_name,$starting_date,$end_date);
	$stmt->execute();
	$stmt->store_result();
	$rnum = $stmt->num_rows;
	//same query rnum = 1
	
	if($rnum!=0){
		echo'<script>alert("Already Applied");</script>';
		header('location:page_2.php');


	}else{
		$stmt = $conn->prepare("SELECT roll_no From internship_data Where NOT myfile = ''  AND roll_no = ?");
		$stmt->bind_param("s",$roll_no);
		$stmt->execute();
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		
		$sql = "INSERT INTO `internship_data`(`roll_no`, `topic`,`year_new`,`gpa`,`starting_date`, `end_date`,`company_name`,`approval_status`, `completion_status`, `certificate`,`feedback`,`duration`,`letter`,`myfile`,`comment`) VALUES ('$roll_no','$topic','$year','$gpa','$starting_date','$end_date','$company_name','Pending','None','Not Uploaded Yet','Give Feedback','$duration','$letter','','No comment')";
		if (mysqli_query($conn, $sql)) {
			$last_id = mysqli_insert_id($conn);
			echo "New record created successfully. Last inserted ID is: " . $last_id;
		  } else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		  }
		if(!empty($_FILES['myfile']['name']) && isset($_FILES['myfile'])){
			
			$filename = basename($_FILES['myfile']['name']);
			$filename = explode(" ",$filename);
			$filename = join("_",$filename);
			$file_ext=explode('.',$filename);
			$file_ext=strtolower(end($file_ext));

			$allowTypes = array('pdf');		
			// get the file extension
			$extension1 = pathinfo($filename, PATHINFO_EXTENSION);
			$file_path = 'uploads/'.$roll_no;
			if(!is_dir($file_path)){
				mkdir($file_path);
			}
			// destination of the file on the server
			$destination1 = $file_path.'/'.'RAIT_'.$roll_no.'_000'.($rnum+1).'.'.$file_ext;
			// SDG/uploads/17IT1064/RAIT_


			// the physical file on a temporary uploads directory on the server
			$file1 = $_FILES['myfile']['tmp_name'];			
			$size1 = $_FILES['myfile']['size'];
			if (move_uploaded_file($file1, $destination1) )
					{

						$sql2 = "UPDATE internship_data SET myfile = '".$destination1."' WHERE internship_data.id='$last_id' AND internship_data.roll_no = '$roll_no'";
						if ($conn->query($sql2))
						{
							echo '<script>alert("Applied Successfully");</script>';
							
							
						}
					else
						{
							
						echo "$conn->error";
						}
					}	
			
			
		}
		header('location:page_2.php');		
	}
}

?>
