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
            <div id="alert" class="alert alert-<?= $_SESSION['flash']['type']; ?> alert-dismissible fade show" role="alert">
                
                <?= $_SESSION['flash']['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="hideAlert()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            unset($_SESSION['flash']);
        }
    }
}