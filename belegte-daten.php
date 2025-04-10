<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
//header("Access-Control-Allow-Origin: http://localhost:8082"); // restriktiver - prod 


require 'config.php';
header('Content-Type: application/json');

$stmt = $pdo->query("SELECT * FROM buchungen");
$buchungen = [];


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $buchungen[] = [
        'title' => 'Belegt – ' . htmlspecialchars($row['raum']),
        'start' => $row['start_datum'],
        'end' => date('Y-m-d', strtotime($row['end_datum'] . ' +1 day')), // FullCalendar braucht exklusives Enddatum
        //'end' => $row['end_datum'],
        "allDay" => true,
        "color" => "red"
    ];
}

echo json_encode($buchungen);


