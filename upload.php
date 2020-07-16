<?php
session_start();

include 'connect.php';
//add login_header include '';
// Uploads files

	$roll_no = $_SESSION['roll_no'];
	$topic = $_POST['topic'];
	$year = $_POST['year'];
	$duration = $_POST['duration'];
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
	echo $rnum."break";
	if($rnum!=0){
		echo'<script>alert("Already Applied");</script>';

	}else{
		$stmt = $conn->prepare("SELECT roll_no From internship_data Where NOT myfile = ''  AND roll_no = ?");
		$stmt->bind_param("s",$roll_no);
		$stmt->execute();
		$stmt->store_result();
		$rnum = $stmt->num_rows;
		echo ($rnum+1)."break";

		if(!empty($_FILES['myfile']['name']) && isset($_FILES['myfile'])){
			$filename = $_FILES['myfile']['name'];
			$filename = explode(" ",$filename);
			$filename = join("_",$filename);
			$file_ext=explode('.',$filename);
			$file_ext=strtolower(end($file_ext));
			echo $filename;

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

					$sql = "INSERT INTO `internship_data`(`roll_no`, `topic`,`year_new`, `starting_date`, `end_date`,`company_name`, `approval_status`, `completion_status`, `certificate`,`feedback`,`duration`,`myfile`,`comment`) VALUES ('$roll_no','$topic','$year','$starting_date','$end_date','$company_name','Pending','None','Not Uploaded Yet','',$duration,'".$destination1."','No comment')";
					if ($conn->query($sql))
					{

						echo "Done!";
					}
				else
					{
					echo "$conn->error";
					}
				}

		}else{
			echo "Hi";
			$sql = "INSERT INTO `internship_data`(`roll_no`, `topic`,`year_new`, `starting_date`, `end_date`,`company_name`,`approval_status`, `completion_status`, `certificate`,`feedback`,`duration`,`myfile`,`comment`) VALUES ('$roll_no','$topic','$year','$starting_date','$end_date','$company_name','Pending','None','Not Uploaded Yet','',$duration,'','No comment')";

			if ($conn->query($sql))
					{

						echo "Done!";
					}
				else
					{
					echo "$conn->error";
					}
		}
	}
}

?>
