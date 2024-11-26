<?php
include "db_conn.php";
$id = $_GET["id"];

if (isset($_POST["submit"])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];

  $sql = "UPDATE `crud` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email',`gender`='$gender' WHERE id = $id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Trigger SweetAlert on success
    echo "<script>
       window.addEventListener('load', () => {
          Swal.fire({
             title: 'Success!',
             text: 'record updated successfully',
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
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- SweetAlert2 -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <title>PHP CRUD Application</title>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-lg p-6 bg-white rounded-lg shadow-lg">
    <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Edit User Information</h2>
    <p class="text-center text-gray-500 mb-6">Click update after changing any information</p>

    <?php
    $sql = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    ?>

    <form action="" method="post" class="space-y-6">
      <!-- First and Last Name -->
      <div class="flex flex-col md:flex-row md:space-x-4">
        <div class="w-full">
          <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
          <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
        </div>
        <div class="w-full">
          <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
          <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
        </div>
      </div>

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
        <input type="email" name="email" value="<?php echo $row['email'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
      </div>

      <!-- Gender -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
        <div class="flex items-center space-x-4">
          <label class="flex items-center">
            <input type="radio" name="gender" value="male" class="form-radio text-green-500 focus:ring-green-400" <?php echo ($row["gender"] == 'male') ? "checked" : ""; ?>>
            <span class="ml-2 text-gray-700">Male</span>
          </label>
          <label class="flex items-center">
            <input type="radio" name="gender" value="female" class="form-radio text-green-500 focus:ring-green-400" <?php echo ($row["gender"] == 'female') ? "checked" : ""; ?>>
            <span class="ml-2 text-gray-700">Female</span>
          </label>
        </div>
      </div>

      <!-- Buttons -->
      <div class="flex justify-end">
        <button type="submit" name="submit" class="bg-green-500 text-white px-6 py-2 rounded-lg shadow hover:bg-green-600 focus:ring-2 focus:ring-green-400 focus:outline-none">
          Update
        </button>
        <!-- <a href="index.php" class="bg-red-500 text-white px-6 py-2 rounded-lg shadow hover:bg-red-600 focus:ring-2 focus:ring-red-400 focus:outline-none text-center">
          Cancel
        </a> -->
      </div>
    </form>
  </div>
</body>

</html>
