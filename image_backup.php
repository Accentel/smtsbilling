<?php
session_start();
include('dbconnection/connection.php');

if (isset($_POST['service_no'])) {
    $service_no = $_POST['service_no'];

    $fetchBillStatusQuery = "SELECT bill_status, image_1, image_2, image_3, image_4 FROM add_bill1 WHERE service_no = '$service_no'";
    $statusResult = $link->query($fetchBillStatusQuery);

    if ($statusResult && $statusResult->num_rows > 0) {
        $statusRow = $statusResult->fetch_assoc();
        $billStatus = $statusRow['bill_status'];
        $imagePath = 'smtspic/';

        // Check if the bill is already approved
        if ($billStatus === 'Approved' || $billStatus === 'Released') {
            echo '<script type="text/javascript">alert("Bill Status Approved / Unable to update Pic "); window.location.href = "ebill_list.php";</script>';
            exit;
        }

        // Loop through existing image fields to delete files and update DB
        $imageFields = array('image_1', 'image_2', 'image_3', 'image_4');
        for ($i = 1; $i <= 4; $i++) {
            $newImageKey = 'new_image_' . $i;
            $existingImageField = $imageFields[$i - 1];
            $existingImage = $statusRow[$existingImageField];

            if (isset($_FILES[$newImageKey]) && $_FILES[$newImageKey]['error'] === UPLOAD_ERR_OK) {
                if (!empty($existingImage) && file_exists($imagePath . $existingImage)) {
                    if (unlink($imagePath . $existingImage)) {
                        // Deletion successful, proceed with image update
                    } else {
                        echo 'Error deleting existing image: ' . error_get_last()['message'];
                        exit;
                    }
                }

                $newImage = $_FILES[$newImageKey];
                $newImageName = 'new_image_' . $i . '_' . time() . '.' . pathinfo($newImage['name'], PATHINFO_EXTENSION);
                move_uploaded_file($newImage['tmp_name'], $imagePath . $newImageName);

                // Update the database with the new image name
                $sql = "UPDATE add_bill1 SET $existingImageField = '$newImageName' WHERE service_no = '$service_no'";
                if ($link->query($sql) !== true) {
                    echo 'Error updating image ' . $i . ': ' . $link->error;
                    exit;
                }
            }
        }

        // Redirect to edit_bill1.php after successful update
        $fetchIdQuery = "SELECT id FROM add_bill1 WHERE service_no = '$service_no'";
        $result = $link->query($fetchIdQuery);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];

            header('Location: edit_bill1.php?id=' . $id);
            exit;
        } else {
            echo 'Service number not found.';
        }
    } else {
        echo 'Error fetching bill status or image details.';
    }
} else {
    echo 'Service number not provided.';
}
?>
