<!-- verify-code.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Add necessary meta tags and stylesheets -->
</head>
<body>
  <div class="container">
    <h1>Verify Code</h1>
    <form action="check-reset-code.php" method="post">
      <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="input-field">
        <i class="material-icons prefix black-text">vpn_key</i>
        <input type="text" name="code" id="code" class="">
        <label for="code">Verification Code</label>
      </div>
      <div class="center">
        <button type="submit" class="btn waves-effect waves-light">Verify</button>
      </div>
    </form>
  </div>
</body>
</html>
