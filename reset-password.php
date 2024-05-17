<!-- reset-password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Add necessary meta tags and stylesheets -->
</head>
<body>
  <div class="container">
    <h1>Reset Password</h1>
    <form action="update-password.php" method="post">
      <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="input-field">
        <i class="material-icons prefix black-text">lock</i>
        <input type="password" name="new_password" id="new_password" class="">
        <label for="new_password">New Password</label>
      </div>
      <div class="input-field">
        <i class="material-icons prefix black-text">vpn_key</i>
        <input type="password" name="confirm_password" id="confirm_password" class="">
        <label for="confirm_password">Confirm Password</label>
      </div>
      <div class="center">
        <button type="submit" class="btn waves-effect waves-light">Update Password</button>
      </div>
    </form>
  </div>
</body>
</html>
