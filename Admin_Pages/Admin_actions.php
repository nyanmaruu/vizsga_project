<?php

session_start();

require "../Querys.php";

$querys = new Querys();


if (isset($_POST["action"]) && $_POST["action"] == "getOrder") {

    $output = '';
    $order = $querys->addOrderToTable();

    foreach ($order as $row) {

        $output .=
            '
       <tr>
            <td>
                <span class="custom-checkbox">
                    <input type="checkbox" id="checkbox1" name="options[]" value="1" />
                    <label for="checkbox1"></label>
                </span>
            </td>

            <td>' . $row["firstName"] . ' ' . $row["lastName"] . '</td>
            <td>' . $row["users_email"] . '</td>
            <td>' . $row["adress"] . '</td>
            <td>' . $row["total_ordered_price"] . ' $</td>

            <td>
                <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                    <i class="material-icons"data-toggle="tooltip" title="Edit">&#xE254;
                    </i>
                </a>
                <a onclick="deleteOrder(' . $row["id"] . ')"  class="delete" data-toggle="modal"><i
                        class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
            </td>
        </tr>
    ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "deleteOrder") {
    $order = $querys->deleteOrder($_POST["orderId"]);
}

if (isset($_POST["action"]) && $_POST["action"] == "countOrders") {


    $output = '';
    $order = $querys->countAllOrder();

    foreach ($order as $row) {
        $output .= '

     ' . $row["ordersNumber"] . ' 
       ';
    }
    echo $output;
}


if (isset($_POST["action"]) && $_POST["action"] == "countUsers") {


    $output = '';
    $order = $querys->countAllUsers();

    foreach ($order as $row) {
        $output .= '
    
         ' . $row["usersNumber"] . ' 
           ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "countAdmins") {


    $output = '';
    $order = $querys->countAllAdmins();

    foreach ($order as $row) {
        $output .= '
        
             ' . $row["adminsNumber"] . ' 
               ';
    }
    echo $output;
}

if (isset($_POST["action"]) && $_POST["action"] == "countProducts") {


    $output = '';
    $order = $querys->countAllProducts();

    foreach ($order as $row) {
        $output .= '
            
                 ' . $row["productsNumber"] . ' 
                   ';
    }
    echo $output;
}
