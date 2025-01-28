<?php
require("utils.php");
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



function drawTable($customers)
{
    echo "<table class='table container col-12'>";
    echo " <tr>  <th>ID</th>  <th>First Name</th> <th>Last Name</th> <th>User Name</th> 
        <th>E-Mail</th>  <th>Delete</th></tr>";
    foreach ($customers as $index => $customer) {
        $var = $index + 1;
        echo "<tr>";
        echo "<td>{$var}</td>";
        foreach ($customer as $value) {

            echo "<td>{$value}</td>";
        }

        echo "<td><a href='deleteTable.php?index=$index'class='btn btn-Danger text-black'><B>Delete</B></a></td>";
        echo "</tr>";
    }

    echo "</table>";
}

$customers = readData('customer.txt');
drawTable($customers);

?>
<a href="register.php" class="btn btn-primary"><B>Add Customer</B></a>