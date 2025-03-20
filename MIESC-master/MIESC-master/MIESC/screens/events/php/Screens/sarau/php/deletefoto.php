<?php  
include_once('conexaofotos.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM fotos WHERE id=$id";
    $result = $mysqli->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM fotos WHERE id=$id";
        $resultDelete = $mysqli->query($sqlDelete);
    }
}

header('Location: fotos.php');
exit;
?>