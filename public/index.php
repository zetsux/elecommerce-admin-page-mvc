<?php 
    if (!session_id()) session_start();

    // Bootstrapping Technique (Calling 1 file to initialize everything in MVC)
    require_once '../app/init.php';

    $app = new App();
?>