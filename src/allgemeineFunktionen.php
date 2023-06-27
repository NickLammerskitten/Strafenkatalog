<?php

function generateAlert($message) {
    $alert = "<script>alert('$message');</script>";
    return $alert;
}

?>