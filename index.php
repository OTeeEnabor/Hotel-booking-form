<?php
//save this into a php file called user
//connect to the hotelbooking  database
$servername = 'localhost'; //using wampserver
$username   ='adminhotel';
$password   = 'hotelpass';
$dbname     ='HOTELBOOKING';
//save this into a php file called connection.php
//create a conncetion
$conn = new mysqli($servername,$username,$password,$dbname);
//check if the connection was successful
if($conn->connect_error){
    die("Connection Failed: ". $conn->connect_error);
}
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
                    placeholder="Enter First Name" required> 
            </div> 
            <div class="form-group"> 
                <label for="surname">Surname</label> 
                <input type="text"  class="form-control" id="surname" placeholder="Please Enter Your Surname." required> 
            </div>
            <div class="form-group"> 
            <label for="name">Select hotel</label> 
            <!--PHP CODE TO INSTERT HOTELS IN THE DATABASE-->
            <select name ="hotels"class="form-control">
            <?php

            $hotels = "SELECT name, daily_rate FROM hotels";

            $result = $conn->query($hotels);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $listitem = $row['name'];
                    $dailyrate = $row['daily_rate'];
                    echo<<<END
                    <option value="$listitem"> $listitem -- <b>Daily Rate: R$dailyrate</b></option>
END;
                }                
            } else{
                echo "Please contact system admin";
            }
            // $conn->close();
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
            //important variables
            //hotel selected
            $hotelInput =   $_POST['hotels'];
            //daily rate-- query database based on hotel selected.
            $daily_rate_query   =   "SELECT * FROM hotels WHERE name='$hotelInput'";
            $result2 = $conn->query($daily_rate_query);
            //check if result was successful
            if($result2->num_rows > 0){
                //outputdata
                $row2 = $result2->fetch_assoc();
                //hotel rate
                $hotelRate = intval($row2['daily_rate']);               
               // echo "Hotel rate ".$hotelRate ."<br>";
            }
            //code block to calculate the number of days guest will stay at hotel.
            //Check in date -STRING
            $checkin    =   strtotime($_POST['check-in']);
            //check out date -STRING
            $checkout    =   strtotime($_POST['check-out']);
            //calculate the difference between the two days
            $hotelstay  =   ($checkout-$checkin)/(60*60*24);
            //echo " number of days".$hotelstay." <br>";
            //calculate the amount due;
            $amountdue = $hotelstay *$hotelRate;
            //echo "amount due ".$amountdue." <br>";
            //$amount due
            if(!isset($_POST['confirm-booking'])){
                echo<<<END
               
                <h1 class="h1 text-center form-heading">CONFIRM BOOKING</h1>
                
                <div class="container">
                <div class="row">
                <div class="col-12">
                <ul>
                    <li>
                    <span class="book-final">
                    Hotel </span><span class"booking-inputs">$hotelInput</span>
                    </li>
                    <li>
                    <span class="book-final">
                    Check-In Date </span><span class"booking-inputs">$checkin</span>
                    </li>
                    <li>
                    <span class="book-final">
                    Check-Out Date </span><span class"booking-inputs">$checkout</span>
                    </li>
                    <li>
                    <span class="book-final">
                    Cost </span><span class"booking-inputs">$amountdue</span>
                    </li>
                </ul>
                </div>
                </div>
            </div>
                




                <form role="form" method="POST" class="form-holder">
                <button type="submit" class="btn btn-primary btn-lg btn-block my-2" name="confirm-booking">Confirm Booking</button>
    
                </form>
END;

            }

            echo $_POST['hotels'];
            $dateFrom = new DateTime($_POST['check-in']);
            $dateTo = new DateTime($_POST['check-out']);
            $duration = date_diff($dateFrom,$dateTo,true);
            var_dump($dateFrom);

            //create a new table to capture the hotel guest. 

            // if name of table not there
            // create table 
            // else
            // append data into table.



        }
        ?>
        </div>
        
        </div>
    </div>

    
</body>
</html>


<!-- <?php
//Class declaration

// class Booking{


    //constructor method
    // function __construct($name,$hotel,$checkin,$checkout)
    // {
        
    // }

    //class properties

   // public $name;$surname;$hotel;
// }



?> -->