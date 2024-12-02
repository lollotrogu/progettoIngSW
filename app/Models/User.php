<?php

class User
{
    private $usersFile = 'data/users.txt'; // File che simula il database

    public function saveUser($username, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        file_put_contents($this->usersFile, "$username:$hashedPassword\n", FILE_APPEND);
    }

    public function getUser($username)
    {
        if (!file_exists($this->usersFile)) {
            return null;
        }

        $users = file($this->usersFile, FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            [$storedUsername, $storedPassword] = explode(':', $user);
            if ($storedUsername === $username) {
                return $storedPassword;
            }
        }

        return null;
    }
}
