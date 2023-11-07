<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "task_manager";

$conn = new mysqli($server_name, $username, $password, $database_name); 

if(!$conn)
{
    die("Connection Failed: " . mysqli_connect_error());
} 

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $message = $_POST['message'];

    $sql_query = "INSERT INTO westeserve_clients(name, email, phone, state, city, message)
    VALUES('$name', '$email', '$phone', '$state', '$city', '$message')";

    if (mysqli_query($conn, $sql_query))
    {
        echo "Data successfully inserted";
    }
    else
    {
        echo "Error: " . $sql_query . "" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>