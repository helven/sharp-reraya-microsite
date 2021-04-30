<section class="sc-1 ">
  <div class="container sign-up"> <a href="<?php echo base_url();?>" target="_self"><img class="mh centered" src="<?php echo base_url();?>media/images/masthead.png" alt=""></a>
    <form id="form" class="form centered" method="post" action="<?php echo base_url();?>auth/forgot-password">
      <h1 style="margin-top: 0; margin-bottom: 2em;">Forgot Password? Please enter your email address here to reset your password.</h1>
      <div class="form-control table fullwidth">
        <div>
          <input type="hidden" name="hdd_Action" value="login" />
          <img class="form-icon" src="<?php echo base_url();?>media/images/Email-Icon.png" alt=""> </div>
        <div>
          <input type="text" id="email" name="txt_Email" placeholder="Email">
        </div>
      </div>
      <div class="form-control table fullwidth" style="margin-top: 2em;">
        <div class="empty">&nbsp;</div>
        <div class="b ta-l">
          <input type="submit" value="RESET PASSWORD" />
        </div>
      </div>
    </form>
  </div>
</section>
