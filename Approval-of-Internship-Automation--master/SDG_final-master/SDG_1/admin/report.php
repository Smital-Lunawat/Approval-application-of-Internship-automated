<?php
session_start();
    if(isset($_POST['start_date'],$_POST['end_date'],$_POST['status'])){
        include("../connect.php");
        $output='';
        if($_POST['status'] == "all"){
            $query = "  
            SELECT * FROM internship_data
            INNER JOIN feedback
            ON internship_data.id = feedback.id  
            WHERE completion_status != 'None' AND 
            starting_date >= '".$_POST["start_date"]."' AND end_date <= '".$_POST["end_date"]."' OR 
            starting_date <= '".$_POST["start_date"]."' AND end_date >= '".$_POST["end_date"]."'
            ";
        }else{
            $query = "  
            SELECT * FROM internship_data  
            WHERE completion_status = '".$_POST["status"]."' AND starting_date >= '".$_POST["start_date"]."' AND end_date <= '".$_POST["end_date"]."'  
            ";
        }
                  
        $result = mysqli_query($conn,$query);
        $output .= '
        <table id = "order_table" class="table table-bordered">
        <tr>  
            <th width="5%">Id</th>  
            <th width="20%">Roll No</th>  
            <th width="43%">Student Name</th>  
            <th width="10%">Topic</th>              
            <th width="12%">Organization Name</th>
            <th width="43%">Supervisor Name</th>
            <th width="43%">Supervisor Email</th>
            <th width="12%">Status</th>  
        </tr>
        ';
        if(mysqli_num_rows($result) > 0)  
        {  
             while($row = mysqli_fetch_array($result))  
             {  
                  $output .= '  
                  <tr>  
                  <td>'.$row["id"].'</td>  
                  <td>'.$row["roll_no"].'</td>  
                  <td>'.$_SESSION['fname'] .' '. $_SESSION['mname'] .' '. $_SESSION['lname'].'</td>  
                  <td>'.$row["topic"].'</td>  
                  <td>'.$row["company_name"].'</td>
                  <td>'.$row["Industrial Supervisor"].'</td>
                  <td>'.$row["Supervisor Email"].'</td> 
                  <td>'.$row["completion_status"].'</td> 
             </tr>  
                  ';  
             }  
        }  
        else  
        {  
             $output .= '  
                  <tr>  
                       <td colspan="5">No Record Found</td>  
                  </tr>  
             ';  
        }  
        $output .= '</table>';  
        echo $output;  
        
    }
?>