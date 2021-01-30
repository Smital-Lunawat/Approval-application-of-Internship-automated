<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>RAIT</title>
	<link rel="stylesheet" type="text/css" href="css/finalcss.css">
  <link rel="icon" type="image/png" href="http://www.dypatil.edu/mumbai/rait/wp-content/uploads/2015/02/favicon.png">
  <script src="javascript.js"></script>
  <script src="https://kit.fontawesome.com/dc6b196a84.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
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
  .btn{
    background-color: #c80000;
    color: #fff;
  }
</style>
</head>
<body >
<div>
        <div style="float:left">
            <img src="images/dypatil_logo.jpeg" class="center_img" alt="">
        </div>
        <div style="text-align:center;padding:3%;">
            <h3>RAMRAO ADIK INSTITUTE OF TECHNOLOGY, NERUL</h3>
        </div>
        <div style="clear:both" />
</div>

  <nav class="sticky-top navbar-custom navbar navbar-expand-lg ">
  <a class="navbar-brand" href="#" style="color: #f7f7f7"><b>RAIT Internships</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon">
<i class="fas fa-bars" style="color:#f7f7f7; font-size:28px;"></i>
</span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
      </ul>
    <form class="form-inline my-2 my-lg-0">

      <a href="page_2.php" class="btn btn-outline-light my-2 my-sm-0 mr-3 " ><b>Home</b></a>
      <!-- <a href="#" class="btn btn-outline-success my-2 my-sm-0 mr-4 " ><b>Apply Here!</b></a> -->
    </form>
   <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
   <a href="#" class="nav-item nav-link" style="color:#f7f7f7;"><?php echo $_SESSION['roll_no'] ?></a>
  </div>  
</nav>

<br><br>
<div class="container_2" >
<h1 align="center" style="color: #666666">YOUR INTERNSHIP DETAILS</h1>
<form action = "upload.php" method = "POST" enctype = "multipart/form-data">


		<div class="col-lg-12 a" style="color: #333333;"><b>
            <br><br>
            <h3 style="color:black">Enter details here:</h3><br>
            <label for = "roll_no">Roll No:</label>&ensp;
          	<?php echo $_SESSION['roll_no']?> <br> <br>
            <label for= "topic">Topic: </label>&emsp;&ensp;
						<select name="topic" onchange='Checktitle(this.value);' style="width:207px;" required>
              <option value="">Topic</option>
              <option value="Machine Learning">Machine Learning</option>
              <option value="Artificial Intelligence">Artificial Intelligence</option>
              <option value="Data Science">Data Science</option>
              <option value="others">Others</option>
            </select><br>
            <input type="text" name="topic"  id="title" style='display:none;  margin: 3% 0 1% 9% ;'  placeholder="Enter the other topic"/><br>
            <!-- <label for="topic" id="title" style='display:none; margin: 3% 0 1% 0 ;'>Others: &ensp;&ensp;<input type="text" name="topic" placeholder="Enter the other topic"> </label><br>
             -->


            <label for = "year">Year: </label>&emsp;&emsp;
            <select name="year" id="year" style="width:207px;" required>
              <option value="">Year</option>
              <option value="FE">FE</option>
              <option value="SE">SE</option>
              <option value="TE">TE</option>
              <option value="BE">BE</option>
            </select><br><br>
            <label for = "GPA" >Overall GPA:</label>&emsp;&emsp;
            <input type="number" name = "GPA" id="GPA" step = "0.01" min="1" max="10" required></input><br><br>
            <label for = "company_name" >Company Name:</label>
            <input type="text" name = "company_name" required><br><br>
            <label for = "start_end_date">Start & End Date:</label>
            <input type="date" name = "start_date" id="Sdate" value="" min=<?php echo date('Y-m-d');?> onchange ='ChangeDuration();' required>&emsp; to </input>&emsp;
            <input type="date" name = "end_date"  id="Edate" value="" min=<?php echo date('Y-m-d');?> onchange ='ChangeDuration();' required><br><br>
            <!-- <label for = "duration" >Duration:</label>
            <input type="number" name = "duration" id="myText" min="1" max="6"  style="width:195px;" value="" required disabled>&nbsp;months</input><br><br> -->
						<label>Durations:</label>&ensp;
            <span id="myDATE"></span>
            <input id="myText"name="duration" value="" type="hidden">months</input><br><br>
            <label for="letter">Do you need Relieving Letter?</label>&emsp;
            <input type = "radio" value="yes" name="letter" required>&nbsp;Yes&emsp;
            <input type = "radio" value = "no" name = "letter" required>&nbsp;No<br><br>


  <label for="myfile">Add Additional Documents:</label>
  <input type="file" id="myfile" onchange="ValidateSingleInput(this);" accept=".pdf" name="myfile" multiple><br>
  <h6>Note: Only PDF is allowed and size should be less than 10MB</h6><br>
  
  <button class="mb-2 btn submit_btn" type="submit" name = "submit" >Submit</button>
</form><br></b>


</div>

</div>
</div>

</body>
</html>