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

      $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
      $limit = 1;
      $conn = new Conn();
      $result_user = "SELECT * FROM usuarios where id=:id LIMIT :limit";

      $resultado_user =  $conn->getConn()->prepare($result_user);
      $resultado_user->bindParam(':id', $id, PDO::PARAM_INT);
      $resultado_user->bindParam(':limit', $limit, PDO::PARAM_INT);
      $resultado_user->execute();

      $row_user = $resultado_user->fetch(PDO::FETCH_ASSOC);
      echo "ID: " .$row_user['id'] . "<br>";
      echo "Nome: " .$row_user['nome'] . "<br>";
      echo "Email: " .$row_user['email'] . "<br>";
      echo "Criado: " . date('d/m/Y H:i:s' , strtotime($row_user['created'])) . "<br>";

      if(!empty($row_user['modified'])):
        echo "Modificado: " . date('d/m/Y H:i:s' , strtotime($row_user['modified'])) . "<br>";
      endif;
      echo "<hr>";


     ?>

</body>
</html>
