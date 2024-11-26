<?php
include "db_conn.php";
$id = $_GET["id"];
$sql = "DELETE FROM `crud` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  // Trigger SweetAlert on success
  echo "<script>
     window.addEventListener('load', () => {
        Swal.fire({
           title: 'Success!',
           text: 'record deleted successfully',
           icon: 'success',
           confirmButtonText: 'OK'
        }).then(() => {
           window.location = 'index.php'; // Redirect to index.php after alert
        });
     });
  </script>";
} else {
  // Trigger SweetAlert on error
  echo "<script>
     window.addEventListener('load', () => {
        Swal.fire({
           title: 'Error!',
           text: '" . mysqli_error($conn) . "',
           icon: 'error',
           confirmButtonText: 'OK'
        });
     });
  </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!-- SweetAlert2 -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

</body>

</html>