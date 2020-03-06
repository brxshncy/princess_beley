<div class="modal fade" id="m<?php echo $a['e_id']; ?>">
<div class="modal-dialog modal-md">
<div class="modal-content bg-info">
<div class="modal-header">
<h4 class="modal-title">Benefeciaries</h4>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span></button>
</div>
  <div class="modal-body">
    <div class="row">
      <div class="col">
          <b>Userd by:</b><br>
          <?php
              $e_id = $a['e_id'];
              $bene = "SELECT *,b.benefeciaries as benefeciaries,(SELECT COUNT(eqp_id) FROM transaction ttt LEFT JOIN benefeciaries bbb on ttt.bfcry_id = bbb.id WHERE ttt.bfcry_id = b.id) as used FROM transaction t left join benefeciaries b on b.id = t.bfcry_id WHERE t.eqp_id = '$e_id'";
              $qq = $conn->query($bene) or trigger_error(mysqli_error($conn)." ".$bene);
              while($z = mysqli_fetch_assoc($qq)){ ?> 
            
              <?php echo $z['benefeciaries']." - <b>".$z['used']."</b>" ?>

           <?php   }  ?>                
      </div>
    </div>
  </div>
  <div class="modal-footer">
  </div>
</div>
</div>
</div>