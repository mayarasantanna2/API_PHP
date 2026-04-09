<?php
    header("Content-Type: application/json");

    $metodo = $_SERVER['REQUEST_METHOD'];
    // echo "Método da requisição: " .$metodo

    // $usuarios=[
    //     ["id" => 1, "nome" => "Fulano", "email" => "fulano@email.com"],
    //     ["id" => 2, "nome" => "Ciclano", "email" => "ciclano@email.com"]
    // ];
    // echo json_encode($usuarios);

    switch ($metodo) {
        case 'GET':
           echo "AQUI AÇÕES DO METODO GET";
           break;
           
        case 'POST':
           echo "AQUI AÇÕES DO METODO POST";
           break;
           
        default:
            echo "MÉTODO NÃO ENCONTRADO ";
            break;
    }
?>