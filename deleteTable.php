<?php
require("utils.php");

if (isset($_GET['index'])) {
    $index = (int)$_GET['index'];

    $filePath = "customer.txt";
    $arr = readData($filePath);
    if (isset($arr[$index])) {
        unset($arr[$index]);
    }
    $fileHandle = fopen("customer.txt", "w");
    print_r($arr);
    foreach ($arr as $line) {
        foreach ($line as $count => $element) {
            fwrite($fileHandle, $element);
            if ($count < count($line) - 1) {
                fwrite($fileHandle, ':');
            }
        }
        fwrite($fileHandle, '' . PHP_EOL);
    }
    header("Location: makeTable.php");
}


function readData($filename)
{
    $customers = file($filename);
    $validCustomers = [];

    foreach ($customers as $customer) {
        $customer = trim($customer);
        if ($customer != "") {
            $customer = explode(":", $customer);
            $validCustomers[] = $customer;
        }
    }
    return $validCustomers;
}
