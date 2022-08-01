<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supreme Dashboard</title>
<meta name="generator" content="BSN">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="BSN_admin.css" rel="stylesheet">
<link href="deactivate.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_Shape2" style="position:absolute;left:250px;top:380px;width:1300px;height:702px;z-index:8;">
<img src="images/img0005.png" id="Shape2" alt="" width="1300" height="702" style="width:1300px;height:702px;"></div>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:250px;top:250px;width:1300px;height:117px;z-index:9;">
<label class="toggle" for="ResponsiveMenu1-submenu" id="ResponsiveMenu1-title">Menu<span id="ResponsiveMenu1-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
<input type="checkbox" id="ResponsiveMenu1-submenu">
<ul class="ResponsiveMenu1" id="ResponsiveMenu1" role="menu">
<li role="menuitem">
<label for="ResponsiveMenu1-submenu-0" class="toggle"><i class="fa fa-hand-peace-o fa-2x">&nbsp;</i>Dashboard<b class="arrow-down"></b></label>
<a href="#"><i class="fa fa-hand-peace-o fa-2x">&nbsp;</i><br>Dashboard<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-0">
<ul role="menu">
<li role="menuitem"><a href="./pending.php">Verify&nbsp;Business</a></li>
<li role="menuitem"><a href="./approve.php">Approve&nbsp;Business</a></li>
<li role="menuitem"><a href="./deactivate.php">Deactivate&nbsp;Business</a></li>
</ul>
</li>
<li role="menuitem">
<label for="ResponsiveMenu1-submenu-1" class="toggle"><i class="fa fa-filter fa-2x">&nbsp;</i>Filters<b class="arrow-down"></b></label>
<a href="#"><i class="fa fa-filter fa-2x">&nbsp;</i><br>Filters<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-1">
<ul role="menu">
<li role="menuitem"><a href="./../filter/all.php">All&nbsp;Businesses</a></li>
<li role="menuitem"><a href="./../filter/custom.php">Custom&nbsp;Filters</a></li>
</ul>
</li>
<li role="menuitem">
<label for="ResponsiveMenu1-submenu-2" class="toggle"><i class="fa fa-folder-open-o fa-2x">&nbsp;</i>Account&nbsp;Settings<b class="arrow-down"></b></label>
<a href="#"><i class="fa fa-folder-open-o fa-2x">&nbsp;</i><br>Account&nbsp;Settings<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-2">
<ul role="menu">
<li role="menuitem"><a href="./../seting/support_reg.php">User&nbsp;Management</a></li>
<li role="menuitem"><a href="./../seting/changepwd.php">Change&nbsp;Passwords</a></li>
<li role="menuitem"><a href="./../seting/logout.php">Logout</a></li>
</ul>
</li>
</ul>
</div>
<div id="wb_Text2" style="position:absolute;left:1124px;top:282px;width:229px;height:21px;text-align:right;z-index:10;">
<span style="color:#800080;font-family:Arial;font-size:19px;"><strong><em>Howdy, $ADMIN</em></strong></span></div>
<div id="wb_Image2" style="position:absolute;left:1394px;top:260px;width:64px;height:64px;z-index:11;">
<img src="images/avatar4-sm.jpg" id="Image2" alt="" width="64" height="64"></div>
<div id="wb_Text4" style="position:absolute;left:730px;top:97px;width:529px;height:77px;text-align:center;z-index:12;">
<span style="color:#FFFFFF;font-family:Arial;font-size:35px;"><strong>BUSINESS SOCIAL NETWORK<br>Connect to Opportunity</strong></span></div>
<div id="wb_Image3" style="position:absolute;left:597px;top:72px;width:133px;height:125px;z-index:13;">
<img src="images/logo.png" id="Image3" alt="" width="133" height="125"></div>
<table style="position:absolute;left:298px;top:501px;width:1204px;height:273px;z-index:14;" id="Table1">
<tr>
<td class="cell0"><p style="font-weight:bold;"> BUSINESS USERNAME</p></td>
<td class="cell1"><p style="font-weight:bold;"><span style="font-weight:normal;">&nbsp;</span>REGISTRATION NUMBER</p></td>
<td class="cell2"><p style="font-weight:bold;"><span style="font-weight:normal;">&nbsp;</span>JOINING DATE</p></td>
<td class="cell3"><p><span style="font-weight:bold;">DEACTIVATE REASON</span></p></td>
<td class="cell4"><p style="font-weight:bold;">ACTIONS</p></td>
</tr>
<tr>
<td class="cell5"><p style="font-weight:bold;">CALTECH</p></td>
<td class="cell6"><p style="font-weight:bold;"> A121058G64</p></td>
<td class="cell7"><p>&nbsp; 18 Apr 2022</p></td>
<td class="cell8"><p>Doanh nghiệp giải thể</p>
<p>Chờ xác nhận xoá</p></td>
<td class="cell9"><input type="submit" id="Button5" name="Deactivate Account" value="Deactivate Account" style="display:inline-block;width:149px;height:53px;z-index:0;">
<input type="submit" id="Button6" onclick="window.confirm('This action can not be undone. Please confirm');return false;" name="PURGE" value="PURGE" style="display:inline-block;width:147px;height:53px;z-index:1;">
</td>
</tr>
<tr>
<td class="cell10"><p>&nbsp;<span style="font-weight:bold;"> H</span><span style="font-weight:bold;">ƯƠNG SHOP</span></p></td>
<td class="cell11"><p style="font-weight:bold;">&nbsp; A252858P49</p></td>
<td class="cell12"><p>&nbsp; 28 Apr 2022</p></td>
<td class="cell13"><p>Chủ page phản ánh bị hack mất account, chờ xác thực</p></td>
<td class="cell14"><input type="submit" id="Button3" name="Deactivate Account" value="Deactivate Account" style="display:inline-block;width:149px;height:53px;z-index:2;">
<input type="submit" id="Button4" onclick="window.confirm('window.confirm('This action can not be undone. Please confirm');');return false;" name="PURGE" value="PURGE" style="display:inline-block;width:147px;height:53px;z-index:3;">
</td>
</tr>
</table>
<div id="wb_Text3" style="position:absolute;left:689px;top:420px;width:423px;height:36px;text-align:center;z-index:15;">
<span style="color:#FF0000;font-family:Arial;font-size:32px;"><strong><em>DEACTIVATION LIST</em></strong></span></div>
</div>
</body>
</html>