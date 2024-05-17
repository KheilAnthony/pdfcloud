<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])){
    header("Location: main.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimbus: Store, organize, and access your PDFs anyhere.</title>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
    <link rel="icon" type="image/x-icon" href="img/tab.ico">
    <style>
        body {
            margin: 0;
            font-family: Montserrat;
            background-color: white;
        }

        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-left: 50px;
            padding-right: 50px;
            padding-top: 30px;
            padding-bottom: 30px;
            background-color: white;
            /* box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3); */
        }

        .navbar-logo {
            font-weight: bold;
            font-size: 28px;
            margin-top: 5px;
            margin-left: 0px;
            margin-bottom: 0px;
            margin-right: 0px;
        }

        .navbar-login {
            height: auto;
            background-color: #049beb;
            color: white;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            cursor: pointer;
            padding-left: 30px;
            padding-right: 30px;
            padding-top: 12px;
            padding-bottom: 12px;
            font-family: Montserrat;
            font-weight: 600;
            transition: 0.15s;
        }

        .navbar-login:hover {
            opacity: 0.5;
        }


        .logo {
            height: 40px;
            margin-right: 10px;
            display: flex;
            justify-content: center;
            vertical-align: center;
        }

        .logoSide {
            display: flex;
            justify-content: center;
            vertical-align: center  ;
        }

        .slogan {
            margin-top: 145px;
            font-weight: 700;
            font-size: 60px;
            margin-bottom: 70px;
            white-space: pre-line;
            line-height: 1.2;
            position: relative; /* Add this line to enable absolute positioning of child elements */
            animation-name: slideInFromTop;
            animation-duration: 2.5s;
            animation-delay: 0.2s;
            animation-fill-mode: both;
            z-index: 100;
        }


        .pdfs {
            background: linear-gradient(to right, #f06d06, #f89b06);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }


        .description {
            font-size: 20px;
            white-space: pre-line;
            line-height: 1.2;
            margin-bottom: 150px;
        }

        .subtitle {
            font-weight: 700;
            font-size: 2.3em;
            margin-bottom: 30px;
        }

        p {
            font-weight: 400;
            font-size: 1.3em;
        }

        .adjust {
            position: relative;
            margin-left: 100px;
            margin-right: 100px;
            margin-top: 50px;
            margin-bottom: 50px;
            z-index: 99;
        }

        .fix{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .first {
            position: relative;
        }

        #login-section {
            font-weight: 700;
            color: #ff980f;
            margin-bottom: 0px;
        }
        #tab {
            font-weight: 600;
        }
        .tabs .indicator {
            background-color: #ff980f;
        }
        .tabs .tab a:focus, .tabs .tab a:focus.active{
            background: transparent;
        }
        #login-button, #signup-button {
            border-radius: 20px;
            background-color: #ff980f;
            padding-left: 30px;
            padding-right: 30px;
        }


        input:not([type]):focus:not([readonly]) + label,
        input[type="text"]:not(.browser-default):focus:not([readonly]) + label,
        input[type="password"]:not(.browser-default):focus:not([readonly])
        + label,
        input[type="email"]:not(.browser-default):focus:not([readonly]) + label,
        input[type="url"]:not(.browser-default):focus:not([readonly]) + label,
        input[type="time"]:not(.browser-default):focus:not([readonly]) + label,
        input[type="date"]:not(.browser-default):focus:not([readonly]) + label,
        input[type="datetime"]:not(.browser-default):focus:not([readonly])
        + label,
        input[type="datetime-local"]:not(.browser-default):focus:not([readonly])
        + label,
        input[type="tel"]:not(.browser-default):focus:not([readonly]) + label,
        input[type="number"]:not(.browser-default):focus:not([readonly]) + label,
        input[type="search"]:not(.browser-default):focus:not([readonly]) + label,
        textarea.materialize-textarea:focus:not([readonly]) + label {
        color: #ff980f;
        }

        .page-footer {
        background-color: rgb(14, 14, 14) ;
        padding-bottom: 20px;
        }



        @keyframes slideInFromTop {
            0% {
            opacity: 0;
            transform: translateY(-50%);
            }
            100% {
            opacity: 1;
            transform: translateY(0%);
            }
        }

        @media only screen and (max-width: 600px) {
            .slogan {
            font-size: 40px;
            margin-top: 50px;
            margin-bottom: 50px;
            }

            .navbar {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding-left: 30px;
                padding-right: 30px;
                padding-top: 30px;
                padding-bottom: 30px;
                background-color: white;
                /* box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3); */
            }

            .description {
                font-size: 18px;
                white-space: pre-line;
                line-height: 1.2;
                margin-bottom: 30px;
            }
            
            .fix {
                display: block;
            }

            .adjust {
                position: relative;
                margin-left: 50px;
                margin-right: 50px;
                z-index: 99;
            }
        }
        
        @media only screen and (min-width: 601px) and (max-width: 992px) {
            .slogan {
            font-size: 50px;
            margin-top: 75px;
            margin-bottom: 55px;
            }

            .description {
                margin-bottom: 30px;
            }

            .fix {
                display: block;
            }

            .adjust {
                position: relative;
                margin-left: 50px;
                margin-right: 50px;
                z-index: 99;
            }
        }
        
        
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logoSide">
        <img src="img/nim.jpg" alt="NimbusLogo" class="logo">
		<h1 class="navbar-logo">Nimbus</h1>
        </div>
		<a class="navbar-login waves-effect" href="#log-in" >Get Started</a>
	</div>
    <div>
        <div class="container center-align first">
            <h1 class="slogan center-align">Store, organize, and access your <span class="pdfs">PDFs</span> anywhere</h1>
            <h2 class="description center-align">A secure and efficient way to store, manage,
            and access your PDF files in the cloud.</h2>
        </div>
    </div>

    <div class="section adjust">
        <div class="row fix">
            <div class="col s12 l5 margined" data-aos="fade-right">
                    <h3 class="subtitle">Store and access your PDFs with ease</h3>
                    <p class="caption">Simplify your process of managing and accessing PDF files, making it easier for you to stay organized and productive.</p>
            </div>
            <div class="col s12 l7 margined" data-aos="">
                <img src="img/6.png" alt="" class="responsive-img">
            </div>
        </div>
    </div>
    <div class="section adjust">
        <div class="row fix">
            <div class="col s12 l7 margined hide-on-med-and-down" data-aos="">
                <img src="img/5.png" alt="" class="responsive-img">
            </div>
            <div class="col s12 l5 margined hide-on-med-and-down " data-aos="fade-left">
                    <h3 class="subtitle">Keep your PDFs organized and accessible from anywhere</h3>
                    <p class="caption">Designed to make it easy for you to help you keep your PDFs in order and easy to find, which can save you time and hassle when searching for a specific file from any devices and make it more convenient to manage your documents.</p>
            </div>

            <div class="col s12 l5 margined hide-on-large-only" data-aos="fade-right">
                    <h3 class="subtitle">Keep your PDFs organized and accessible from anywhere</h3>
                    <p class="caption">Designed to make it easy for you to help you keep your PDFs in order and easy to find, which can save you time and hassle when searching for a specific file from any devices and make it more convenient to manage your documents.</p>
            </div>
            <div class="col s12 l7 margined hide-on-large-only" data-aos="">
                <img src="img/5.png" alt="" class="responsive-img">
            </div>

        </div>
    </div>
    <div class="section adjust">
        <div class="row fix">
            <div class="col s12 l5 margined" data-aos="fade-right" >
                    <h3 class="subtitle">Simplify your PDF management with our easy-to-use platform</h3>
                    <p class="caption">Easily manage your PDF files with an intuitive and user-friendly platform, making it simple to stay organized and productive when working with your documents.</p>
            </div>
            <div class="col s12 l7 margined">
            <img src="img/4.png" alt="" class="responsive-img" data-aos="">
            </div>
        </div>
    </div>

    <section class="adjust section scrollspy" id="log-in">
        <div class="row">
            <div class="col s12 l4">
                <h2 id="login-section">Join Nimbus</h2>
                <p class="">Logging in only takes a few seconds. This will allow you to store and manage your PDF Files up in the clouds. </p>
            </div>
            <div class="col s12 l6 offset-l2">
                <ul class="tabs">
                    <li class="tab col s6">
                        <a href="#login" class="black-text" id="tab">Log In</a>
                    </li>
                    <li class="tab col s6">
                        <a href="#signup" class="black-text" id="tab">Sign Up</a>
                    </li>
                </ul>
                <div class="col s12 section" id="login">
                    <form action="login.php" method="post">
                        <br>
                        <?php if (isset($_GET['error'])) { ?>
                        <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>
                        <div class="input-field">
                        <i class="material-icons prefix black-text">email</i>
                        <input type="email" name="email" id="email" class="">
                        <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                        <i class="material-icons prefix black-text">lock</i>
                        <input type="password" name="password" id="password" class="">
                        <label for="password">Password</label>
                        </div>
                        <div class="right">
                        <button type="submit" class="btn waves-effect waves-light" id="login-button">Login</button>
                        </div>
                    </form>
                </div>
                <div class="col s12 section" id="signup">
                    <form action="signup-check.php" method="post">
                        <br>
                        <?php if (isset($_GET['error'])) { ?>
                            <p class="error"><?php echo $_GET['error']; ?></p>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <p class="success"><?php echo $_GET['success']; ?></p>
                        <?php } ?>
                        
                        <div class="input-field">
                            
                            <i class="material-icons prefix black-text">person</i>
                            <?php if (isset($_GET['name'])) { ?>
                                <input type="text" id="name" name="name" value="<?php echo $_GET['name']; ?>">
                            <?php }else{ ?>
                                <input type="text" id="name" name="name"><br>
                            <?php }?>
                            <label for="name">Full Name</label>
                            
                        </div>
                        <div class="input-field">
                            
                            <i class="material-icons prefix black-text">email</i>
                            <?php if (isset($_GET['email'])) { ?>
                                <input type="email" id="signup-email" name="email" value="<?php echo $_GET['email']; ?>">
                            <?php }else{ ?>
                                <input type="email" id="signup-email" name="email">
                            <?php }?>   
                            <label for="email">Email</label>     
                            
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix black-text">lock</i>
                            <input type="password" name="password" id="signup-password" class="">
                            <label for="password">Password</label>
                        </div>
                        <div class="input-field">
                            <i class="material-icons prefix black-text">vpn_key</i>
                            <input type="password" name="repassword" id="repassword" class="">
                            <label for="repassword">Re-Password</label>
                        </div>
                        <div class="right">
                            <button class="btn waves-effect waves-light" id="signup-button" type="submit">Sign Up</a>
                        </div>
                    </form>                    
                </div>
            </div>
        </div>
    </section>
    <footer class="page-footer center-align">
                Copyright &copy; Nimbus. All Rights Reserved.
    </footer>
    
    
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        $( document ).ready(function(){
          $('.tabs').tabs();
          $('.scrollspy').scrollSpy({
            scrollOffset: 0
          });
        });
    </script>
    <script>AOS.init();</script>
    
</body>
</html>