<?php
require_once 'session-control.php';
require_once 'db-conn.php';

$get_id = $_SESSION["id"];

$stmt = $conn->prepare("SELECT * FROM note_table WHERE user_id =?");
$stmt->bindParam(1, $get_id);
$stmt->execute();

$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<div class="form-card" style="height: 100vh">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=
, initial-scale=1.0">
        <title>File Upload</title>
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
                    <div class="card-body" style="width: 275px">
                        <?php
                        foreach ($result as $element) {
                            $get_note_id = $element["id"];
                            $get_note_title = $element["note_title"];
                            $get_note_content = $element["note_content"];
                        ?>

                        <div class="d-grid mb-2 mx-auto">
                            <a href="show-note.php?id=<?php echo $get_note_id; ?>" class="btn btn-outline-secondary fw-bold"><?php echo $get_note_title; ?></a>
                        </div>
                        <?php } ?>

                        <form action="dashboard.php">
                            <button type="submit" class="btn btn-primary d-grid gap-2 mx-auto mt-4 mb-2">Ana Sayfa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>

</div>
</html>


