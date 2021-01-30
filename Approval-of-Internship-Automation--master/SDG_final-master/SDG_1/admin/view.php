<?php
    include("../connect.php");
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM internship_data WHERE id='$id'";
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
        $row = mysqli_fetch_array($result);
        $roll_no = $row['roll_no'];
        $myfile= $row['myfile'];
        // header("Content-type: application/pdf");
        // $filename = file_get_contents($_FILES[$myfile]);
        // echo $filename;
		// 	$filename = explode(" ",$filename);
		// 	$filename = join("_",$filename);
		// 	$file_ext=explode('.',$filename);
		// 	$file_ext=strtolower(end($file_ext));

		// 	$allowTypes = array('pdf');		
		// 	// get the file extension
			// $extension1 = pathinfo($filename, PATHINFO_EXTENSION);
			$file_path = 'uploads/'.$roll_no;
			if(!is_dir($file_path)){
				mkdir($file_path);
			}
			// destination of the file on the server
			$destination1 = $file_path.'/'.'RAIT_'.$roll_no.'_0001'.'.'.pdf;
			// SDG/uploads/17IT1064/RAIT_


			// the physical file on a temporary uploads directory on the server
			// $file1 = $_FILES[$row['myfile']]['tmp_name'];
		move_uploaded_file($myfile,$destination1);	
        // echo $row["myfile"];
	}
	mysqli_close($conn);
?>