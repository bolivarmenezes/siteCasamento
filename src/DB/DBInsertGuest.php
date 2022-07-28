<?php

require_once("DBConnection.php");
require_once("../Guest.php");

class DBInsert
{
    public $pdo;
    public $datas;

    public function insertGuest($datas)
    {
        $pdo = new DBConnection();
        try {
            $sql = 'INSERT INTO convidados(nome_convidado, sobrenome_convidado, email_convidado, telefone_convidado,tipo_convidado, observacao_convidado) VALUES (?,?,?,?,?,?);';
            $stmt = $pdo->returnConnection()->prepare($sql);
            $stmt->execute([$datas->getNomeConvidado(), $datas->getSobrenomeConvidado(), $datas->getEmailConvidado(), $datas->getTelefoneConvidado(), $datas->getTipoConvidado(),$datas->getObservacaoConvidado()]);
            echo json_encode(["response" => "Presença confirmada!"]);
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            $pos = strripos($erro, "Duplicate");

            if ($pos != false) {
                echo json_encode(["response" => "Você já havia confirmado presença!"]);
            }
        }
    }
}
