<html>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <head>
    <title>
      aMule CVS - CTemplate 0.44b - Web Control Panel
    </title>
  </head>
  <body background="main_bg.gif" text=white link=white vlink=white alink=white onload="javascript:document.login.pass.focus();">
    <table align=center border=0 cellpadding=4 cellspacing=0 width="100%" height="100%">

      <tr>
        <td align=center valign=middle>

          <table align=center border=0 cellpadding=0 cellspacing=0 width="407">
            <tr>
              <td style="height: 12px" background="login_top.gif" height="12">
              </td>
            </tr>
            <tr>

              <td height="250">

                <table align=center border=0 cellpadding=0 cellspacing=0 width="100%" height="100%">
                  <tr>
                    <td width="4" background="login_lefttop.gif">
                      <img src="blank1x1.gif" alt="" border="0" />
                    </td>
                    <td background="login_topdown.gif" align="center">

                      <table align=center border=0 cellpadding=0 cellspacing=0 width="100%" height="100%">

                        <tr>
                          <td align="center">
                            <a href="http://www.amule.org" target="_blank"><img src="phpamule.png" border="0"></a>
                          </td>
                        </tr>
                        <tr>
                          <td align="center" height="50">
                            <font face=Tahoma style="font-size:10pt;"><b>Web Control Panel</b> | Login</font>

                          </td>
                        </tr>
                      </table>
    
                    </td>
                    <td width="5" background="login_righttop.gif">
                      <img src="blank1x1.gif" alt="" border="0" />
                    </td>
                  </tr>
                </table>

                
              </td>
            </tr>
            <tr>
              <td style="height: 3px" background="login_topseperator.gif" height="3">
              </td>
            </tr>
            <tr>
              <td height="130">

                <table align=center border=0 cellpadding=0 cellspacing=0 width="100%" height="100%">
                  <tr>
                    <td width="4" background="login_lefttop.gif">
                      <img src="blank1x1.gif" alt="" border="0" />
                    </td>
                    <td background="login_downmain.gif" align="center">
                      <form action="" method="POST" name="login">
                        <font face=Tahoma style="font-size:10pt;">
                          &nbsp;<br />

                          Enter your password here<br /><br />
                          <input type="password" name="pass" maxlength=12 size=37 style="border-width: 1px; border-color: black; border-style:none;" value="">
                          <br /><br /><input type=submit value="Login Now"><br />
                        </font>
                      </form>
<?php
	if ($_SESSION["login_error"] != "") {
		echo "<br /><font color=blue size=+1>";
		echo $_SESSION["login_error"];
		echo "</font>";
	}
?>
                    </td>
                    <td width="5" background="login_righttop.gif">
                      <img src="blank1x1.gif" alt="" border="0" />

                    </td>
                  </tr>
                </table>
                
              </td>
            </tr>
            <tr>
              <td style="height: 12px" background="login_bottom.gif" height="12">
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </body>
</html>
