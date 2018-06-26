<?php

    session_start();
    ob_start();
    $error = "";
    $errorMsg = "";
    if (array_key_exists("logout", $_GET)) {

        session_destroy();
        setcookie("id", "", time() - 60*60);
        $_COOKIE["id"] = "";

    } else if ((array_key_exists("id", $_SESSION) AND $_SESSION['id']) OR (array_key_exists("id", $_COOKIE) AND $_COOKIE['id'])) {

        header("Location: loggedinpage.php");

    }

    if (array_key_exists("submit", $_POST)) {

        include("connection.php");

        if (!$_POST['email']) {

            $error = " ";
            $errorMsg .= "An email address is required<br>";

        }

        if (!$_POST['password']) {

            $error .= " ";
            $errorMsg .= "A password is required<br>";

        }

        if ($error != "") {

            $error = "<p>There were error(s) in your form:</p>".$errorMsg;

        } else {

            if ($_POST['signUp'] == '1') {

                $query = "SELECT id FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

                $result = mysqli_query($link, $query);

                if (mysqli_num_rows($result) > 0) {

                    $error = "That email address is taken.";

                } else {

                    $query = "INSERT INTO `users` (`email`, `password`) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

                    if (!mysqli_query($link, $query)) {

                        $error = "<p>Could not sign you up - please try again later.</p>";

                    } else {

                        $query = "UPDATE `users` SET password = '".md5(md5(mysqli_insert_id($link)).$_POST['password'])."' WHERE id = ".mysqli_insert_id($link)." LIMIT 1";

                        mysqli_query($link, $query);

                        $_SESSION['id'] = mysqli_insert_id($link);

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("id", mysqli_insert_id($link), time() + 60*60*24*365);

                        }

                        header("Location: loggedinpage.php");

                    }

                }

            } else {

                $query = "SELECT * FROM `users` WHERE email = '".mysqli_real_escape_string($link, $_POST['email'])."'";

                $result = mysqli_query($link, $query);

                $row = mysqli_fetch_array($result);

                if (isset($row)) {

                    $hashedPassword = md5(md5($row['id']).$_POST['password']);

                    if ($hashedPassword == $row['password']) {

                        $_SESSION['id'] = $row['id'];

                        if ($_POST['stayLoggedIn'] == '1') {

                            setcookie("id", $row['id'], time() + 60*60*24*365);

                        }

                        header("Location: loggedinpage.php");

                    } else {

                        $error = "That email/password combination could not be found.";

                    }

                } else {

                    $error = "That email/password combination could not be found.";

                }

            }

        }


    }
    ob_end_flush();
    ?>



<?php include("header.php"); ?>




        <div class="container" id="homePageContainer">
            <h1 class="form-title">Notepad online</h1>

            <p class="text-dark"><strong>Store your text permanently and securely.</strong></p>

            <form method="post" id="signUpForm">

                <p class="text-dark">Interested? Sign up now!</p>

                <input type="hidden" name="signUp" value="1">

                <fieldset class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Your Email">
                </fieldset>

                <fieldset class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </fieldset>

                <fieldset class="form-group checkbox">
                    <label>
                        <input class="form-control stayLoggedIn" type="checkbox" name="stayLoggedIn" value=1> Stay logged
                    </label>
                </fieldset>

                <fieldset class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value="Sign Up!">
                </fieldset>

                <p><a href="#" class="toggleForms">Log in</a></p>

            </form>

            <form method="post" id="logInForm">

                <p class="text-dark">Log in using your username and password</p>

                <input type="hidden" name="signUp" value="0">

                <fieldset class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Your Email">
                </fieldset>

                <fieldset class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password">
                </fieldset>

                <fieldset class="form-group checkbox">
                    <label>
                        <input class="form-control stayLoggedIn" type="checkbox" name="stayLoggedIn" value=1> Stay logged
                    </label>
                </fieldset>

                <fieldset class="form-group">
                    <input class="btn btn-success" type="submit" name="submit" value="Log In!">
                </fieldset>

                <p><a href="#" class="toggleForms">sign up</a></p>

            </form>

        </div>

        <div id="error"><?php echo $error;?></div>

        <?php include("footer.php"); ?>