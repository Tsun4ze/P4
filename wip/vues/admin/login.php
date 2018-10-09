<?php
ob_start();

?>

<section class="simpleSection">
	<div style="text-align:center;">
	
		<h2 class="admTitle">Login :</h2>
		<form method="post" action="index.php?action=signup" style="text-align:left; margin-left: 45%;">
			<p>
				<label for="mailLog">Pseudo : </label><br />
				<input type="text" name="userLog" id="mailLog" /><br />

				<label for="passLog">Password : </label><br />
				<input type="password" name="passLog" id="passLog" /><br /><br />

				<input type="submit" name="admLog" value="Connect" class="btnAdd" />
			</p>
		</form>
	</div>
</section>

<?php
$contentView = ob_get_clean();
require 'vues/common/layout.php';
?>

