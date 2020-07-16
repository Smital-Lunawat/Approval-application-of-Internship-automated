<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>RAIT</title>
	<link rel="stylesheet" type="text/css" href="css/finalcss.css">
  	<script src="https://kit.fontawesome.com/dc6b196a84.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style type="text/css">
	.pink {
		background: #fff;

	}
	.white {
		background: white;
		border: 1px solid purple;
	}
	div.a{
		font-size: 18px;
	}

</style>
</head>
<body class="pink">
  <nav class=" fixed-top navbar-custom navbar navbar-expand-lg ">
    <a class="navbar-brand" href="#" style="color: #f7f7f7;"><b>RAIT Internships</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
<i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
      </ul>
    <form class="form-inline my-2 my-lg-0">

        <a href="admin_1.php" class="btn btn-outline-light my-2 my-sm-0 mr-3 " ><b>Admin</b></a>

    </form>
   <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
  </div>

</nav>
<br><br>



<div class="container">
		<div class="col-lg-12 a" style="color: #333333;"><b>
                <h1 align="center" style="color: #666666;">INTERNSHIP DETAILS</h1><br>
            <?php
                include("connect.php");
                if(isset($_GET['id'])){
                    $topicId=$_GET['id'];
                    $rollId=$_GET['p_id'];
                    $sql = "SELECT * FROM internship_data WHERE internship_data.topic = '$topicId' AND internship_data.roll_no = '$rollId'";
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_array($result);
                }

            ?>


                        <br><br>
                        Roll No:  <?php echo $data['roll_no']?> <br><br>
                        Topic: <?php echo $data['topic']?> <br><br>
                        Year: <?php echo $data['year_new'] ?> <br><br>
                        Duration: <?php echo $data['duration'] ?> <br><br>
                        Start & End Date: <?php echo $data['starting_date'] ?> to <?php echo $data['end_date'] ?> <br><br>

												<a href="<?php echo $data['myfile']; ?> " target = "_blank"><button class="btn btn-primary">Additional Documents</button></a><br><br>
                        <?php
                        if($data['approval_status'] == 'Pending'){
                        ?>
                          <form method = "POST">
                          <input type="text" placeholder = "Comments" name="comments"><br><br>
                          <button id="approvalstat" name="approvalstat" value = "Approved" type="submit" class="btn btn-success btn-lg">Approve</button>
                          <button id="approvalstat" name="approvalstat" value = "Rejected" type="submit" class="btn btn-danger btn-lg">Reject</button>
                        </form><br></b>
                        <?php
                        }else{
                          if($data['certificate'] != 'Not Uploaded Yet'){
                            ?>
                              <a href="<?php echo $data['certificate']; ?> " target = "_blank"><button class="btn btn-primary">Certificate</button></a><br><br>
                              <form method = "POST">
                              <button id="approvalcert" name="approvalcert" value = "Approved" type="submit" class="btn btn-success btn-lg">Approved</button>
                              <button id="approvalcert" name="approvalcert" value = "Rejected" type="submit" class="btn btn-danger btn-lg">Rejected</button>
                            </form>
                            <?php
                            }else{
                            ?>
                              Certificate: <?php echo $data['certificate'] ?>
                            <?php
                            }

                        }
                        ?>
             <?php
            if (isset($_POST['approvalstat'])) {
              if($_POST['approvalstat']=='Approved'){
                mysqli_query($conn,"UPDATE internship_data SET completion_status = 'in-progress',approval_status = '".$_POST['approvalstat']."',comment = 'Applied Successfully'
                WHERE internship_data.roll_no = '$rollId' AND internship_data.topic = '$topicId'");
                header('location:admin_1.php');
              }else{
                mysqli_query($conn,"UPDATE internship_data SET approval_status = '".$_POST['approvalstat']."',comment = '".$_POST['comments']."'
                WHERE internship_data.roll_no = '$rollId' AND internship_data.topic = '$topicId'");
                header('location:admin_1.php');
              }

            }
						if (isset($_POST['approvalcert'])) {
                if($_POST['approvalcert']=='Approved'){
                  mysqli_query($conn,"UPDATE internship_data SET completion_status = 'Completed' WHERE internship_data.roll_no = '$rollId' AND internship_data.topic = '$topicId'");
                  header('location:admin_1.php');
                }else{
                  echo '<script>alert("Rejected");</script>';
                  mysqli_query($conn,"UPDATE internship_data SET approval_status = '".$_POST['approvalcert']."', completion_status = 'Rejected' WHERE internship_data.roll_no = '$rollId' AND internship_data.topic = '$topicId'");

                }
              }
            ?>
                    </div>
</div>


</body>
</html>
