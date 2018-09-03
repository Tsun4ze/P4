<?php
require('config.php');
require('header.php');

if(isset($_SESSION['id']))
{
	header('Location: admin.php');
	exit();
}

if(isset($_POST['admLog']))
{
	
	/*var_dump($hashed_pass);
	var_dump($rowAdm['password']);*/
	
	if((isset($_POST['userLog'])) && (isset($_POST['passLog'])) && (!empty($_POST['userLog'])) && (!empty($_POST['passLog'])))
	{
		
		$hashed_pass = password_hash($_POST['passLog'], PASSWORD_DEFAULT);
		


		$dataAdm = $db->prepare('SELECT * FROM admin WHERE username = :username');
		$dataAdm->execute(array(
			'username' => $_POST['userLog']
		));
		$rowAdm = $dataAdm->fetch();


		if(password_verify($_POST['passLog'], $rowAdm['password']))
		{
			$_SESSION['pseudo'] = $_POST['userLog'];
			$_SESSION['id']= $rowAdm['id'];

			header('Location: admin.php');
			exit();
		}		
	}
	else
	{
		$errorLog = 'Error: one or more fields are empty.';
	}
}


?>

<section>
	<div style="text-align:center;">
		<h2>Login :</h2>
		<form method="post" action="login.php" style="text-align:left;">
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
require('footer.php');
?>

