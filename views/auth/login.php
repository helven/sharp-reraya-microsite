<form method="post" action="<?php echo base_url();?>auth/login">
<input type="hidden" name="hdd_Action" value="login" />
Email: <input type="text" name="txt_Email" /><br />
Password: <input type="password" name="txt_Password" /><br />
<input type="checkbox" name="chk_RememberMe" value="1" /> Remember Me
<br />
<input type="submit" value="Submit" />
</form>