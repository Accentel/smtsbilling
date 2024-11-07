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
        $previousImages = array($statusRow['image_1'], $statusRow['image_2'], $statusRow['image_3'], $statusRow['image_4']);

        // Check if the bill is already approved
        if ($billStatus === 'Approved' || $billStatus === 'Released') {
            echo '<script type="text/javascript">alert("Bill Status Approved / Unable to update Pic "); window.location.href = "ebill_list.php";</script>';
            exit;
        }

        // If the bill is not approved, proceed to update images
        $imagePath = 'smtspic/';
        $imageFields = array('image_1', 'image_2', 'image_3', 'image_4');

        for ($i = 1; $i <= 4; $i++) {
            $newImageKey = 'new_image_' . $i;

            if (isset($_FILES[$newImageKey]) && $_FILES[$newImageKey]['error'] === UPLOAD_ERR_OK) {
                // Remove previous image
                $previousImage = $previousImages[$i - 1];
                if (!empty($previousImage)) {
                    $previousImagePath = $imagePath . $previousImage;
                    if (file_exists($previousImagePath)) {
                        unlink($previousImagePath);
                    }
                }

                $newImage = $_FILES[$newImageKey];
                $newImageName = 'new_image_' . $i . '_' . time() . '.' . pathinfo($newImage['name'], PATHINFO_EXTENSION);
                move_uploaded_file($newImage['tmp_name'], $imagePath . $newImageName);

                $imageField = $imageFields[$i - 1];
                $sql = "UPDATE add_bill1 SET $imageField = '$newImageName' WHERE service_no = '$service_no'";

                if ($link->query($sql) !== true) {
                    echo 'Error updating image ' . $i . ': ' . $link->error;
                    exit;
                }
            }
        }

        // Fetch ID and redirect to edit_bill1.php
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
        echo 'Error fetching bill status.';
    }
} else {
    echo 'Service number not provided.';
}

?>



