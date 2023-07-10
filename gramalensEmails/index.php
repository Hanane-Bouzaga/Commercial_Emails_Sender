<?php
session_start(); //lglssa 
if (isset($_SESSION["email"]) && isset($_SESSION["password"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"])) {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GramaLens Emails</title>
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

</head>

<body>
    <div id="left">

    </div>
    <div id="right">

        <form id="login-form" method="post" action="signin.php">
            <h1 id="title">Welcome to GramaLens <br> Email Sender.</h1> <br>
            <label id="lbl">Email</label> <br>
            <input type="text" id="email" name="email1" value="<?php
            if (isset($_SESSION["email"])) {
                echo $_SESSION["email"];
            }
            ?>">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "Email sign in invalid") { ?>
                    <hr> <br>
                <?php } else {
                    ?> <br>
                <?php
                }
            } else {
                ?>
            <br>
            <?php } ?>
            <label id="lbl">Password</label> <br>
            <div id="outps">
                <input type="password" id="password" name="password1" value="<?php
                if (isset($_SESSION["password"])) {
                    echo $_SESSION["password"];
                }
                ?>">
                <i class="bi bi-eye-slash" id="togglePassword"></i>
            </div>
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "Password sign in invalid") { ?>
                    <hr> <br>
                <?php } else {
                    ?> <br>
                <?php
                }
            } else {
                ?>
            <br>
            <?php } ?>
            <label id="forget-ps" class="midlle-lbl-design"> <u>forget password</u></label> <br>
            <div class="container1">
                <a class="btn effect01" onclick="validateAll('sign in')"><span>Sign
                        in</span></a> <br>
            </div>
            <div class="container2">
                <a class="btn2 effect02" id="bnt-create-account"><span>Create Account</span></a> <br>

            </div>
        </form>
        <form id="create-acount-form" method="post" action="create_account.php">
            <h1 id="title"> Create Your Account. </h1> <br>
            <label id="lbl">First Name</label> <br>
            <input type="text" id="firstname" class="txtboxdesign" name="firstname-ca"
                value="<?php echo (isset($_SESSION["firstname1"])) ? $_SESSION["firstname1"] : ""; ?>">
                <?php
            if (isset($_GET["error-fr"])) {
                if ($_GET["error-fr"] == "Firstname invalid") { ?>
                    <hr>
                    <div id="lbl-error">
                        <label>
                            <?php echo $_GET["error-fr"] ?>
                        </label> <br>
                    </div>
                <?php } else {
                    ?>
                    <br>
                <?php }
            } else {
                ?>
            <br>
            <?php } ?>
            <label id="lbl">Last Name</label> <br>
            <input type="text" id="lastname" class="txtboxdesign" name="lastname-ca"
                value="<?php if(isset($_SESSION["lastname1"])){echo $_SESSION["lastname1"];}?>">
                <?php
            if (isset($_GET["error-ls"])) {
                if ($_GET["error-ls"] == "Lastname invalid") { ?>
                    <hr>
                    <div id="lbl-error">
                        <label>
                            <?php echo $_GET["error-ls"] ?>
                        </label> <br>
                    </div>
                <?php } else {
                    ?>
                    <br>
                <?php }
            } else {
                ?>
            <br>
            <?php } ?>
            <label id="lbl">Email</label> <br>
            <input type="text" id="email-create-acc" class="txtboxdesign" name="email-ca"
                value="<?php echo (isset($_SESSION["email1"])) ? $_SESSION["email1"] : "";?>">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "This Email Already Have An Account" or $_GET["error"] == "Email invalid") { ?>
                    <hr>
                    <div id="lbl-error">
                        <label>
                            <?php echo $_GET["error"] ?>
                        </label> <br>
                    </div>
                <?php } else {
                    ?>
                    <br>
                <?php }
            } else {
                ?>
            <br>
            <?php } ?>
            <label id="lbl">Password</label> <br>
            <div id="outps">
                <input type="password" id="password1" class="pstxtboxdesign" name="password-ca"
                    value="<?php echo (isset($_SESSION["password1"])) ? $_SESSION["password1"] : ""; ?>">
                <i class="bi bi-eye-slash" id="togglePassword1"></i>
                <?php
            if (isset($_GET["error-ps"])) {
                if ($_GET["error-ps"] == "Password invalid") { ?>
                    <hr>
                    <div id="lbl-error">
                        <label>
                            <?php echo $_GET["error-ps"] ?>
                        </label> <br>
                    </div>
                <?php } else {
                    ?>
                    <br>
                <?php }
            } else {
                ?>
            <br>
            <?php } ?>
            </div>
            <a id="goback-sign-in" class="midlle-lbl-design"> <u>Sign in</u> </a> <br>
            <div class="container1">
                <a class="btn effect01" onclick="validateForCr()"><span>Create
                        Account</span></a> <br>
            </div>

        </form>
        <form id="forget-password" method="post" action="forgotpass.php">
            <h1 id="title"> What is Your Email ?</h1> <br>
            <label id="lbl">Email</label> <br>
            <input type="text" id="email-forget-ps" class="txtboxdesign" name="forgotpass-email">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "This Email Doesn't Have An Account!") { ?>
                    <hr>
                    <div id="lbl-error">
                        <label>
                            <?php echo $_GET["error"] ?>
                        </label> <br>
                    </div>
                <?php } else {
                    ?>
                    <br>
                <?php }
            } else {
                ?>
            <br>
            <?php } ?>
            <a id="goback-sign-in1" class="midlle-lbl-design"> <u>Sign in</u> </a> <br>
            <div class="container1">
                <a class="btn effect01" id="send-email" onclick="document.getElementById('forget-password').submit()"><span>Send Email</span></a> <br>
            </div>
        </form>
        <form id="email-number" method="post" action="confirme.php">
            <h1 id="title">What is The Code <br> You Received ?</h1> <br>
            <label id="lbl">Code</label> <br>
            <input type="text" id="email-code" class="txtboxdesign" name="code">
            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "This Code Incorrect!") { ?>
                    <hr>
                    <div id="lbl-error">
                        <label>
                            <?php echo $_GET["error"] ?>
                        </label> <br>
                    </div>
                <?php } else {
                    ?>
                    <br>
                <?php }
            } else {
                ?>
            <br>
            <?php } ?>

            <a id="goback-sign-in2" class="midlle-lbl-design"> <u>Sign in</u> </a> <br>
            <div class="container1">
                <a class="btn effect01" id="verify"
                    onclick="document.getElementById('email-number').submit()"><span>Verify</span> </a> <br>

            </div>

        </form>
        <form id="new-password" method="post" action="newpass.php">
            <h1 id="title">Assign New Password.</h1> <br>
            <label id="lbl">Password</label> <br>
            <input type="text" id="new-password-input" class="txtboxdesign">
            <div id="error2">
                <hr>
                <div id="lbl-error">
                        <label>
                            This password is invalid !
                        </label> <br>
                    </div>
            </div>
            <br id= "br2">
            <label id="lbl">Confirm Password</label> <br>
            <input type="text" id="Confirm-password-input" class="txtboxdesign" name="new-pass">
    
            <div id="error1">
                <hr>
                <div id="lbl-error">
                        <label>
                            This password doesn't match !
                        </label> <br>
                    </div>
            </div>
            <br id= "br1">

            <a id="goback-sign-in3" class="midlle-lbl-design"> <u>Sign in</u> </a> <br>
            <div class="container1">
                <a class="btn effect01"  onclick="confirm_pass()"><span>Change Password</span></a> <br>

            </div>

        </form>
        <div id="done">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                <circle class="path circle" fill="none" stroke="#73AF55" stroke-width="6" stroke-miterlimit="10"
                    cx="65.1" cy="65.1" r="62.1" />
                <polyline class="path check" fill="none" stroke="#73AF55" stroke-width="6" stroke-linecap="round"
                    stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " />
            </svg>
            <p class="success"> <?php
            if(isset($_GET["info"])){
                echo $_GET["info"];
            }
            ?></p> <br>
            <div class="container1">
                <a class="btn effect01" onclick="document.getElementById('login-form').submit()"><span>Sign in</span></a> <br>
            </div>

        </div>
        <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "This Email Already Have An Account") { ?>
                <script>
                    document.getElementById("login-form").style.display = "none";
                    document.getElementById("create-acount-form").style.display = "inline"; 
                </script>
            <?php
            }
        }
        if (isset($_GET["cr-back"])) {
            if ($_GET["cr-back"] == "true") { ?>
                <script>
                    document.getElementById("login-form").style.display = "none";
                    document.getElementById("create-acount-form").style.display = "inline"; 
                </script>
            <?php
            }
        }
        if (isset($_GET["confirme"])) {
            if ($_GET["confirme"] == "true") { ?>
                <script>
                    document.getElementById("email-number").style.display = "inline";
                    document.getElementById("create-acount-form").style.display = "none"; 
                    document.getElementById("login-form").style.display = "none";
                </script>
                <?php
            }
        }
        if (isset($_GET["done"])) {
            if ($_GET["done"] == "true") { ?>
                <script>
                    document.getElementById("email-number").style.display = "none";
                    document.getElementById("create-acount-form").style.display = "none"; 
                    document.getElementById("login-form").style.display = "none";
                    document.getElementById("done").style.display = "inline";
                </script>
                <?php
            }
        }
        if (isset($_GET["frgpass"])) {
            if ($_GET["frgpass"] == "true") { ?>
                <script>
                    document.getElementById("email-number").style.display = "none";
                    document.getElementById("create-acount-form").style.display = "none"; 
                    document.getElementById("login-form").style.display = "none";
                    document.getElementById("done").style.display = "none";
                    document.getElementById("forget-password").style.display = "inline";

                </script>
                <?php
            }
        }
        if (isset($_GET["newpass"])) {
            if ($_GET["newpass"] == "true") { ?>
                <script>
                    document.getElementById("email-number").style.display = "none";
                    document.getElementById("create-acount-form").style.display = "none"; 
                    document.getElementById("login-form").style.display = "none";
                    document.getElementById("done").style.display = "none";
                    document.getElementById("forget-password").style.display = "none";
                    document.getElementById("new-password").style.display = "inline";
                </script>
                <?php
            }
        }

        ?>
    </div>
    <script src="scripts/home.js"></script>
</body>

</html>