<?php
ob_start();

require 'lib/autoload.php';

$db = Database::dbconnect();
$adminManager = new AdminManager($db);


if(isset($_POST['admLog']))
{
	
	if((isset($_POST['userLog'])) && (isset($_POST['passLog'])) && (!empty($_POST['userLog'])) && (!empty($_POST['passLog'])))
	{
		$adminManager->checkLogin($_POST['userLog'], $_POST['passLog']);
		$_SESSION['Adm'] = $_POST['userLog'];
		header('Location: index.php?action=signup');
		exit();
	}
	else
	{
		$errorLog = 'Error: one or more fields are empty.';
	}
}


?>

<section class="simpleSection">
	<div style="text-align:center;">
		<h2>Login :</h2>
		<form method="post" action="index.php?action=signup" style="text-align:left; margin-left: 45%;">
			<p>
				<label for="mailLog">Pseudo : </label><br />
				<input type="text" name="userLog" id="mailLog" /><br />

				<label for="passLog">Password : </label><br />
				<input type="password" name="passLog" id="passLog" /><br /><br />

				<input type="submit" name="admLog" value="Connect" />
			</p>
		</form>
		<?php if(isset($errorLog)){ echo '<br /><h3>'.$errorLog.'</h3>';} ?>
	</div>
</section>

<?php
$contentView = ob_get_clean();
require 'pages/Templates/common/layout.php';
?>

