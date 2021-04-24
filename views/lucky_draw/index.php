<section class="sc-1 ">
    <div class="container sign-up">
        <form style="margin-top: 5em" id="form" class="form-lucky centered" method="post" action="<?php echo base_url();?>lucky-draw" enctype="multipart/form-data">
            <input type="hidden" name="hdd_Action" value="lucky_draw" />
            <div class="centered">
                <div class="centered lucky-img"><img class="fullwidth centered" src="images/lucky-draw.png" alt="lucky draw"></div>

                <p style="color: #ff0000;  padding-top: 0.5em; font-family: 'gilroysemibold'; font-size: 2em" class="ta-c">Proof of Purchase</p>
                <p style="padding:  0.5em;  font-family: 'gilroysemibold';" class="ta-c">Show us your purchase and win!</p>
                <p style=" padding: 0.5em" class="ta-c">Submit your proof of purchase to qualify
                    for the SHARP Re-Raya Lucky Draw</p>
            </div>

            <div class="form-control">
                <label for="date">Purchase Date</label>
                <input type="date" id="date" name="txt_PuchaseDate" value="<?php echo set_value('txt_PuchaseDate');?>">
            </div>
            <div class="form-control">
                <label for="dealer">Dealer</label>
                <select name="opt_Dealer">
                    <?php foreach($this->a_dealer as $dealer){ ?>
                        <option value="<?php echo $dealer;?>"><?php echo $dealer;?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-control">
                <div class="form-control">
                    <label for="receive-number">Receive No.</label>
                    <input type="number" id="receive-number" name="txt_InvoiceNo" value="<?php echo set_value('txt_InvoiceNo');?>">

                </div>
                <div class="form-control">
                    <label for="receipt">Receipt Amount</label>
                    <input type="number" id="receive-number" name="txt_InvoiceAmount" value="<?php echo set_value('txt_InvoiceAmount');?>">

                </div>
                <div class="form-control">
                    <label for="warranty">Warranty Card Serial Number</label>
                    <input type="number" id="receive-number" name="txt_SerialNo" value="<?php echo set_value('txt_SerialNo');?>">

                </div>
                <div class="form-control table file-upload">
                    <div>
                        <label class="custom-file-upload">
                            <input type="file" name="file_Receipt" />
                            Choose File
                        </label>
                    </div>
                    <div style="padding-left: 2em;vertical-align: top;">
                        <p>Upload your Invoice/Receipt</p>
                        <p>PDF / JPG / PNG file only</p>
                    </div>
                </div>
                <div style="width: 80%" class="centered">
                    <button class="cta" id="signup">SUBMIT</button>
                </div>
            </div>
        </form>
    </div>
</section>