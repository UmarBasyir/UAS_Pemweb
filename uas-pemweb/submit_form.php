<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $interest = $_POST['interest'];

    $new_entry = array(
        'name' => $name,
        'email' => $email,
        'date' => $date,
        'gender' => $gender,
        'interest' => $interest
    );

    if (!isset($_SESSION['entries'])) {
        $_SESSION['entries'] = array();
    }

    $_SESSION['entries'][] = $new_entry;

    header("Location: tabel.html");
    exit();
}
?>