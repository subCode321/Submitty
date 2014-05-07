<?php

require_once("../private/model/homework_model_functions.php");


//Upload the stuff

if (isset($_FILES["file"])) {
    if (!isset($_GET["assigment_id"])) {
        echo "No assigment id";
        exit();
    }
    $assignment_id = htmlspecialchars($_GET["assignment_id"]);
    if (strpos($assignment_id," ")) {
        //Go to error page?
        echo "here3";
        exit();
    }
    $uploaded_file = $_FILES["file"];//THIS NEEDS TO BE MADE HACKER PROOF
    $result = upload_homework($_SESSION["id"],$assignment_id,$uploaded_file);
    if (isset($result["error"])) {
        //Go to error page?
        ?>
        <script>
        alert("Error: Assignment could not be uploaded");
        </script>
        <?php
    }
}
//Go back to homework page
header("Location: index.php?page=homework&assignment_id=".$assignment_id);

?>
