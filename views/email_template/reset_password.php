<html>
<body>

Someone has requested a password reset for the following account: <br />
Email: <?php echo $this->email;?><br />

If this was a mistake, just ignore this email and nothing will happen.<br /><br />

To reset your password, visit the following address:<br />
<a href="<?php echo $this->reset_link;?>" target="_blank"><?php echo $this->reset_link;?></a><br />
Reset link is valid for 3 days.

</body>
</html>