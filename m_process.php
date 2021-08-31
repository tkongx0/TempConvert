<html>
<h1>
Multiple Temperature Conversion
</h1>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">

Please note this form can only handle up to 30 conversions, how many temperatures do you want to convert?
<input type="number" name="num_temps">
<button type="submit" name="submit">Submit</button>

</form>
</body>
</html>

<?php
if(isset($_POST['submit'])) {
    $num_temps = $_POST['num_temps'];
    $count = 0;
    if(empty($num_temps)) {
        echo "<br><br>*Please input how many temps you want to convert.";
    } elseif ($num_temps <= 30) {
        for ($x = 0; $x < $num_temps; $x++) {
            //coding for dynamic inputs not complete. Requires use to Javascript or JQuery to build dynamically
            echo "Test Entry $count <br>";
            $count++;
        }
    } else {
        echo "This form can only handle 30 values, please enter a number below 30";
    }
}

?>
