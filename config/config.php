<?php
/**
 * Configuration générale de l'application
 */

// Démarrer la session si pas déjà démarrée
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fuseau horaire
date_default_timezone_set('Africa/Casablanca');

// Configuration du site
define('SITE_NAME', 'Bibliothèque ENSAM Meknès');
define('SITE_URL', 'http://localhost/bibliotheque');

// Chemins
define('ROOT_PATH', dirname(__DIR__));
define('ASSETS_PATH', SITE_URL . '/assets');

// Règles métier
define('DUREE_EMPRUNT', 15);        // Durée d'emprunt en jours
define('LIMITE_EMPRUNTS', 2);       // Nombre maximum d'emprunts par étudiant

// Mode debug (mettre à FALSE en production)
// Lire la configuration depuis la variable d'environnement APP_DEBUG si présente,
// sinon garder le comportement par défaut (true).
$envDebug = getenv('APP_DEBUG');
define('DEBUG_MODE', $envDebug !== false ? filter_var($envDebug, FILTER_VALIDATE_BOOLEAN) : true);

if (DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

// Inclure les fonctions utilitaires
require_once ROOT_PATH . '/utils/functions.php';
?>