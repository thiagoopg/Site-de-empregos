  <?php
    if(!isset($_SESSION)){
		session_start();
	}
     include '../cont/ct_database_conect.php';

	if (isset($_POST['usuario']))	{
      $usuario = $_POST['usuario'];
    }else{
      $usuario = "";
	}
    if (isset($_POST['senha'])){
      $senha = $_POST['senha'];
    }else{
		$senha = "";
	}
   
   $sql = "SELECT login, senha FROM usuario WHERE login = '".$usuario."';";
   $query = mysqli_query($conn, $sql);
   $resultado_usuario = mysqli_fetch_array($query, MYSQLI_ASSOC);
      if($usuario == $resultado_usuario['login'] && $senha == $resultado_usuario['senha']){
        $sql = "SELECT usuario.login, usuario.fk_funcao, funcao.name_funcao, funcao.admin FROM funcao JOIN usuario ON fk_funcao = id_funcao WHERE login = '$usuario'";
        $query = mysqli_query($conn, $sql);
        $resultado_admin = mysqli_fetch_array($query, MYSQLI_ASSOC);
        echo $usuario;
        echo "<br>";

        var_dump($resultado_admin);
        $admin = $resultado_admin['admin'];
           $_SESSION['usuario'] = $usuario;
           $_SESSION['admin'] = $resultado_admin['admin'];
      header("location:../view/vi_admin_inicial_html.php");
      }	else{
       $_SESSION["msg"]="mensagem do php";
      header("location:../view/vi_admin_html.php?msg=usuário ou senha inválidos");
      }
 