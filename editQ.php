<?php
// including the database connection file
require_once("hhh3login.php");
 $conn = new mysqli($hn, $un, $pw, $db);
  if ($conn->connect_error) die($conn->connect_error);
if(isset($_POST['update']))
{    
    $productId = $_POST['productId'];
    
    $stockId=$_POST['stockId'];
    $quantity=$_POST['quantity'];
      
    
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE productStock SET stockId='$stockId',quantity='$quantity' WHERE productId=$productId");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: manageQuantity.php");
    }
}
?>
<?php
//getting id from url
$productId = $_GET['productId'];
 
//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM productStock WHERE productId=$productId");
 
while($res = mysqli_fetch_object($result))
{
    $name = $res['name'];
    $age = $res['age'];
    $email = $res['email'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="manageQuantity.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="editQ.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="productId" value="<?php echo $productId;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="stockId" value="<?php echo $stockId;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="quantity" value="<?php echo $quantity;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>