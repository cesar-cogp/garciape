<?php
    session_start();
    session_unset();
    session_destroy();

    header('Location: /garciape/Parcial3/LoginBD');
?>