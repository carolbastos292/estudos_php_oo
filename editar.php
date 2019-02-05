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
    $conn = new Conn();

    //recebe os dados
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
    $limit = 1;
    
    //editar usuario
    $Dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
     if (!empty($Dados['SendEditUser'])):
           unset($Dados['SendEditUser']);
           $conn = new Conn();

           $result_up_user = "UPDATE usuarios SET nome=:nome, email=:email, usuario=:usuario, senha=:senha, modified=NOW() where id=:id";
           $result_up_user = $conn->getConn()->prepare($result_up_user);

           $result_up_user->bindParam(':nome', $Dados['nome']);
           $result_up_user->bindParam(':email', $Dados['email']);
           $result_up_user->bindParam(':usuario', $Dados['usuario']);
           $result_up_user->bindParam(':senha', $Dados['senha']);
           $result_up_user->bindParam(':id', $Dados['id']);

           if ($result_up_user->execute()):
               echo "<p style='color:green;'>Editado com sucesso!</p>";
           else:
           		echo "<p style='color:red;'>Não editado, desculpe </p>";
           endif;
      endif;


    //pesquisa os dados do usuario
    $result_user = "Select * from usuarios where id=:id LIMIT :limit";
    $resultado_user = $conn->getConn()->prepare($result_user);
    $resultado_user->bindParam(':id', $id, PDO::PARAM_INT);
    $resultado_user->bindParam(':limit', $limit, PDO::PARAM_INT);
	$resultado_user->execute();
	$row_user = $resultado_user->fetch(PDO::FETCH_ASSOC);
	//var_dump($row_user['nome']);
   ?>
  <h1>Editar Usuario</h1>
  <form name="editUsuario" action="" method="POST">
    <input type="hidden" name="id" value="<?php echo  $row_user['id']; ?>">

    <label>Nome: </label>
    <input type="text" name="nome" value="<?php echo  $row_user['nome']; ?>"></br></br>

    <label>Email: </label>
    <input type="email" name="email" value="<?php echo  $row_user['email']; ?>"></br></br>

    <label>Usuario: </label>
    <input type="text" name="usuario" value="<?php echo  $row_user['usuario']; ?>"></br></br>

    <label>Senha: </label>
    <input type="password" name="senha" value="<?php echo  $row_user['senha']; ?>"></br></br></br>

    <input type="submit" class="btn-success" value="Editar" name="SendEditUser">

  </form>

</body>
</html>
