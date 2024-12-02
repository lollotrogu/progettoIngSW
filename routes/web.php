<?php
// Avvia la sessione
session_start();

// Ottieni l'URI richiesto
$requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// Carica i file richiesti
require_once 'models/UserModel.php';
require_once 'presenters/UserPresenter.php';

// Funzione per caricare una vista
function loadView($viewName, $data = [])
{
    extract($data); // Estrae i dati come variabili
    require "views/$viewName.php"; // Carica la vista
}

// Gestione delle rotte
switch ($requestUri) {
    case '':
    case 'login_register.php': // Pagina iniziale
        loadView('login_register');
        break;

   /* case 'login': // Pagina di login
        loadView('login');
        break;

    case 'register': // Pagina di registrazione
        loadView('register');
        break;

    case 'api/users/register': // API per registrazione
        $presenter = new UserPresenter(new UserModel());
        $presenter->register();
        break;

    case 'api/users/login': // API per login
        $presenter = new UserPresenter(new UserModel());
        $presenter->login();
        break;

    case 'logout': // Logout
        session_destroy();
        header('Location: /');
        break;*/

    default: // Rotta non trovata
        http_response_code(404);
        loadView('404', ['message' => 'Pagina non trovata']);
        break;
}
