<?php
include 'session-control.php';
require_once 'db-conn.php';

$c_username = htmlspecialchars($_POST["username"]);
$c_password = htmlspecialchars($_POST["password"]);

$stmt = $conn->prepare("SELECT * FROM user_table WHERE username=?");
$stmt->bindParam(1, $c_username);
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetch();

if ($c_username == null or $c_password == null) {
    echo "Formdaki alanlar boş bırakılamaz.";
    include 'index.php';

} elseif ($result == true) {

    if (password_verify($c_password, $result['password_hash'])) {
        echo "Başarıyla giriş yapıldı.";
        $_SESSION["id"] = $result['id'];
        header('Location: http://localhost/note-app/dashboard.php');

    } else {
        echo "Geçersiz şifre. Lütfen tekrar deneyiniz.";
        include 'index.php';
    }
} else {
    echo "Geçersiz kullanıcı adı. Lütfen tekrar deneyiniz.";
    include 'index.php';
}
