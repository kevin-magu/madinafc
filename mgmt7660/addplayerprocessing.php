<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

include '../includes/connection.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $playerName = $_POST['playerName'];
    $nationalID = $_POST['nationalID'];
    $fieldNumber = $_POST['fieldNumber'];
    $position = $_POST['position'];
    $joinDate = $_POST['joinDate'];
    $photo = $_FILES['playerImage'];
    $photo_path = $_FILES['playerImage']['full_path'];
    
    // Debug: Check if file is received
    echo "<pre>";
    print_r ($_FILES['playerImage']);
    echo "</pre>";

    if(isset($_FILES['playerImage']) && $_FILES['playerImage']['error'] === 0) {
      //  echo "Image got to the backend";
    } else {
        $_SESSION['image_size_error'] = "Please make sure your image size is 2mb or below";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
        die("Make sure your image size is 2mb or belo");
    }

    // Check if user exists
    $checkQuery = "SELECT nationalID FROM player WHERE nationalID = ?";
    $stmt = $connection->prepare($checkQuery);
    $stmt->bind_param("s", $nationalID);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) { 
        $_SESSION['player_exists'] = "ERROR! Player already exists in the Database.";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
        exit;
    }

    try {
        // File Upload Handling
        $targetDir = "../uploads/playerImages/";    
        $fileName = basename($_FILES['playerImage']['tmp_name']);
        $changedFileName = $_FILES['playerImage']['tmp_name'];
        $fileType = (pathinfo($photo_path));
        //echo $photo['full_path'];
        $fileTypeExtension=$fileType['extension'];
        $targetStorageFilePath = $targetDir . $fileName .".". $fileTypeExtension;
        echo "THis is the target filepath". $targetStorageFilePath ."</br>";
        $allowedTypes = array("jpg", "jpeg", "png");

        // Validate file type
        if(!in_array($fileTypeExtension, $allowedTypes)) {
            $_SESSION['file_type_error'] = "Only images are allowed!";
            die("Error moving file: " . error_get_last()['message']);
           // header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
            exit;
        }

        /*
        if(!rename("".$_FILES['playerImage']['name'].", ".$nationalID."")){
            echo "failed to rename file";
            die("Error renaming file: " . error_get_last()['message']);
        } */
       
       
        // Move uploaded file
        if(!move_uploaded_file($photo['tmp_name'], $targetStorageFilePath)) {
            die("Error moving file: " . error_get_last()['message']);
        }

        // Insert data into database
        $query = "INSERT INTO player(playerName, nationalID, fieldNumber, position, joinDate, imageName, filePath) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)"; 
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssssss", $playerName, $nationalID, $fieldNumber, $position, $joinDate, $fileName, $targetStorageFilePath);

        if($stmt->execute()) {
            $_SESSION['player_added_success'] = "Player added successfully!";
        } else {
            $_SESSION['player_added_error'] = "Error adding player. Please try again.";
        }

        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
        exit;

    } catch(Exception $e) {
        $_SESSION['player_added_error'] = "Error adding player. Please try again or contact admin.";
       header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
        echo $e;
        exit;
    }
}
?>
