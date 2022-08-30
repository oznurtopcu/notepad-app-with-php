<?php
require_once 'db-conn.php';

$firstName = htmlspecialchars($_POST["firstName"]);
$lastName = htmlspecialchars($_POST["lastName"]);
$email = htmlspecialchars($_POST["email"]); //buraya tekrar bak
$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]); //buraya tekrar bak

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
    echo $emailErr;
    include 'register-form.php';
}else{

$hash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT email FROM user_table WHERE email =?");
$stmt->bindParam(1, $email);
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetch();

$stmt_user = $conn->prepare("SELECT username FROM user_table WHERE username =?");
$stmt_user->bindParam(1, $username);
$stmt_user->execute();

$result_user = $stmt_user->setFetchMode(PDO::FETCH_ASSOC);
$result_user = $stmt_user->fetch();

if ($firstName == "" or $lastName == "" or $email == "" or $username == "" or $password == "") {
    echo "Formdaki alanlar boş bırakılamaz.";
    include 'register-form.php';
} elseif ($result == true) {
    echo "Bu email zaten kayıtlı.";
    include 'register-form.php';
} elseif ($result_user == true) {
    echo "Bu username kullanılamaz.";
    include 'register-form.php';
} else {
    try {
        $sql_file = $conn->prepare("INSERT INTO user_table ( first_name, last_name, email, username, password_hash) VALUES (? ,? ,? ,? ,?)");
        $sql_file->bindParam(1, $firstName);
        $sql_file->bindParam(2, $lastName);
        $sql_file->bindParam(3, $email);
        $sql_file->bindParam(4, $username);
        $sql_file->bindParam(5, $hash);
        $sql_file->execute();

        echo "Kayıt başarıyla oluşturuldu. Sisteme giriş yapabilirsiniz.";
        include "index.php";

        //$stmt = $dbh->prepare("insert into users set username=?, email=?, password=?");
        //$stmt->execute([$username, $email, $hash]);

    } catch (PDOException $e) {
        echo $sql_file . "<br>" . $e->getMessage();
        echo "<br />";
    }

}

}