<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>amule download page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-color: #003399;
}
.tbl_header {
}
-->
</style></head>

<body>
<table width="100%"  border="1" bgcolor="#0099CC">
  <tr>
    <td height="20">&nbsp;</td>
  </tr>
  <tr>
    <td><table width="100%"  border="0" align="left" cellspacing="1">
      <tr>
        <th width="33" scope="col"></th>
        <th width="172" ><div align="left"><a href="amuleweb-main-servers.php?sort=name" target="mainFrame">Name</a></div></th>
        <th width="227" ><div align="left">
          <div align="left"><a href="amuleweb-main-servers.php?sort=desc" target="mainFrame">Description</a></div></th>
        <th width="149" scope="col"><div align="left">
          <div align="left">Address</div></th>
        <th width="77" scope="col"><div align="left"><a href="amuleweb-main-servers.php?sort=users" target="mainFrame">Users</a></div></th>
        <th width="80" scope="col"><div align="left"><a href="amuleweb-main-servers.php?sort=maxusers" target="mainFrame">Max Users</a> </div></th>
        <th width="37" scope="col"><div align="left"><a href="amuleweb-main-servers.php?sort=files" target="mainFrame">Files</a></div></th>
        </tr>
	  
	  <?php


		//
		// declare it here, before any function reffered it in "global"
		//
		$sort_order;$sort_reverse;

		function my_cmp($a, $b)
		{
			global $sort_order, $sort_reverse;
			switch ( $sort_order) {
				case "name": $result = $a->name > $b->name; break;
				case "desc": $result = $a->desc > $b->desc; break;
				case "users": $result = $a->users > $b->users; break;
				case "max_users": $result = $a->maxusers > $b->maxusers; break;
				case "files":$result = $a->files > $b->files; break;
			}

			if ( $sort_reverse ) {
				$result = !$result;
			}
			return $result;
		}

		$servers = amule_load_vars("servers");

		$sort_order = $HTTP_GET_VARS["sort"];

		//
		// perform command before processing content
		//
		if ( ($HTTP_GET_VARS["cmd"] != "") and ($HTTP_GET_VARS["ip"] != "") and ($HTTP_GET_VARS["port"] != "")) {
			if ($_SESSION["guest_login"] == 0) {
				amule_do_server_cmd($HTTP_GET_VARS["ip"], $HTTP_GET_VARS["port"], $HTTP_GET_VARS["cmd"]);
			}
		}
		
		if ( $sort_order == "" ) {
			$sort_order = $_SESSION["servers_sort"];
		} else {
			if ( $_SESSION["sort_reverse"] == "" ) {
				$_SESSION["sort_reverse"] = 0;
			} else {
				$_SESSION["sort_reverse"] = !$_SESSION["sort_reverse"];
			}
		}

		$sort_reverse = $_SESSION["sort_reverse"];
		if ( $sort_order != "" ) {
			$_SESSION["servers_sort"] = $sort_order;
			usort(&$servers, "my_cmp");
		}
		foreach ($servers as $srv) {
			echo "<tr>";
			
			if ($_SESSION["guest_login"] != 0) {
				echo "<td></td>";
			} else {
				echo "<td>",
					'<a href="amuleweb-main-servers.php?cmd=connect&ip=', $srv->ip,
					'&port=', $srv->port, '" target="mainFrame">',
					'<img src="connect.gif" width="16" height="16" border="0">','</a>',
					'<a href="amuleweb-main-servers.php?cmd=remove&ip=', $srv->ip,
					'&port=', $srv->port, '" target="mainFrame">',
					'<img src="cancel.gif" width="16" height="16" border="0">','</a>',
					"</td>";
			}

			echo "<td>", $srv->name, "</td>";
			echo "<td>", $srv->desc, "</td>";
			echo "<td>", $srv->addr, "</td>";
			echo "<td>", $srv->users, "</td>";
			echo "<td>", $srv->maxusers, "</td>";
			echo "<td>", $srv->files, "</td>";

			echo "</tr>";
		}
	  ?>
    </table></td>
  </tr>
</table>
</body>
</html>
