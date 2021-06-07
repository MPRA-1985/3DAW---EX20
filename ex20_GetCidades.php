<?php

//Criar conexão com o banco
  $servidor = "localhost";
  $usuario = "root";
  $senha = "";
  $nomeBanco = "exercicio20";
  $estado = $_GET{"estado"};

  $conn = mysqli_connect( $servidor, $usuario, $senha, $nomeBanco );

  if( !$conn ) {
    die( "Erro de conexão com localhost, o seguinte erro ocorreu ->".mysql_error() );
  }


  $query =  "SELECT * FROM estado WHERE uf = '$estado'";

  $result = $conn->query($query);

  $linha = $result->fetch_assoc();


  $foreignKey = $linha['id'];

  $query2 =  "SELECT * FROM cidade WHERE estado = $foreignKey";

  $result2 = $conn->query($query2);


  $nomesCidades[] = array();

  // Pega o valor da linha inteira de cada estado
  while (  $linha2 = $result2->fetch_assoc() ) {
    
    $nomesCidades[] = $linha2['nome'];

  }

  echo json_encode($nomesCidades);

?>