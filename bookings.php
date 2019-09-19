<?php
ob_start();
require ('user.php');
require('connection.php');
require 'inc/header.php';
require 'functions.php';
?>
    <div class="container-fluid form-body mb-4 ">
        <div class="row">
        <div class="col-lg-6 mx-2 my-2 bg-transparent form-col">
            <div class="form-container body-form">
            <h1 class="h1 text-center form-heading"> NAV HOTEL BOOKINGS</h1>
            </div>
            <!--Form Starts Here-->
            <form role="form" method="POST" class="form-holder"> 
            <div class="form-group"> 
                <label for="name">Name <i class="fa fa-fw fa-id-card-o" style=""></i> </label> 
                <input type="text" class="form-control" id="name"  
                    placeholder="Please Enter First Name" name="name" required> 
            </div> 
            <div class="form-group"> 
                <label for="surname">Surname<i class="fa fa-fw fa-id-card-o" style=""></i></label> 
                <input type="text"  class="form-control" id="surname" placeholder="Please Enter Your Surname." name="surname"required> 
            </div>
            <div class="form-group"> 
            <label for="name">Select hotel<i class="fa fa-fw fa-hotel" style=""></i></label> 
            <!--PHP CODE TO INSTERT HOTELS IN THE DATABASE-->
            <select name ="hotels"class="form-control" id="hotel-list">
            <?php
            // function to load hotels
            // include 'hotels.php';
            loadHotels();
            ?>
            </select>  
            </div>
            <div class="form-row">
            <!--CHECK IN DATE START-->
                <div class="col-5 check-in-date">
                <label for="check-in">Select Check-in Date<i class="fa fa-fw fa-calendar" style=""></i></label>
                <input type="date" class="form-control" placeholder=".col-5" name="check-in" value="<?php echo date("Y-m-d");?>" min="<?php echo date("Y-m-d"); ?>"required>
                </div>
            <!--CHECK IN DATE END-->
            <!--CHECK OUT DATE START-->
                <div class="col-5 check-out-date">
                <label for="check-out">Select Check-out Date<i class="fa fa-fw fa-calendar" style=""></i></label>
                <input type="date" class="form-control" placeholder=".col-3" name="check-out" min="<?php echo date("Y-m-d",strtotime("tomorrow")); ?>" required> 
                </div>
            <!--CHECK OUT DATE END-->
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block my-2" name="submit">Submit Booking</button> 
            </form>
            <!--Form ENDS Here-->
        </div>
        <div class="col-lg-5 my-2 confirm-container">

        <?php
        //CODE BLOCK TO RUN IF THE USER FILLS THE FORM CORRECTLY
        if(isset($_POST['submit'])){
            //IF THE USER HAS NOT CONFIRMED THE BOOKING BY PRESSING THE CONFIRM BOOKING BUTTON
            if(!isset($_POST['confirm-booking'])){
            //COLLECT THE FOLLOWING INFORMATION FROM THE HOTEL FORM THAT THEY SUBMITTED AND STORE THEM INTO VARIABLLES THAT WILL BE USED TO POPULATE THE DATABASE
            //first name of guest
            // include 'functions.php';
            $firstName  =   $_POST['name'];
            //surname of guest
            $lastName   =   $_POST['surname'];
            //concatenate names to one-- for output purposes
            $guestName  =   $firstName." ".$lastName;
            //important variables
            //hotel selected
            $hotelchoice =   $_POST['hotels'];
            //FUNCTIONS 
            // include 'functions.php';
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
            //ELSE STATEMENT WILL RUN ONCE THE USER HAS CONFIRMED THE BOOKING BY PRESSING THE CONFIRM BOOKING BUTTON WHICH POPULATES THE POST SUPERGLOABAL WITH THE CONFIRMED DETAILS.
            else{
            //SAVE THE CONFIRMED INFORMATION INTO NEW VARIABLES TO USE TO QUERY THE DATABASE FOR DUPLICATES.
                $firstName  =   $_POST['firstname-confirm'];
                $lastName   =   $_POST['lastname-confirm'];
                $checkin    =   $_POST['checkin-confirm'];
                $checkout   =   $_POST['checkout-confirm'];
                $hotelchoice =  $_POST['hotel-confirm'];
                $amountdue  =   $_POST['cost-confirm'];
                //select from database where name,hotel, if non exits insert into database


                /*
syntax
$stmt = $conn->prepare("INSERT INTO bookin(firstname, surname, hotelname, indate, outdate) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss",$fname,$sname,$hotelname,$indate,$outdate)
//sssss->stating the datatype expeted for the arguements.
the arguments are only defined after the binding process has beeen done. 
                */
                //query the database 
                $sql_search ="SELECT * FROM  booking WHERE firstname = '$firstName 'AND  lastName='$lastName'";

                $tableSearch_result = $conn->query($sql_search);
                if($tableSearch_result->num_rows>0){
                    $existBooking   = $tableSearch_result->fetch_assoc();
                    $existingBooking_id = $existBooking['id'];
                    $existBooking_name = $existBooking['firstName'];
                    $existBooking_lname = $existBooking['lastName'];
                    $existBooking_hotel = $existBooking['hotel'];
                    $existBooking_check_in =$existBooking['check_in_date'];
                    $existBooking_check_out =$existBooking['check_out_date'];

                    echo<<<END
                    <div class="container prev-booking">
                    <div class="row">
                        <div class="col-12">
                        <h2 class="h4 text-center form-heading"text-center">PREVIOUS BOOKING FOUND.</h2>
                        <p>Would you like to proceed with the new booking and delete the previous below?</p>
                        <ul class="confirm-final">
                            <li> <b>Guest Name:</b> $existBooking_name $existBooking_lname</li>
                            <li><b>Hotel:</b> $existBooking_hotel</li>
                            <li><b>Check-In Date:</b>  $existBooking_check_in</li>
                            <li><b>Check-Out Date:</b>  $existBooking_check_out</li>
                        </ul>
                        <form method="POST" class="duplicate-buttons">
                        <input type="hidden"  name="replace-id" value="$existingBooking_id">
                        <input type="hidden" name="confirm-booking">
                        <input type="hidden" name="firstname-confirm" value="$firstName">
                        <input type="hidden" name="lastname-confirm" value="$lastName">
                        <input type="hidden" name="hotel-confirm" value="$hotelchoice">
                        <input type="hidden" name="checkin-confirm" value="$checkin">
                        <input type="hidden" name="checkout-confirm" value="$checkout">
                        <input type="hidden" name="cost-confirm" value="$amountdue">
                        <input type="hidden" name="submit">
                        <input type="submit" class="btn-outline btn-lg" name="previous" value="Yes">
                        <input type="submit" class="btn-outline btn-lg"name="previous" value="No">
                        </form>
                        </div>
                    </div>
                    </div>
END;
            }else{
                // include 'functions.php';
                insertEntry($firstName,$lastName,$hotelchoice,$checkin,$checkout,$amountdue);}  
        }
        if(isset($_POST['previous'])){
            if($_POST['previous'] == 'Yes'){

                $existingBooking_id = $_POST['replace-id'];

                // include 'functions.php';

                deleteEntry($existingBooking_id,$firstName,$lastName,$hotelchoice,$checkin,$checkout,$amountdue);
                header('Location: index.php');
                echo "replace ---- ". $existingBooking_id; 

                echo "lastname: " . $firstName;
                
            }else{
                header('Location: index.php');
            }
        }
    }
        ?>
        </div>  
        </div>
    </div>

    <!--HOTEL DETAILS-->
    <div class="container mt-4 mb-4">
        <div class="row">
           <div id=""class="col-sm hotel-display">
                
           </div>
           <div class="col-sm hotel-details">

           </div>
        </div>
    </div>
    <!--HOTEL DETAILS SECTION START-->
    <div class="container hotel-info">
        <div class="row">
            <div id='hotel-card'class="col-lg-5">

            </div>
            <div id="hotel-carousel"class="col-lg-5">
    
            </div>
        </div>
    </div>
    <!--HOTEL DETAILS SECTION END-->
    <!--Custom jQuery script-->
<script src="js/main.js" type=""></script>
<!--Custom jQuery script End-->
</body>
</html>