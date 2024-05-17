<!-- forgot-password.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Add necessary meta tags and stylesheets -->
</head>
<body>
  <div class="container">
    <h1>Forgot Password</h1>
    <form action="send-reset-code.php" method="post">
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>
      <div class="input-field">
        <i class="material-icons prefix black-text">email</i>
        <input type="email" name="email" id="email" class="">
        <label for="email">Email</label>
      </div>
      <div class="center">
        <button type="submit" class="btn waves-effect waves-light">Send Reset Code</button>
      </div>
    </form>
  </div>
</body>
</html>
