<?php

include "./user.php";

class Admine{
    
    public funtion() banTeacher($teacher){
        $id_yeacher = $teacher->getId();
        $qry = "update users
        set activated = 0
        where id_user = :id_user;
        ";
    }

    public funtion() activateTeacher($teacher){
        $id_yeacher = $teacher->getId();
        $qry = "update users
        set activated = 1
        where id_user = :id_user;
        ";  
}
