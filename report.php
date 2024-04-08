<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="styles/styleadmin.css"></link>
       <link rel="shortcut icon" href="./images/logorbg.png" type="image/x-icon">
  <meta charset="UTF-8">
  <title>Download Report</title>
  <link rel="stylesheet" href="styles.css">
</head>
<style>


.container {
  text-align: center;
}

h1 {
  color: #333;
}

button {
  padding: 10px 20px;
  font-size: 16px;
  background-color: #a9130c;
  color: #fff;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #420906;}

</style>
<body>
<?php
            include "./adminHeader.php";
            include "./sidebar.php";
           
            include_once "./config/dbconnect.php";
        ?>

  <div class="container">
    <h1>Download Report</h1>
    <button id="downloadButton">Download Report</button>
  </div>
<script>
  document.getElementById('downloadButton').addEventListener('click', function() {
    // Send an AJAX request to fetch the database content
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'download_database.php', true);
    xhr.responseType = 'blob'; // Set the response type to Blob
  
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Create a blob with the response data
        var blob = new Blob([xhr.response], { type: 'application/octet-stream' });
  
        // Create a link element
        var downloadLink = document.createElement('a');
  
        // Set the download link href to the blob URL
        downloadLink.href = URL.createObjectURL(blob);
  
        // Set the download attribute to specify the file name
        downloadLink.download = 'database_backup.sql';
  
        // Append the link to the body
        document.body.appendChild(downloadLink);
  
        // Programmatically click the link to trigger the download
        downloadLink.click();
  
        // Remove the link from the body
        document.body.removeChild(downloadLink);
      }
    };
  
    xhr.send();
  });

  

</script>
  <script src="script.js"></script>
  <script src="javascripts/scriptadmin.js"></script>
    <script src="javascripts/ajaxWork.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
