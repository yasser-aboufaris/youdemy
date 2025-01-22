<?php
require_once '../../classes/conn.php';
require_once '../../classes/user.php';
session_start();  

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
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $user = new User($conn);
                $user->setIdUser($user['id_user']);
                $user->setRole($user['id_role']);
                $user->setSession();
                echo "Login successful!";
        
                if ($user['id_role'] == 1) {
                    header("Location: ../../view/admine/categoriesDashboard.php");
                } elseif ($user['id_role'] == 2) {
                    header("Location: ../../view/admine/categoriesDashboard.php");
                } elseif ($user['id_role'] == 3) {
                    header("Location: ../../view/admine/categoriesDashboard.php");
                }

                exit;
            } else {
                echo "Invalid password!";
            }
        } else {
            echo "No account found with this email!";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
