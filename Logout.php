<?php

session_start();


unset($_SESSION["userid"]);
unset($_SESSION["useruid"]);
unset($_SESSION["cart"]);

header("location: http://localhost/vizsga_project/?page=index&error=none");
