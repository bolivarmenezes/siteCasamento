<?php

require_once("../Guest.php");
require_once("../Message.php");
require_once("DBInsertGuest.php");
require_once("DBInsertMessage.php");
require_once("DBInsertMusic.php");

if (!empty($_POST)) {
    $action = $_POST["action"];

    if (strcmp($action, "confirmation") == 0) {
        $name = $_POST["name"];
        $lastName = $_POST["lastName"];
        $type = $_POST['type'];
        $fone = $_POST["fone"];
        $mail = $_POST["mail"];
        $observation = $_POST["observation"];

        $ng = new Guest();
        $ng->setNomeConvidado($name);
        $ng->setSobrenomeConvidado($lastName);
        $ng->setTipoConvidado($type);
        $ng->setTelefoneConvidado($fone);
        $ng->setEmailConvidado($mail);
        $ng->setObservacaoConvidado($observation);

        $dbi = new DBInsert();
        $dbi->insertGuest($ng);
    } elseif (strcmp($action, "message") == 0) {
        $name = $_POST['name_msg'];
        $message = $_POST['mensagem_msg'];

        $msg = new Message();
        $msg->setNomeMsg($name);
        $msg->setMensagemMsg($message);
        $dbi = new DBInsertMsg();
        $dbi->insertMessage($msg);
    } elseif (strcmp($action, "music") == 0) {
        $name = $_POST['name_msc'];
        $music = $_POST['music_msc'];

        $msc = new Music();
        $msc->setNomeMsc($name);
        $msc->setMusicaMsc($music);
        $dbi = new DBInsertMusic();
        $dbi->insertMusic($msc);
    }
}
if (isset($_FILES['pictures'])) {
    date_default_timezone_set("Brazil/East");
    $name     = $_FILES['pictures']['name']; //Atribui uma array com os nomes dos arquivos à variável
    $tmp_name = $_FILES['pictures']['tmp_name']; //Atribui uma array com os nomes temporários dos arquivos à variável

    $allowedExts = array(".jpeg", ".jpg", ".png");

    $dir =  '../received_photos/';

    for ($i = 0; $i < count($tmp_name); $i++) { //passa por todos os arquivos
        $ext = strtolower(substr($name[$i], -4));
        $ext2 = strtolower(substr($name[$i], -5));
        if (in_array($ext, $allowedExts) || in_array($ext2, $allowedExts)) { //Pergunta se a extensão do arquivo, está presente no array das extensões permitidas
            if (in_array($ext, $allowedExts)) {
                $new_name = date("Y.m.d-H.i.s") . "-" . $i . $ext;
            } else {
                $new_name = date("Y.m.d-H.i.s") . "-" . $i . $ext2;
            }
            move_uploaded_file($tmp_name[$i], $dir . $new_name);
        }
    }
    $retorno = array('response' => 'Agradecemos a sua contribuição <3');
    echo json_encode($retorno);
}
