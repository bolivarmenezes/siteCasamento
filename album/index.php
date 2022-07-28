<?php
$path = "./";
$diretorio = dir($path);
$new_vet = [];
$cont = 0;
while($arquivo = $diretorio -> read()){        
    @$exten = explode('.', $arquivo)[1];
    if((strcmp($exten, 'php') != 0) && (strcmp($exten, '') != 0) && (strcmp($exten, '.') != 0) && (strcmp($exten, '..') != 0)){
        $new_vet[$cont] = $arquivo;
        $cont++;
    }    
}


sort($new_vet, SORT_NUMERIC);

foreach ($new_vet as $name) {
    echo "$name<br>";
}

$diretorio -> close();
?>