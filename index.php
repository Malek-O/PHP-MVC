<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/web.css">
    <title>Document</title>
</head>

<body>

    <div class="container bg rounded">
        <div class="my-4 p-2 py-3 text-white d-flex justify-content-between">
            <h9 class="fw-normal">MyLogin</h9>
            <div class="d-flex gap-4 align-items-center">
                          <?php
session_start();
if (isset($_SESSION['uname'])) {
    echo "<a class='btn btn-warning'>{$_SESSION['uname']}</a>";
    echo "<a class='btn btn-danger' href='./includes/logout.inc.php'>Logout</a>";

} else {
    echo "<h6 class='fw-normal'>Login</h6>";
    echo " <h6 class='fw-normal'>Sign up</h6>";
}

?>


            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-evenly align-items-center">
       <form class="bg p-3 rounded text-white h-100" action="includes/login.inc.php" method="post">
            <h1>Login</h1>
            <div class="mb-3">
                <label  class="form-label">Email address</label>
                <input type="text" class="form-control" name="uname">
                <div  class="form-text text-white">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pwd">
            </div>
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
       <form class="bg p-3 rounded text-white w-25" action="./includes/signup.inc.php" method="post">
        <h1>Sign up</h1>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="uname">
            </div>
            <div class="mb-3">
                <label  class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="pwd">
            </div>
             <div class="mb-3">
                <label class="form-label">Repeat Password</label>
                <input type="password" class="form-control" name="rpwd">
            </div>
            <button type="submit" class="btn btn-success" name="submit" >Submit</button>
        </form>
    </div>
    </div>

</body>
</html>
