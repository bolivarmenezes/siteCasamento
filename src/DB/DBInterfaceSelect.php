<?php

require_once("DBSelectMusic.php");
require_once("DBSelectMessage.php");
require_once("DBSelectGuest.php");
require_once("../Music.php");

if (!empty($_POST)) {
    $action = $_POST["action"];
    if (strcmp($action, "listMusic") == 0) {
        $lm = new DBSelectMusic();
        $lm->selectMusic();
    }

    if (strcmp($action, "listMessage") == 0) {
        $lm = new DBSelectMessage();
        $lm->selectMessage();
    }
    if (strcmp($action, "listGuest") == 0) {
        $lm = new DBSelectGuest();
        $lm->selectGuest();
    }
}
