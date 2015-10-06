<?php
ob_start();
require 'db.php';
if (isset($_POST['submit'])) {
    $j = 0; //Variable for indexing uploaded image 

    $target_path = "uploads/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) {//loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        $file_name_all.=$target_path."*";
@
        $target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       

      if (($_FILES["file"]["size"][$i] < 100000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder
                //echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';

                $file_name_all.=$target_path."*";
                $filepath = rtrim($file_name_all, '*'); 
                //echo $filepath;
                $officeid = $_GET['id'];
                $sql = "UPDATE register_office SET offimage='$filepath' WHERE id='$officeid' ";
                            if (!mysqli_query($con,$sql)) 
                                {
                                    die('ERREUR: ' . mysqli_error($con));
                                }

            } else {//if file was not moved.
                echo $j. ').<span id="error">Rééssayer</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Image trop lourde ou mauvais type de fichier***</span><br/><br/>';
        }
    }
    header("Location: profil.php");
}
mysqli_close($con); 
?>