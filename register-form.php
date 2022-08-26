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
                    <div class="card-body">

                        <form action="register-check.php" method="post">
                            <div class="mb-2" style="width: auto">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" required="true" name="firstName">
                            </div>
                            <div class="mb-2" style="width: auto">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" required="true" name="lastName">
                            </div>
                            <div class="mb-2" style="width: auto">
                                <label class="form-label">E-mail</label>
                                <input type="email" class="form-control" required="true" name="email">
                            </div>
                            <div class="mb-2" style="width: auto">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" required="true" name="username">
                            </div>
                            <div class="mb-2" style="width: auto">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" required="true" name="password">
                            </div>
                            <button type="submit" class="btn btn-primary d-grid gap-2 mx-auto mb-2">Sign Up</button>
                        </form>

                        <form action="index.php">
                            <button type="submit" class="btn btn-primary d-grid gap-2 mx-auto mb-2">Sign In</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</div>
</html>



