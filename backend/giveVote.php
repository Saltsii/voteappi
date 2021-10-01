<?php 

// giveVote.php - save vote for option in database


if (!isset($_GET['id'])){
    header('location: ../index.php');
}

$optionid = $_GET['id'];

include_once 'pdo-connect.php';

try {
    $stmt = $conn->prepare("UPDATE option SET votes = votes + 1 WHERE (id = :optionid);");
    $stmt->bindParam(':optionid', $optionid);

if ($stmt->execute() == false){
    $data = array(
        'error' => 'Error occured'
    );
} else {
    $data = array(
        'success' => 'Vote successfull!'
        );
    }
} catch (PDOException $e) {
    $data = array(
        'error' => 'tapahtui virhe tallennuksessa!!'
    );

}


header("Content-type: application/json;charset=utf-8");
echo json_encode($data);

// UPDATE option SET votes = votes+1 WHERE (id = 21);