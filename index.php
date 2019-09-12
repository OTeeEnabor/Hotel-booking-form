<?php
include ('user.php');
include('connection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Bootstrap CSS Stylesheet-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Custom StyleSheet-->
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <title>Nav Hotel Booking</title>
</head>
<body class="form-body">
    <div class="container">
        <div class="row">
        <div class="col-lg-6 mx-2 my-2 bg-transparent form-col">
            <div class="form-container body-form">
            <h1 class="h1 text-center form-heading"> NAV HOTEL BOOKINGS</h1>
            </div>
            <!--Form Starts Here-->
            <form role="form" method="POST" class="form-holder"> 
            <div class="form-group"> 
                <label for="name">Name</label> 
                <input type="text" class="form-control" id="name"  
                    placeholder="Please Enter First Name" name="name" required> 
            </div> 
            <div class="form-group"> 
                <label for="surname">Surname</label> 
                <input type="text"  class="form-control" id="surname" placeholder="Please Enter Your Surname." name="surname"required> 
            </div>
            <div class="form-group"> 
            <label for="name">Select hotel</label> 
            <!--PHP CODE TO INSTERT HOTELS IN THE DATABASE-->
            <select name ="hotels"class="form-control">
            <?php
            // function to load hotels
            include 'hotels.php';
            loadHotels();
            ?>
            </select>  
            </div>
            <div class="form-row">
                <div class="col-5 check-in-date">
                <label for="check-in">Select Check-in Date</label>
                <input type="date" class="form-control" placeholder=".col-5" name="check-in" value="<?php echo date("Y-m-d");?>"required>
                </div>
                <div class="col-5 check-out-date">
                <label for="check-out">Select Check-out Date</label>
                <input type="date" class="form-control" placeholder=".col-3" name="check-out" required> 
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block my-2" name="submit">Submit Booking</button> 
            </form>
            <!--Form ENDS Here-->
        </div>
        <div class="col-lg-4 my-2 bg-success">

        <?php
        if(isset($_POST['submit'])){
            if(!isset($_POST['confirm-booking'])){
                //display the inputs
                 //first name of guest
            $firstName  =   $_POST['name'];
            //surname of guest
            $lastName   =   $_POST['surname'];
            //concatenate names to one-- for outoput purposes
            $guestName  =   $firstName." ".$lastName;
            //important variables
            //hotel selected
            $hotelchoice =   $_POST['hotels'];
            include 'dailyrate.php';
            $hotelRate = dailyRateQuery($hotelchoice);
            //code block to calculate the number of days guest will stay at hotel.
            //Check in date -STRING
            $checkin    =  $_POST['check-in'];
            //check out date -STRING
            $checkout    = $_POST['check-out'];
            $amountdue = amountDue($checkin,$checkout,$hotelRate);
            // // create a function
            confirmBooking($guestName,$hotelchoice,$checkin,$checkout,$amountdue,$firstName,$lastName);
            }
            else{ //send to database when confirm booking is set??
                //once set send to mySQL
                $firstName  =   $_POST['firstname-confirm'];
                $lastName   =   $_POST['lastname-confirm'];
                $checkin    =   $_POST['checkin-confirm'];
                $checkout   =   $_POST['checkout-confirm'];
                $hotelchoice =  $_POST['hotel-confirm'];
                $amountdue  =   $_POST['cost-confirm'];
                //insert into bookings table
                $sqlInsert = "INSERT INTO booking (firstName, lastName, hotel, check_in_date, check_out_date,amount_due)
                        VALUES ('$firstName', '$lastName', '$hotelchoice','$checkin','$checkout','$amountdue')";

            if ($conn->query($sqlInsert) === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sqlInsert . "<br>" . $conn->error;
            }
            }  
        }
        ?>
        </div>  
        </div>
    </div>
</body>
</html>
