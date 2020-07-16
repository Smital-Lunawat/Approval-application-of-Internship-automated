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
	  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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
  <nav class="fixed-top navbar-custom navbar navbar-expand-lg ">
  <a class="navbar-brand" href="#" style="color: #f7f7f7"><b>RAIT Internships</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
<i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
      </ul>
    <form class="form-inline my-2 my-lg-0">

      <a href="page_2.php" class="btn btn-outline-light my-2 my-sm-0 mr-3"><b>Home</b></a>
      <a href="page_4.html" class="btn btn-outline-light my-2 my-sm-0 mr-4"><b>Apply</b></a>
    </form>
   <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
  </div>

</nav>
<br><br>


<div class="container">
	<h1 align="center" style="color: #666666">YOUR INTERNSHIP DETAILS</h1><br>


            <?php
                include("connect.php");
                if(isset($_GET['id'])){
                    $rollId=$_GET['p_id'];
                    $topicId=$_GET['id'];
                    $sql = "SELECT * FROM internship_data WHERE internship_data.topic = '$topicId' AND internship_data.roll_no = '$rollId' ";
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_array($result);
                }

													$_SESSION['start_date'] = $data['starting_date'];
                          $_SESSION['end_date'] = $data['end_date'];
                          $_SESSION['topic'] = $data['topic'];
                          $_SESSION['company_name'] = $data['company_name'];
                          $_SESSION['id'] = $data['id'];
                          $_SESSION['roll_no'] = $data['roll_no'];

            ?>

                    <div class="col-lg-12 a" style="color: #333333;"><b>
                        <br><br>
                        Topic: <?php echo $data['topic']?><br><br>
                        Year: <?php echo $data['year_new'] ?> <br><br>
                        Duration: <?php echo $data['duration'] ?> <br><br>
                        Start & End Date: <?php echo $data['starting_date'] ?> to <?php echo $data['end_date'] ?> <br><br>
                        Approval Status:  <?php echo $data['approval_status'] ?> <br><br>
                        Completion Status: <?php echo $data['completion_status'] ?> <br><br>
                        Comment:  <?php echo $data['comment'] ?>  <br><br>
												Feedback: <?php echo $data['feedback'] ?>
                        <?php

                        if($data['feedback']  == ''){
                        ?>
                          <a href="feedback_main.php " target = "_blank" required>Feedback</a><br><br>
                        <?php
                        }
                        ?>
                        <form  action = "certificate.php" method = "POST" enctype="multipart/form-data">
                          <br>
                        <label for="certificate">Upload Certificate here:</label>
                        <input type="file" id="certificate" name="certificate" required/><br><br>
                        <input class="submit_btn" type="submit" name="submit">
                        </form><br></b>
												<?php
													if(isset($_POST['submit'])){
														echo 'Hi';
														if(empty($data['feedback'])){
															echo 'Feedback is required';
														}
													}
												?>
                    </div>


            </div>
</body>
</html>
