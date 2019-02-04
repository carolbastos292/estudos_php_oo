<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <title>Estudos PHP</title>
</head>
<body>
  <?php
    require './Conn.php';

    $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($Dados);

    if (!empty($Dados['SendCadUser'])):
           unset($Dados['SendCadUser']);
           $conn = new Conn();

           $result_cadastrar = "INSERT INTO usuarios (nome, email, usuario, senha, created) VALUES (:nome, :email, :usuario, :senha, NOW())";
           $cadastrar = $conn->getConn()->prepare($result_cadastrar);

           $cadastrar->bindParam(':nome', $Dados['nome'], PDO::PARAM_STR);
           $cadastrar->bindParam(':email', $Dados['email'], PDO::PARAM_STR);
           $cadastrar->bindParam(':usuario', $Dados['usuario'], PDO::PARAM_STR);
           $cadastrar->bindParam(':senha', $Dados['senha'], PDO::PARAM_STR);

           $cadastrar->execute();

           if ($cadastrar->rowCount()):
               echo "Cadastrado com sucesso";
           endif;
      endif;

   ?>
  <h1>Cadastrar Usuario</h1>
  <form name="cadUsuario" action="" method="POST">
    <label>Nome: </label>
    <input type="text" name="nome" placeholder="Nome Completo"></br></br>

    <label>Email: </label>
    <input type="email" name="email" placeholder="Email"></br></br>

    <label>Usuario: </label>
    <input type="text" name="usuario" placeholder="Usuario"></br></br>

    <label>Senha: </label>
    <input type="password" name="senha" placeholder="Senha"></br></br></br>

    <input type="submit" class="btn-success" value="Cadastrar" name="SendCadUser">

  </form>

</body>
</html>
