

<html>
<head>
     <title>Disqualify</title>
     <link rel="icon" type="image/gif" href="images/icons/acm.ico" sizes="16x16"/>
     <link rel="stylesheet" href="second.css">
</head>
<script type="text/javascript">
	function closeWin() {
    window.close();
}

</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<body>
<?php
session_start();
$con = mysqli_connect('localhost','root','','quiz');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
  $sql4 = "UPDATE signup SET qualify='0' WHERE id='$_SESSION[userid1]'";
if ($con->query($sql4) === TRUE) {
    //echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $con->error;
}
   
?>

<div class="sp-container" >
    <div class="sp-content">
        <div class="sp-globe"></div>
        <h2 class="frame-1">SORRY </h2>
        <h2 class="frame-2">YOU ARE</h2>
        <h2 class="frame-3">DISQUALIFIED</h2>
        <a class="sp-circle-link" >MadebyACM </a>
<!--
        <h2 class="frame-4">3</h2>
        <h2 class="frame-5">2</h2>
        <h2 class="frame-5">1</h2>-->
        <!--<a class="sp-circle-link" >Finish</a>
        
        <button class="sp-circle-link" onclick="closeWin()">Finish</button>
        -->
</div>
</body>
</html>