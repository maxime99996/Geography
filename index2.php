<?php
/**
 * Home Page
 *
 * PHP version 7
 *
 * @category  Page
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<?php  require_once 'header.php'; ?>

<?php
// Inclusion du fichier de gestion de la base de données
require_once 'inc/manager-db.php';

// Vérification de la variable GET pour savoir quel continent afficher
if (isset($_GET['name']) && !empty($_GET['name']) ){
    $continent = $_GET['name'];
    $desPays = getCountriesByContinent($continent);  // Récupère les pays du continent choisi
} else {
    $continent = "Monde";
    $desPays = getAllCountries();  // Récupère tous les pays (si aucun continent choisi)
}
?>

<main role="main" class="flex-shrink-0">
  <div class="container">
    <h1>Les pays en <?= $continent; ?></h1>
    <div>
      <table class="table">
         <tr>
           <th>Nom</th>
           <th>Population</th>
           <th>Continent</th>
           <th>Capitale</th>
         </tr>
       <?php
          // Parcours des pays pour afficher les informations
          foreach ($desPays as $pays) {
       ?>
          <tr>
            <td> <?php echo $pays->Name ?></td>
            <td> <?php echo $pays->Population ?></td>
            <td> <?php echo $pays->Continent ?></td>
            <td> <?php echo getCapital($pays->Capitale) ?></td>  <!-- Affichage de la capitale -->
          </tr>
        <?php } ?>
     </table>
    </div>

    <!-- Affichage du débogage pour mieux comprendre la structure des données -->
    <p>
    <code>
      <?php
        var_dump($desPays);  // Affiche la structure des données pour le débogage
      ?>
    </code>
    </p>
  </div>
</main>

<?php
// Inclusion des scripts JavaScript et du footer
require_once 'javascripts.php';
require_once 'footer.php';
?>
