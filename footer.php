		<footer class="footer">
			<div class="row" style="margin: auto;">
				<h4 style="margin-left: 5px;"><a href="login.php">Administration</a></h4>
				<?php
					if(isset($_SESSION['id']))
					{
						echo '<h4 style="margin-left:auto; margin-right:5px;"><a href="disconnect.php">Logout</a></h4>';
					}
				?>
			</div>
			
		</footer>
	</body>

</html>