<!-- //this is a function to load the hotels from the database and return the results into a dropdown menu

 -->

 <?php
function loadHotels(){
    $hotels = "SELECT name, daily_rate FROM hotels";
    include 'connection.php';
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

}
?>
