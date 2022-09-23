<?php
session_start();
if (isset($_SESSION['email'], $_SESSION['role'])){
  $email = $_SESSION['email'];
  $role =   $_SESSION['role'];
}

include "conn.php";

  $sql = "SELECT * FROM files";
  $result = mysqli_query($conn, $sql);
  $files = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<html>
<head>
  <title>Upload and Download Files</title>
  <link rel="icon" href="download_icon.png" />

  <link rel="stylesheet" href="test.css"/>

</head>
<style>
body {
  background-repeat: no-repeat;
  /* height:100%; */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>

<form action="Question_1_upload.php" method="post" enctype="multipart/form-data" >
  <p>Upload and Download Files</p>
  <p>File Upload:</p>
    <input type="file" name="files" id="files" required="required"/>
    <p><button type="submit" name="upload">Upload</button></p>
</form>

<table>
<thead>
    <th>File ID</th>
    <th>File Name</th>
    <th>File Type</th>
    <th>File Size</th>
    <th>Download</th>
</thead>
<tbody>
  <?php foreach ($files as $row): ?>
    <tr>
      <td><?php echo $row['file_ID']; ?></td>
      <td><?php echo $row['file_Name']; ?></td>
      <td><?php echo $row['file_Type']; ?></td>
      <td><?php echo floor($row['file_Size'] / 1000) . ' KB'; ?></td>
      <td><a href="Question_1_download.php?file_ID=<?php echo $row['file_ID'] ?>">Download</a></td>
    </tr>
  <?php endforeach;?>

</tbody>
</table>
<?php echo $role?>

</body>
</html>
