<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    // Fetch user's files
    include "db_conn.php";
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM files WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $files = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Fetch user's labels
    $user_id = $_SESSION['id'];
    $sql2 = "SELECT id, label_name, color FROM labels WHERE user_id='$user_id'";
    $result2 = mysqli_query($conn, $sql2);
    $labels = mysqli_fetch_all($result2, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nimbus: Home</title>
    <link rel="icon" type="image/x-icon" href="img/tab.ico">
    <style>
      ::-webkit-scrollbar {
        width: 8px;
        height: 8px;
      }

      ::-webkit-scrollbar-track {
        background: #f7f9fc;
        transition: 0.15s;
      }

      ::-webkit-scrollbar-track:hover {
        background: #F1F1F150;
      }

      ::-webkit-scrollbar-thumb {
        background: #f7f9fc;
        transition: 0.15s;
      }

      ::-webkit-scrollbar-thumb:hover {
        background: #F1F1F1;
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
        overflow: auto;
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
        height: 587px;
        background: #ffffff;
        border-radius: 20px 0px 0px 0px;
        overflow: auto;
        position: relative;
      }

      .search {
        height: 40px;
        padding: 0px 20px;
        margin-right: 8px;
        width: 500px;
        border-radius: 20px;
        border-width: 1px;
        font-family: Montserrat, Arial;
        font-size: 1em;
        border-style: none;
        background-color: #edf2fc;
        transition: 0.15s;
      }

      .search:focus {
        outline: none;
        background-color: white;
        box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.1);
      }


      .fa-search {
        cursor: pointer;
        transition: 0.15s;
        font-size: 1.2em;
      }

      .fa-search:hover {
        color: rgb(184, 184, 184);
      }

      .files {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        margin: 20px;
        /* gap: 10px; */
        
      }

      .file {
        margin: 10px;
        height: 200px;
        background-color: #f7f9fc;
        border-radius: 20px;
        position: relative;
        cursor: pointer;
        transition: 0.15s;
      }

      .file:hover {
        background-color: #e1e5ea;
      }

      .filenamecont {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 30px;
        border-radius: 0px 0px 20px 20px;
        display: flex;
        justify-content: left;
        align-items: center;
        padding: 10px 20px;
        cursor: pointer;
        overflow: hidden;

      }

      .filename {
        margin: 0;
        font-family: Montserrat, Arial;
        font-size: 0.9em;
        font-weight: 500;
        cursor: pointer;
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }


      .iconcont {
        position: absolute;
        top: 13px;
        left: 50%;
        transform: translateX(-50%);
        width: 290px;
        height: 140px;
        background-color: white;
        border-radius: 20px;
        margin: 0;
        cursor: pointer;
      }

      .pdficon {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        height: 50px;
        width: auto;
        cursor: pointer;
      }

      .filetabname {
        margin-top: 30px;
        margin-left: 30px;
        margin-bottom: -10px;
      }

      .tabname {
        margin: 0;
        font-family: Montserrat, Arial;
      }

      .usericon {
        height: 40px;
        border-radius: 20px;
        width: 40px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 20px;
        cursor: pointer;
        transition: 0.15s;
      }

      .usericon:hover {
        opacity: 0.5;
      }

      .labels {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        margin: 20px;
        /* gap: 10px; */
      }

      .label {
        margin: 10px;
        height: 185px;
        border-radius: 20px;
        position: relative;
        cursor: pointer;
        transition: 0.15s;
      }

      .label:hover {
        font-size: 1.1em;
      }

      .foldericon {
        position: absolute;
        top:0;
        left: 50%;
        transform: translateX(-50%);
        width: 150px;
        height: 150px;
        cursor: pointer;
      }

      .foldernamecont {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 20px;
        border-radius: 0px 0px 20px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px 30px;
        cursor: pointer;
        
      }

      .foldername {

        margin: 0;
        margin-bottom: 10px;
        font-family: Montserrat, Arial;
        font-size: 0.9em;
        font-weight: 500;
        cursor: pointer;
      }
      .modal {
        display: none;
        position: absolute;
        z-index: 1000;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.4);
      }

      .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        padding: 20px;
        background-color: #fefefe;
        border-radius: 20px;
        width: 350px;
        box-shadow: 2px 4px 8px rgba(0,0,0,0.15);
      }

      .createHead {
        
        margin: 0px 0px 15px 0px;
        padding: 0;
        font-weight: 700;
        font-family: Montserrat, Arial;
      }


      .inputFolder {
        width: 330px;
        padding: 10px;
        font-family: Montserrat, Arial; 
        font-size: 1em;
        background-color: #edf2fc;
        border: solid 0.5px transparent;
        border-radius: 10px;
        height: 20px;
        transition: 0.15s;
      }

      .inputFolder:focus {
        outline: none;
        background-color: white;
        border: solid 0.5px #1e64d4;
      }

      .formCont {
        display: flex;
        margin-top: 10px;
        margin-bottom: -8px;
        justify-content:right;
        align-items: center;
      }

      .buttonCreate {
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

      .close {
        margin-right: 20px;
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

      .buttonCreate:hover,.close:hover {
        opacity: 0.5;
      }

      #custom-menu {
        display: none;
        position: absolute;
        background-color: white;
        border-radius: 20px;
        box-shadow: 2px 4px 8px rgba(0,0,0,0.15);
        padding: 15px;
      }
      #custom-menu-label {
        display: none;
        position: absolute;
        background-color: white;
        border-radius: 20px;
        box-shadow: 2px 4px 8px rgba(0,0,0,0.15);
        padding: 15px;
      }
      .menu-item {
        font-family: Montserrat, Arial;
        padding: 10px;
        font-size: 1em;
        cursor: pointer;
        transition: 0.15s;
      }

      .unnecessary {
        display:none;
      }
      .menu-item:hover {
        color: #6C757D;
      }

      .file-link{
        color: black;
      }

      .nofilescont {
        position: absolute;
        top:50%;
        left: 50%;
        transform: translate(-50%,-50%);
        display: flex;

      }

      .nofilesimg {
        height: 50px;
        width: 50px;
        margin-right: 10px;
      }

      .nofiles {
        font-family: Montserrat, Arial;
        text-align: center;
      }

      .inputColor {
        padding: 0px 1px;
        position: absolute;
        height: 20px;
        width: 20px;
        border-style: none;
        top: 75px;
        right: 30px;
      }

      .checkboxes {
        height: 1.3em;
        width: 1.3em;
        margin-right: 10px;
        cursor: pointer;
      }

      .checkboxesfont {
        font-family: Montserrat, Arial;
      }

      .forblocks{
        display: flex;
        justify-content: left;
        align-items: center;
        margin: 10px;
      }

      .extra {
        margin-left: 290px;
        margin-bottom: -20px;
      }

      #share-link{
        font-family: Montserrat, Arial;
        text-align: center;
      }

      .sharinglabel {
        font-family: Montserrat, Arial;
        font-weight: 600;
        margin-right: 3px;
      }

      .sharingbox {
        font-size: 1.5em;
      }

      .forblockss {
        display: flex;
        align-items: center;
      }

      .adjustments {
        margin-bottom:-10px;
      }

      .pangflex {
        display: flex;
        justify-content: right;
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
              <li class="tab">
                <form id="upload-form" action="upload.php" method="post" enctype="multipart/form-data">
                    <label for="pdfFile" class="tab-link" style="cursor:pointer;"><i class="fa fa-file-upload"></i> Upload PDF File</label>
                    <input type="file" name="pdfFile" id="pdfFile" accept=".pdf" style="display:none;">
                </form>
              </li>
              <li class="tab"><a href="#" class="tab-link create-label-btn"><i class="fa fa-folder-plus"></i> Create New Label</a></li>
              <hr>
              <li class="tab"><a href="main.php" class="tab-link"><i class="fa fa-folder"></i> All Files</a></li>
              <!-- displaying labels -->
              <?php foreach ($labels as $label): ?>
                  <li class="tab" 
                      data-label-id="<?php echo $label['id']; ?>" 
                      oncontextmenu="return showCustomMenu1(event);">
                      <a href="#" 
                         class="tab-link">
                         <i class="fa fa-tag" 
                            style="color: <?php echo htmlspecialchars($label['color']); ?>;">
                         </i>
                         <?php echo htmlspecialchars($label['label_name']); ?>
                      </a>
                  </li>
              <?php endforeach; ?>

              <hr>
              <li class="tab"><a href="accsettings.php" class="tab-link"><i class="fa fa-cog"></i> Account Settings</a></li>
              
              <li class="tab"><a href="logout.php" class="tab-link"><i class="fa fa-sign-out-alt"></i> Sign Out</a></li>
          </ul>
        </div>

        <!-- Create Label Modal -->
        <div id="create-label-modal" class="modal">
            <div class="modal-content">
              <h2 class="createHead">Create New Label</h2>
              <form action="create_label.php" method="post" class="createForm">
                <input type="text" id="label-name" name="label_name" required class="inputFolder">
                <input type="color" id="label-color" name="label_color" value="#000000" class="inputColor">
                <div class="formCont">
                    <button class="close">Close</button>
                    <input type="submit" value="Create" class="buttonCreate">
                </div>
              </form>
            </div>
        </div>
        <div id="right-column">
          <div class="navi">
            <form>
                <input class="search" type="text" id="search-input" placeholder="Search...">
                <i class="fas fa-search" onclick="filterFiles()"></i>
            </form>
            <!-- Issue: di bilog yung picture -->
            <a href="accsettings.php"><img src="<?php echo isset($_SESSION['profile_picture']) && $_SESSION['profile_picture'] != NULL ? 'uploads/profile_pics/' . $_SESSION['profile_picture'] : 'img/user.png'; ?>" alt="Profile Picture" class="usericon"></a>
          </div>
          <div class="main">
            <div class="allfiles">
              <div class="filetabname">
                <h2 id="tabname" class="tabname">All Files</h2>
              </div>
              <div class="files" id="file-list" data-file-id="123">
                  <!-- displaying files -->
                  <?php if (empty($files)): ?>
                    <div class="nofilescont">
                      <img src="img/prohibited.png" alt="" class="nofilesimg">
                      <p class="nofiles">No files yet</p>
                    </div>
                  <?php else: ?>
                      <?php foreach ($files as $file): ?> 
                          <div class="file <?php
                              $file_id = $file['id'];
                              $sql = "SELECT label_id FROM file_labels WHERE file_id='$file_id'";
                              $result = mysqli_query($conn, $sql);
                              while ($row = mysqli_fetch_assoc($result)) {
                                  echo "label-" . $row['label_id'] . " ";
                              }
                          ?>" data-file-id="<?php echo $file['id']; ?>" data-file-name="<?php echo $file['file_name']; ?>" oncontextmenu="return showCustomMenu(event);">
                              <a href="view-pdf.php?id=<?php echo $file['id']; ?>" class="file-link" target="_blank">
                                  <div class="iconcont">
                                      <img src="img/pdf.png" alt="pdficon" class="pdficon">
                                  </div>
                                  <div class="filenamecont">
                                      <p class="filename"><?php echo htmlspecialchars($file['file_name']); ?></p>
                                  </div>
                              </a>
                          </div>
                      <?php endforeach; ?>
                  <?php endif; ?>
              </div>

            </div>
          </div>
        </div>
    </div>
    <!-- Custom Menu (Right Click) Modal  -->
    <div id="custom-menu">
      <div class="menu-item"><i class="fa fa-plus"></i> Add to label</div>
      <div class="menu-item"><i class="fa fa-download"></i> Download</div>
      <div class="menu-item" style="display:none;"><i class="fa fa-eye"></i> Preview</div></a>
      <div class="menu-item" style="display:none;"><i class="fa fa-info-circle"></i> View Details</div>
      <div class="menu-item"><i class="fa fa-edit"></i> Rename File</div>
      <div class="menu-item"><i class="fa fa-trash"></i> Delete PDF</div>
      <div class="menu-item"><i class="fa fa-link"></i> Share Link</div>
    </div>
    <div id="custom-menu-label">
      <div class="menu-item unnecessary"><i class="fa fa-edit"></i> Rename Label</div>
      <div class="menu-item"><i class="fa fa-edit"></i> Rename Label</div>
      <div class="menu-item"><i class="fa fa-trash"></i> Delete Label</div>
    </div>
    <!-- Add to Label Modal  -->
    <div id="add-to-label-modal" class="modal">
        <div class="modal-content">
            <h2 class="createHead">Add to Label</h2>
            <form id="add-to-label-form">
                <?php foreach ($labels as $label): ?>
                    <div class="forblocks">
                      <input type="checkbox" id="label-<?php echo $label['id']; ?>" name="label-<?php echo $label['id']; ?>" class="checkboxes">
                      <label class="checkboxesfont" for="label-<?php echo $label['id']; ?>"><?php echo htmlspecialchars($label['label_name']); ?></label>
                    </div>
                <?php endforeach; ?>
                <button type="button" id="add-to-label-submit" class="buttonCreate extra">Done</button>
            </form>
        </div>
    </div>
    <!-- Rename File Modal -->
    <div id="rename-file-modal" class="modal">
      <div class="modal-content">
        <h2 class="createHead">Rename File</h2>
        <form id="rename-file-form">
          <!-- <label for="new-file-name">New Name:</label> -->
          <input type="text" id="new-file-name" placeholder="Enter File Name" name="new_file_name" class="inputFolder" required>
          <div class="formCont">
            <button class="close">Cancel</button>
            <input type="submit" value="Rename" class="buttonCreate">
          </div>
        </form>
      </div>
    </div>
    <!-- Rename Label Modal  -->
    <div id="rename-label-modal" class="modal">
        <div class="modal-content">
            <h2 class="createHead">Rename Label</h2>
            <form id="rename-label-form">
                <input type="text" placeholder="Enter Label" id="new-label-name" name="new_label_name" class="inputFolder" required>
                <div class="formCont">
                  <button class="close">Cancel</button>
                  <input type="submit" value="Rename" class="buttonCreate">
                </div>
              
            </form>
        </div>
    </div>
    <!-- Sharelink Modal -->
    <div id="share-link-modal" class="modal">
      <div class="modal-content">
          <h2 class="createHead">Share Link</h2>
          <p id="share-link"></p>
          <div class="forblockss">
            <label class="sharinglabel" for="allow-sharing">Allow sharing:</label>
            <input class="sharingbox" type="checkbox" id="allow-sharing">
          </div>
          <div class="pangflex">
            <button class="close adjustments">Close</button>
          </div>
      </div>
    </div>

<script>
    function showCustomMenu(event) {
        event.preventDefault();
        var menu = document.getElementById("custom-menu");

        // Get the selected file's ID from the file element's data-file-id attribute
        var fileId = event.currentTarget.getAttribute("data-file-id");
        menu.setAttribute("data-selected-file-id", fileId);
        menu.style.display = "block";
        menu.style.left = event.pageX + "px";
        menu.style.top = event.pageY + "px";
        document.onclick = hideCustomMenu;
        return false;
    }


    function hideCustomMenu() {
      var menu = document.getElementById("custom-menu");
      menu.style.display = "none";
      document.onclick = null;
    }
    
    // Custom Right Click Menu for Folder

    function showCustomMenu1(event) {
      event.preventDefault();
      var menu1 = document.getElementById("custom-menu-label");
      var fileId1 = event.currentTarget.getAttribute("data-label-id");
      menu1.setAttribute("data-selected-label-id", fileId1);
      menu1.style.display = "block";
      menu1.style.left = event.pageX + "px";
      menu1.style.top = event.pageY + "px";
      document.onclick = hideCustomMenu1;
      return false;
    }

    function hideCustomMenu1() {
      var menu1 = document.getElementById("custom-menu-label");
      menu1.style.display = "none";
      document.onclick = null;
    }

    document.getElementById('pdfFile').addEventListener('change', function() {
        document.getElementById('upload-form').submit();
        });
        // Get the modal
    var modal = document.getElementById("create-label-modal");

    // Get the button that opens the modal
    var btn = document.querySelector(".create-label-btn");

    // Get the <span> element that closes the modal
    var span = document.querySelector(".close");

    // When the user clicks on the button, open the modal
    btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
    // issue: pag nag sesearch habang nasa label, nasesearch pati yung ibang wala sa label
    // solution 1: pag mag sesearch, mapapalitan yung label name sa baba ng search bar to 'All Files'
    // solution 2: pag mag sesearch, dapat sa label lang
    function filterFiles() {
      // Get the search query entered by the user
      var searchQuery = document.getElementById("search-input").value.toLowerCase();

      // Get the list of files
      var fileList = document.getElementById("file-list");

      // Get all the files
      var files = fileList.getElementsByClassName("file");

      // Loop through all the files and hide the ones that don't match the search query
      for (var i = 0; i < files.length; i++) {
        var fileName = files[i].getElementsByClassName("filename")[0].textContent.toLowerCase();
        document.querySelector('#tabname').textContent = 'All Files';

        if (fileName.includes(searchQuery)) {
          files[i].style.display = "block";
        } else {
          files[i].style.display = "none";
        }
      }
    }
    // ADD TO LABEL FUNCTION
    document.querySelector("#custom-menu .menu-item:nth-child(1)").addEventListener("click", function() {
        // Get the selected file's ID from the custom menu's data attribute
        var selectedFileId = document.getElementById("custom-menu").getAttribute("data-selected-file-id");

        document.getElementById("add-to-label-modal").setAttribute("data-selected-file-id", selectedFileId);

        // Fetch the associated labels for the selected file
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "get_file_labels.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var associatedLabels = JSON.parse(xhr.responseText);

                // Update the checkboxes based on the associated labels
                var checkboxes = document.querySelectorAll("#add-to-label-form input[type='checkbox']");
                checkboxes.forEach(function(checkbox) {
                    var labelId = parseInt(checkbox.id.split("-")[1]);
                    checkbox.checked = associatedLabels.includes(labelId);
                });

                // Show the "Add to Label" modal
                document.getElementById("add-to-label-modal").style.display = "block";
                
            }
        };
        xhr.send("file_id=" + selectedFileId);
    });


    // DOWNLOAD FUNCTION
    document.querySelector("#custom-menu .menu-item:nth-child(2)").addEventListener("click", function() {
        // Get the selected file's ID and name from the custom menu's data attributes
        var selectedFileId = document.getElementById("custom-menu").getAttribute("data-selected-file-id");
        var selectedFileName = document.querySelector("[data-file-id='" + selectedFileId + "']").getAttribute("data-file-name");

        // Create a temporary link element and set its download attribute
        var link = document.createElement("a");
        link.download = selectedFileName;

        // Set the href attribute to the URL of the file download script with the selected file ID as a parameter
        link.href = "download.php?file_id=" + selectedFileId;

        // Add the link element to the document and simulate a click on it to trigger the download
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    });

    document.getElementById("add-to-label-submit").addEventListener("click", function() {
        // Get the selected file's ID from the modal's data attribute
        var selectedFileId = document.getElementById("add-to-label-modal").getAttribute("data-selected-file-id");

        // Collect the selected labels
        var selectedLabels = [];
        var checkboxes = document.querySelectorAll("#add-to-label-form input[type='checkbox']");
        checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                selectedLabels.push(checkbox.id.split("-")[1]);
            }
        });

        // Send an AJAX request to a PHP script to associate the selected labels with the file
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "add_labels_to_file.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Hide the modal and handle the response, e.g., show a success message
                console.log(xhr.responseText); // Add this line
                document.getElementById("add-to-label-modal").style.display = "none";
                location.reload()
            }
        };

        xhr.send("file_id=" + selectedFileId + "&labels=" + JSON.stringify(selectedLabels));
    });

    // RENAME FILE FUNCTION
    document.querySelector("#custom-menu .menu-item:nth-child(5)").addEventListener("click", function() {
        // Get the selected file's ID from the custom menu's data attribute
        var selectedFileId = document.getElementById("custom-menu").getAttribute("data-selected-file-id");

        // Show the "Rename File" modal
        var renameFileModal = document.getElementById("rename-file-modal");
        renameFileModal.style.display = "block";
        renameFileModal.setAttribute("data-file-id", selectedFileId);

        // Focus on the text input field
        var newFileNameInput = document.getElementById("new-file-name");
        newFileNameInput.focus();

        // Add an event listener for the Cancel button (newly added line)
        document.querySelector("#rename-file-modal .close").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent form submission
            var renameFileModal = document.getElementById("rename-file-modal");
            renameFileModal.style.display = "none";
        });
    });

    // When the user clicks the "Rename" button in the rename-file-modal
    document.getElementById("rename-file-form").addEventListener("submit", function(event) {
        event.preventDefault();

        // Get the ID of the file being renamed from the modal's data attribute
        var selectedFileId = document.getElementById("rename-file-modal").getAttribute("data-file-id");

        // Get the new name for the file from the form input
        var newFileName = document.getElementById("new-file-name").value;

        // Send an AJAX request to update the file's name in the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "rename_file.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Hide the modal and handle the response, e.g., show a success message
                console.log(xhr.responseText);

                // Update the file name on the webpage
                if (xhr.responseText === "success") {
                    document.querySelector('.file[data-file-id="' + selectedFileId + '"] .filename').textContent = newFileName;
                }

                document.getElementById("rename-file-modal").style.display = "none";
                location.reload()
            
            }
        };


        xhr.send("file_id=" + selectedFileId + "&new_file_name=" + encodeURIComponent(newFileName));
    });

    // DELETE FILE 
    document.querySelector("#custom-menu .menu-item:nth-child(6)").addEventListener("click", function() {
        // Get the selected file's ID from the custom menu's data attribute
        var selectedFileId = document.getElementById("custom-menu").getAttribute("data-selected-file-id");
        console.log(selectedFileId); // Log the value of selectedLabelId to the console
        // Ask the user to confirm the deletion
        var confirmed = confirm("Are you sure you want to delete this PDF file?");

        if (confirmed) {
            // Send an AJAX request to delete the file
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_file.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response, e.g., show a success message
                    console.log(xhr.responseText); // Add this line
                    location.reload(); // Reload the page
                }
            };

            xhr.send("file_id=" + selectedFileId);
        }
    });

    // DELETE LABEL
    document.querySelector("#custom-menu-label .menu-item:nth-child(3)").addEventListener("click", function() {
        // Get the selected label's ID from the custom menu's data attribute
        var selectedLabelId = document.getElementById("custom-menu-label").getAttribute("data-selected-label-id");

        console.log(selectedLabelId); // Log the value of selectedLabelId to the console

        // Ask the user to confirm the deletion
        var confirmed = confirm("Are you sure you want to delete this label?");

        if (confirmed) {
            // Send an AJAX request to delete the label
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete_label.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Handle the response, e.g., show a success message
                    console.log(xhr.responseText); // Add this line
                    location.reload(); // Reload the page
                }
            };

            xhr.send("label_id=" + selectedLabelId);
        }
    });

    
    // RENAME LABEL FUNCTION
    // issue: no color selector
    document.querySelector("#custom-menu-label .menu-item:nth-child(2)").addEventListener("click", function() {
        console.log("Rename clicked");
        // Get the selected label's ID from the custom menu's data attribute
        var selectedLabelId = document.getElementById("custom-menu-label").getAttribute("data-selected-label-id");

        // Show the "Rename Label" modal
        var renameLabelModal = document.getElementById("rename-label-modal");
        renameLabelModal.style.display = "block";
        renameLabelModal.setAttribute("data-label-id", selectedLabelId);

        // Focus on the text input field
        var newLabelNameInput = document.getElementById("new-label-name");
        newLabelNameInput.focus();
    });

    // When the user clicks the "Rename" button in the rename-label-modal
    document.getElementById("rename-label-form").addEventListener("submit", function(event) {
        console.log("Form submitted");
        event.preventDefault();

        // Get the ID of the label being renamed from the modal's data attribute
        var selectedLabelId = document.getElementById("rename-label-modal").getAttribute("data-label-id");

        // Get the new name for the label from the form input
        var newLabelName = document.getElementById("new-label-name").value;

        // Send an AJAX request to update the label's name in the database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "rename_label.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
              var response = JSON.parse(xhr.responseText);
              console.log(response.label_id);
              console.log(response.new_label_name);
              console.log(response.status);
              console.log(xhr.responseText);
              document.getElementById("rename-label-modal").style.display = "none";
              location.reload(); // Reload the page
            } else {
                console.log(xhr.responseText);
            }
        };


        xhr.send("label_id=" + encodeURIComponent(selectedLabelId) + "&new_label_name=" + encodeURIComponent(newLabelName));
    });
    // When the user clicks the close button in the rename-label-modal
    document.querySelector("#rename-label-modal .close").addEventListener("click", function() {
            // Clear the input field
            document.getElementById("new-label-name").value = "";

            document.getElementById("rename-label-modal").style.display = "none";
        });

    // FILTER USING LABELS
    document.querySelectorAll(".tab[data-label-id]").forEach(function(tab) {
        tab.addEventListener('click', function() {
            var labelName = tab.querySelector('.tab-link').textContent.trim();
            document.querySelector('#tabname').textContent = labelName;
        });
        tab.addEventListener("click", function() {
            // Get the selected label's ID from the tab's data attribute
            var selectedLabelId = tab.getAttribute("data-label-id");

            // Hide all files that are not associated with the selected label
            document.querySelectorAll(".file").forEach(function(file) {
                if (file.classList.contains("label-" + selectedLabelId)) {
                    file.style.display = "block";
                } else {
                    file.style.display = "none";
                }
            });

            // Update the "All Files" tab to show/hide files based on the selected label
            var allFilesTab = document.querySelector(".tab[data-label-id='all']");
            if (selectedLabelId !== "all") {
                allFilesTab.classList.add("hidden");
            } else {
                allFilesTab.classList.remove("hidden");
            }
        });
    });

    let initialSharingState;
    // SHARE LINK FUNCTION
    document.querySelector("#custom-menu .menu-item:nth-child(7)").addEventListener("click", function() {
        // Get the selected file's ID from the custom menu's data attribute
        var selectedFileId = document.getElementById("custom-menu").getAttribute("data-selected-file-id");

        // Show the Share Link modal
        var shareLinkModal = document.getElementById("share-link-modal");
        shareLinkModal.style.display = "block";

        // Set the share link
        var shareLink = document.getElementById("share-link");
        shareLink.textContent = "http://localhost/finals/view-pdf.php?id=" + selectedFileId;

        // Get the file's sharing status
        fetch('get_sharing_status.php?id=' + selectedFileId)
          .then(response => response.json())
          .then(data => {
              document.getElementById("allow-sharing").checked = data.is_public;
              initialSharingState = data.is_public; // Store the initial sharing state
          });
    });

    // Add an event listener for the Close button of the Share Link modal
    document.querySelector("#share-link-modal .close").addEventListener("click", function(event) {
        event.preventDefault();

        var allowSharingCheckbox = document.getElementById("allow-sharing");
        if (allowSharingCheckbox.checked !== initialSharingState) {
            // If the sharing state has changed, trigger the change event
            allowSharingCheckbox.dispatchEvent(new Event('change'));
        }

        var shareLinkModal = document.getElementById("share-link-modal");
        shareLinkModal.style.display = "none";
    });

    // Add an event listener for the Allow Sharing checkbox
    document.getElementById("allow-sharing").addEventListener("change", function(event) {
        var selectedFileId = document.getElementById("custom-menu").getAttribute("data-selected-file-id");
        var allowSharing = event.target.checked;
        fetch('update_sharing_status.php?id=' + selectedFileId + '&is_public=' + allowSharing);
    });

</script>

</body>
</html>

<?php 
}else{
     header("Location: login-page.php");
     exit();
}
 ?>