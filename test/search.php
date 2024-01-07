<?php

$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "login";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
 
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/style.css">
    <title>Search</title>
</head>
<header>
    <h1>Search</h1>
    <nav>
        <ul>
            <li><input type="submit" value="Go back!" class="log1" onclick="history.back()"></li>
            
        </ul>
    </nav>
</header>

<body>

<div class="tab">
        <table class="table">
            <thead>
                <tr>
                    <th>Lead id</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Alternate</th>
                    <th>Whatsapp</th>
                    <th>Email</th>
                    <th>Interested</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th>DOR</th>
                    <th>Caller</th>
                    <th>State</th>
                    <th>City</th>
                    <!-- <th>Caller id</th> -->
                </tr>
            </thead>
            <tbody>

                <?php
      $search=$_GET['search'];

    $sql="SELECT * FROM `crm_lead_master_data` WHERE CONCAT(`Lead_ID`, `Name`, `Mobile`, `Alternate_Mobile`, `Whatsapp`, `Email`, `Interested_In`, `Source`, `Status`, `DOR`) LIKE '%$search%'";
    $result=mysqli_query($conn,$sql);

    if($result){
      $i=1;
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['Lead_ID'];
            $Name=$row['Name'];
            $mobile=$row['Mobile'];
            $other=$row['Alternate_Mobile'];
            $wp=$row['Whatsapp'];
            $mail=$row['Email'];
            $inter=$row['Interested_In'];
            $source=$row['Source'];
            $status=$row['Status'];
            $DOR=$row['DOR'];
            $caller=$row['Caller'];
            $state=$row['State'];
            $City=$row['City'];
            // $cid=$row['Caller_ID'];

           echo "<tr>
           <th>".$i."</th>
           <td>".$Name."</td>
           <td>".$mobile."</td>
           <td>".$other."</td>
           <td>".$wp."</td>
           <td>".$mail."</td>
           <td>".$inter."</td>
           <td>".$source."</td>
           <td>".$status."</td>
           <td>".$DOR."</td>
           <td>".$caller."</td>
           <td>".$state."</td>
           <td>".$City."</td>
           
         </tr>";

         $i++;

        }
    } 
?>
            </tbody>
        </table>
    </div>


</body>


</html>