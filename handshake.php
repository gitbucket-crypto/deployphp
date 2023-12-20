<?php
ini_set('display_startup_errors', 0);
date_default_timezone_set('America/Sao_Paulo');

require_once('database.php');

static $uid, $artifact;

boostrap();

function boostrap()
{
    if(isset($_GET['csrf']) && $_GET['csrf']!='')
    {
        echo json_encode(['error'=>404,'msg'=> 'token csrf não present']); exit;
    }
    if(isset($_GET['whois']) && $_GET['whois']!='')
    {
        echo json_encode(['error'=>404,'msg'=> 'whois não present']); exit;
    }
}

$conn = connect();

$SQL="SELECT * FROM deployment WHERE deployed='0' ORDER BY random() LIMIT 1";
$stmt = $conn->query($SQL);
$data = $stmt->fetchAll(\PDO::FETCH_ASSOC) or die('sem novos tokens');

$uid = $data[0]['uid'];
$artifact = $data[0]["artifcact"];

$whois = $_GET['whois'];

var_dump($whois);


?>