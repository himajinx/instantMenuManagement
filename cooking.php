<?php
$file = 'table12.csv'; // CSVファイル名を設定。tables.csv={tableid:{{foodname,foodquantity}}}に書き換える必要がありそう
$data = [];

if (($handle = fopen($file, "r")) !== FALSE) {
  while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
      if ($row[2] != 0) { // foodquantityが0でない場合のみデータを格納
          $data[] = ['foodname' => $row[0], 'foodquantity' => $row[2]];
      }
  }
  fclose($handle);
}
?>

<!DOCTYPE html>
<html>
<head>
   <title>Table Data</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
   <div class="container">
      <?php foreach ($data as $item): ?>
          <div class="card mb-3">
              <div class="card-header">Table ID</div> <!-- Table IDを表示 -->
              <ul class="list-group list-group-flush">
                 <li class="list-group-item"><?php echo $item['foodname']; ?></li> <!-- foodnameを表示 -->
                 <li class="list-group-item"><?php echo $item['foodquantity']; ?></li> <!-- foodquantityを表示 -->
              </ul>
          </div>
      <?php endforeach; ?>
   </div>
</body>
</html>
