<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nimbus: Login and Sign Up</title>
  <!-- font awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-image: url(img/logbg.jpg);
      background-size: cover;
    }

    section {
      padding: 0;
      margin: 0;
      
    }
    
    * {
      font-family: Montserrat, Arial;
    }

    .cont {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      height: auto;
      width: 45%;
      padding: 30px;
      box-shadow: 2px 4px 8px rgba(0,0,0,0.15);
      border-radius: 20px;
      background-color: white;

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
            border-radius: 15px;
            background-color: #ff980f;
            padding-left: 80px;
            padding-right: 80px;
            font-weight: 500;
        }

        .center {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 35px;
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

      .head {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px;
      }
      
      .nimlogo {
        height: 50px;
        width: auto;
        display: block;
        margin: 0 10px 0 0;
        padding: 0;
      }

      h1 {
        font-weight: 700;
        font-size: 2em;
        margin: 0;
        padding: 0;
      }

  </style>
</head>
<body>
  <div class="cont">
    <div class="head">
      <img src="img/logo.png" alt="Nimbus Logo" class="nimlogo">
      <h1>Nimbus</h1> 
    </div>

    <div class="adjust scrollspy" id="log-in">
      <div class="row">
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
                            <i class="material-icons prefix black-text">lock</i>
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
    </div>
  </div>
  

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    $( document ).ready(function(){
      $('.tabs').tabs();
    });
</script>
</body>
</html>