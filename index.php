<?php 
    session_start();
    if(!isset($_SESSION['username'])){
    header('location: login.php');	
}
    else{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
<h1>
	<span>w</span>
	<span>e</span>
	<span>l</span>
	<span>c</span>
	<span>o</span>
	<span>m</span>
	<span>e</span>
</h1>
</body>
</html>
<?php
}    
?>
    