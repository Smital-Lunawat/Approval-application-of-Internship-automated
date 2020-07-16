<?php
session_start();

include 'connect.php';

// Database id is taken
$id = $_SESSION['id'];
$roll_no = $_SESSION['roll_no'];
echo $roll_no;
echo $id;

if(isset($_POST['submit'])){
    echo 'Hi';
    $stmt = $conn->prepare("SELECT * FROM internship_data WHERE NOT certificate = 'Not Uploaded Yet' AND internship_data.id = $id  ");
    // intership_data.id = 2
    $stmt->execute();
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    //$rnum = 1
    if($rnum != 0){
        echo '<script>alert("Already uploaded!")</script>';
    }else{
        $stmt = $conn->prepare("SELECT roll_no FROM internship_data WHERE NOT certificate = 'Not Uploaded Yet' AND internship_data.roll_no = ?");
        $stmt->bind_param('s',$roll_no);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        echo ($rnum + 1);

        if(isset($_FILES['certificate'])){
            $filename = $_FILES['certificate']['name']; //SDG Admin.pdf
            $filename = explode(" ",$filename);//SDG Admin.pdf
			$filename = join("_",$filename);//SDG_Admin.pdf
			$file_ext=explode('.',$filename);//SDG_admin . pdf
			$file_ext=strtolower(end($file_ext));//pdf
			echo $filename;

			// get the file extension
			$extension1 = pathinfo($filename, PATHINFO_EXTENSION);
			$file_path = 'certificates/'.$roll_no;
			if(!is_dir($file_path)){
				mkdir($file_path);
			}
			// destination of the file on the server
			$destination1 = $file_path.'/'.'RAIT_'.$roll_no.'_000'.($rnum+1).'.'.$file_ext;

			

			// the physical file on a temporary uploads directory on the server
			$file1 = $_FILES['certificate']['tmp_name'];
			$size1 = $_FILES['certificate']['size'];
			if (move_uploaded_file($file1, $destination1) )
				{
                $sql = "UPDATE internship_data SET certificate = '".$destination1."' WHERE internship_data.id = $id ";
                if($conn->query($sql)){
                    echo "Done!";
                }else{
                    echo "$conn->error";
                }
            }
        }
    }
}


?>