<?php

        $target_directory = "uploads/";
        $target_file = $target_directory . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $uploadFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual csv
        if ($uploadFileType != csv) {
                echo "File is not a CSV file.";
                $uploadOk = 0;
            } else {
                echo "File is CSV.";
                $uploadOk = 1;
            }

// Check if file already exists
        if (file_exists($target_file)) {
            $errorMsg = "Sorry, file with this name \"" . $file . "\" already exists. Please rename the file and try again.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            $errorMsg = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, File upload failed.";
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
                header('Location: https://web.njit.edu/~ps355/project1/project1/index.php?page=table&filename=' . $file);
            } else {

                echo "Sorry, error uploading your file.";
            }
        }


//}
?>