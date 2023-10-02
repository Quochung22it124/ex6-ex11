<?php 
$investment_amount = filter_input(INPUT_POST, 'investment_amount', FILTER_VALIDATE_INT);
$yearly_rate = filter_input(INPUT_POST, 'yearly_rate', FILTER_VALIDATE_FLOAT);
$years = filter_input(INPUT_POST,'years',FILTER_VALIDATE_INT);

if($investment_amount === FALSE){
    $error_message = 'Investment must be a valid number.';
}else if($investment_amount <=0){
    $error_message = 'Investment must be greater than zero.';
}else if($yearly_rate === FALSE){
    $error_message = 'yearly rate must be a valid number.';
}else if($yearly_rate <=0){
    $error_message = 'yearly rate must be greater than zero';
}else if($years === FALSE){
    $error_message = 'Years must be a valid whole number.';
}else if($years <= 0){
    $error_message = 'Years must be greater than zero.';
}else if($years >30){
    $error_message = 'Years must be less than 31';
}else{
    $error_message ='';
}
if($error_message !=''){
    include('index.php');
    exit();
}

$future_value = $investment_amount;
for($i = 1;$i <= $years; $i++){
    $future_value += $future_value * $yearly_rate * .01;
}

$investment_amount_f = '$'.number_format($investment_amount, 2);
$yearly_rate_f = $yearly_rate.'%';
$future_value_f = '$'.number_format($future_value, 2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css"/>
</head>
<body>
    <main>
        <h1>Future Value Calculator</h1>
        <Label>Investment Amount:</Label>
        <span><?php echo $investment_amount_f; ?></span>
<br>
        <Label>Yearly Interest rate:</Label>
        <span><?php echo $yearly_rate_f; ?></span>
<br>
        <LAbel>Number of Years:</LAbel>
        <span><?php echo $years; ?></span>
<br>
        <LAbel>Future Value:</LAbel>
        <span><?php echo $future_value_f; ?> </span>
    </main>
</body>
</html>