<section class="sc-1 ">
    <div class="container sign-up"> <a href="<?php echo base_url();?>" target="_self"><img class="mh centered" src="<?php echo base_url();?>media/images/masthead.png" alt=""></a>
        <form id="form" class="form centered" method="post" action="<?php echo base_url();?>auth/sign-up">
            <input type="hidden" name="hdd_Action" value="sign_up" />
            <h1 style="margin-top: 0; margin-bottom: 2em;">To sign up, all we need are a few simple details. </h1>
            <div class="form-control table fullwidth">
                <div>
                    <label for="name">Name</label>
                </div>
                <div>
                    <input type="text" id="name" name="txt_Name" value="<?php echo set_value('txt_Name');?>" />
                </div>
            </div>
            <div class="form-control table fullwidth">
                <div>
                    <label for="phone">Phone</label>
                </div>
                <div>
                    <input type="number" id="number" name="txt_Phone" value="<?php echo set_value('txt_Phone');?>" />
                </div>
            </div>
            <div class="form-control table fullwidth">
                <div>
                    <label for="email">Email</label>
                </div>
                <div>
                    <input type="email" id="email" name="txt_Email" value="<?php echo set_value('txt_Email');?>" />
                </div>
            </div>
            <div class="form-control table fullwidth">
                <div>
                    <label for="address">Address</label>
                </div>
                <div>
                    <textarea rows="4" name="txt_Address"><?php echo set_value('txt_Address');?></textarea>
                </div>
            </div>
            <div class="form-control table fullwidth">
                <div>
                    <label for="password">Password</label>
                </div>
                <div>
                    <input type="password" id="password" name="txt_Password">
                </div>
            </div>
            <div class="form-control table fullwidth">
                <div>
                    <label for="password">Confirm Password</label>
                </div>
                <div>
                    <input type="password" id="password2" name="txt_ConfPassword">
                </div>
            </div>
            <div class="form-control table fullwidth">
                <div class="empty">&nbsp;</div>
                <div>
                    <div class="ta-l">
                        <input type="checkbox" id="checkboxtnc" name="chk_AgreeTnC" value="1" style="width: initial">
                        <label for="checkboxtnc"> I have read and agree to the <a style="text-decoration: underline!important" target="_blank" href="<?php echo base_url();?>/media/pdfs/SHARP-Re-Raya-Terms-and-Conditions.pdf">Terms and Conditions</a></label>
                    </div>
                    <div class="ta-l">
                        <input type="checkbox" id="checkboxpp" name="chk_AgreePrivacyPolicy" value="1" style="width: initial">
                        <label for="checkboxpp"> I have read and agree to the <a style="text-decoration: underline!important" target="_blank" href="<?php echo base_url();?>/media/pdfs/SHARP-Re-Raya-Privacy-Policy.pdf">Privacy Policy</a></label>
                    </div>
                </div>
            </div>
            <div class="form-control table fullwidth">
                <div class="empty">&nbsp;</div>
                <div class="b ta-l" style="padding-top: 1em;"><button id="signup">SIGN UP</button></div>
            </div>
        </form>
    </div>
</section>
