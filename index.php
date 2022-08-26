<?php
require_once 'session-control.php';
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<div class="form-card">

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

                        <form action="user-check.php" method="post">
                            <div class="mb-3" style="width: auto">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" required="true" name="username">
                            </div>
                            <div class="mb-3" style="width: auto">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" required="true" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary d-grid gap-2 mx-auto mb-2">Sign In</button>
                        </form>

                        <form action="register-form.php">
                            <button type="submit" class="btn btn-primary d-grid gap-2 mx-auto mb-2">Sign Up</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>

</div>
</html>



