<?php
class upload extends page
{
    public function get()
    {
        $form = '<form action="index.php?page=upload" method="post" enctype="multipart/form-data">';
        $form .= '<input type="file" name="fileToUpload" id="fileToUpload">';
        $form .= '<input type="submit" value="Upload File" name="submit">';
        $form .= '</form>';
        $this->html .= htmltags::headingOne('IS 601 :: Project :: Upload a CSV File to view as a Table');
        $this->html .= $form;
    }
    public function post()
   {
    $target_directory = "./uploads/";
    $target_file = $target_directory . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $uploadFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// Check if image file is a actual csv
   if ($uploadFileType != "csv") {
        echo "File is not a CSV file.";
        $uploadOk = 0;
    } else {
        $uploadOk = 1;
        echo "File is CSV.";

    }

    if($uploadFileType == "")
    {
        echo "Oops, No file selected. ";
        $uploadOk = 0;
    }
// Check if file already exists
    if (file_exists($target_file)) {
        $errorMsg = "Sorry, file with this name already exists. Please rename the file and try again.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $errorMsg = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0)
    {
        echo "<br>Sorry, File upload failed.</br>";
    } else
        { if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
            { echo " file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            header('Location: https://web.njit.edu/~ps355/project1/project1/index.php?page=table&filename='.$target_file);
            }
                else
                    {
                        echo "Sorry, error uploading your file.";
                    }
        }

}// post
}// class
?>