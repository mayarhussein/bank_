
<?php include "connection.php";


if (isset($_POST['submit'])){ 
    $username= mysqli_real_escape_string($connection, $_POST['username']); 
    $password= mysqli_real_escape_string($connection, $_POST['password']);  


    $query = "SELECT * FROM users WHERE username='$username'";
    $select_user = mysqli_query($connection, $query);

    if(!$select_user)
       die("Query FAILED". mysqli_error($connection));


      while($row = mysqli_fetch_array($select_user)){
             $db_ssn = $row['ssn'];
             $db_username = $row['username'];
             $db_password = $row['password'];
             $db_role = $row['role'];

      } 

        

     if($username == $db_username && $password == $db_password && $db_role=='admin')
          header("Location: admin.php");  

    else if($username == $db_username && $password == $db_password && $db_role=='customer')
          header("Location: home.php?id={$db_ssn}");  

     else{
      echo $db_ssn;
      echo $db_username;
      echo $db_password;
      echo $db_role;
      header("Location: index.php?id={$db_ssn}");   
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
    <script src="https://kit.fontawesome.com/d57161b172.js" crossorigin="anonymous"></script>
    <title>Bank</title>
</head>
<body>

<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Sign in</h3>

         <form  action="index.php" method="post">
            <div class="form-outline mb-4">
             <label class="form-label" for="username">Username</label>
              <input type="text" id="username"  name="username" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
              <label class="form-label" for="password">Password</label>
              <input type="password" id="password"  name="password" class="form-control form-control-lg" />
            </div>
        
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Login</button>
         </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>




