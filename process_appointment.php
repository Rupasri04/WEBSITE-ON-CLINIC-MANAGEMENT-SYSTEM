<?php
$db = new mysqli('localhost', 'root', '', 'appointment'); // Fix the connection string

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

echo "Connection successful";


// Get the form data
$name = $_POST['name'];
$email = $_POST['mail'];
$contact_num = $_POST['tel'];
$skype_name = $_POST['skype_name'];
$appointment_for = $_POST['appointment_for'];
$appointment_description = $_POST['appointment_description'];
$date = $_POST['date'];
$time = $_POST['time'];

// Insert the patient's data into the database
$sql = "INSERT INTO appoint(name, email, contact_num, skype_name, appointment_for, appointment_description, date, time) VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; // Change :name to placeholders (?)
$stmt = $db->prepare($sql);

// Use bind_param to bind the parameters
$stmt->bind_param('ssssssss', $name, $email, $contact_num, $skype_name, $appointment_for, $appointment_description, $date, $time);
$stmt->execute();

// Display a success message to the user
echo "Appointment booked successfully!";
 

// Close the database connection
$stmt->close();
$db->close();
?>
