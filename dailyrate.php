
<?php
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

?>

<!-- Preventing Double Booking 
use Selection -check if user name is already in database 
use the post superglobal to match what is in the database -->
