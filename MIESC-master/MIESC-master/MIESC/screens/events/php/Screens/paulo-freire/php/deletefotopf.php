<?php  
include_once('conexaofotospf.php');

if (!empty($_GET['id'])) {
    $id = $_GET['id'];
    $sqlSelect = "SELECT * FROM fotospf WHERE id=$id";
    $result = $mysqli->query($sqlSelect);

    if ($result->num_rows > 0) {
        $sqlDelete = "DELETE FROM fotospf WHERE id=$id";
        $resultDelete = $mysqli->query($sqlDelete);
    }
}

header('Location: fotosPF.php');
exit;
?>