<?php
ob_start();

?>

<section class="errorPage">
    <h2>Erreur</h2>
    <h3>La page est manquante ou n'existe plus.</h3>
</section>
<?php
$contentView = ob_get_clean();
require 'vues/common/layout.php';
?>