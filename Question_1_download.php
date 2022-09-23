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

// Downloads files
if (isset($_GET['file_ID'])) {
    $id = $_GET['file_ID'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE file_ID=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['file_Name'];
    $fileType = $file['file_Type'];

}
function checkDownload($memberType, $fileType){
  if($memberType=="member" && $fileType=="docx")
  {
    echo '<script>alert("Your download is starting...");
    window.location.href = "Question_1m.php";
    </script>';
  }
  else if($memberType=="nonmember" && $fileType=="docx")
  {
    echo '<script>alert("You are nonmember");
    window.location.href = "Question_1m.php";
    </script>';
  }
}

checkDownload($memberType, $fileType);

?>

<?php echo $fileType?>
