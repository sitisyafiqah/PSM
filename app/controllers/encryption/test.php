<?php 
include_once('encryption.php');

$pass = EncryptData("Nws56v5WBkUcIuWRw3viqYKuUJAx/VRSlDYUHKTQU4a6AyaD33");
echo $pass."<br>";
echo DecryptData($pass);
?>