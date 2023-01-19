<?php
    include_once $_SERVER['DOCUMENT_ROOT']."/source/iustation/db/db_connect.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/source/iustation/db/create_table.php";

    create_table($con, "members");
    create_table($con, "notice");
    create_table($con, "notice_ripple");
    create_table($con, "image");
    create_table($con, "image_ripple");
    create_table($con, "forum");
    create_table($con, "forum_ripple");
    create_table($con, "goods");
    create_table($con, "goods_ripple");
?>