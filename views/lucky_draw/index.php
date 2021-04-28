<section class="sc-1 ">
  <div class="container sign-up"> <img class="mh centered" src="<?php echo base_url();?>media/images/masthead.png" alt="">
    <form id="form" class="form centered" method="post" action="<?php echo base_url();?>lucky-draw" enctype="multipart/form-data">
      <input type="hidden" name="hdd_Action" value="lucky_draw" />
	  <h1 style="margin-top: 0; margin-bottom: 2em;">Submit your proof of purchase to qualify for the SHARP Re-Raya Lucky Draw</h1>
	  <div class="form-control table fullwidth">
        <div>
          <label for="name">Full Name</label>
        </div>
        <div>
          <input type="text" id="name" name="txt_FullName" value="<?php echo set_value('txt_FullName');?>">
        </div>
      </div>
	  <div class="form-control table fullwidth">
        <div>
          <label for="phone">Phone</label>
        </div>
        <div>
          <input type="text" id="phone" name="txt_Phone" value="<?php echo set_value('txt_Phone');?>">
        </div>
      </div>
      <div class="form-control table fullwidth">
        <div>
          <label for="date">Purchase Date</label>
        </div>
        <div>
          <input type="date" id="date" name="txt_PuchaseDate" value="<?php echo set_value('txt_PuchaseDate');?>">
        </div>
      </div>
      <div class="form-control table fullwidth">
        <div>
          <label for="dealer">Dealer</label>
        </div>
        <div>
          <select name="opt_Dealer">
            <?php foreach($this->a_dealer as $dealer){ ?>
            <option value="<?php echo $dealer;?>"><?php echo $dealer;?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-control table fullwidth">
        <div>
          <label for="receive-number">Receive No.</label>
        </div>
        <div>
          <input type="text" id="receive-number" name="txt_InvoiceNo" value="<?php echo set_value('txt_InvoiceNo');?>">
        </div>
      </div>
      <div class="form-control table fullwidth">
        <div>
          <label for="receipt">Receipt Amount</label>
        </div>
        <div>
          <input type="number" id="receive-number" name="txt_InvoiceAmount" value="<?php echo set_value('txt_InvoiceAmount');?>">
        </div>
      </div>
      <div class="form-control table fullwidth">
        <div>
          <label for="warranty">Warranty Card Serial Number</label>
        </div>
        <div>
          <input type="text" id="receive-number" name="txt_SerialNo" value="<?php echo set_value('txt_SerialNo');?>">
        </div>
      </div>
      <div class="form-control table fullwidth file-upload">
        <div>
		  Upload your Invoice
        </div>
        <div><label id="lbl_Receipt" class="custom-file-upload">
            <input type="file" id="file_Receipt" name="file_Receipt" />
            <span>Choose File (PDF / JPG / PNG)</span></label></div>
      </div>
      <div class="form-control table fullwidth" style="margin-top: 2em;">
        <div class="empty">&nbsp;</div>
        <div class="b ta-l">
          <button class="cta" id="signup">SUBMIT</button>
        </div>
      </div>
    </form>
  </div>
</section>
<script>
jQuery(document).ready(function(){
    jQuery('#file_Receipt').change(function(){
        if(jQuery('#file_Receipt').val() != '')
        {
            filename = jQuery('#file_Receipt').val()
            filename = filename.replace(/.*[\/\\]/, '');
            jQuery('#lbl_Receipt span').text(filename);
        }
        else
        {
            jQuery('#lbl_Receipt span').text('Choose File (PDF / JPG / PNG)');
        }
    });
})
</script>