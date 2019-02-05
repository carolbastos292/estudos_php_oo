<?php
	require './Conn.php';
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

	if(!empty($id)):
		$conn = new Conn();
		$result_user = "DELETE FROM usuarios WHERE 	id=:id";

		$result_del_user = $conn->getConn()->prepare($result_user);
		$result_del_user->bindParam(':id',$id);

		if($result_del_user->execute()):
			$_SESSION['msg'] = "<p style='color:green;'>Registro apagado com sucesso</p>";
			header("Location: listar.php");
 		endif;
 	else:
 	endif;
?>