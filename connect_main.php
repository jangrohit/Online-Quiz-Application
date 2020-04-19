
<?php
session_start();

//optional part of random 
$qusetion_index= array("false", "false","false", "false","false", "false","false", "false","false","false","false", "false","false", "false","false", "false","false", "false","false","false","false", "false","false", "false","false", "false","false", "false","false","false");
$answer_index=array("","","","","","","","","","","","","","","","","","","","","","","","","","","","","","");
$_SESSION['qusetion']=$qusetion_index;
$_SESSION['answer']=$answer_index;


$_SESSION['index']='0';
$_SESSION['userid1']='0';
$_SESSION['count']='1';
$_SESSION['score']='0';
$_SESSION['count_question']='0';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz";
//echo "rohit";
$pass1=0;
$pass2=0;
if(isset($_POST['submit']))
{
//echo "rohit";
$_SESSION['rollno1']=$_POST['rollno1'];
$_SESSION['rollno2']=$_POST['rollno2']; 
$pass1_user=$_POST['pass1']; 
$pass2_user=$_POST['pass2'];
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

  
//echo $_SESSION['rollno1'];
//echo $_SESSION['rollno2'];
$sql1 = "SELECT * from sign1 where user_name='$_SESSION[rollno1]'";
$result = mysqli_query($conn,$sql1);
if($result->num_rows>0) {
	while($row=$result->fetch_assoc())
    {
    //echo $row['password'];
    $pass1=$row['password'];
    }
}
$sql2 = "SELECT * from sign1 where user_name='$_SESSION[rollno2]'";
$result = mysqli_query($conn,$sql2);
if($result->num_rows>0) {
	while($row=$result->fetch_assoc())
    {
    //echo $row['password'];
    $pass2=$row['password'];
    }
}

//echo $pass2_user;
if(metaphone($pass1)==metaphone($pass1_user) and metaphone($pass2)==metaphone($pass2_user))
{
	//echo " login is succes ";
	
$sql4="SELECT * from signup where rollno1='$_SESSION[rollno1]' and rollno2 ='$_SESSION[rollno2]'";  
$result = mysqli_query($conn,$sql4);
if($result->num_rows>0)   
{   $row=$result->fetch_assoc();
    //echo "rohi777";
    $_SESSION['userid1'] =$row['id'];
    //echo $_SESSION['userid1'];
    $_SESSION['count']=$row['count_last_ques'];
    $last_ques=$row['count_last_ques'];
    $qualify=$row['qualify'];
    //echo $qualify;
    if($qualify==1)
    {
    
    //echo "rohit";
    if($last_ques!=30 ){
    header("Location: question.php");
    }
    else
    {
        //echo "rohit";
        header("Location:endpage.php");
    }
    }
    else
    {
      header("Location: disqualify.php");   
    }
}
else
{

$sql = "INSERT INTO signup (rollno1, rollno2) VALUES ('$_SESSION[rollno1]','$_SESSION[rollno2]' )";
     
if ($conn->query($sql) === TRUE) {
    
$sql1 = "SELECT * from signup where rollno1='$_SESSION[rollno1]' and rollno2 ='$_SESSION[rollno2]'";
$result = mysqli_query($conn,$sql1);
if($result->num_rows>0) {
	while($row=$result->fetch_assoc())
    {
    
    $_SESSION['userid1'] =$row['id'];

    }
}
   // echo "New record created successfully";
    
   header("Location: question.php");
}
 else {
	header("Location: index.php");
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
}
else
{   $message = "Please enter correct Roll No and password .\\nTry again.";
  echo "<script>alert('$message');window.location.href='index.php'</script>";
    
	
}

$conn->close();

}
?>


