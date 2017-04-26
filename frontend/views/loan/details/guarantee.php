<?php if(count($guarantors)<1){ ?>
<p class='alert alert-info'>You don't have any guarantors recorded for this loan application</p>
<?php } ?>

<?php if(count($guarantors)<2){ ?>
<table class="table">
    <tr>
        <td>
            Please specify a member who will be your the guarantor
        </td>
        <td>
           <div class="input-group">
      <input type="text" class="form-control" placeholder="ID Number...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">Sumbit</button>
      </span>
    </div> 
        </td>
    </tr>
</table>
<?php } ?>
<hr/>
<pre>
    <?php
    print_r($guarantors);
    ?>
</pre>