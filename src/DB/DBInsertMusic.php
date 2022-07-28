<?php

require_once("DBConnection.php");
require_once("../Music.php");

class DBInsertMusic
{
    public $pdo;
    public $datas;

    public function insertMusic($datas)
    {
        $pdo = new DBConnection();
        try {
            $sql = 'INSERT INTO musicas(nome_msc, musica_msc) VALUES (?,?);';
            $stmt = $pdo->returnConnection()->prepare($sql);
            $stmt->execute([$datas->getNomeMsc(), $datas->getMusicaMsc()]);
            echo json_encode(["response" => "Agradecemos a sua sugestão de música <3"]);
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
