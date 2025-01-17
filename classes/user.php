<?php
class User {
    protected $pdo;
    private $id_user;
    private $email;
    private $password;
    private $role;

    public function __construct($pdo, $email = null, $password = null) {
        $this->pdo = $pdo;
        $this->email = $email;
        $this->password = $password;
    }

    public function login() {
        try {
            $stmt = $this->pdo->prepare("SELECT id_user, password, role FROM users WHERE email = ?");
            $stmt->execute([$this->email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user || !password_verify($this->password, $user['password'])) {
                throw new Exception("Invalid email or password");
            }

            $this->id_user = $user['id_user'];
            $this->role = $user['role'];
            
            session_start();
            $_SESSION["user_id"] = $this->id_user;
            $_SESSION["role"] = $this->role;
            $_SESSION["email"] = $this->email;
            
            header('Location: ../clientVue/home.php');
            exit;
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // Getters and Setters
    public function getIdUser() {
        return $this->id_user;
    }

    public function setIdUser($id_user) {
        $this->id_user = $id_user;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}

