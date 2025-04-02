<?php
/**
 * Déclaration d'inclusion de code js
 *
 * PHP version 7
 *
 * @category  Include_JS
 * @package   Application
 * @author    SIO-SLAM <sio@ldv-melun.org>
 * @copyright 2019-2021 SIO-SLAM
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @link      https://github.com/sio-melun/geoworld
 */

?>
<script src="assets/library/jquery-3.4.1.js"> </script>
<script src="assets/bootstrap-4.4.1-dist/js/bootstrap.js"> </script>

<script src="https://cdn.jsdelivr.net/npm/maphilight@1.4.2/jquery.maphilight.min.js"></script>
<script type="text/javascript">
$(function() {
    $('.map').maphilight({fade: false});
    1
});
$("#projmap area").click( function () {
    var pays = $(this).attr('title');
    var lien = "detailsPays.php?name="+pays;
    alert(lien)
    $(this).attr("href",lien);
    });
</script>
