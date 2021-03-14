<?php
$name = isset($_REQUEST['name']) && trim($_REQUEST['name']) != "" ? $_REQUEST['name'] : null;
$section = isset($_REQUEST['section']) && trim($_REQUEST['section']) != "" ? $_REQUEST['section'] : null;
$card_number = isset($_REQUEST['card_number']) && trim($_REQUEST['card_number']) != "" ? $_REQUEST['card_number'] : null;
$card_type = isset($_REQUEST['card_type']) && trim($_REQUEST['card_type']) != "" ? $_REQUEST['card_type'] : null;

$data_valid = false;

if($name && $section && $card_number && $card_type) {
    $data_valid = true;
    file_put_contents('suckers.txt', "$name;$section;$card_number;$card_type\n", FILE_APPEND);
}

$lines = file_get_contents('suckers.txt');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="buyagrade.css" type="text/css" rel="stylesheet"/>
</head>

<body>
<h1>Buy Your Way to a Better Education!</h1>

<p>
    The rough economy, along with recent changes in University of Washington policy, now allow us to offer grades for
    money. That's right! All you need to get a 4.0 in this course is cold, hard, cash.
</p>

<hr/>
<?php if($data_valid): ?>
<h2>Thanks, sucker!</h2>
<p>Your information has been recorded.</p>
<div>Name: <?=$name?></div>
<div>Section: <?=$section?></div>
<div>Credit Card: <?=$card_number?> (<?=$card_type?>)</div>
<style>
    div {
        margin-bottom: 1rem;
    }
</style>
<?php
$credentials = explode("\n", $lines);

echo "<pre>";
print_r($credentials);
echo "</pre>";
?>
<?php else:?>
<h2>Sorry</h2>
<p>You didn't fill out the form completely. <a href="buyagrade.php">Try again?</a></p>
<?php endif;?>
</body>
</html>