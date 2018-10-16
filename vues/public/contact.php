<?php
ob_start();
?>

<section class="contact">
    <h2 style="text-decoration:underline; text-align:center;">Contact :</h2>
    <br />
    <br />
    <div class="row" style="margin:auto;">

        <div class="email" style="margin:auto;">
            <a href="#"><img src="public/img/gmail.png" alt="Mail Google"></a>
        </div>

        <div class="facebook" style="margin:auto;">
            <a href="#"><img src="public/img/fb.png" alt="Logo Facebook"></a>
        </div>

        <div class="twitter" style="margin:auto;">
            <a href="#"><img src="public/img/twitter.png" alt="Logo Twitter"></a>
        </div>
    </div>
</section>

<?php
$contentView = ob_get_clean();
require 'vues/common/layout.php';
?>