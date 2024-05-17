<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimbus: Account Settings</title>
    <link rel="icon" type="image/x-icon" href="img/tab.ico">
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

      /* POPUPS */

      /* Pop CSS, animated using transform: scale */

      .popup {
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%) scale(0);
          height: auto;
          border: 1px solid white;
          border-radius: 20px;
          background-color: white;
          width: 500px;
          max-width: 80%;
          padding: 20px 20px;
          transition: 200ms ease-in-out;
          z-index: 100;
          box-shadow: 2px 4px 8px rgba(0,0,0,0.15);
      }

      .popup1 {
          position: fixed;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%) scale(0);
          height: auto;
          border: 1px solid white;
          border-radius: 20px;
          background-color: white;
          width: 500px;
          max-width: 80%;
          padding: 20px 20px;
          transition: 200ms ease-in-out;
          z-index: 100;
          box-shadow: 2px 4px 8px rgba(0,0,0,0.15);
      }

      .popup.active {
          transform: translate(-50%, -50%) scale(1);
      }

      .popup1.active {
          transform: translate(-50%, -50%) scale(1);
      }
      
      .nameHead, .passHead{
          color: black;
          font-family: Montserrat, sans-serif;
          font-size: 1.5em;
          margin: 0;
          text-align: center;
          font-weight: 700;
      }

      

      .nameCont, .passCont{
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .inputName, .OPass, .NPass, .RPass {
        margin-top: 15px;
        width: 95.3%;
        padding: 10px;
        font-family: Montserrat, Arial; 
        font-size: 1em;
        background-color: #edf2fc;
        border: solid 0.5px transparent;
        border-radius: 10px;
        height: 20px;
        transition: 0.15s;
      }

      .inputName:focus,.OPass:focus, .NPass:focus, .RPass:focus{
        outline: none;
        background-color: white;
        border: solid 0.5px #1e64d4;
      }

      .buttonName, .buttonClose {
        margin-top: -5px;
        margin-bottom: -10px;
        padding: 0;
        height: 40px;
        font-family: Montserrat, Arial;
        font-size: 1em;
        font-weight: 600;
        background: transparent;
        border: none;
        cursor: pointer;
        color: #1e64d4;
        transition: 0.15s;
      }

      .buttonName:hover, .buttonClose:hover {
        opacity: 0.5;
      }


      /* To darken background when pop up is active */

      #overlay {
          position: fixed;
          top: 0;
          bottom: 0;
          left: 0;
          right: 0;
          background-color: rgba(0, 0, 0, 0.5);
          opacity: 0;
          pointer-events: none;
          transition: 200ms ease-in-out;
      }

      #overlay.active {
          opacity: 100%;
          pointer-events: all;
      }

      .profilePicHead {
        margin: 0px 0px 15px 0px;
        padding: 0;
        font-weight: 700;
        font-family: Montserrat, Arial;
      }

    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
    <div id="container">
        <div id="left-column">
          <div class="forlogo">
            <a href="main.php"><img src="img/logo.png" alt="Nimbus Logo" class="logo"></a>
            <a style="color: black" href="main.php"><h1 class="logoname">Nimbus</h1></a>
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
                <img src="<?php echo isset($_SESSION['profile_picture']) && $_SESSION['profile_picture'] != NULL ? 'uploads/profile_pics/' . $_SESSION['profile_picture'] : 'img/user.png'; ?>" alt="Profile Picture" class="profilepicture">
            </div>
            <div class="userinfocont">
              <div class="userinfo">
                  <h2 class="name"><?php echo $_SESSION['name']; ?></h2>
                  <h3 class="email"><?php echo $_SESSION['email']; ?></h3>
              </div>
          </div>
            <div class="settings">
              <ul class="settingul">
                <li class="setting"><a href="#" class="tab-link" data-popup-target="#popup2"><i class="fa fa-image"></i> Edit Profile Picture</a></li>
                <hr>
                <li class="setting" data-popup-target="#popup"><a href="#" class="tab-link"><i class="fa fa-pen"></i> Change Full Name</a></li>
                <hr>
                <li class="setting" data-popup-target="#popup1"><a href="#" class="tab-link"><i class="fa fa-unlock"></i> Change Password</a></li>
              </ul>
            </div>


          </div>
        </div>
    </div>
    <!-- modal for changing name -->
    <div class="popup" id="popup">
      <h2 class="nameHead">Change Full Name</h2>
      <?php if (isset($_GET['error'])) { ?>
         <script>alert("<?php echo $_GET['error']; ?>")</script>
     	<?php } ?>
      <?php if (isset($_GET['success'])) { ?>
        <script>alert("<?php echo $_GET['success']; ?>")</script>
      <?php } ?>
      <form action="change-n.php" method="post" class="nameForm">
        <input type="text" name="fullname" required class="inputName">
        <div class="nameCont">
          <button class="buttonClose" data-close-button>Close</button>
          <input type="submit" value="Confirm" class="buttonName">
        </div>
      </form>
    </div>
    <!-- modal for change password -->
    <div class="popup1" id="popup1">
      <h2 class="passHead">Change Password</h2>
      <?php if (isset($_GET['error'])) { ?>
     	<?php } ?>
      <?php if (isset($_GET['success'])) { ?>
      <?php } ?>
      <form action="change-p.php" method="post" class="passForm">
        <input type="password" name="op" placeholder="Enter Old Password" name="inputOldPass" required class="OPass">
        <input type="password" name="np" placeholder="Enter New Password" name="inputNewPass" required class="NPass">
        <input type="password" name="c_np" placeholder="Confirm New Password" name="inputRePass" required class="RPass">
        <div class="passCont">
          <button class="buttonClose" data-close-button1>Close</button>
          <input type="submit" value="Confirm" class="buttonName">
        </div>
      </form>
    </div>
    <!-- modal for profile picture -->
    <div class="popup" id="popup2">
      <h2 class="profilePicHead">Edit Profile Picture</h2>
      <?php if (isset($_GET['error'])) { ?>

      <?php } ?>
      <?php if (isset($_GET['success'])) { ?>

      <?php } ?>
      <form action="change-profile-pic.php" method="post" enctype="multipart/form-data" class="profilePicForm">
      <input type="file" name="profile_picture" accept="image/jpeg,image/png,image/gif" required class="inputProfilePic">
        <div class="passCont">
          <button class="buttonClose" data-close-button>Close</button>
          <input type="submit" value="Confirm" class="buttonName">
        </div>
      </form>
    </div>

    <!-- Used as a tool to overlay -->

    <div id="overlay"></div>

    <script>

      // Popup for Changing Name

      const openModalButtons = document.querySelectorAll('[data-popup-target]')
      const closeModalButtons = document.querySelectorAll('[data-close-button]')
      const overlay = document.getElementById('overlay')

      openModalButtons.forEach(button => {
          button.addEventListener('click', () => {
              const popup = document.querySelector(button.dataset.popupTarget)
              openPopup(popup)
          })
      })

      overlay.addEventListener('click', () => {
          const popups = document.querySelectorAll('.popup.active')
          popups.forEach(popup => {
              closePopup(popup)
          })
      })

      closeModalButtons.forEach(button => {
          button.addEventListener('click', () => {
              const popup = button.closest('.popup')
              closePopup(popup)
          })
      })

      function openPopup(popup) {
          if (popup == null) return
          popup.classList.add('active')
          overlay.classList.add('active')
      }

      function closePopup(popup) {
          if (popup == null) return
          popup.classList.remove('active')
          overlay.classList.remove('active')
      }

      // Popup for Changing Password

      const openModalButtons1 = document.querySelectorAll('[data-popup-target1]')
      const closeModalButtons1 = document.querySelectorAll('[data-close-button1]')
      const overlay1 = document.getElementById('overlay')

      openModalButtons1.forEach(button => {
          button.addEventListener('click', () => {
              const popup1 = document.querySelector(button.dataset.popupTarget)
              openPopup(popup1)
          })
      })

      overlay1.addEventListener('click', () => {
          const popups = document.querySelectorAll('.popup1.active')
          popups.forEach(popup1 => {
              closePopup(popup1)
          })
      })

      closeModalButtons1.forEach(button => {
          button.addEventListener('click', () => {
              const popup1 = button.closest('.popup1')
              closePopup(popup1)
          })
      })

      function openPopup1(popup1) {
          if (popup1 == null) return
          popup1.classList.add('active')
          overlay1.classList.add('active')
      }

      function closePopup1(popup1) {
          if (popup1 == null) return
          popup1.classList.remove('active')
          overlay1.classList.remove('active')
      }
      // Popup for Editing Profile Picture
      const openModalButtons2 = document.querySelectorAll('[data-popup-target2]')
      const closeModalButtons2 = document.querySelectorAll('[data-close-button2]')
      const overlay2 = document.getElementById('overlay')

      openModalButtons2.forEach(button => {
          button.addEventListener('click', () => {
              const popup2 = document.querySelector(button.dataset.popupTarget)
              openPopup(popup2)
          })
      })

      overlay2.addEventListener('click', () => {
          const popups = document.querySelectorAll('.popup2.active')
          popups.forEach(popup2 => {
              closePopup(popup2)
          })
      })

      closeModalButtons2.forEach(button => {
          button.addEventListener('click', () => {
              const popup2 = button.closest('.popup2')
              closePopup(popup2)
          })
      })

      function openPopup2(popup2) {
          if (popup2 == null) return
          popup2.classList.add('active')
          overlay2.classList.add('active')
      }

      function closePopup2(popup2) {
          if (popup2 == null) return
          popup2.classList.remove('active')
          overlay2.classList.remove('active')
      }

    </script>
</body>
</html>

<?php
}else{
    header("Location: login-page.php");
    exit();
}
?>