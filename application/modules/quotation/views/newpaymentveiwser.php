       

<div class="row no-gutters">
  <div class="form-group col-md-6">
      <label for="payments" class="col-form-label pb-2"><?php echo display('payment_type');?></label>
          
      <?php $card_type=111000001;
          echo form_dropdown('ser_multipaytype[]',$all_pmethod,(!empty($card_type)?$card_type:null),'class="card_typesl postform resizeselect form-control "') ?> 
  
  </div>
  <div class="form-group col-md-6">
      <label for="4digit" class="col-form-label pb-2"><?php echo display('paid_amount');?></label>
      
          <input type="text" id="ser_pamount_by_method"  class="form-control ser_number ser_pay firstpay"  name="ser_pamount_by_method[]" value="" onkeyup="serchangedueamount()"  placeholder="0" />
  
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function () {
    "use strict";
    // select 2 dropdown 
    $("select.form-control:not(.dont-select-me)").select2({
      placeholder: "Select option",
      allowClear: true
    });
  }); 
</script>