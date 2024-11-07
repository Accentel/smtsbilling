<?php
// delete_image.php

// Check if the image name is sent via POST
if (isset($_POST['image'])) {
    $imageToDelete = $_POST['image'];
    $imagePath = 'smtspic/' . $imageToDelete; // Path to the image folder

    // Check if the file exists
    if (file_exists($imagePath)) {
        // Delete the file
        if (unlink($imagePath)) {
            // File deleted successfully

            // Now, update the respective column in the database
            // Establish database connection - include your connection code here

            // Update the database to remove the reference to the deleted image
            $updateQuery = "UPDATE add_bill1 SET 
                image_1 = CASE WHEN image_1 = '$imageToDelete' THEN NULL ELSE image_1 END,
                image_2 = CASE WHEN image_2 = '$imageToDelete' THEN NULL ELSE image_2 END,
                image_3 = CASE WHEN image_3 = '$imageToDelete' THEN NULL ELSE image_3 END,
                image_4 = CASE WHEN image_4 = '$imageToDelete' THEN NULL ELSE image_4 END
                WHERE image_1 = '$imageToDelete'
                OR image_2 = '$imageToDelete'
                OR image_3 = '$imageToDelete'
                OR image_4 = '$imageToDelete'";

            // Execute the query
            if ($link->query($updateQuery)) {
                // Database updated successfully
                echo "success";
                exit; // Stop further execution
            } else {
                // Failed to update database
                echo "db_update_failed: " . $link->error;
                exit; // Stop further execution
            }
        } else {
            // Failed to delete the file
            echo "file_delete_failed";
            exit; // Stop further execution
        }
    } else {
        // File does not exist
        echo "file_not_found";
        exit; // Stop further execution
    }
} else {
    // Image name not provided
    echo "no_image_name";
    exit; // Stop further execution
}
?>
    