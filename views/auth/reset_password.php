<h1>Reset Password</h1>
<form method="post" action="<?php echo base_url();?>auth/reset-password">
<input type="hidden" name="hdd_Action" value="reset_password" />
Password: <input type="password" name="txt_Password" /><br />
Confirm Password: <input type="password" name="txt_ConfPassword" /><br />
<input type="submit" value="Submit" />
</form>