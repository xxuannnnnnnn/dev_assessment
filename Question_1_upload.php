<?php
session_start();
if (isset($_SESSION['email'], $_SESSION['role'])){
  $email = $_SESSION['email'];
  $memberType =   $_SESSION['role'];
}
include "conn.php";

$sql = "SELECT * FROM files";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Uploads files
if (isset($_POST['upload'])) {
    $filename = $_FILES['files']['name'];
    $target_dir = "uploads/". $filename;
    $target_file = $target_dir . basename($_FILES["files"]["name"]);
    $filetype = pathinfo($target_file, PATHINFO_EXTENSION);

    $file = $_FILES['files']['tmp_name'];
    $size = $_FILES['files']['size'];

    if (!in_array($filetype, ['txt', 'jpg', 'docx'])) {
        echo '<script>alert("Your file extension must be .txt, .jpg or .docx");
        window.location.href = "Question_1m.php";
        </script>';
    } elseif ($_FILES['files']['size'] > 5000000) {
        echo "File too large!";
    } else {
        if (move_uploaded_file($file, $target_dir)) {
            $sql = "INSERT INTO files (file_Name, file_Type, file_Size) VALUES ('$filename', '$filetype', $size);";
            if (mysqli_query($conn, $sql)) {
              echo '<script>alert("Files successfully uploaded!");
              window.location.href = "Question_1m.php";
              </script>';
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>
