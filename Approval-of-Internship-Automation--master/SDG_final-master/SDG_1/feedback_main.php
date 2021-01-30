<?php
session_start();
$new_date = date('d-m-Y');
$dept = preg_replace('/[0-9]/','',$_SESSION['roll_no']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <script src="javascript.js"></script>
    <link rel="stylesheet" href="css/finalcss.css">
    <link rel="icon" type="image/png" href="http://www.dypatil.edu/mumbai/rait/wp-content/uploads/2015/02/favicon.png">
    <script src="https://kit.fontawesome.com/dc6b196a84.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
    .btn{
    background-color: #c80000;
    color: #fff;
    }
    </style>
</head>
<body class="body_feedback">
    <div class="page_top">
    <nav class="navbar-custom navbar navbar-expand-lg fixed-top" >
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
        </form>

    </div>
    <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
    <a href="#" class="nav-item nav-link" style="color:#f7f7f7;"><?php echo $_SESSION['roll_no'] ?></a>
    </nav>
    <br><br>
    </div> 
    <div class="container_feedback">
    <img src="images/dyp_logo.jpeg"  class=watermark alt="watermark" >
    <h1 class="h1_feedback" align="center">INTERNSHIP FEEDBACK</h1>
    <br><br>

    <div id="content">
    <form action="feedback.php" method="POST" enctype="multipart/form-data">
    <label for="name" id="space">Student Name: <strong><?php echo $_SESSION['fname'] .' '. $_SESSION['mname'] .' '. $_SESSION['lname']?> </strong></label>
    &emsp;&emsp;
    <label for="date">Date: <strong> <?php echo $new_date; ?> </strong></label>

    <br><br>
    <label for="" id="space">Industrial Supervisor:</label>
    <input type="text" size="45" name="Industrial_Supervisor" required>&emsp;&emsp;
    <label for="">Title: <strong> <?php echo $_SESSION['topic']; ?></strong></label>
    <!-- <input type="text" name="Title" size="32" required> -->
    <br><br>
    <label for=""id="space">Supervisor Email:</label>
    <input type="email" size="40" name="Supervisor_Email" required>&emsp;
    <label for="">Internship is:</label>&emsp;
    <input type="radio" name="Internship_type" value="Paid" required> Paid&emsp;
    <!-- <label for="paid">Paid</label> -->
    <input type="radio" name="Internship_type" value="Unpaid" required> Unpaid
    <!-- <label for="unpaid">Unpaid</label> -->
    <br><br>
    <label for="" id="space">Company/Organization name: <strong><?php echo $_SESSION['company_name']; ?></strong></label>

    <br><br>
    <label for="" id="space">Organization Address:</label>
    <input type="text" size="70" name="Organization_Address" required>
    <br><br>
    <label for="" id="space">Faculty Coordinator:</label>
    <input type="text" size="32" name="Faculty_Coordinator" required>&emsp;
    <label for="">Department: <strong><?php echo $dept;?></strong></label>
    <br><br>
    <label for="" id="space">Date of Internship:</label>&emsp;
    <label for="">From <strong> <?php echo date('d-m-Y', strtotime($_SESSION['start_date'])); ?> </strong></label>
    <!-- <input type="date" name="Start_date" required>&emsp; -->
    <label for="">To <strong> <?php echo date('d-m-Y', strtotime($_SESSION['end_date'])); ?> </strong></label>&emsp; <br><br>
    <!-- <input type="date" name="End_date" required> <br> -->
    <label id="space" for="certificate">Upload Certificate here:</label>
    <input type="file" id="certificate" onchange="ValidateSingleInput(this);" accept=".pdf" name="certificate" required/><br><br>
    <p id="space"><strong>Please fill out the above in full detail</strong></p>
    <p id="space">Give a brief description of your internship work (title and tasks for which you were responsible):<br>
        Was your internship experience related to your major area of study?
    </p>
    <label for="" id="space">Indicate the degree to which you agree or disagree with the following statements.</label>
    <br>
    <label for="" id="space" >
    <input type="radio" name="Experience" value="Yes, to a large degree" required> Yes, to a large degree <br>
    <input type="radio" name="Experience" value="Yes,to a slightly degree" required> Yes,to a slightly degree <br>
    <input type="radio" name="Experience" value="No, not related at all" required> No, not related at all
</label>
    <table border="1px"  class="t">
        <tr>
            <th class="text_left">This experience has:</th>
            <th class="y">Strongly <br> Agree</th>
            <th class="y">Agree</th>
            <th class="y">No Opinion</th>
            <th class="y">Disagree</th>
            <th class="y">Strongly <br> Disagree</th>
        </tr>
        <tr>
            <td class="text_left">Given me the opportunity to explore a career field</td>
            <td  ><input type="radio" name="Q_no_1" value="Strongly Agree" required></td>
            <td  ><input type="radio" name="Q_no_1" value="Agree" required></td>
            <td  ><input type="radio" name="Q_no_1" value="No Opinion" required></td>
            <td  ><input type="radio" name="Q_no_1" value="Disagree" required></td>
            <td  ><input type="radio" name="Q_no_1"  value="Strongly Disagree" required></td>
        </tr>
        <br>
        <tr>
            <td class="text_left">Allowed me to apply classroom theory to practice</td>
            <td  ><input type="radio" name="Q_no_2"  value="Strongly Agree" required></td>
            <td  ><input type="radio" name="Q_no_2"   value="Agree" required></td>
            <td  ><input type="radio" name="Q_no_2"   value="No Opinion" required></td>
            <td  ><input type="radio" name="Q_no_2"   value="Disagree" required></td>
            <td  ><input type="radio" name="Q_no_2"   value="Strongly Disagree" required></td>
        </tr>
        <br>
        <tr>
            <td class="text_left">Helped me develop my decision-making and problem-solving skills</td>
            <td  ><input type="radio" name="Q_no_3"   value="Strongly Agree" required></td>
            <td  ><input type="radio" name="Q_no_3"   value="Agree" required></td>
            <td  ><input type="radio" name="Q_no_3"   value="No Opinion" required></td>
            <td  ><input type="radio" name="Q_no_3"   value="Disagree" required></td>
            <td  ><input type="radio" name="Q_no_3"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Expanded my knowledge about the work world prior to permanent employment</td>
            <td  ><input type="radio" name="Q_no_4" value="Strongly Agree" required></td>
            <td  ><input type="radio" name="Q_no_4" value="Agree" required></td>
            <td  ><input type="radio" name="Q_no_4" value="No Opinion" required></td>
            <td  ><input type="radio" name="Q_no_4" value="Disagree" required></td>
            <td  ><input type="radio" name="Q_no_4" value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Helped me develop my written and oral communication skills</td>
            <td><input type="radio" name="Q_no_5"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_5"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_5"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_5"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_5"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Provided a chance to use leadership skills <br>(influence others, develop ideas with others, stimulate decision-making and action)</td>
            <td><input type="radio" name="Q_no_6"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_6"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_6"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_6"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_6"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Expanded my sensitivity to the ethical implications of the work involved</td>
            <td><input type="radio" name="Q_no_7"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_7"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_7"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_7"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_7"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Made it possible for me to be more confident in new situations</td>
            <td><input type="radio" name="Q_no_8"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_8"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_8"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_8"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_8"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Given me a chance to improve my interpersonal skills</td>
            <td><input type="radio" name="Q_no_9"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_9"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_9"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_9"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_9"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Helped me learn to handle responsibility and use my time wisely</td>
            <td><input type="radio" name="Q_no_10"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_10"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_10"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_10"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_10"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Helped me discover new aspects of myself that I didn't know existed before</td>
            <td><input type="radio" name="Q_no_11"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_11"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_11"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_11"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_11"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Helped me develop new interests and abilities</td>
            <td><input type="radio" name="Q_no_12"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_12"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_12"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_12"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_12"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Helped me clarify my career goals</td>
            <td><input type="radio" name="Q_no_13"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_13"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_13"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_13"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_13"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Provided me with contacts which may lead to future employment</td>
            <td><input type="radio" name="Q_no_14"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_14"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_14"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_14"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_14"   value="Strongly Disagree" required></td>
        </tr>
        <tr>
            <td class="text_left">Allowed me to acquire information and/or use equipment not available at my institute</td>
            <td><input type="radio" name="Q_no_15"   value="Strongly Agree" required></td>
            <td><input type="radio" name="Q_no_15"   value="Agree" required></td>
            <td><input type="radio" name="Q_no_15"   value="No Opinion" required></td>
            <td><input type="radio" name="Q_no_15"   value="Disagree" required></td>
            <td><input type="radio" name="Q_no_15"   value="Strongly Disagree" required></td>
        </tr>
    </table>
    <br><br>

    <label for="q5" id="space">Considering your overall experience, how would you rate this internship?</label><br>
    <label for="" id="space">
    <input type="radio" name="overall_experience" value="Satisfactory" required> Satisfactory <br>
    <input type="radio" name="overall_experience" value="Good" required> Good <br>
    <input type="radio" name="overall_experience" value="Excellent" required> Excellent
</label><br><br>
        <button type="submit" class="mb-2 btn submit_btn" name="Result" id="center_1">Submit</button>
    </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>