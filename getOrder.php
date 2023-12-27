<?php
// Step 1: Read JSON array from file.php/order?=
$json = $GET["orders"];//JSON
$data = json_decode($json, true);

// Step 2: Connect to SQLite3 database and retrieve data from itemlist table
$db = new SQLite3('restaurant.db');
foreach ($data as $tableId => $orders) {
   foreach ($orders as $orderId => $quantity) {
       $query = $db->prepare("SELECT ordername, price FROM itemlist WHERE orderid = :orderid");
       $query->bindValue(':orderid', $orderId, SQLITE3_TEXT);
       $results = $query->execute();
       $row = $results->fetchArray(SQLITE3_ASSOC);
       if ($row) {
           // Step 3: Write output to tableid.csv
           $file = fopen("{$tableId}.csv", "a");
           fputcsv($file, array($row['ordername'], $row['price'], $quantity));
           fclose($file);
       }
   }
}
?>
