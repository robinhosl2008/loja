<?php

include('logica-usuario.php');
logout();
$_SESSION['logout'] = "O usuário saiu do sistema.";

header('location: index.php');