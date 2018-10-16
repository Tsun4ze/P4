<?php
ob_start();

?>

<section style="margin: auto;" class="panelAdm">
	<h3 class="admTitle">Panel d'administration :</h3>
	<br />

	<div class="row">
		<a class="panelRedir" href="index.php?action=gestComs"><i class="fas fa-quote-right"></i> Gestion Commentaires</a>
		<a class="panelRedir" href="index.php?action=addNews"><i class="fas fa-pencil-alt"></i> Ajouter une nouvelle</a>
		
		<a class="panelRedir" href="index.php?action=listNews"><i class="fas fa-list"></i> Liste des news</a>
		
		<a class="panelRedir" href="index.php?action=comSignal"><i class="fas fa-file-excel"></i> Commentaires signalés</a>
	</div>
	<br />

</section>

<?php
$contentView = ob_get_clean();
require 'vues/common/layout.php';

?>