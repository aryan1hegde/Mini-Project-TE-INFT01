<?php
// Connect to MySQL
$conn = mysqli_connect('localhost', 'root', '', 'new');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Escape user inputs for security
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

// Attempt to insert the data into the table
$sql = "INSERT INTO contact_us(name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";

if (mysqli_query($conn, $sql)) {
  // Success message
  echo "Your message has been sent successfully.";
  header("Location: contact us.html");
exit();
} else {
  // Error message
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>