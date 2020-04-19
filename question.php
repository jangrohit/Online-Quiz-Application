<?php 
session_start();
if(empty($_SESSION['count'])){
  $count=1;
}
else{     
	$count=$_SESSION['count'];
}
if($count>5){
   header("Location: endpage.php");
   session_destroy(); 
}
if(empty($_SESSION['score'])){
  $score=0;
}
else
{         
  $score=$_SESSION['score'];
}


$con = mysqli_connect('localhost','root','','quiz');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
$sql="SELECT * FROM QuizTest where qid=$count";

$result = mysqli_query($con,$sql);


if($result->num_rows>0) {
	while($row=$result->fetch_assoc())
    {
    $qid=$row['QID'];
    $question= $row['Question'] ;
    $option1=$row['Option1'] ;
    $option2=$row['Option2'] ;
    $option3=$row['Option3'] ;
    $option4=$row['Option4'] ;
    $ans=$row['Ans'];
}
}
if(isset($_POST['gen'])){
$prev_count = $count-1;
if($prev_count==0){
  $prev_count=6;
}
$sql="SELECT * FROM QuizTest where qid=$prev_count";
$result = mysqli_query($con,$sql);

if($result->num_rows>0) {
  while($row=$result->fetch_assoc())
    {
    $ans=$row['Ans'];
    if(metaphone($ans)==metaphone($_POST['gen'])){
      $score = $score+4;
      $_SESSION['score']=$score;
      //echo $score;   
    }
      else
      {
        $score = $score-1;
      $_SESSION['score']=$score;
      } 
      echo  $_SESSION['score'];
}    	

}
}
$temp_userid=$_SESSION['userid1'];
echo $_SESSION['userid1'];

$sql2 = "UPDATE signup SET score='$score' WHERE id='$temp_userid'";
if ($con->query($sql2) === TRUE) {
   // echo "Record updated successfully";
} else {
    //echo "Error updating record: " . $con->error;
}
$sql3 = "UPDATE signup SET count_last_ques='$count' WHERE id='$temp_userid'";
if ($con->query($sql3) === TRUE) {
   // echo "Record updated successfully";
} else {
   // echo "Error updating record: " . $con->error;
}
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <title>Quiz Test</title>
  <link rel="icon" type="image/gif" href="images/icons/acm.ico" sizes="16x16"/>
  <link rel="icon" type="image/gif" href="images/icons/acm.ico" sizes="16x16"/>

     
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="UTF-8">
<title>jQuery Get Selected Radio Button Value</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

  <link rel="stylesheet" type="text/css" href=""/>
<style >
	body {
    /*background-image: url("giphy.gif");
    */
    background-image: url("back2.jpg");
    
}
</style>
</head>

<style>
/* The container */
.container1 {
    display:;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 20px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.container1 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container1:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container1 input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.container1 input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.container1 .checkmark:after {
  top: 9px;
  left: 9px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}
</style>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}
/* Full-width input fields */
input[type=text] {
    width: 100%;
    padding: 20px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: 10;
    background: #080B40;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Set a style for all buttons */
button {
    background-color: #57d6c7;
    background-image:   url(signup.png)
    color: black;
    padding: 14px 20px;
    margin: 8px 0;
    border: 30%;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
    /*.fsSubmitButton
{
  background-image:   url(signup.png);
  background-repeat:  no-repeat;
  background-color: transparent;
  height:     66px;
  width:      182px;
  border:     none;
  text-indent:    -999em;
}*/
}

button:hover {
    opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
    padding: 14px 20px;
    background-color: #F04722;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
    padding: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #b3ecff;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 70%; 

    opacity: 0.9;
    filter: alpha(opacity=10); /* For IE8 and earlier */
/* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}
.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}

/* Clear floats */
.clearfix::after {
    content: "";
    clear: both;
    display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
</style>
<script type="text/javascript">
	function timeout()
	{
	   
       var minute=Math.floor(timeleft/60);
       var second=timeleft%60;
       var sec =checktime(second);
       if(timeleft<=0)
       {
       	clearTimeout(timeout);
       	document.getElementById("form1").submit();
       }
       else
       {
       	if(minute<10)
       	{
       		minute="0"+minute;
       	}
       	document.getElementById("time").innerHTML=minute+":"+sec;
       }
       timeleft--;
       var tm=setTimeout(function(){timeout()},1000);
	}
	function checktime(msg)
	{
       if(msg<10)
       {
       	msg="0"+msg;
       }
       return msg;
	}

</script>
<script type = "text/javascript" >

   function preventBack(){window.history.forward();}

    setTimeout("preventBack()", 0);

    window.onunload=function(){null};

</script>
<style>
h1 {
    text-align: left;
    text-decoration-color: #080B40;
}
</style>
<style>
h2 {
    text-align: right;
    text-decoration-color: #080B40;
}
</style>
<script>
setInterval( checkPageFocus, 200 );

function checkPageFocus() {
  var info = document.getElementById("message");
  
  if ( document.hasFocus() ) {
    
    
  } else {
 
  window.location.href = "disqualify.php";
  // header("Location: endpage.php");


  }
}


</script>
<body onload="timeout()">

<img src="images/icons/logo.png" style="width : 20% ; margin-left: 530px;"> 
    <form class="modal-content"  action="question.php" method="post" id="form1"> 
    <div class="container" id="message">
      <h1><?php echo "Q.No." ; ?>
      	<?php echo $qid ; ?>		
		<?php echo "<pre>".$question."<pre>"; ?></h1>
	  <h2><i style="font-size:50px" class="fa">&#xf017;</i><div id="time">timeout</div></h2>			

      <script type="text/javascript">
       	var timeleft=1*60;

      </script>
    <?php //echo $score;?>  
  <label class="container1" > <?php echo $option1; ?><br><br><br>
  <input type="radio"  name="gen" value="<?php echo $option1; ?>">
  <span class="checkmark"></span>
  </label>
    <label class="container1"> <?php echo $option2; ?><br><br><br>
  <input type="radio" name="gen" value="<?php echo $option2; ?>">
  <span class="checkmark"></span>
  </label>
    <label class="container1"> <?php echo $option3; ?><br><br><br>
  <input type="radio" name="gen" value="<?php echo $option3; ?>">
  <span class="checkmark"></span>
  </label>
    <label class="container1"> <?php echo $option4; ?><br><br><br>
  <input type="radio"  name="gen" value="<?php echo $option4; ?>">
  <span class="checkmark"></span>
  </label>
  
<button >SUBMIT</button> </a> 
       
<h1><a href="question.php"><button type="submit" onclick="question.php" name='NEXT'>NEXT</button> </a> 
       </h1>
<script type="text/javascript">
    var radioValue="";
    $(document).ready(function(){
        $("input[type='button']").click(function(){
            radioValue = $("input[name='gen']:checked").val();
            if(radioValue){
                alert("Your are a - " + radioValue);
            }
        });
    });
</script>


</form>
</div>
  
</div>  
   
</body>
</html>
<?php
 echo  "roit";   
$_SESSION['count']=$count+1;    
mysqli_close($con);

?>

<script>
setTimeout(myFunction, 2000000);
	
function myFunction() {
    document.getElementById("form1").submit();
}
</script>
