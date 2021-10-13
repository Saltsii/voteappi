<?php 

// giveVote.php - save vote for option in database


if (!isset($_GET['id'])){
    header('location: ../index.php');
}

$optionid = $_GET['id'];

include_once 'pdo-connect.php';

/*
tarkistetaan ennen äänestystä seuraavat asiat: 
1) onko käyttäjä äänestänyt kyseistä äänestystä
2) äänestystä voi edelleen äänestää: 
    eli tämä päivämäärä on alku ja loppu -päivän välissä
    täytyy hakea tietoja poll-taulusta
*/
$data = array();

try {
    
    $stmt = $conn->prepare("SELECT id, start, end 
                            FROM poll
                            WHERE id = (
                                SELECT poll_id
                                FROM option 
                                WHERE id = :optionid
                            );");
        $stmt->bindParam(":optiondid", $optionid);

    if ($stmt->execute() == false){
        $data['error'] = 'error occured';
    } else {
        // haetaan äänestyksen id
        $poll = $stmt->fetch(PDO::FETCH_ASSOC);
        $pollid = $poll['id'];
        //selvitettään onko käyttäjä jo äänestänyt kyseistä äänestystä
     $cookie_name = "poll_$pollid";
     if (isset($_COOKIE[$cookie_name])){
        $data['warning'] = 'you allready voted this poll';
        }
    }

        // jos ei tullut varoitusta, niin voidaan tallentaa ääni
        if (!array_key_exists('warning',$data)){

            $stmt = $conn->prepare("UPDATE option SET votes = votes + 1 WHERE (id = :optionid);");
            $stmt->bindParam(':optionid', $optionid);
        
        if ($stmt->execute() == false){
            $data ['error'] = 'Error occured';
            
        } else {
            $data['success'] = 'Vote successfull!';

            // eväste
            $cookie_name = "poll_$pollid";
            $cookie_value = 1;
            setcookie($cookie_name, $cookie_value, time() + (86400*30), "/");
                
            }
    }
 
} catch (PDOException $e) {
    $data = array(
        'error' => 'tapahtui virhe tallennuksessa!!'
    );

}


header("Content-type: application/json;charset=utf-8");
echo json_encode($data);

// UPDATE option SET votes = votes+1 WHERE (id = 21);