<html>
<h1>
Single Temperature Conversion
</h1>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="post">

Input Temperature:
<input type="text" step="any" name="input_temp">
<select name="unit_type1">
	<option value="" disabled selected>Choose temp...</option>
	<option value="K"> Kelvin </option>
	<option value="C"> Celsius </option>
	<option value="F"> Fahrenheit </option>
	<option value="R"> Rankine </option>
</select><br><br>

Student Response:
<input type="text" step="any" name="student_temp">
<select name="unit_type2">
	<option value="" disabled selected>Choose temp...</option>
	<option value="K"> Kelvin </option>
	<option value="C"> Celsius </option>
	<option value="F"> Fahrenheit </option>
	<option value="R"> Rankine </option>
</select><br><br>

<button type="submit" name="submit">Convert</button>
</form>
</body>
</html>

<?php

if(isset($_POST['submit'])) {
    $input_temp = $_POST['input_temp'];
    $iniinput_temp = $input_temp;
    $student_temp = $_POST['student_temp'];
    $inistudent_temp = $student_temp;
    $select1 = $_POST['unit_type1'] ?? "";
    $select2 = $_POST['unit_type2'] ?? "";
    
    if (empty($input_temp) || empty($student_temp)) {
        echo "*Missing input temperature and/or student response";
        
    } elseif (!is_numeric($input_temp) || !is_numeric($student_temp)){
        echo "Temperature entered was: ".$iniinput_temp.", Student's Response was: ".$inistudent_temp. "<br><br>"."Grade: Invalid";
        
    } elseif (!empty($input_temp) and !empty($student_temp) and !empty($select1) and !empty($select2)) {
        switch([$select1, $select2]) {
            case ["F", "C"]:
                $input_temp = getFarhtoCels($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["F", "K"]:
                $input_temp = getFarhtoCels($input_temp);
                $input_temp = getCelstoKelv($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["F", "R"]:
                $input_temp = getFarhtoCels($input_temp);
                $input_temp = getCelstoRank($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["C", "F"]:
                $input_temp = getCelstoFarh($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["C", "K"]:
                $input_temp = getCelstoKelv($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["C", "R"]:
                $input_temp = getCelstoRank($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["K", "F"]:
                $input_temp = getKelvtoCels($input_temp);
                $input_temp = getCelstoFarh($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["K", "C"]:
                $input_temp = getKelvtoCels($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["K", "R"]:
                $input_temp = getKelvtoCels($input_temp);
                $input_temp = getCelstoRank($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["R", "C"]:
                $input_temp = getRanktoCels($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["R", "K"]:
                $input_temp = getRanktoCels($input_temp);
                $input_temp = getCelstoKelv($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;
            case ["R", "F"]:
                $input_temp = getRanktoCels($input_temp);
                $input_temp = getCelstoFarh($input_temp);
                $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
                $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
                compareTemps($input_temp, $student_temp);
                
                break;

        }
        //print results
        if ($input_temp == $student_temp) {
            echo "Temperature entered was: ".$iniinput_temp.$select1.", Student's Response was: ".$inistudent_temp.$select2. "<br><br>". "Grade: Correct";
        } else {
            echo "Temperature entered was: ".$iniinput_temp.$select1.", Student's Response was: ".$inistudent_temp.$select2. "<br><br>"."Grade: Incorrect";
        }
    } else {
        echo "*Please select appropriate temperature units from both drop down";
    }
}


function getFarhtoCels(float $a) {
    return ($a - 32.0) * (5/9);
}

function getCelstoFarh(float $a) {
    return ($a * (9/5)) + 32.0;
}

function getKelvtoCels(float $a) {
    return $a - 273.15;
}

function getCelstoKelv(float $a) {
    return $a + 273.15;
}

function getCelstoRank(float $a) {
    return ($a + 273.15) * (9/5);
}

function getRanktoCels(float $a) {
    return ($a - 491.67) * (5/9);
}

function compareTemps(float $input_temp, float $student_temp){
    $input_temp = round($input_temp, 0, PHP_ROUND_HALF_UP);
    $student_temp = round($student_temp, 0, PHP_ROUND_HALF_UP);
}

?>