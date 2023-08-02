<?php

session_start();

unset($_SESSION["userid"]);
unset($_SESSION["useruid"]);

header("location: http://localhost/vizsga_project/?page=index&error=none");