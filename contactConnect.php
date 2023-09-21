<?php

$contactName = filter_input(INPUT_POST,'contactName');
$contactEmail = filter_input(INPUT_POST,'contactEmail');
$contactNumber = filter_input(INPUT_POST,'contactNumber');
$comments = filter_input(INPUT_POST,'comments');

if (!empty($contactName)){
if (!empty($contactEmail)){

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

$sql = "INSERT INTO contact (contactName, contactEmail, contactNumber,comments)
values ('$contactName','$contactEmail','$contactNumber', '$comments')";
if ($conn->query($sql))
{
header("Location: http://localhost/Online_Movie_ticket_Final/Notify.html", true, 301);
echo "Contact details sent sucessfully. We will be in touch with you shortly";

}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "contact Name should not be empty";
die();
}
}
else{
echo "contact Email should not be empty";
die();
}
?>


