<?php
session_start();
    include("../connect.php");
    $sql = "SELECT * FROM internship_data";
    $result = $conn->query($sql);
?>    
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Internship Homepage</title>
  <link rel="stylesheet" href="../css/finalcss.css">
  <link rel="icon" type="image/png" href="http://www.dypatil.edu/mumbai/rait/wp-content/uploads/2015/02/favicon.png">
  <script src="https://kit.fontawesome.com/dc6b196a84.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> 
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"> 
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

</head>

<body>
<script>
  $(document).ready(function(){
    $(".filter-button").click(function(){
    var value = $(this).attr('data-filter');
    var element=document.getElementById('report');
    if(value == "Report")
    {
      element.style.display='block';
    }
    else{
      element.style.display='none';
    }
    });
    });

    
</script>  
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
            <img src="../images/dypatil_logo.jpeg" class="center_img" alt="">
        </div>
        <div style="text-align:center;padding:4%;">
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

        <a href="admin_1.php" class="btn btn-outline-light my-2 my-sm-0 mr-3"><b>Admin</b></a>

      </form>
     <a href="#"><i class="fa fa-user-circle fa-2x" style="color: #f7f7f7;"></i> </a>
    </div>

  </nav>
  <section id=main>


    <div class="container-main">
    	<h1 class="h1_main" align="center" style="color: #666666;" >LISTS OF INTERNSHIPS FOR APPROVAL</h1><br>

      <div align = "center">
        <button class="btn btn-outline-custom filter-button" data-filter="all" style="border-color:#c80000;">All</button>&nbsp;
        <button class="btn btn-outline-custom  filter-button" data-filter="None" style="border-color:#c80000;">Approval</button>&nbsp;
        <button class="btn btn-outline-custom  filter-button" data-filter="In-progress" style="border-color:#c80000;">In Progress</button>&nbsp;
        <button class="btn btn-outline-custom  filter-button" data-filter="Completed" style="border-color:#c80000;">Completed</button>&nbsp;
        <button class="btn btn-outline-custom  filter-button" data-filter="Rejected" style="border-color:#c80000;">Rejected</button>
        <button class="btn btn-outline-custom filter-button" data-filter="Report" style="border-color:#c80000;">Report</button>&nbsp;
      </div><br>  
    </div>
    <div style='display:none;' id="report">
      <div align="center";>
      <input type="date" name="start_date"  id="start_date" onchange = 'amChanged();' placeholder = "Start Date">      
      <input type="date" name="end_date" id="end_date" onchange = 'amChanged();' placeholder = "End Date"><br><br>    
      <label for = "status">Status: </label>
            <select name="status" id = "sort" style="width:207px;" required>
            <option value="none" selected disabled hidden> 
                Select an Option 
            </option> 
              <option value="all">All</option>
              <option value="In-progress">In-progress</option>
              <option value="Completed">Completed</option>
              <option value="Rejected">Rejected</option>
            </select><br>
            <!-- <button class= "btn btn-primary" type="submit" name="sort">Filter</button><br><br>       -->
           
            <a id="downloadLink" onclick="exportF(this)"><img width="10%" src="../images/excel.png" alt ="excel icon"/></a>
          
      </div>
    
    <div align="center">  
                     <table style="border:2px solid black" id="order_table" class="table table-bordered">  
                           
                     </table>  
                </div>
            </div>
    <div class="row">

    
          <?php
          $sql = "SELECT * FROM internship_data";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc())
					{

					?>
            <div class="col-lg-4 col-md-6 pricing-column filter Report <?php echo $row['completion_status']; ?>" style = "height:38%">
              <div  class="card" >
                <a style="color:#fff;" href="admin_2.php?id=<?php echo $row['id'];?>">
                  <div class="card-header text-#f7f7f7;" style="background-color: #c80000;">
                    <h3 class="h3">Internship <?php echo $row['id']?></h3>
                  </div>
                  <div class="card-body">
                    <p>
                      <img class = "card-img-top" src="../images/internship_4.jpg" >
                    </p>
                    <h3 style="color:#666666">Roll No : <?php echo $row['roll_no']; ?></h3>
                    <h3 style="color:#666666">Year: <?php echo $row['year_new']; ?></h3>
                  </div>
                </a>
              </div>
            </div>

            <?php
            }

            } else { echo "0 internships for approval"; }
            $conn->close();
            ?>
    </div>

  </section>

  <script>


function exportF(elem) {
  var table = document.getElementById("order_table");
  var html = table.outerHTML;
  var url = 'data:application/vnd.ms-excel,' + escape(html); // Set your html table into url 
  elem.setAttribute("href", url);
  elem.setAttribute("download", "Report.xls"); // Choose the file name
  return false;
}
// $(document).ready(function(){  
//       $('#downloadLink').click(function(){  
//            var excel_data = $('#order_table').html();  
//            var page = "excel.php?data=" + excel_data;  
//            window.location = page;  
//       });  
//  }); 

$(document).ready(function(){  
           $.datepicker.setDefaults({  
                dateFormat: 'yy-mm-dd'   
           });  
          //  $(function(){  
          //       $("#start_date").datepicker();  
          //       $("#end_date").datepicker();  
          //  });  
           $('#sort').on('change',function(){  
                var start_date = $('#start_date').val();  
                var end_date = $('#end_date').val();  
                var status = $('#sort').val();
                if(start_date != '' && end_date != '')  
                {  
                     $.ajax({  
                          url:"report.php",  
                          method:"POST",  
                          data:{start_date:start_date, end_date:end_date,status:status},  
                          success:function(data)  
                          {  
                               $('#order_table').html(data);  
                          }  
                     });  
                } 
                else  
                {  
                     alert("Please Select Date");  
                }  
           });  
      }); 



    function amChanged() {
    var element = document.getElementById('sort');
    element.selectedIndex = 0;  // first option is selected, or
                                     // -1 for no option selected
}





  $(document).ready(function(){

$(".filter-button").click(function(){
    var value = $(this).attr('data-filter');

    if(value == "all")
    {
        //$('.filter').removeClass('hidden');
        $('.filter').show();
    }
    else if(value == "Report"){
      $('.filter').hide();
    }
    else{

//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
        $(".filter").not('.'+value).hide();
        $('.filter').filter('.'+value).show();

    }
});

});
</script>


</body>

</html>