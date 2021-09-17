<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- external css bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <title>Customer Details</title>
</head>
<body>

    <!-- header with connection and sql code -->
<?php require_once './include/header.php';
    require 'connection.php';

    $sql = "SELECT * FROM `customers`";

    $result = mysqli_query($conn,$sql);
    $num_of_entry = mysqli_num_rows($result);
?>

      <!-- table starts -->
        <div class="container my-5">
            <h3 class="text-dark">Customers Details</h3>
            <div class="container my-3">
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Current Balance</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>

                <!-- fetching data from table -->
                <?php 
                  if($num_of_entry>0){
                    while($row = mysqli_fetch_assoc($result)){
                      echo "<tr>
                    <th scope='row'>".$row['Cust_ID']."</th>
                    <td>".$row['Name']."</td>
                    <td>".$row['Email']."</td>
                    <td>".$row['Amount']."</td>
                    <td><a href='send.php?name=".$row['Name']."'><button type='button' class='btn btn-success btn-sm'>Send</button></a></td>
                  </tr>";

                    }
                  }else{
                    echo "<script>alert('No data found in table!');</script>";
                  }
                ?>
                </tbody>
              </table>
              </div>
        </div>
          <!-- table ends -->

          <!-- footer  -->
        <?php require_once './include/footer.php' ?>
    
</body>
   <!-- bootstrap js script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>