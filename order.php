<?php
$file = fopen("orders.csv", "r");
$orders = array();
while (($line = fgetcsv($file)) !== FALSE) {
 $tableId = $line[0];
 $orderId = $line[1];
 $quantity = $line[2];
 if (!isset($orders[$tableId])) {
    $orders[$tableId] = array();
 }
 $orders[$tableId][] = array($orderId, $quantity);
}
fclose($file);
?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
<?php foreach ($orders as $tableId => $orderList): ?>
 <div class="card" style="width: 18rem;" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $tableId; ?>">
 <div class="card-body">
   <h5 class="card-title"><?php echo $tableId; ?></h5>
   <button class="card-text">Order details</button>
   <button class="card-text">Completed</button>
 </div>
 </div>

 <div class="modal fade" id="detailsModal<?php echo $tableId; ?>" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel<?php echo $tableId; ?>" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailsModalLabel<?php echo $tableId; ?>"><?php echo $tableId; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-striped">
        <?php foreach ($orderList as $order): ?>
          <tr>
            <th scope="row"><?php echo $order[0]; ?></th>
            <td><?php echo $order[1]; ?></td>
          </tr>
        <?php endforeach; ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </div>
<?php endforeach; ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

