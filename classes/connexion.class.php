<?php

class Connexion
{
    // variables statiques
    private static $connexion;

    // Pas de constructeur explicite

    // fonction de connexion à la BDD
    private static function connect(string $user, string $password)
    {
        // Récupérer les paramètres de la BDD avec les sections
        $tParam = parse_ini_file("../param/param.ini", true);

        // Crée dynamiquement les variables équivalentes 
        // aux clés de tParam pour la section "BDD"
        extract($tParam["BDD"]);

        $dsn = "mysql:host=" . $hote
            . "; port=" . $port
            . "; dbname=" . $dbname . "; charset=utf8";

        try {
            $mysqlPDO = new PDO(
                $dsn,
                $user,
                $password,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
            );
        } catch (Exception $e) {
            // en cas erreur on affiche un message et on arrete tout
            die('<h1>Erreur de connexion : </h1>' . $e->getMessage());
        }

        Connexion::$connexion = $mysqlPDO;

        return Connexion::$connexion;
    }

    // fonction de 'déconnexion' de la BDD
    public static function disconnect()
    {
        Connexion::$connexion = null;
    }

    // Pattern singleton
    public static function getConnexion(string $user, string $password)
    {
        if (Connexion::$connexion != null) {
            return Connexion::$connexion;
        } else {
            return Connexion::connect($user, $password);
        }
    }
}
