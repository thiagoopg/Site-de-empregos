<!DOCTYPE html>
<html>
  <?php
	if (!isset($_SESSION)){
		session_start();
	}
	session_unset();
	session_destroy();
	header("location:../view/vi_admin_html.php")
  ?>
</html>
