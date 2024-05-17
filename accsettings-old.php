<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimbus: Home</title>
    
  


    <style>

      ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
      }

      ::-webkit-scrollbar-track {
        background: #F1F1F1;
      }

      ::-webkit-scrollbar-thumb {
        background: #6C757D;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #343A40;
      }

      body {
        background-color: #f7f9fc;
        margin:0;
        padding: 0;
        overflow: hidden;
      }
      #left-column {
        background-color: #f7f9fc;
        width: 250px;
        flex: 0 0 auto;
        padding: 30px;
      }
      #right-column {
        background-color: #f7f9fc;
        flex: 1 1 auto;
      }
      /* Define the layout */
      #container {
        display: flex;
        flex-direction: row;
        height: 100vh;
      }
      .navi{
        background-color: #f7f9fc;
        width: 1056px;
        height: 80px;
        position: relative;
        line-height: 80px;
      }

      ul {
        list-style-type: none;
      }

      .tabs {
        padding: 0;
        margin: 0;
      }

      a {
        text-decoration: none;
      }

      .tab {
        margin:25px 0px;
      }
      
      .logoname {
        font-family: Montserrat, Arial;
      }

      .tab-link{
        color: black;
        transition: 0.15s;
        font-family: Montserrat, Arial;
      }

      .tab-link:hover {
        color: rgb(184, 184, 184);
      }

      .logo{
        width: auto;
        height: 40px;
        margin-right: 10px;
          
      }
      .forlogo{
        height: 50px;
        display: flex;
        justify-content: left;
        align-items: center ;
      }

      .fa {
        margin-right: 10px;
        font-size: 1.1em;
      }

      .main {
        width: 1fr;
        height: 100%;
        background: #ffffff;
        overflow: auto;
        position: relative;
        padding: 40px;
      }

      .head {
        margin: 0;
        padding: 0;
        font-size: 2em;
        font-family: Montserrat, Arial;
        font-weight: 700;
      }

      .profilepicture {
        width: 240px;
        height: 240px;
        border-radius: 120px;
        background-color: gray;
        margin-top: 20px;
      }

      .userinfocont {
        display:flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
      }
      
      .userinfo {
        text-align: center;
      }
      

      .name {
        font-family: Montserrat, Arial;
        font-size: 2em;
        font-weight: 600;
        margin: 0px 0px 5px 0px;
      }
      .email {
        font-family: Montserrat, Arial;
        margin: 0;
        font-size: 1em;
        font-weight: 400;
      }

      .settings {
        margin-top: 50px;
        width: 100%;
      }

      .settingul {
        margin: 0;
        padding: 0;
      }

      .setting {
        margin: 20px 0px;
      }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <div id="container">
        <div id="left-column">
          <div class="forlogo">
            <img src="img/logo.png" alt="Nimbus Logo" class="logo">
            <h1 class="logoname">Nimbus</h1>
          </div>
          <ul class="tabs">
            <li class="tab"><a href="main.php" class="tab-link"><i class="fa fa-folder"></i> My Files</a></li>
            <li class="tab"><a href="accsettings.php" class="tab-link"><i class="fa fa-cog"></i> Account Settings</a></li>
            <hr>
            <li class="tab"><a href="logout.php" class="tab-link"><i class="fa fa-sign-out-alt"></i> Sign Out</a></li>
          </ul>
        </div>
          
        <div id="right-column">
          <div class="main">
            <h1 class="head">Account Settings</h1>
            <div class="userinfocont">
                <img src="img/user.png" alt="Profile Picture" class="profilepicture">
            </div>
            <div class="userinfocont">
              <div class="userinfo">
                  <h2 class="name">Sample Full Name</h2>
                  <h3 class="email">sampleemail@gmail.com</h3>
              </div>
          </div>
            <div class="settings">
              <ul class="settingul">
                <li class="setting"><a href="#" class="tab-link"><i class="fa fa-image"></i> Edit Profile Picture</a></li>
                <hr>
                <li class="setting"><a href="#" class="tab-link"><i class="fa fa-pen"></i> Change Full Name</a></li>
                <hr>
                <li class="setting"><a href="#" class="tab-link"><i class="fa fa-unlock"></i> Change Password</a></li>
              </ul>
            </div>


          </div>
        </div>
    </div>

</body>
</html>