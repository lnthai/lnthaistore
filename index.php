<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'bridge.php';
$app = new App();
