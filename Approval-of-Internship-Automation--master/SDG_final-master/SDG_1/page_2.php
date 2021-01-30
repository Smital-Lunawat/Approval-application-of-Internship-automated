<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Internship Homepage</title>
    <link rel="stylesheet" href="css/finalcss.css">
    <link rel="icon" type="image/png" href="http://www.dypatil.edu/mumbai/rait/wp-content/uploads/2015/02/favicon.png">
    <script src="https://kit.fontawesome.com/dc6b196a84.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300;400&display=swap" rel="stylesheet">
</head>

<body>

    <!-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
      <a href="#" class="navbar-brand mr-3"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
      <h4 style="color:white;">internship</h4>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ml-auto">
          <a href="#" class="nav-item nav-link">Logout</a>
        </div>
      </div>
    </div>
  </nav> -->
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
        <nav class="fixed-top navbar-custom navbar navbar-expand-lg sticky-top" style="margin:0 -25px 0 -9px;">
            <a class="navbar-brand" href="#" style="color: #f7f7f7"><b>RAIT Internships</b></a>
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

                    <a href="page_2.php" class="btn btn-outline-light my-2 my-sm-0 mr-3"><b>Home</b></a>
                    <a href="page_4.php" class="btn btn-outline-light my-2 my-sm-0 mr-3"><b>Apply</b></a>
                </form>
                <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
            </div>
            <a href="#" class="nav-item nav-link" style="color:#f7f7f7;"><?php echo $_SESSION['roll_no'] ?></a>

        </nav>
        



        <section id=main>


            <div class="container-main">
                <h1 class="h1_page_2" align="center" style="color: #666666">YOUR INTERNSHIP DETAILS</h1><br>
                <div align="center">
                    <button class="btn btn-outline-custom  filter-button" data-filter="all"
                        style="border-color:#c80000;">All</button>&nbsp;
                    <button class="btn btn-outline-custom filter-button" data-filter="None"
                        style="border-color:#c80000;">Pending</button>&nbsp;
                    <button class="btn btn-outline-custom filter-button" data-filter="In-progress"
                        style="border-color:#c80000;">Approved</button>&nbsp;
                    <button class="btn btn-outline-custom filter-button" data-filter="Completed"
                        style="border-color:#c80000;">Completed</button>&nbsp;
                    <button class="btn btn-outline-custom filter-button" data-filter="Rejected"
                        style="border-color:#c80000;">Rejected</button>&nbsp;
                </div>
            </div><br>

            <div class="row">
                <?php
					include("connect.php");
          $sql = "SELECT * FROM internship_data  WHERE internship_data.Roll_no = '{$_SESSION['roll_no']}' ORDER BY year_new DESC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc())
					{


          ?>

                <div class="col-lg-4 col-md-6 pricing-column filter <?php echo $row['completion_status']; ?>"
                    style="height:38%">

                    <div class="card_2" align="center">




                        <div class="flip-card">

                            <div class="flip-card-inner">

                                <div class="flip-card-front">
                                    <header class="w3-container">
                                        <h2><?php echo $row['topic'];?></h2>
                                    </header>
                                    <img class="card-img-top" src="images/internship-openings.gif" alt="internship">
                                </div>
                                <div onclick="window.location.href='page_3.php?id=<?php echo $row['id'];?>'"
                                    class="flip-card-back">

                                    <!-- <h1><?php echo $row['roll_no'];?></h1>
                  <h1><?php echo $row['topic'];?></h1> -->
                                    <h1>Status: <?php echo $row['approval_status'];?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }

            } else { echo "0 results"; }
            $conn->close();
            ?>
            </div>

        </section>
        <script>
        $(document).ready(function() {

            $(".filter-button").click(function() {


                var value = $(this).attr('data-filter');
                if (value == "all") {
                    //$('.filter').removeClass('hidden');
                    $('.filter').show();
                } else {
                    //            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
                    //            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
                    $(".filter").not('.' + value).hide();
                    $('.filter').filter('.' + value).show();

                }
            });

        });
        </script>
        </section>
    </body>

</html>