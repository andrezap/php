<?php

$nameErr = '';
$emailErr = '';
$success = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if(empty($_POST['name'])) {
        $nameErr = 'Name is required';
    }

    if(empty($_POST['email'])) {
        $emailErr = 'Email is required';
    }

    if(empty($nameErr) && empty($emailErr)) {
        $success = true;
    }
}