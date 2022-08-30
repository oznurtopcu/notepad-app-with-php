<?php
require_once 'session-control.php';
require_once 'db-conn.php';
$get_note_id = $_GET["id"];

$stmt = $conn->prepare("SELECT * FROM note_table WHERE id =?");
$stmt->bindParam(1, $get_note_id);
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();

foreach ($result as $element) {
    $get_note_title = $element["note_title"];
    $get_note_content = $element["note_content"];
}
?>

<!DOCTYPE html>
<html lang="en">
<div class="form-card" style="height: 100vh">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=
    , initial-scale=1.0">
        <title>Note App</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
              crossorigin="anonymous">
    </head>

    <body>
    <div class="container">
        <div class="row">
            <div class="login-form d-flex justify-content-center mt-5">
                <div class="card">
                    <div class="card-header text-center">Note App</div>
                    <div class="card-body">
                        <form action="edit-note.php?id=<?php echo $get_note_id; ?>" method="post">
                            <div class="mb-3" style="width: 275px">
                                <label class="form-label">Başlık:</label>
                                <textarea type="text" class="form-control mb-3" required="true" name="editTitle"><?php echo $get_note_title; ?></textarea>
                                <label class="form-label">Not:</label>
                                <textarea type="text" class="form-control mb-3" required="true" name="editNote" style="height: 150px"><?php echo $get_note_content; ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary d-grid gap-2 mx-auto mb-2">Düzenlemeyi Kaydet</button>
                        </form>
                        <form action="dashboard.php">
                            <button type="submit" class="btn btn-primary d-grid gap-2 mx-auto mb-2">Ana Sayfa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>

</div>
</html>



