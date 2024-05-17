<?php
session_start();
include "db_conn.php";
$user_id = $_SESSION['id'];
$sql = "SELECT * FROM label WHERE user_id='$user_id'";
$result = mysqli_query($conn, $sql);
?>

<div class="filetabname">
  <h2 class="tabname">My Labels</h2>
</div>

<div class="labels">
  <?php
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
  ?>
      <a href="view_label.php?id=<?php echo $row['id']; ?>" class="label">
        <img src="img/folder.png" alt="foldericon" class="foldericon">
        <div class="foldernamecont">
          <p class="foldername"><?php echo $row['label_name']; ?></p>
        </div>
      </a>

  <?php
    }
  } else {
  ?>
    <p>You don't have any labels yet.</p>
  <?php
  }
  ?>
</div>
