<?php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$password = filter_input(INPUT_POST, 'password');
$phone = filter_input(INPUT_POST, 'phone');

$heard_from = filter_input(INPUT_POST, 'heard_from');
if($heard_from === NULL){
    $heard_from = 'Unknown';
}

$wants_updates = $_POST['wants_updates'];
if(isset($wants_updates)){
    $wants_updates = 'yes';
}else{
    $wants_updates = 'no';
}

$contact_via = filter_input(INPUT_POST, 'contact_via');

$comments = filter_input(INPUT_POST, 'comments');
$comments = htmlspecialchars($comments);
$comments = nl2br($comments, false);
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
        <h1>Account Information</h1>

        <label>Email Address:</label>
        <span><?php echo htmlspecialchars($email); ?></span><br>

        <label>Password:</label>
        <span><?php echo htmlspecialchars($password); ?></span><br>

        <label>Phone:</label>
        <span><?php echo htmlspecialchars($phone); ?></span><br>

        <label>Heard from:</label>
        <span><?php echo htmlspecialchars($heard_from); ?></span><br>

        <label>Wants Updates:</label>
        <span><?php echo htmlspecialchars($wants_updates); ?></span><br>

        <label>Send Updates:</label>
        <span><?php echo htmlspecialchars($contact_via); ?></span><br><br>

        <span>Comments:</span><br>
        <span><?php echo $comments; ?></span><br>
        <p>&nbsp;</p>

    </main>
</body>
</html>