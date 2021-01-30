<?php
session_start();
$roll_no = $_SESSION['roll_no'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$mname = $_SESSION['mname'];
$email = $_SESSION['email'];
$phone_no = $_SESSION['phone_no'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>RAIT</title>
	<link rel="stylesheet" type="text/css" href="css/finalcss.css">
		<script src="https://kit.fontawesome.com/dc6b196a84.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/png" href="http://www.dypatil.edu/mumbai/rait/wp-content/uploads/2015/02/favicon.png">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
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
<div>
        <div style="float:left">
            <img src="images/dypatil_logo.jpeg" class="center_img" alt="">
        </div>
        <div style="text-align:center;padding:3%;">
            <h3>RAMRAO ADIK INSTITUTE OF TECHNOLOGY, NERUL</h3>
        </div>
        <div style="clear:both" />
</div>
<body class="pink">
  <nav class="navbar-custom navbar navbar-expand-lg sticky-top">
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
      <a href="page_4.php" class="btn btn-outline-light my-2 my-sm-0 mr-4"><b>Apply</b></a>
    </form>
   <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
  </div>
  <a href="#" class="nav-item nav-link" style="color:#f7f7f7;"><?php echo $_SESSION['roll_no'] ?></a>
</nav>
<br><br>


<div class="container_2">
	<h1 align="center" style="color: #666666">YOUR INTERNSHIP DETAILS</h1><br>


            <?php
                include("connect.php");
                    if(isset($_GET['id'])){
                      $id = $_GET['id'];
                    
                    $sql = "SELECT * FROM internship_data WHERE internship_data.id = '$id' ";
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
                        <!-- Name: <?php echo $fname ?> <?php echo $mname ?> <?php echo $lname?><br><br>
                        Email: <?php echo $email?><br><br>
                        Phone No: <?php echo $phone_no?><br><br> -->
                        Topic: <?php echo $data['topic']?><br><br>
                        Company Name: <?php echo $data['company_name']?><br><br>
                        Year: <?php echo $data['year_new'] ?> <br><br>
                        Duration: <?php echo $data['duration'] ?> months <br><br>
                        Start & End Date: <?php echo $data['starting_date'] ?> to <?php echo $data['end_date'] ?> <br><br>
                        <?php
                        if($data['approval_status'] == 'Rejected' && $data['completion_status'] == 'Rejected'){   
                        ?>                       
                          Approval Status: <?php echo "Approved"; ?>
                        <?php                                                     
                        }                                               
                        else{
                        ?>  
                          Approval Status:  <?php echo $data['approval_status'];?>
                        <?php  
                        }    
                        ?>                         
                        <br><br>
                                
                        Completion Status: <?php echo $data['completion_status'] ?> <br><br>
                        Comment:  <?php echo $data['comment'] ?>  <br><br>
                                                
                         
                        <?php
                        $curdate=date("Y-m-d");
                        $mydate= $data['end_date'];
                        if($curdate >= $mydate && ($data['approval_status'] == 'Approved'))
                        {
                            if($data['feedback']  == 'Give Feedback'){
                              
                          ?> 
                             
                            <?php echo $data['feedback'].": "?><a href="feedback_main.php " target = "_blank"  required>Feedback</a>
                          
                          <?php
                          }
                            else{
                            echo "Feedback: Done";
                          }
                        }else if($data['approval_status'] == 'Rejected'){
                            echo " ";
                        }else{
                          ?>
                          <?php echo $data['feedback'].": "?><a  id='ThisLink' onclick='return false'>Feedback</a>
                        <?php  
                        }
                        ?><br><br>
                        <?php
                          if($data['approval_status'] == 'Approved' && $data['letter']!='no'){
                            
                        ?>  
                            <form action = "letter_main.php" method = "POST"> 
                            <?php
                            $_SESSION['letter'] = $data['letter'];
                            $_SESSION['id'] = $data['id'];
                            ?>
                            <button type = "submit" class="btn btn-primary">Relieving Letter</button><br>
                            </form>
                        <?php    
                          }
                        ?> 
                       
												
                    </div>
                        

            </div>
</body>
</html>
