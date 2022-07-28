<?php

require_once("DBConnection.php");
require_once("../Music.php");

class DBSelectMusic
{
    public $pdo;

    public function selectMusic()
    {
        $pdo = new DBConnection();
        try {
            $response = $pdo->returnConnection()->query("SELECT nome_msc, musica_msc, aprovado FROM musicas;");
            $table = '<table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Sugeriu</th>
                            <th scope="col">Musica</th>
                            </tr>
                        </thead>
                        <tbody>';
            $line = '';
            while ($row = $response->fetch(PDO::FETCH_ASSOC)) {
                if (strcmp($row['aprovado'], '1') == 0) {
                    $line .= "<tr><td>{$row['nome_msc']}</td><td>{$row['musica_msc']}</td></tr>";
                }
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
