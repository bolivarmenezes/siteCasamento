<?php

require_once("DBConnection.php");
require_once("../Message.php");

class DBSelectMessage
{
    public $pdo;

    public function selectMessage()
    {
        $pdo = new DBConnection();
        try {
            $response = $pdo->returnConnection()->query("SELECT nome_msg, mensagem_msg FROM mensagens;");
            $allMessages =  '<div id="allMessages">';
            while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
                $allMessages .= "<div class='message'><p>\"{$row['mensagem_msg']}\"</p></div><div class='name'>{$row['nome_msg']}</div>";
            }
            $allMessages .= "</div>";
            echo $allMessages;
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo "Algo deu errado. Corram para as montanhas! ... ou informe os noivos :D";
        }
    }
}
