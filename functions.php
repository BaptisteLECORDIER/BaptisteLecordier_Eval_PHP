<?php

// Paramètres de connexion à la base de données (à adapter en fonction de votre environnement);

define('HOST', 'localhost');
define('USER', 'root');
define('DBNAME', 'links_manager_dev');
define('PASSWORD', ''); // windows (Mamp le mot de passe c'est 'root')

/**
 * Fonction de connexion à la base de données
 *
 * @return \PDO
 */
function db_connect(): PDO
{
    try {
        /**
         * Data Source Name : chaine de connexion à la base de données
         * Elle permet de renseigner le domaine du serveur de la base de données, le nom de la base de données cible et l'encodage de données pendant leur transport
         * @var string
         */
        $dsn =  'mysql:host=' . HOST . ';dbname=' . DBNAME . ';charset=utf8';

        return new PDO($dsn, USER, PASSWORD, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    } catch (\PDOException $ex) {
        echo sprintf('La demande de connexion à la base de donnée a échouée avec le message %s', $ex->getMessage());
        exit(0);
    }
}


/**
 * Fonction qui permet de récupérer le tableau des enregistrements de la table des liens
 * @return array
 */


function get_all_link () {
    $conn = new mysqli("localhost", "root", "", "links_manager_dev");
    $result = $conn->query("SELECT * FROM `links`");
    $resultTab = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($resultTab, $row) ;
        }
    } 
    return $resultTab;
}

/**
 * Fonction qui permet de récupérer un enregistrement à partir de son identifiant dans la table des liens
 * @param integer $link_id
 * @return array
 */
function get_link_by_id($link_id)
{
    // TODO implement function
}


/**
 * Fonction qui permet de modifier un enregistrement dans la table des liens
 * @param array $data: ['link_id' => 1, 'title' => 'MDN', 'url' => 'https://developer.mozilla.org/fr/']
 * @return bool
 */
function update_link($data)
{
    $conn = new mysqli("localhost", "root", "", "links_manager_dev");
    $conn->query("UPDATE links SET link_id = ".$_GET['id'].", title = '".$_GET['title']."', url = '".$_GET['url']."' WHERE link_id = ".$_GET['id']."");
}


/**
 * Fonction qui permet de d'enregistrer un nouveau lien dans la table des liens
 * @param array $data: ['title' => 'MDN', 'url' => 'https://developer.mozilla.org/fr/']
 * @return bool
 */

// 'use links_manager_dev;SELECT link_id FROM links ORDER BY link_id DESC LIMIT 1;'

function get_last_id () {
    $conn = new mysqli("localhost", "root", "", "links_manager_dev");
    $result = $conn->query("SELECT link_id FROM `links` ORDER BY link_id DESC LIMIT 1;");
    $resultTab = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($resultTab, $row) ;
        }
    } 
    return $resultTab[0]['link_id'];

}

function create_link ($title,$link) {
    $conn = new mysqli("localhost", "root", "", "links_manager_dev");
    $conn->query("INSERT INTO links (link_id, title, url) VALUES (".(get_last_id ()+1).",'".$title."','".$link."')");
}

/**
 * Fonction qui permet de supprimer l'enregistrement dont l'identifiant est $linl_id dans la table des liens
 *@param integer $link_id
 * @return bool
 */
function delete_link()
{
    $conn = new mysqli("localhost", "root", "", "links_manager_dev");
    $conn->query("DELETE FROM links WHERE link_id = ".$_GET['id'].";");
}
