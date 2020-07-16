<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>RAIT</title>
	<link rel="stylesheet" type="text/css" href="css/page_4.css">
  	<script src="https://kit.fontawesome.com/dc6b196a84.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
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

</style>
<script type="text/javascript">
function Checktitle(val){
 var element=document.getElementById('title');
 if(val=='others')
   element.style.display='block';
 else
   element.style.display='none';
}

</script> 
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

      <a href="page_2.php" class="btn btn-outline-light my-2 my-sm-0 mr-3 " ><b>Home</b></a>
      <!-- <a href="#" class="btn btn-outline-success my-2 my-sm-0 mr-4 " ><b>Apply Here!</b></a> -->
    </form>
   <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
  </div>

</nav>
<br><br>
<div class="container container_2" >
<h1 align="center" style="color: #666666">YOUR INTERNSHIP DETAILS</h1><br>
<form action = "upload.php" method = "POST" enctype = "multipart/form-data">


		<div class="col-lg-12 a" style="color: #333333;"><b>
            <br><br>
            <h2 style="color:black">Enter details here:</h2><br>
            <label for = "roll_no">Roll No:</label>&ensp;
          	<?php echo $_SESSION['roll_no']?> <br> <br>
            <label for= "topic">Topic: </label>&emsp;&ensp;
						<select name="topic" onchange='Checktitle(this.value);' style="width:207px;" required>
              <option >Topic</option>
              <option value="Machine Learning">Machine Learning</option>
              <option value="Artificial Intelligence">Artificial Intelligence</option>
              <option value="Data Science">Data Science</option>
              <option value="others">Others</option>
            </select><br>
            <label for="topic" id="title" style='display:none; margin: 3% 0 1% 0 ;'>Others: &ensp;&ensp;<input type="text" name="topic" placeholder="Enter the other topic"> </label><br>


            <label for = "year">Year: </label>&emsp;&emsp;
            <select name="year" id="year" style="width:207px;" required>
              <option>Year</option>
              <option value="FE">FE</option>
              <option value="SE">SE</option>
              <option value="TE">TE</option>
              <option value="BE">BE</option>
            </select><br><br>
            <label for = "duration" >Duration:</label>
            <input type="number" name = "duration" id="duration" min="1" max="6" style="width:195px;" required>&nbsp;months</input><br><br>
						<label for = "company_name" >Company Name:</label>
            <input type="text" name = "company_name" required><br><br>
            <label for = "start_end_date">Start & End Date:</label>
            <input type="date" name = "start_date" required>&emsp; to </input>&emsp;
            <input type="date" name = "end_date" required><br><br>

  <label for="myfile">Add Additional Documents:</label>
  <input type="file" id="myfile" name="myfile" multiple><br><br>
  <button class="submit_btn" type="submit" name = "submit" >Submit</button>
</form><br></b>


</div>

</div>
</div>
</body>
</html>
