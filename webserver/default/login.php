<html><head><meta http-equiv="content-type" content="text/html; charset=UTF-8"><title>aMule CVS - Web Control Panel</title>

<script language="JavaScript" type="text/javascript">

function breakout_of_frame()
{
  // see http://www.thesitewizard.com/archive/framebreak.shtml
  // for an explanation of this script and how to use it on your
  // own website
  if (top.location != location) {
    top.location.href = document.location.href ;
  }
}

function login_init()
{
	breakout_of_frame();
	document.login.pass.focus();
}

</script>

<style type="text/css">
.ibutton
{
cursor:hand;
position:relative;
top:5;
font-weight: bold;
font-family: Tahoma, Verdana, Arial;
font-size: 11px;
}
</style></head>

<body onload="login_init();" alink="white" bgcolor="#cccccc" link="white" text="white" vlink="white">
<table align="center" border="0" cellpadding="4" cellspacing="0" height="100%" width="100%">
<tbody><tr><td align="center" valign="middle">
<table align="center" border="0" cellpadding="4" cellspacing="0">
<tbody><tr>
<td align="center" bgcolor="#0066cc">
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.amule.org/" target="_blank"><img src="phpamule.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<p><font style="font-size: 10pt;" face="Tahoma"><b>Web Control Panel</b><br>Login</font></p>
</td>
</tr>
<tr>
<td align="center" bgcolor="#3399ff" valign="top">
<form action="" method="post" name="login">
<font style="font-size: 10pt;" face="Tahoma">&nbsp;<br>Enter your password here<br><br>
<input name="pass" size="37" style="border: 1px none black;" value="" type="password">
<br><br><input value="Login Now" type="submit"></font>
</form>
<br>
<?php
	if ($_SESSION["login_error"] != "") {
		echo "<font color=blue size=+2>";
		echo $_SESSION["login_error"];
		echo "</font>";
	}
?>
</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</body></html>
