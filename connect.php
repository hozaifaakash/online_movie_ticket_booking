<?php

$cardnumber = filter_input(INPUT_POST,'cardnumber');
$cardholder = filter_input(INPUT_POST,'cardholder');
$ccv = filter_input(INPUT_POST,'ccv');

if (!empty($cardnumber)){
if (!empty($cardholder)){

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "test";
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO payment (cardnumber, cardholder, ccv)
values ('$cardnumber','$cardholder','$ccv')";
if ($conn->query($sql))
{
    header("Location: http://localhost/Online_Movie_ticket_Final/Notify2.html", true, 301);
}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "cardholder should not be empty";
die();
}
}
else{
echo "cardnumber should not be empty";
die();
}
?>


