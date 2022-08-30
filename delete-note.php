<?php
require_once 'session-control.php';
require_once 'db-conn.php';
$get_note_id = $_GET["id"];

$stmt = $conn->prepare("DELETE FROM note_table WHERE id =?");
$stmt->bindParam(1, $get_note_id);
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetch();

if($result == ""){
    echo "Silme işlemi başarıyla tamamlandı.";
    include 'note-history.php';
}else{
    echo "Silme işlemi sırasında bilinmeyen bir hata oluştu. Lütfen tekrar deneyiniz.";
    include 'note-history.php';
}
?>