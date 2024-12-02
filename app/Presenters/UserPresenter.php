<?php

class UserPresenter
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($username && $password) {
                $this->userModel->saveUser($username, $password);
                echo json_encode(['success' => true, 'message' => 'Registrazione avvenuta con successo']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Dati mancanti']);
            }
        }
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $storedPassword = $this->userModel->getUser($username);

            if ($storedPassword && password_verify($password, $storedPassword)) {
                $_SESSION['user'] = $username;
                echo json_encode(['success' => true, 'message' => 'Login avvenuto con successo']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Credenziali errate']);
            }
        }
    }
}
