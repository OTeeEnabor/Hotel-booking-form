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
        <div class="col-lg-6 mx-2 bg-success">
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
            <select class="form-control"> 
                <option>1</option> 
                <option>2</option> 
                <option>3</option> 
                <option>4</option> 
                <option>5</option> 
            </select>  
            </div>

            <div class="form-row">
                <div class="col-5">
                <label for="check-in">Select Check-in Date</label>
                <input type="date" class="form-control" placeholder=".col-5" name="check-in" required>
                </div>
                <div class="col-5">
                <label for="check-out">Select Check Out Date</label>
                <input type="date" class="form-control" placeholder=".col-3" name="check-out" required> 
                </div>
            </div>
            <button type="submit" class="btn btn-default">Submit</button> 
            </form>
            <!--Form ENDS Here-->
        </div>
        <div class="col-lg-6 bg-success"></div>
        
        </div>
    </div>

    
</body>
</html>