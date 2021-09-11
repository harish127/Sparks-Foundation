<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- external css bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showing Transactions details</title>
</head>
<body>

  <!-- header with connection and sql code -->
  <?php require_once './include/header.php'; 
        require 'connection.php';

 $sql = "SELECT * FROM `transaction`";

 $result = mysqli_query($conn,$sql);
 $num_of_entry = mysqli_num_rows($result); 
  ?>

  <!-- main container -->
  <div class="container my-5">
      <h2>Transaction details</h2>
      <div class="container my-3">
          <!-- table starts -->
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Amount</th>
                  </tr>
                </thead>
                 <!-- fetching data from table -->
                <?php 
                  if($num_of_entry>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>
                        <th scope='row'>".$row['Tran_ID']."</th>
                        <td>".$row['From']."</td>
                        <td>".$row['To']."</td>
                        <td>".$row['Amount']."</td>
                        </tr>";

                    }
                  }else{
                    echo "<script>alert('No data found in table!');</script>";
                  }
                  ?>
                <tbody>
                </tbody>
              </table>
              <!-- table ends -->
              </div>
      </div>
  </div>

           <!-- footer  -->
  <?php require_once './include/footer.php' ?>  
</body>

      <!-- bootstrap js script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</html>