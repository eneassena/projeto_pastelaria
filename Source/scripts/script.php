<?php

use CoffeeCode\DataLayer\Connect;

require __DIR__ . '/../../vendor/autoload.php';
$ddls = require __DIR__ . '/functions_query.php';

$c = Connect::getInstance(DATA_LAYER_CONFIG);

if (Connect::getError()) {
    echo "falha ao conectar";
} else {
    $arr = $ddls['ddl_table'];
    exec_query($c, $arr);

    // Create Procedure
    $arr = $ddls['ddl_procedures'];
    exec_query($c, $arr);

    // Inserts Table
    $arr = $ddls['ddl_inserts'];
    exec_query($c, $arr, true);
}

function exec_query(PDO $c, array $dados, $withMultiDim = false)
{
    if ($withMultiDim) {
        foreach ($dados as $queries_inserts) {
            foreach ($queries_inserts as $query) {
                $c->query($query);
            }
        }
    } else {
        foreach ($dados as $query) {
            $c->query($query);
        }
    }
    echo "ok\n";
}
