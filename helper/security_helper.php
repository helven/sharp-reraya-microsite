<?php
function sec_db_clean($link, $str)
{
	return mysqli_real_escape_string($link, $str);
}