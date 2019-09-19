
<!-- <option value=hotel-$i> $listitem -- <b>Daily Rate: R$dailyrate</b></option> -->
<?php
function loadHotels(){
    $hotels = "SELECT name, daily_rate FROM hotels";
    include 'connection.php';
            $result = $conn->query($hotels);
            if($result->num_rows > 0){
                $i = 1;
                while($row = $result->fetch_assoc()){
                    $listitem = $row['name'];
                    $dailyrate = $row['daily_rate'];
                    echo<<<END
                    <option value="$listitem">$listitem --$dailyrate</option>
                    
END;
                    $i++;
                }                
            } else{
                echo "Please contact system admin";
            }
        }
function dailyRateQuery($hotelQuery){

    include 'connection.php';
    // $hotelInput =   $_POST['hotels'];
//daily rate-- query database based on hotel selected.
    $daily_rate_query   =   "SELECT * FROM hotels WHERE name='$hotelQuery'";
    $result2 = $conn->query($daily_rate_query);
//check if result was successful
    if($result2->num_rows > 0){
        //outputdata
        $row2 = $result2->fetch_assoc();
        //hotel rate
        return $hotelRate = intval($row2['daily_rate']);          
    }
}
//return the amount of hotel stay
function amountDue($checkInDate,$checkOutDate,$hotelDailyRate){
    $checkin = strtotime($checkInDate);
    $checkout = strtotime($checkOutDate);
    $hotelstay =($checkout-$checkin)/(60*60*24);
    $amountdue   =   $hotelstay * $hotelDailyRate;
    return $amountdue;

}
function confirmBooking($guestName,$hotelchoice,$checkin,$checkout,$amountdue,$firstName,$lastName){
    echo<<<END
    <h1 class="h1 text-center form-heading">CONFIRM BOOKING</h1>
<div class="container confirm-booking">
    <div class="row">
    <div class="col-12">
    <ul class="confirmation-final">
        <li>
        <span class="book-final">
        Guest Name: </span><span class"booking-inputs">$guestName</span>
        </li>
        <li>
        <span class="book-final">
        Hotel: </span><span class"booking-inputs">$hotelchoice</span>
        </li>
        <li>
        <span class="book-final">
        Check-In Date: </span><span class"booking-inputs">$checkin</span>
        </li>
        <li>
        <span class="book-final">
        Check-Out Date: </span><span class"booking-inputs">$checkout</span>
        </li>
        <li>
        <span class="book-final">
        Cost: </span><span class"booking-inputs">R$amountdue</span>
        </li>
    </ul>
    </div>
    </div>
</div>              
    <form role="form" method="POST" class="form-holder">
    <input type="hidden" name="firstname-confirm" value="$firstName">
    <input type="hidden" name="lastname-confirm" value="$lastName">
    <input type="hidden" name="hotel-confirm" value="$hotelchoice">
    <input type="hidden" name="checkin-confirm" value="$checkin">
    <input type="hidden" name="checkout-confirm" value="$checkout">
    <input type="hidden" name="cost-confirm" value="$amountdue">
    <input type="hidden" name="submit">
    <button type="submit" class="btn btn-primary btn-lg btn-block my-2" name="confirm-booking">Confirm Booking</button>   
    </form>
END;

}

//check dupplicate function
function deleteEntry($entryId,$firstName,$lastName,$hotelchoice,$checkin,$checkout,$amountdue){
    include 'connection.php';
    //query string to delete an existing row found in the database.
    $sql_delete =   "DELETE FROM booking where id='$entryId'";
    if($conn->query($sql_delete)){
        $sqlInsert = "INSERT INTO 
            booking (firstName, lastName, hotel, check_in_date, check_out_date,amount_due)
           VALUES ('$firstName', '$lastName', '$hotelchoice','$checkin','$checkout','$amountdue')";
         if ($conn->query($sqlInsert) === TRUE) {
             //INSERT INTO TABLE SUCCESS
             echo<<<END
             <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="success-booking">
                    <img src="./images/booking_successful.png">
                    <p>You have successfuly created a booking.</p>
                    <a class="btn btn-outline-success"href='index.php'><i class="fa fa-fw fa-hotel" style=""></i>Go Home</a>
                </div>
            </div>
        </div>
        </div>
END;
         } else {
            echo "Error: " . $sqlInsert . "<br>" . $conn->error;
        }
    }

}


function insertEntry($firstName,$lastName,$hotelchoice,$checkin,$checkout,$amountdue){
    include 'connection.php';
    //prepare for sanitization and preparation
                  /*
syntax
$stmt = $conn->prepare("INSERT INTO bookin(firstname, surname, hotelname, indate, outdate) VALUES (?,?,?,?,?)");
$stmt->bind_param("sssss",$fname,$sname,$hotelname,$indate,$outdate)
//sssss->stating the datatype expeted for the arguements.
the arguments are only defined after the binding process has beeen done. 
                */
    //prepare the statement
    // $sql_stmt = $conn->prepare("INSERT INTO booking(firstName, lastName, hotel, check_in_date, check_out_date, amount_due) VALUES(?,?,?,?,?,?)");
    // //bind the values to the statement
    // $sql_stmt->bind_param("sssss",$firstName,$lastName,$hotelchoice,$checkin,$checkout,$amountdue);

    $sqlInsert = "INSERT INTO 
            booking (firstName, lastName, hotel, check_in_date, check_out_date,amount_due)
           VALUES ('$firstName', '$lastName', '$hotelchoice','$checkin','$checkout','$amountdue')";
    if ($conn->query($sqlInsert) === TRUE) {
        echo<<<END
        <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="success-booking">
                    <img src="./images/booking_successful.png">
                    <p>You have successfuly created a booking.</p>
                    <a class="btn btn-outline-success"href='index.php'><i class="fa fa-fw fa-hotel" style=""></i>Go Home</a>
                </div>
            </div>
        </div>
        </div>
END;
     } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }

}
?>

<?php
/*Clean the code to be entered into the database*/
function sanitizeString($var){
    //remove twhitespace at ends.
    $var    = trim($var);
    //remove html entirely from code
    $var    =   strip_tags($var);
    //prevents escape characters being injected into MYSQL string
    // $var    = mysqli_real_escape_strings($var);
    //remove unwanted slashes from string
    $var    = stripslashes($var);
    //converts interpretable html eg <b><B>
    // $var    = htmlentities($var);
    
    //return the SANITIZED
        return $var;
}
?>
