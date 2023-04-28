<?php  include "connection.php";

if(isset($_GET['edit'])) {
    
       $the_ssn=$_GET['edit'];
    //    echo $the_ssn;
    

        $query="SELECT * FROM customer1 WHERE cust_ssn= $the_ssn ";
        $select_customer=mysqli_query($connection,$query);
                
                
        while($row=mysqli_fetch_assoc($select_customer)){
                $name=$row['name'];
                $apt=$row['apt']; 
                $street=$row['street']; 

    }



   if (isset($_POST['submit'])){ 
        $name=$_POST['name'];
        $apt=$_POST['apt']; 
        $street=$_POST['street']; 

    
        $query="UPDATE CUSTOMER1 SET ";
        $query.="name = '{$name}' , ";
        $query.="apt = '{$apt}' , ";
        $query.="street = '{$street}' ";
        $query.="WHERE cust_ssn={$the_ssn}";
        

        $update_customer=mysqli_query($connection,$query);
        
        if(!$update_customer)
            die("Query Failed". mysqli_error($connection));
        
        
        echo "<p class='bg-success'>CUSTOMER UPDATED. <a href='customers.php'  style='color:white;'>EDIT ANOTHER CUSTOMER</a></p> ";
        
           
    }   
}

    ?>


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


   <form action="" method="post">
        
   <div class="mb-3">
<label for="name" class="form-label">Name</label>
<input type="text" class="form-control" id="name" name="name" value='<?php echo $name; ?>'>
</div>

<div class="mb-3">
<label for="apt" class="form-label">APT</label>
<input type="text" class="form-control" id="apt" name="apt" value='<?php echo $apt; ?>'>
</div>
 
<div class="mb-3">
<label for="street" class="form-label">STREET</label>
<input type="text" class="form-control" id="street" name="street" value='<?php echo $street; ?>'>
</div>



<button type="submit" class="btn btn-primary" name="submit">Update</button>



   </form



</div> 


</body>
</html>


