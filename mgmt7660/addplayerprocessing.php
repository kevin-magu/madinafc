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
    
    
    // Debug: Check if file is received
    echo "<pre>";
    $_FILES['playerImage']['error'];
    echo "</pre>";

    if(isset($_FILES['playerImage']) && $_FILES['playerImage']['error'] === 0) {
        echo "Image got to the backend";
    } else {
        die("No image uploaded");
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
        $targetDir = "../uploads/images/";    
        $fileName = basename($_FILES['playerImage']['name']);
        $targetFilePath = $targetDir . $fileName;
        $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png");

        // Validate file type
        if(!in_array($fileType, $allowedTypes)) {
            $_SESSION['file_type_error'] = "Only images are allowed!";
            header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
            exit;
        }

        // Move uploaded file
        if(!move_uploaded_file($_FILES["playerImage"]['tmp_name'], $targetFilePath)) {
            die("Error moving file: " . error_get_last()['message']);
        }

        // Insert data into database
        $query = "INSERT INTO player(playerName, nationalID, fieldNumber, position, joinDate, imageName, filePath) 
                  VALUES (?, ?, ?, ?, ?, ?, ?)"; 
        $stmt = $connection->prepare($query);
        $stmt->bind_param("sssssss", $playerName, $nationalID, $fieldNumber, $position, $joinDate, $fileName, $targetFilePath);

        if($stmt->execute()) {
            $_SESSION['player_added_success'] = "Player added successfully!";
        } else {
            $_SESSION['player_added_error'] = "Error adding player. Please try again.";
        }

        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
        exit;

    } catch(Exception $e) {
        $_SESSION['player_added_error'] = "Error adding player. Please try again.";
        header('Location: /madinafc/mgmt7660/mgmtaddplayer.php');
        exit;
    }
}
?>
