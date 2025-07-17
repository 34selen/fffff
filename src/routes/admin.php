<?php
echo "hihi";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $Controller = new AdminController();
  $_SESSION['admin'] = $Controller->ChangePerm($_POST['VerifyToken'],$admin_verify_token);
}
?>