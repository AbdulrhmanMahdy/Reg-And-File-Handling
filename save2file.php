<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $data = "{$firstname}:{$lastname}:{$username}:{$email}\n";
}
if ($firstname and $lastname and $username and $email) {
    $fileHandle = fopen("customer.txt", "a");
    if ($fileHandle) {
        fwrite($fileHandle, $data);
        fclose($fileHandle);
    }
    header("Location: makeTable.php");
} else {
    $errors = [];
    $old = [];
    foreach ($_POST as $key => $value) {
        if (! $value) {
            $errors[$key] = " * Must  Enter {$key}";
        } else {
            $old[$key] = $value;
        }
    }

    $errors = json_encode($errors);
    $url  = "Location: register.php?errors={$errors}";

    if (count($old)) {
        $old = json_encode($old);
        $url  = "{$url}&old={$old}";
    }
    header($url);
}