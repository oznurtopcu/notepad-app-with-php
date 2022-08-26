<?php
require_once 'session-control.php';
require_once 'db-conn.php';

$get_title = htmlspecialchars($_POST["title"]);
$get_note = htmlspecialchars($_POST["myNote"]);
$date_time = date("Y-m-d H:i:s", time());

if ($get_title == null or $get_note == null) {
    echo "Formdaki alanlar boş bırakılamaz.";

}elseif ($_SESSION["id"] == null){
    echo "Oturum sona erdi. Lütfen tekrar giriş yapınız.";
    header('Location: http://localhost/note-app/');

}else {
    try {
        $sql_note = $conn->prepare("INSERT INTO note_table ( user_id, note_title, note_content, date_time) VALUES (? ,? ,? ,?)");
        $sql_note->bindParam(1, $_SESSION["id"]);
        $sql_note->bindParam(2, $get_title);
        $sql_note->bindParam(3, $get_note);
        $sql_note->bindParam(4, $date_time);
        $sql_note->execute();

        echo "Notunuz başarıyla kaydedilmiştir. ''Notlarım'' sayfasından tüm notlarınızı görüntüleyebilirsiniz.";
        include "dashboard.php";

    } catch (PDOException $e) {
        echo $sql_file . "<br>" . $e->getMessage();
        echo "<br />";
    }
}

?>