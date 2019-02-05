<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Listar Usuario</title>
</head>
<body>
  <h1>Listar Usuario</h1>
    <?php
      require './Conn.php';

      //$nome = "Ane";
      $conn = new Conn();
      $result_user = "SELECT * FROM usuarios";

      $resultado_user =  $conn->getConn()->prepare($result_user);
      //$resultado_user->bindParam(':nome', $nome, PDO::PARAM_STR);
      $resultado_user->execute();

      while($row_user = $resultado_user->fetch(PDO::FETCH_ASSOC)):
            echo "ID: " .$row_user['id'] . "<br>";
            echo "Nome: " .$row_user['nome'] . "<br>";
            echo "Email: " .$row_user['email'] . "<br>";
            echo "Criado: " . date('d/m/Y H:i:s' , strtotime($row_user['created'])) . "<br>";
            if(!empty($row_user['modified'])):
              echo "Modificado: " . date('d/m/Y H:i:s' , strtotime($row_user['modified'])) . "<br>";
            endif;
            echo "<a href='visualizar.php?id=".$row_user['id']."'>Visualizar</a><br>";
            echo "<a href='editar.php?id=".$row_user['id']."'>Editar</a><br>";
            echo "<a href='apagar.php?id=".$row_user['id']."'>Apagar</a><br>";
            echo "<hr>";
      endwhile;

     ?>

</body>
</html>
