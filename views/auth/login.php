<section class="sc-1 ">
  <div class="container sign-up"> <img class="mh centered" src="<?php echo base_url();?>media/images/masthead.png" alt="">
    <form id="form" class="form centered" method="post" action="<?php echo base_url();?>auth/login">
      <div class="form-control table fullwidth">
        <div class="ico">
          <input type="hidden" name="hdd_Action" value="login" />
          <img class="form-icon" src="<?php echo base_url();?>media/images/Email-Icon.png" alt=""> </div>
        <div>
          <input type="text" id="email" name="txt_Email" placeholder="Email">
        </div>
      </div>
      <div class="form-control table fullwidth">
        <div class="ico">
          <input type="hidden" name="hdd_Action" value="login" />
          <img class="form-icon" src="<?php echo base_url();?>media/images/Password-Icon.png" alt=""> </div>
        <div>
          <input type="password" name="txt_Password" placeholder="Password" autocomplete="">
        </div>
      </div>
	  <div class="form-control table fullwidth" style="margin-top: 2em;">
        <div class="empty">&nbsp;</div>
		<div class="ta-l"><input type="checkbox" id="checkbox" name="chk_RememberMe" value="" style="width: initial">
          <label for="checkbox">Remember me</label></div>
      </div>
      <div class="form-control table fullwidth">
        <div class="empty">&nbsp;</div>
        <div class="b ta-l"><a href="leaderboard.html">
          <button>LOGIN</button>
          </a></div>
      </div>
      <div class="form-control table fullwidth" style="margin-top: 2em;">
        <div class="empty">&nbsp;</div>
        <div class="ta-l">
          <p><a href="<?php echo base_url();?>auth/forgot-password">Forgot your password</a></p>
          <p><a style="color: #000000" href="<?php echo base_url();?>auth/sign-up">Don't have an account? Sign up now.</a></p>
        </div>
      </div>
    </form>
  </div>
</section>