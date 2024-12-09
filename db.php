<?php
$host = "dpg-ctbjije8ii6s739rpfj0-a.oregon-postgres.render.com";
$dbname = "uniavan_render_postgreesql";
$user = "uniavan_render_postgreesql_user";
$password = "RBgqBNBukN3oJNdWGdKRdgsPhF3ExlLg";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die("Erro de conexão: " . $e->getMessage());
}
?>
