<?php
/**
 * Ce script est composé de fonctions d'exploitation des données
 * détenues pas le SGBDR MySQL utilisées par la logique de l'application.
 *
 * PHP version 7
 *
 * @category  Database_Access_Function
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

/**
 *  Les fonctions dépendent d'une connection à la base de données,
 *  cette fonction est déportée dans un autre script.
 */
require_once 'connect-db.php';

/**
 * Obtenir la liste de tous les pays référencés d'un continent donné
 *
 * @param string $continent le nom d'un continent
 * 
 * @return array tableau d'objets (des pays)
 */
function getCountriesByContinent($continent)
{
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Continent = :cont;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':cont', $continent, PDO::PARAM_STR);
    $prep->execute();

    return $prep->fetchAll();
}

/**
 * Obtenir la liste des pays
 *
 * @return liste d'objets
 */
function getAllCountries()
{
    global $pdo;
    $query = 'SELECT * FROM Country;';
    return $pdo->query($query)->fetchAll();
}

/**
 * Obtenir la liste des continents
 *
 * @return array Liste des continents distincts
 */
function getContinents()
{
    global $pdo;
    $query = 'SELECT DISTINCT Continent FROM Country;';
    return $pdo->query($query)->fetchAll();
}

/**
 * Obtenir le nom de la capitale à partir de son ID.
 *
 * @param int $num L'ID de la capitale.
 * @return string Le nom de la capitale.
 */
function getCapitale($num) {
    global $pdo;
    $query = 'SELECT DISTINCT Name FROM City WHERE id = :num;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':num', $num, PDO::PARAM_INT);
    $prep->execute();

    $result = $prep->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        return $result['Name'];
    }
    else {
        return 'Inconnu';
    }
}

function getDetails($name)
{
    global $pdo;
    $query = 'SELECT * FROM Country WHERE Name = :nom;';
    $prep = $pdo->prepare($query);
    $prep->bindValue(':nom', $name, PDO::PARAM_INT);
    $prep->execute();
    $result = $prep->fetch();
    return $result;
}

