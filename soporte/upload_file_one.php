<?php
error_reporting(0);
$target_dir="img/";
$target_file1=$target_dir . basename($_FILES["fileToUpload1"]["name"]);
$uploadOk=1;
$imageFileType1=strtolower(pathinfo($target_file1,PATHINFO_EXTENSION));
if(isset($_POST["enviar"])){
    $check1=getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
    if($check1 !== false){
        $uploadOk=1;
    }else{
        echo "File is not image.";
        $uploadOk=0;
    }
}else{
    $check1=getimagesize($_FILES["fileToUpload1"]["tmp_name"]);
    if($check1 !== false){
        $uploadOk=1;
    }else{
        echo "File is not image.";
        $uploadOk=0;
    }
}

if(file_exists($target_file1)){
    echo "Sorry, file already exists.";
    $uploadOk=0;
}else{
    if(file_exists($target_file1)){
    echo "Sorry, file already exists.";
    $uploadOk=0;
    }
}

if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif"){
    echo "Sorry, only JPG, JPGE, PNG AND GIF files are allowed";
    $uploadOk=0;
}else{
    if($imageFileType1 != "jpg" && $imageFileType1 != "png" && $imageFileType1 != "jpeg" && $imageFileType1 != "gif"){
           echo "Sorry, only JPG, JPGE, PNG AND GIF files are allowed";
    $uploadOk=0;
    }
}


if($uploadOk==0){
    echo "Sorry, yout file was not uploaded";
}else{
    if(move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file1)){
        echo "The file ".basename($_FILES["fileToUpload1"]["name"]). " has been uploaded";
    }else{
        echo "Sorry, there was an error uploading your file";
    }
}
?>