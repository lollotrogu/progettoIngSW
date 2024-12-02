<?php

class UserModel
{
    private $pdo;

    public function __construct($dsn, $nome, $password)
    {
        try {
            $this->pdo = new PDO($dsn, $nome, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Errore di connessione al database: " . $e->getMessage());
        }
    }

    /**
     * Crea la tabella utenti se non esiste.
     */
    /*public function createTable()
    {
        $query = "
            CREATE TABLE IF NOT EXISTS utenti (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(255) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;
        ";

        $this->pdo->exec($query);
    }*/

    /**
     * Salva un nuovo utente nel database.
     */
    public function saveUser($nome, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO utenti (nome, password) VALUES (:nome, :password)";
        $stmt = $this->pdo->prepare($query);

        try {
            $stmt->execute([
                ':nome' => $nome,
                ':password' => $hashedPassword
            ]);
        } catch (PDOException $e) {
            die("Errore durante l'inserimento dell'utente: " . $e->getMessage());
        }
    }

    /**
     * Recupera un utente dal database per nome.
     */
    public function getUser($nome)
    {
        $query = "SELECT * FROM utenti WHERE nome = :nome";
        $stmt = $this->pdo->prepare($query);

        $stmt->execute([':nome' => $nome]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return $user ? $user['password'] : null;
    }

    /**
     * Ottieni tutti gli utenti dal database.
     */
    public function getAllUsers()
    {
        $query = "SELECT * FROM utenti";
        $stmt = $this->pdo->query($query);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
