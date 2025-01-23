<?php

include "../../classes/conn.php";
include "../../classes/admine.php";

$admine = new Admine($conn);

    $id_user = $_GET['id_user'];
    $admine->banTeacher($conn ,$id_user);
    header("Location: ../../view/teacher/usersDashboard.php");