<h1>Sign Up</h1>
<form method="post" action="<?php echo base_url();?>auth/sign-up">
<input type="hidden" name="hdd_Action" value="sign_up" />
Name: <input type="text" name="txt_Name" /><br />
Email: <input type="text" name="txt_Email" /><br />
Phone: <input type="text" name="txt_Phone" /><br />
Password: <input type="password" name="txt_Password" /><br />
Confirm Password: <input type="password" name="txt_ConfPassword" /><br />
<br />
<input type="submit" value="Submit" />
</form>