<section class="sc-1 ">
    <div class="container sign-up">
        <img class="centered" src="<?php echo base_url();?>media/images/masthead.png" alt="">
        <form id="form" class="form centered" method="post" action="<?php echo base_url();?>auth/login">
            <input type="hidden" name="hdd_Action" value="login" />
            <div style="margin-bottom: 0" class="form-control">
                <img class="form-icon" src="<?php echo base_url();?>media/images/Email-Icon.png" alt="">
                <input type="text" id="email" name="txt_Email" placeholder="Email">

            </div>
            <div style="margin-bottom: 0" class="form-control">
                <img class="form-icon" src="<?php echo base_url();?>media/images/Password-Icon.png" alt="">
                <input type="password" name="txt_Password" placeholder="Password" autocomplete="">

            </div>

            <div style="width: 80%" class="ta-c centered">
                <a href="leaderboard.html"><button>LOGIN</button></a>

            </div>

            <div style="padding: 1em" class="table fullwidth">
                <div> <input type="checkbox" id="checkbox" name="chk_RememberMe" value="">
                    <label for="checkbox">Remember me</label>
                </div>

                <div class="ta-r">
                    <a href="<?php echo base_url();?>auth/forgot-password">
                        <p style="color: #000000">Forgot your password</p>
                    </a>

                </div>
            </div>

            <div class="table fullwidth">
                <div class="ta-c va-m">
                    <a style="color: #000000" href="<?php echo base_url();?>auth/sign-up">
                        <p>Don't have an account? Sign up now.
                        </p>
                    </a>
                </div>
            </div>
        </form>
    </div>
</section>
<script>
jQuery(document).ready(function(){
    
});
</script>