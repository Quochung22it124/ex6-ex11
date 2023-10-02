<?php
$investment = filter_input(INPUT_POST, 'investment', FILTER_VALIDATE_INT);
$interest_rate = filter_input(INPUT_POST, 'interest_rate', FILTER_VALIDATE_FLOAT);
$years = filter_input(INPUT_POST, 'years', FILTER_VALIDATE_INT);

if($investment === false){
    $error_message = 'Investment must be a valid number.';
} else if ($investment <= 0){
    $error_message = 'Investment must be greater than zero.';
}else if($interest_rate === false){
    $error_message = 'Interest rate must be a valid number.';
}else if($interest_rate > 15){
    $error_message = 'Interest rate must be less than or equal to 15.';
}else if($years === false){
    $error_message = 'Years must be a valid whole number.';
}else if($years > 30){
    $error_message = 'Years must be less than 31.';
}else if($years <= 0){
    $error_message = 'Years must be greater than zero.';
}else{
    $error_message = '';
}

if ($error_message !=''){
    include('index.php');
    exit();
}

$future_value = $investment;
for($i = 1; $i <= $years; $i++){
    $future_value += $future_value * $interest_rate * .01;
}

$investment_f = "$".number_format($investment, 2);
$yearly_rate_f = $interest_rate."%";
$future_value_f = "$".number_format($future_value, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css"/>
    <title>Document</title>
</head>
<body>
    <h1>Future Value Calculator</h1>

    <label>Investment Amount:</label>
    <span><?php echo htmlspecialchars($investment_f); ?></span><br>

    <label>Yearly Interest Rate:</label>
    <span><?php echo htmlspecialchars($yearly_rate_f); ?></span><br>

    <label>Number of Years:</label>
    <span><?php echo htmlspecialchars($years); ?></span><br>

    <label>Future Value:</label>
    <span><?php echo htmlspecialchars($future_value_f); ?></span><br>

    <p>This calculation was done in <?php echo date('m/d/Y'); ?>.</p>
</body>
</html>