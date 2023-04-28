
<?php include "connection.php"; 
      include "functions.php" ?>

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
                        <th scope="col"> APT </th>
                        <th scope="col"> STREET </th>
                        <th scope="col"> ZIPCODE </th>
                        <th scope="col"> Personal Banker SSN </th>
                   </tr>
                  </thead>
                  <tbody>
                       
                       <?php 
                         $query = "SELECT * FROM CUSTOMER1 ORDER BY name ";
                         $select_customers1 = mysqli_query($connection,$query);
                         
                         while($row = mysqli_fetch_assoc($select_customers1)){
                            $ssn = $row['cust_ssn'];
                            $name = $row['name'];
                            $apt = $row['apt'];
                            $street = $row['street'];
                            $zipcode = $row['zipcode'];
                            $pers_banker_ssn = $row['pers_banker_ssn'];


                            echo "<tr>";
                            echo "<td> $ssn </td>";
                            echo "<td> $name </td>";
                            echo "<td>$apt</td>";  
                            echo "<td>$street</td>";  
                            echo "<td> $zipcode</td>";  
                            echo "<td>$pers_banker_ssn</td>";
                            echo "<td><a class='btn btn-danger' href='customers.php?delete={$ssn}'>Delete</a></td>";
                            echo "<td><a class='btn btn-info' href='edit_customer.php?edit={$ssn}'>Edit</a></td>";

                            echo "</tr>"; 

                         }

                        ?>
                         


                  </tbody>
    </table>   

                  <?php
                      
                            if(isset($_GET['delete'])){
                                $the_ssn = $_GET['delete'];
                                $query = "DELETE FROM customer1 WHERE cust_ssn = {$the_ssn}";
                                $delete_query = mysqli_query($connection, $query);
                            }

                     ?>
                  
          
</div>

</body>
</html>












