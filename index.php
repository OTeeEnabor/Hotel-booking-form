<?php
//connect to the hotelbooking  database
$servername = 'localhost'; //using wampserver
$username   ='adminhotel';
$password   = 'hotelpass';
$dbname     ='HOTELBOOKING';
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
        <div class="col-lg-6 mx-2 my-2 bg-success">
            <div class="form-container">
            <h1> NAV HOTEL BOOKINGS</h1>
            </div>
            <!--Form Starts Here-->
            <form role="form" method="POST"> 
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
            $hotels = "SELECT name FROM hotels";
            $result = $conn->query($hotels);

            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $listitem = $row['name'];
                    echo<<<END
                    <option> $listitem</option>
END;
                }
                
            } else{
                echo "Please contact system admin";
            }
            $conn->close();
            ?>
                <!-- <option>1</option> 
                <option>2</option> 
                <option>3</option> 
                <option>4</option> 
                <option>5</option>  -->
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
            echo $_POST['hotels'];
            $dateFrom = new DateTime($_POST['check-in']);
            $dateTo = new DateTime($_POST['check-out']);
            
            $duration = date_diff($dateFrom,$dateTo,true);
            var_dump($dateFrom) ;
        
        }
        // $subBooking = $_POST['submit'];
        // if(isset($subBooking)){
        //     echo $_POST['check-out'];
        //     echo "<br>";
        //     echo gettype($_POST['check-in']);


        // }
        ?>
        </div>
        
        </div>
    </div>

    
</body>
</html>

<?php
//change the data type of the date inputed in the form.so that it can be used to calculate the cost of the hotel stay.
if(isset($_POST['submit'])){
    echo $_POST['hotels'];
    $dateFrom =date('Y-m-d',strtotime( $_POST['check-in']));
    $dateTo  = date('Y-m-d',strtotime( $_POST['check-out']));
    var_dump($dateFrom) ;

}




?>
<?php
//Class declaration

class Booking{

    //class properties

   // public $name;$surname;$hotel;
}



?>