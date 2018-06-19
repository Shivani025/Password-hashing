<html>
<head>
    <title>Password hashing</title>
</head>
<body>
    <!--form to input data-->

     <h3>Enter the information</h3>    

    <form method="POST" action="md5"> 
    Name: <input type="text" name="name">
  
    <br><br>
    Password: <input type="password" name="password">

    <br><br>
    <button type="submit">Submit</button>   
    </form>
 
<?php
$name=$password="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
     if ((empty($_POST["name"])) || (empty($_POST["password"])))
     {
        echo "Both name and password are required <br>";
     }
     else{
     $name=$_POST["name"];
     $password=$_POST["password"]; 
     echo "INPUT DATA:<br>";
     echo "Name: " .$name. "<br>";
     
     echo "Password(md5) :";                                //Password encoded using md5            
     echo md5($password);                                
     
     echo "<br> Password(sha1) :";                         //Password encoded using sha1   
     echo sha1($password);                               
     }
}
?>
</body>
</html>