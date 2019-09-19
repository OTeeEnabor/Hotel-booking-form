<!-- //this is a function to load the hotels from the database and return the results into a dropdown menu

 -->

 <?php
function loadHotels(){
    $hotels = "SELECT name, daily_rate FROM hotels";
    include 'connection.php';
            $result = $conn->query($hotels);
            if($result->num_rows > 0){
                $i = 0;
                while($row = $result->fetch_assoc()){
                    $listitem = $row['name'];
                    $dailyrate = $row['daily_rate'];
                    echo<<<END
                    <option value='hotel-' . "$i"> $listitem -- <b>Daily Rate: R$dailyrate</b></option>
END;
                    $i++;
                }                
            } else{
                echo "Please contact system admin";
            }

}
?>
<?php

// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <meta http-equiv="X-UA-Compatible" content="ie=edge">
//     <!--Bootstrap CSS Stylesheet-->
//     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
//     <!--Custom StyleSheet-->
//     <link href="css/style.css" rel="stylesheet" type="text/css">

//     <title>Nav Hotel Booking</title>
// </head>
// <body class="form-body">
?>