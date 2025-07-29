<?php
$senha_plana = '123456';
$hash_da_senha = password_hash($senha_plana,PASSWORD_DEFAULT);

echo "A senha : '$senha_plana ' tem o hash: <br>";
echo "<strong>".$hash_da_senha . "</strong>";
?>

