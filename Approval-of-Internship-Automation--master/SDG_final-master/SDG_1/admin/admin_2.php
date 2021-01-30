<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>RAIT</title>
    <link rel="stylesheet" type="text/css" href="../css/finalcss.css">
    <link rel="icon" type="image/png" href="http://www.dypatil.edu/mumbai/rait/wp-content/uploads/2015/02/favicon.png">
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

    div.a {
        font-size: 18px;
    }
    .btn1{
    background-color: #c80000;
    color: #fff;
  }
    </style>
</head>
<div>
        <div style="float:left">
            <img src="../images/dypatil_logo.jpeg" class="center_img" alt="">
        </div>
        <div style="text-align:center;padding:3%;">
            <h3>RAMRAO ADIK INSTITUTE OF TECHNOLOGY, NERUL</h3>
        </div>
        <div style="clear:both" />
</div>
<body class="pink">
    <nav class="navbar-custom navbar navbar-expand-lg sticky-top">
        <a class="navbar-brand" href="#" style="color: #f7f7f7;"><b>RAIT Internships</b></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon">
                <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
            </span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline my-2 my-lg-0">

                <a href="admin_1.php" class="btn btn-outline-light my-2 my-sm-0 mr-3 "><b>Admin</b></a>

            </form>
            <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
        </div>

    </nav>
    <br><br>



    <div class="container_2">
        <div class="col-lg-12 a" style="color: #333333;"><b>
                <h1 align="center" style="color: #666666;">INTERNSHIP DETAILS</h1><br>
                <?php
                include("../connect.php");
                if(isset($_GET['id'])){
                    $id=$_GET['id'];
                    $sql = "SELECT * FROM internship_data WHERE internship_data.id = '$id'";
                    $result = $conn->query($sql);
                    $data = mysqli_fetch_array($result);
                }

            ?>


                <br><br>
                Roll No: <?php echo $data['roll_no']?> <br><br>
                Topic: <?php echo $data['topic']?> <br><br>
                Company Name: <?php echo $data['company_name']?> <br><br>
                Year: <?php echo $data['year_new'] ?> <br><br>
                Overall GPA: <?php echo $data['gpa'] ?> <br><br>
                Duration: <?php echo $data['duration']." "."months" ?> <br><br>
                Start & End Date: <?php echo $data['starting_date'] ?> to <?php echo $data['end_date'] ?> <br><br>


                
                <?php
                        if(!empty($data['myfile'])){
                        ?>  
                          <a href="<?php echo '../'.$data['myfile']; ?> " target = "_blank"><button class="btn btn-primary">Additional Documents</button></a>
                        <?php  
                        }                        
                        else{
                          echo "No Additional Documents";
                        }
												?><br><br>
                <?php                       
                        
                        if($data['approval_status'] == 'Pending' ){
                          if($data['letter'] == 'yes'){
                          
                            $_SESSION['roll_no'] = $data['roll_no'];                        
                            $_SESSION['start_date'] = $data['starting_date'];                            
                            $_SESSION['company_name'] = $data['company_name'];
                            $_SESSION['letter'] = $data['letter'];
                        ?>
                <label for="letter"> Relieving Letter:</label>
                
                <a href="#" data-toggle="modal" data-target="#user" id="<?php echo $data['id'];?>"
                    onclick="openModal(this.id)">Open</a>
                <div class="modal" id="user">
                    <div style="border-bottom: transparent;" class="modal-header">
                        <button style="opacity:100%;background-color:#fff;border:2px solid black;border-radius:10px;"
                            type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div id="modalcontent">
                        <!-- Relieving letter will be displayed here -->
                    </div>
                    <form method="POST">
                    <!-- <button type="button" class="mb-2 btn submit_btn"  data-dismiss="modal">Close</button>&emsp; -->
                        <!-- <button type="button" class="btn btn-outline-custom" style="border-color:#c80000;"
                            data-dismiss="modal">Close</button> -->
                    <button style="border:2px solid #999999;" type="submit" name="generate" class="mb-2 btn btn-danger " id="center_1" >Generate</button>
                    </form>
                </div>

                <?php
                        }
                        ?>
                <form method="POST">
                    <textarea rows = "1" cols="35" type="text" placeholder="Comments" name="comments"></textarea><br><br>
                    <button id="approvalstat" name="approvalstat" value="Approved" type="submit"
                        class="btn btn-success btn-lg">Approve</button>&nbsp;
                    <button id="approvalstat" name="approvalstat" value="Rejected" type="submit"
                        class="btn btn-danger btn-lg">Reject</button>
                </form><br>
            </b>
            <?php 
                        }
                        else if($data['completion_status'] == 'Rejected' ){
                            if($data['certificate'] == 'Not Uploaded Yet'){
                                echo "";
                            }else{
            ?>
                            <a href= "<?php echo '../'.$data['certificate']; ?> " target="_blank"><button
                            class="btn btn-primary">Certificate</button></a><br><br>
            <?php
                            }
                        }
                        else{
                          if($data['completion_status'] == 'Completed'){
                            ?>
            <a href= "<?php echo '../'.$data['certificate']; ?> " target="_blank"><button
                    class="btn btn-primary">Certificate</button></a><br><br>
            <?php                              
                            }else if($data['certificate'] != 'Not Uploaded Yet'){
                            ?>

            <a href="<?php echo '../'.$data['certificate']; ?> " target="_blank"><button
                    class="btn btn-primary">Certificate</button></a><br><br>

            <form method="POST">
                <textarea rows = "1" cols="35" type="text" placeholder="Comments" name="comments"></textarea><br><br>
                <button id="approvalcert" name="approvalcert" value="Approved" type="submit"
                    class="btn btn-success btn-lg">Approve</button>&nbsp;
                <button id="approvalcert" name="approvalcert" value="Rejected" type="submit"
                    class="btn btn-danger btn-lg">Reject</button>
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
              if (isset($_POST['generate'])) {
                mysqli_query($conn,"UPDATE internship_data SET letter = 'Generated' WHERE internship_data.id = '$id'");            
              }

             if (isset($_POST['approvalstat'])) {
              if($_POST['approvalstat']=='Approved'){
                mysqli_query($conn,"UPDATE internship_data SET completion_status = 'In-progress',approval_status = '".$_POST['approvalstat']."',comment = 'Applied Successfully'
                WHERE internship_data.id = '$id'");
                header('location:admin_1.php');
              }else{
                mysqli_query($conn,"UPDATE internship_data SET completion_status = 'Rejected',approval_status = '".$_POST['approvalstat']."',comment = '".$_POST['comments']."'
                WHERE internship_data.id = '$id'");
                header('location:admin_1.php');
              }
            
            }          
						if (isset($_POST['approvalcert'])) {
                if($_POST['approvalcert']=='Approved'){
                  mysqli_query($conn,"UPDATE internship_data SET completion_status = 'Completed' ,comment = 'Internship Completed!' WHERE internship_data.id = '$id'");
                  header('location:admin_1.php');
                }else{
                  echo '<script>alert("Rejected");</script>';
                  mysqli_query($conn,"UPDATE internship_data SET approval_status = '".$_POST['approvalcert']."',completion_status = 'Rejected',comment = '".$_POST['comments']."' WHERE internship_data.id = '$id'");
                  header('location:admin_1.php');
                }
              }
             
            ?>

        </div>
    </div>

    <script>
    // $(document).ready(function(){
    //     $("#mySpan").click(function(){
    //         document.getElementById('user').style.display='none';

    //     });
    // });
    $(function() {
        $(".custom-close").on('click', function() {
            $('#user').modal('hide');
        });
    });

    function openModal(clicked_id) {

        $.ajax({
            type: "POST",
            url: "../letter_main.php",
            data: {
                id: clicked_id
            },
            success: function(data) {
                document.getElementById("modalcontent").innerHTML = data; //insert data into modal
                $('#user').modal('show');

            }
        });

    }
    // $(document).on("click", ".detail", function () {
    //             var id = $(this).data('id');
    //              $.ajax({
    //                     type: "POST",
    //                     url: "letter_main.php",
    //                     data: { id: id},
    //                     success: function(data) {
    //                       $('.target').html(data)
    //                       $("#myModal").modal('show');

    //                     }});
    //                  });
    </script>
</body>

</html>