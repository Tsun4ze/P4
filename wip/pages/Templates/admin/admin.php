<?php
ob_start();


require 'lib/autoload.php';


?>

<section style="height: 896px; margin: auto;">
	<h3>Panel d'administration :</h3>
	<br />


	<a class="panelRedir" href="index.php?action=gestComs">Gestion Commentaires</a>
	<a class="panelRedir" href="index.php?action=addNews">Ajouter une nouvelle</a>
	
	<a class="panelRedir" href="index.php?action=listNews">Liste des news</a>

	<a class="panelRedir" href="index.php?action=comSignal">Commentaires signalés</a>
	
	<br />

</section>

<?php
$contentView = ob_get_clean();
require 'pages/Templates/common/layout.php';

?>