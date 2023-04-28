
<?php include "connection.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/admin.css" rel="stylesheet">
    <title>Bank</title>
</head>
<body>

   <?php  include "sidebar.php";  ?>

        <div class="col py-3">
            


        

<table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col"> SSN </th>
                        <th scope="col"> NAME </th>
                        <th scope="col"> TELEPHONE </th>
                        <th scope="col"> START DATE </th>
                        <th scope="col"> SUPER SSN </th>
                        <th scope="col"> BRANCH </th>
                   </tr>
                  </thead>
                  <tbody>
                       
                       <?php 
                         $query = "SELECT * FROM EMPLOYEE1 NATURAL JOIN EMPLOYEE2 ORDER BY start_date DESC";
                         $select_employees = mysqli_query($connection,$query);
                         
                         while($row = mysqli_fetch_assoc($select_employees)){
                            $ssn = $row['SSN'];
                            $name = $row['name'];
                            $telephone = $row['telephone'];
                            $branch_id = $row['branch_id'];
                            $start_date = $row['start_date'];
                            $superssn = $row['super_ssn'];
                    

                            echo "<tr>";
                            echo "<td> {$ssn} </td>";
                            echo "<td> {$name} </td>";
                            echo "<td> {$telephone}</td>";
                            echo "<td>{$start_date}</td>";
                            
                            // $query2 = "SELECT name FROM EMPLOYEE1 WHERE SSN = {$superssn}";
                            // $select_superssn_name = mysqli_query($connection, $query2);

                            // while($row = mysqli_fetch_assoc($select_superssn_name)){
                            //     $superssn_name = $row['name'];
                            // }
                            //    if ($superssn_name == NULL) 
                            //       $superssn_name = '';

                            // echo "<td>{$superssn_name}</td>";
                              
                            echo "<td>{$superssn}</td>";

                             $query3 = "SELECT * FROM BRANCH WHERE branch_id = {$branch_id}";
                             $select_branch_id = mysqli_query($connection, $query3);

                             while($row = mysqli_fetch_assoc($select_branch_id)){
                                 $branch_id = $row['branch_id'];
                                 $branch_name = $row['name'];
                             }

                            echo "<td> {$branch_name} </td>";
                            echo "</tr>"; 

                         
                        }

                        ?>
                         


                  </tbody>
                  </table>   





                  
          
        </div>
    </div>
</div>


</body>
</html>












