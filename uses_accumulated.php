<div class="modal fade" id="c<?php echo $a['e_id']; ?>">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title">Commodity</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
<div class="row">
<div class="col">
<?php
$e_id = $a['e_id'];
    $w="SELECT b.benefeciaries as benefeciaries FROM benefeciaries b LEFT JOIN transaction t ON t.bfcry_id = b.id WHERE t.eqp_id = '$e_id'";
    $qa = $conn->query($w) or trigger_error(mysqli_error($conn)." ".$w);
    $m = mysqli_fetch_assoc($qa);
?>
<b>Benefeciary: <u><?php echo $m['benefeciaries'] ?></u></b>
<br>
<b>Accumlated Commodities: </b>
<ul>
  <?php
  $bene = "SELECT (SELECT sum(volume) from transaction tt left join post_harvest phh on phh.transac_id = tt.id WHERE tt.eqp_id = '$e_id') as total, 
  ph.volume as volume,t.date_borrowed as date_borrowed,t.date_return as date_return,c.commodity_name as crops FROM post_harvest ph left join commodity c on ph.crops_id = c.id left join transaction t on t.id = ph.transac_id where t.eqp_id = '$e_id'
  ";
   $qq = $conn->query($bene) or trigger_error(mysqli_error($conn)." ".$bene);
   echo $total = "";
  while($z = mysqli_fetch_assoc($qq)){ $total =$z['total']?> 
       <li><?php echo $z['crops']." - ".$z['volume']."<br>
        "."<b><u> Date Harvested: ".date("F j, Y",strtotime($z['date_borrowed']))." - ".date("F j, Y",strtotime($z['date_return']))."</u></b>" ?></li>
        <hr>
  <?php   }  ?> 
      <li class="mt-2">Total: <u><?php echo $total; ?> </u></li>
</ul>             
</div>
</div>
</div>
<div class="modal-footer">
</div>
</div>
</div>
</div>