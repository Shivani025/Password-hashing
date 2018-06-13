
<html>
<head>
    <title></title>
</head>
<body>
    <!--form to input data
        name and password 
        submit button is to submit the data into database-->

     <h3>Enter the information</h3>    

    <form method="post" action="pdo"> 
    Name: <input type="text" name="name">
  
    <br><br>
    Password: <input type="password" name="password">

    <br><br>
    <input type="submit" name="submit" value="Submit">  
    </form>


<?php
 
/**
* connection is made through new PDO(...) to pdo(name of database in this case) 
*
* If form request is submit data is inserted with the help of insert option:
*    INSERT INTO display(display is the table name in our database)
* 
* Information is fetched from database using:
*    SELECT * FROM display(table name) 
*
* Entered plain text (password) is converted into cipher(hashed) using password_hash()
*
*/


// Error reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

    $conn = new PDO("mysql:host=localhost; dbname=pdo", "root", "");   //connecting to database        
    
    // set the PDO error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'connected to database<br>';
    
    //  Inserting into database
    if (isset($_POST['submit']))
    {
        $name =$_POST['name'];
        $password =$_POST['password'];
          if(empty($name)|| empty($password)){
          echo "<font color='red'>Both Name and Password are required.</font><br/>";
         }
    else{
        $sql= "INSERT INTO display(name, password) VALUES ('".$name."','".$password."')";
        $conn->exec($sql);
        echo "Data is Inserted";
        }
    }


    //Fetching information from database
    $sql2 = "SELECT * FROM display order by id asc";
    $result2 = $conn->query($sql2); ?>

    <table>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Password</th>
        </tr>
    
        <?php while($row1 = $result2->fetch(PDO::FETCH_ASSOC)) {?> 
        <tr><td> <?php echo $row1['id'] ?></td>
            <td> <?php echo $row1['name'] ?></td>
            <td> <?php echo password_hash($row1['password'] ,PASSWORD_DEFAULT)?> </td>         <!-- coverting plain text into cipher -->
            </td>
        </tr>
      <?php } ?>
    </table>

<?php 

$conn = null;     //closing connection
?> 
 
</body>
</html>



















 