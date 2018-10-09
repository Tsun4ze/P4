<?php

class Session 
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
    }

    public function setFlash($message, $type = 'error')
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }

    public function flash()
    {
        if(isset($_SESSION['flash']))
        {
            ?>
            <div id="alert" class="alert alert-<?= $_SESSION['flash']['type']; ?>">
                <a class="close">x</a>
                <?= $_SESSION['flash']['message']; ?>
            </div>
            <?php
            unset($_SESSION['flash']);
        }
    }
}