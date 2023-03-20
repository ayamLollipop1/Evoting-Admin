<?php 
function redirect($url, $message) {
    $_SESSION['message'] = $message;
     header('location: '.$url);
     exit();
}

function redirects($url, $warning) {
    $_SESSION['warning'] = $warning;
    header('location: '.$url);
    exit();
}

function message($msg) {
    $_SESSION['warning'] = $msg;
    exit();
}
?>