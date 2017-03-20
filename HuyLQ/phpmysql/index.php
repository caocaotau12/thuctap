<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <meta charset="UTF-8">
        <title>dangnhap</title>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            .send{
                margin-left: 240px;
            }
            form{
                padding-left: 20px;
            }
            .user {
                margin-left: 32px;
            }
        </style>
    </head>
    <body>
        <!-- Button trigger modal -->
        <?php
        session_start();
        if (!isset($_SESSION['name'])) {
            ?>
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Login
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form method="POST" action="check.php">
                            User:            <input class="user" type="text" name="user">
                            <br>
                            Password:  <input class="pass" type="password" name="password">
                            <br>
                            <input class="send" type="submit" value="Login" name="login">
                        </form>

                    </div>
                </div>
            </div>
        </div>


        <button type="button" class="btn btn-sussess btn-lg" data-toggle="modal" data-target="#myModal2">
            Sign up
        </button>


        <!-- Modal -->
        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="POST" action="Dangki.php">
                        ID: <input class="ID" type="text" name="id"><br>
                        User:            <input class="user" type="text" name="user">
                        <br>
                        Password:  <input class="pass" type="password" name="password">
                        <br>
                        <input class="send" type="submit" value="Sign in" name="sign">
                    </form>

                </div>
            </div>
        </div>
    </div>

    <?php
} else {
    echo 'xin chao ban ' . $_SESSION['name'];
    ?>
    <a href="chinhsua.php" style="margin-left: 50px;margin-right: 50px;">Doi password</a>
    <a href="logout.php">Dang xuat</a>
    <?php
}
?>
</body>
</html>
