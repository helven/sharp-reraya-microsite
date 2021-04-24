<section class="sc-1 ">
    <div class="container sign-up">
        <img class="centered" src="<?php echo base_url();?>media/images/masthead.png" alt="">
        <form id="form" class="form centered" method="post" action="<?php echo base_url();?>auth/sign-up">
            <input type="hidden" name="hdd_Action" value="sign_up" />
            <h1 style="margin-top: 2em">To sign up, all we need are a few simple details. </h1>
            <div class="form-control">
                <label for="name">Name</label>
                <input type="text" id="name" name="txt_Name" value="<?php echo set_value('txt_Name');?>" />

            </div>
            <div class="form-control">
                <label for="phone">Phone</label>
                <input type="number" id="number" name="txt_Phone" value="<?php echo set_value('txt_Phone');?>" />

            </div>
            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" id="email" name="txt_Email" value="<?php echo set_value('txt_Email');?>" />

            </div>
            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" id="password" name="txt_Password">

            </div>



            <div class="form-control">
                <label for="password">Confirm Password</label>
                <input type="password" id="password2" name="txt_ConfPassword">

            </div>
            <div style="width: 80%" class="centered ta-c">
                <button id="signup">SIGN UP</button>
                <div style="padding-top: 1em" class="ta-l">
                    <input type="checkbox" id="checkboxtnc" name="chk_AgreeTnC" value="1">
                    <label for="checkboxtnc"> I have read and agree to the Terms and Conditions</label>

                </div>

                <div style="padding-top: 1em" class="ta-l">
                    <input type="checkbox" id="checkboxpp" name="chk_AgreePrivacyPolicy" value="1">
                    <label for="checkboxpp"> I have read and agree to the Privacy Policy</label>
                </div>
            </div>









        </form>
    </div>

</section>