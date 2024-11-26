<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $email = $_POST['email'];
   $gender = $_POST['gender'];

   $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$gender')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: index.php?msg=New record created successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
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

   <title>Beautiful Form</title>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
   <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
      <h2 class="text-2xl font-bold text-center text-gray-700 mb-6">Add New User</h2>
      <p class="text-center text-gray-500 mb-6">Fill out the details below to create a new record</p>
      <form action="" method="post">
         <!-- First and Last Name -->
         <div class="flex flex-col md:flex-row md:space-x-4">
            <div class="mb-4 w-full">
               <label class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
               <input type="text" name="first_name" placeholder="Albert" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>
            <div class="mb-4 w-full">
               <label class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
               <input type="text" name="last_name" placeholder="Einstein" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>
         </div>

         <!-- Email -->
         <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" placeholder="name@example.com" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
         </div>

         <!-- Gender -->
         <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
            <div class="flex items-center space-x-4">
               <label class="flex items-center">
                  <input type="radio" name="gender" value="male" class="form-radio text-green-500 focus:ring-green-400">
                  <span class="ml-2 text-gray-700">Male</span>
               </label>
               <label class="flex items-center">
                  <input type="radio" name="gender" value="female" class="form-radio text-green-500 focus:ring-green-400">
                  <span class="ml-2 text-gray-700">Female</span>
               </label>
            </div>
         </div>

         <!-- Buttons -->
         <div class="flex justify-between">
            <button type="submit" name="submit" class="w-full md:w-auto bg-green-500 text-white px-6 py-2 rounded-lg shadow hover:bg-green-600 focus:ring-2 focus:ring-green-400 focus:outline-none">
               Save
            </button>
            <a href="index.php" class="w-full md:w-auto bg-red-500 text-white px-6 py-2 rounded-lg shadow hover:bg-red-600 focus:ring-2 focus:ring-red-400 focus:outline-none text-center">
               Cancel
            </a>
         </div>
      </form>
   </div>
</body>

</html>

