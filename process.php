<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve and sanitize form data

    $firstName = htmlspecialchars($_POST['first-name']);

    $lastName = htmlspecialchars($_POST['last-name']);

    $mobileNumber = htmlspecialchars($_POST['mobile-number']);

    $email = htmlspecialchars($_POST['email']);

    

    $password = htmlspecialchars($_POST['password']);

    $dob = htmlspecialchars($_POST['dob']);



    // Handle file upload

    if (isset($_FILES['profile-pic']) && $_FILES['profile-pic']['error'] == 0) {

        $targetDirectory = "uploads/";

        $fileName = basename($_FILES['profile-pic']['name']);

        $targetFilePath = $targetDirectory . $fileName;



        // Create the uploads directory if it doesn't exist

        if (!file_exists($targetDirectory)) {

            mkdir($targetDirectory, 0777, true);

        }



        if (move_uploaded_file($_FILES['profile-pic']['tmp_name'], $targetFilePath)) {

            $profilePic = $targetFilePath;

        } else {

            $profilePic = "Error uploading file.";

        }

    } else {

        $profilePic = "No file uploaded.";

    }



    // Display the submitted data

    echo "<h1>Registration Successful</h1>";

    echo "<p><strong>First Name:</strong> $firstName</p>";

    echo "<p><strong>Last Name:</strong> $lastName</p>";

    echo "<p><strong>Mobile Number:</strong> $mobileNumber</p>";

    echo "<p><strong>Email:</strong> $email</p>";



    echo "<p><strong>Date of Birth:</strong> $dob</p>";

    echo "<p><strong>Profile Picture:</strong> <br><img src='$profilePic' alt='Profile Picture' style='max-width:200px;'></p>";

} else {

    echo "Invalid request method.";

}

?>