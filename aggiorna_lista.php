<?php
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn)); 
	$id=$_SESSION['id'];
    $res=mysqli_query($conn, "SELECT * FROM lista_anime WHERE user = '".$id."'");
	if(mysqli_num_rows($res) > 0){   
        while($row= mysqli_fetch_assoc($res)) {
            $ris[]=$row;
		}
	}else {
        $ris = "Nessun anime";
	}
    echo json_encode ($ris);
?>