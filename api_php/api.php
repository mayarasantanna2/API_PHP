<?php
    header("Content-Type: application/json; charset=UTF-8");

    $metodo = $_SERVER['REQUEST_METHOD'];

    $arquivo = 'usuarios.json';

    if(!file_exists($arquivo)){
        file_put_contents($arquivo,json_encode([],JSON_PRETTY_PRINT | JSON_UNESCAPE_UNICODE));
    }

    $usuarios = json_decode(file_get_contents($arquivo),true);

    //$usuarios = [
    //    ["id"=> 1, "nome"=> "Maria Souza", "email"=> "maria@email.com"],
    //    ["id"=> 2, "nome"=> "Joao Souza", "email"=> "joao@email.com"]
    //];

    // echo "Método da requisição: " . $metodo;

    switch ($metodo) {
        case 'GET':
            //echo "AQUI AS AÇÕES DO MÉTODO GET";
            echo json_encode($usuarios);
            break;
        case 'POST';
           // echo "AQUI AS AÇÕES DO MÉTODO POST";
           $dados= json_decode(file_get_contents('php://input'),true);
          // print_r($dados);

          if(!isset($dados["id"]) || !isset($dados["nome"]) || !isset($dados["email"])){
            http_response_code(400);
            echo json_encode(["erro" => "Dados incompletos."], JSON_UNESCAPE_UNICODE);
            exit;
          }

           $novo_usuario = [
                "id"=> $dados["id"],
                "nome"=> $dados["nome"],
                "email"=> $dados["email"],
            ];
            
            $usuarios[] = $novo_usuario;

            file_put_contents($arquivo, json_encode($usuarios, JSON_PRETTY_PRINT | JSON_UNESCAPE_UNICODE));
            break;
           // array_push($usuarios,$novo_usuario);
           // echo json_encode('Usuario inserido com sucesso!');
           // print_r($usuarios);

            break;

        default:
           // echo "MÉTODO NÃO ENCONTRADO";
           // break;
           http_response_code(405); 
           echo json_encode(["erro" => "Método não permitido!"], JSON_UNESCAPE_UNICODE);
           break;
    }


    // $usuarios = [
    //     ["id" => 1, "nome" => "Fulano", "email" => "fulano@gmail.com"],
    //     ["id" => 2, "nome" => "Ciclano", "email" => "ciclano@gmail.com"]
    // ];

    // echo json_encode($usuarios);
?>