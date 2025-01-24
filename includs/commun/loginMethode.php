<?php
session_start();  
require_once '../../classes/conn.php';
require_once '../../classes/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Email and password are required!";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if ($user['activated'] == 0) {
                echo "Account is not activated. Please contact administrator.";
                exit;
            }

            if (password_verify($password, $user['password'])) {
                $userr = new User($conn);
                $userr->setIdUser($user['id_user']);
                $userr->setRole($user['id_role']);
                $userr->setSession();

                if ($user['id_role'] == 1) {
                    header("Location: ../../testBoy.php");
                    exit();  
                } elseif ($user['id_role'] == 2) {
                    header("Location: ../../view/teacher/myCourses.php");
                    exit();  
                } elseif ($user['id_role'] == 3) {
                    header("Location: ../../view/user/index.php");
                    exit(); 
                }
            } else {
                echo "Invalid password!";
                exit;
            }
        } else {
            echo "No account found with this email!";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}