<h1>Lucky Draw</h1>
<form method="post" action="<?php echo base_url();?>lucky-draw" enctype="multipart/form-data">
<input type="hidden" name="hdd_Action" value="lucky_draw" />
Puchase Date: <input type="text" name="txt_PuchaseDate" /><br />
Dealer: 
<select name="opt_Dealer">
    <option value="Dealer 1">Dealer 1</option>
    <option value="Dealer 2">Dealer 2</option>
    <option value="Dealer 3">Dealer 3</option>
    <option value="Dealer 4">Dealer 4</option>
    <option value="Dealer 5">Dealer 5</option>
</select><br />
Invoice / Receipt No.: <input type="text" name="txt_InvoiceNo" /><br />
Invoice / Receipt Amount: <input type="text" name="txt_InvoiceAmount" /><br />
Upload Receipt: <input type="file" name="file_Receipt" /><br />
<br />
<input type="submit" value="Submit" />
</form>