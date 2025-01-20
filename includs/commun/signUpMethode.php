<?php
require_once '../../classes/conn.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    if (empty($name) || empty($email) || empty($role) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required!";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "Passwords do not match!";
        exit;
    }

    // Check if the email already exists
    try {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE user_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $emailExists = $stmt->fetchColumn();

        if ($emailExists) {
            echo "This email is already registered!";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Determine the activation status based on the role
            if ($role == 1) {  // Assuming 1 is for inactive users
                $activated = 0;
            } else {
                $activated = 1; // Active for other roles
            }

            // Insert the data
            $stmt = $conn->prepare("INSERT INTO users (user_name, user_email, id_role, password, activated) VALUES (:name, :email, :role, :password, :activated)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->bindParam(':activated', $activated);
            $stmt->execute();

            echo "Signup successful!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
