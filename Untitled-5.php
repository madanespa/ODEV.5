<?php
if ($_SERVER[ "REQUEST_METHOD"] === "POST") {
$full_name = $_POST ["full name"];
$email = $_POST ["email" ];
$gender = $_POST[ "gender"];

if (empty ($full_name)) {
$errors[] = "Full Name is required.";
}

if (empty($email)) {
$errors[] = "Email Address is required.";
} elseif (!filter_var($email,
FILTER_VALIDATE_EMAIL)) {
$errors [] = "Invalid Email Address.";
}

if (empty ($errors)) {

$host = "localhost";
$username = "your username";
$password = "your password";
$database = "your database";

$conn = new mysqli ($host, $username,
$password, $database);
if (Sconn->connect_error) {
die ("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO registers
(full_name, email, gender) VALUES ('$full_name' , '$email',
'$gender')";
if ($conn->query($sql) === TRUE) {
$success_message = "Studentregistered successfully.";
} else {
$errors[]= "Error: " . $sql . "
<br>" . $conn->error;
}
$sq1 = "SELECT * FROM register";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
echo "<ul>";
while ($row = $result->fetch_assoc ()) {
echo "<li>Name: ". $row["full_name"] . "| Email:" . $row ["email" ] . "| Gender:" . $row ["gender"] . "</li>";
}
echo "</ul>";
} else {
echo "No students registered yet.";
}
$conn->close ();
}
}
?>