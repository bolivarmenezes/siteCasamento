<?php

require_once("DBConnection.php");
require_once("../Message.php");

class DBInsertMsg
{
    public $pdo;
    public $datas;

    public function insertMessage($datas)
    {
        $pdo = new DBConnection();
        try {
            $sql = 'INSERT INTO mensagens(nome_msg, mensagem_msg) VALUES (?,?);';
            $stmt = $pdo->returnConnection()->prepare($sql);
            $stmt->execute([$datas->getNomeMsg(), $datas->getMensagemMsg()]);
            echo json_encode(["response" => "Mensagem Enviada!"]);
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo json_encode($erro);
            /*$pos = strripos($erro, "Duplicate");

            if ($pos != false) {
                echo json_encode(["response" => "Você já havia confirmado presença!"]);
            }*/
        }
    }
}
