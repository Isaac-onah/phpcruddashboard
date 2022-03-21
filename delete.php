<?php




if(isset($_GET['id']))
{
     $id = $_GET['id'];
    $db = mysqli_connect('localhost', 'root', '', 'imoh');
    $query = "DELETE FROM accounts WHERE id=".$id;
    $result = mysqli_query($db, $query);
    header("location:index.php");
}

?>