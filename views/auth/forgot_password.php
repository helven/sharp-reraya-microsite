<h1>Forgot Password</h1>
<form method="post" action="<?php echo base_url();?>auth/forgot-password">
<input type="hidden" name="hdd_Action" value="forgot_password" />
<input type="text" name="txt_Email" /><br />
Please enter your email address here to reset your password.
<br />
<input type="submit" value="Submit" />
</form>