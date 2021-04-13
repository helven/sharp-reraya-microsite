<html>
<body>

Thank you for signing up! <br />
Email: <?php echo $this->email;?><br />

If this was a mistake, just ignore this email and nothing will happen.<br /><br />

To verify your account password, visit the following address:<br />
<a href="<?php echo $this->verify_link;?>" target="_blank"><?php echo $this->verify_link;?></a><br />

</body>
</html>