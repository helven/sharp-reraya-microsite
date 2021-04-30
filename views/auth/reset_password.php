<section class="sc-1 ">
  <div class="container sign-up">
  <a href="<?php echo base_url();?>" target="_self"><img class="mh centered" src="<?php echo base_url();?>media/images/masthead.png" alt=""></a>
  <form id="form" class="form centered" method="post" action="<?php echo base_url();?>auth/reset-password">
    <input type="hidden" name="hdd_Action" value="reset_password" />
    <h1 style="margin-top: 0; margin-bottom: 2em;">Key in a new password for your account.</h1>
    <div class="form-control table fullwidth">
      <div>
        <label for="password">New Password</label>
      </div>
      <div>
        <input type="password" name="txt_Password" />
      </div>
    </div>
    <div class="form-control table fullwidth">
      <div>
        <label for="password">Confirm New Password</label>
      </div>
      <div>
		  <input type="password" name="txt_ConfPassword" />
	  </div>
    </div>
    <div class="form-control table fullwidth">
      <div class="empty">&nbsp;</div>
      <div class="b ta-l" style="padding-top: 1em;">
        <input type="submit" value="RESET" />
      </div>
    </div>
  </form>
  </div>
</section>