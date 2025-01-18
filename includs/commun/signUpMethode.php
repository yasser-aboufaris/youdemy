<?php
include '../../classes/conn.php';
include '../../classes/client.php';
require 'Connection.php'; 

$conn = new Connection();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

if ($password !== $confirmPassword) {
    echo "Passwords do not match!";
    exit;
}

$qry = "SELECT * FROM users WHERE email = :email";
$checkStmt = $conn->prepare($qry);
$checkStmt->bindParam(':email', $email);
$checkStmt->execute();

if ($checkStmt->rowCount() > 0) {
    echo "Email already exists!";
    exit;
}


$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$qry = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
$stmt = $conn->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $hashedPassword);

if ($stmt->execute()) {
    echo "User signed up successfully!";
} else {
    echo "Failed to sign up.";
}
