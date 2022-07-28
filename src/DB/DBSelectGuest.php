<?php

require_once("DBConnection.php");
require_once("../Guest.php");

class DBSelectGuest
{
    public $pdo;

    public function selectGuest()
    {
        $pdo = new DBConnection();
        try {
            $response = $pdo->returnConnection()->query("SELECT nome_convidado, sobrenome_convidado, email_convidado, telefone_convidado, tipo_convidado, observacao_convidado, confirmacao_convidado FROM convidados;");
            $table = '<table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Observação/Recado</th>
                    </tr>
                </thead>
                <tbody>';
            $line = '';
            while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
                $line .= "<tr><td>{$row['nome_convidado']}</td><td>{$row['observacao_convidado']}</td></tr>";
            }
            $table .= $line;
            $table .= "</tbody></table>";
            echo $table;
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo "Algo deu errado. Corram para as montanhas! ... ou informe os noivos :D";
        }
    }
}
