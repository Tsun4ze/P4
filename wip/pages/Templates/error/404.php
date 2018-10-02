<?php
ob_start();

?>

<h2>Erreur</h2>
<h3>La page est manquante ou n'existe plus.</h3>

<?php
$contentView = ob_get_clean();
require 'pages/Templates/common/layout.php';
?>