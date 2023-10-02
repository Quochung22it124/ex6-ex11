<?php
if(!isset($years)){ $years = '5';}
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
    <h1>Future Value Calculate</h1>    
    <?php if(!empty($error_message)){ ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } ?>    
    <form action="display_results.php" method="post">
        
        <div id="data">
        <label>Investment Amount:</label>
            <select name="investment_amount">
                <?php for ($v = 10000; $v <= 50000; $v += 5000) : ?>
                    <option value="<?php echo $v; ?>">
                    <?php echo $v;?>
                </option>
                <?php endfor; ?>
            </select>
            <br>

            <label>Yearly Interest Rate:</label>
            <select name="yearly_rate">
                <?php for($y = 4; $y <= 12; $y+=.5) : ?>
                    <option value="<?php echo $y; ?>">
                        <?php echo $y; ?>
                </option>
                <?php endfor; ?>
            </select>
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years" value="<?php echo $years; ?>">
            <br>
            </div>
            <div id="buttons">
            <input type="submit" value="Calculate">
            </div>
        </form>
    </main>
</body>
</html>