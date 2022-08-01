<?php
session_start();
$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'changepassword')
{
   $database = './usersdb.php';
   $success_page = '';
   if (!isset($_SESSION['username']))
   {
      $error_message = 'Not logged in!';
   }
   else
   if (filesize($database) == 0)
   {
      $error_message = 'User database not found!';
   }
   else
   {
      $password_value = md5($_POST['password']);
      $newpassword = md5($_POST['newpassword']);
      $confirmpassword = md5($_POST['confirmpassword']);
      $username_value = $_SESSION['username'];
      if ($_POST['newpassword'] != $_POST['confirmpassword'])
      {
         $error_message = 'The confirm new password must match the new password entry';
      }
      else
      if (!preg_match("/^[A-Za-z0-9-_!@$]{1,50}$/", $_POST['newpassword']))
      {
         $error_message = 'New password is not valid, please check and try again!';
      }
      else
      {
         $items = file($database, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
         foreach($items as $line)
         {
            list($username, $password) = explode('|', trim($line));
            if ($username_value == $username)
            {
               if ($password_value != $password)
               {
                  $error_message = 'Old password is not valid!';
                  break;
               }
            }
         }
         if (empty($error_message))
         {
            $file = fopen($database, 'w');
            foreach($items as $line)
            {
               $values = explode('|', trim($line));
               if ($username_value == $values[0])
               {
                  $values[1] = $newpassword;
                  $line = '';
                  for ($i=0; $i < count($values); $i++)
                  {
                     if ($i != 0)
                        $line .= '|';
                     $line .= $values[$i];
                  }
               }
               fwrite($file, $line);
               fwrite($file, "\r\n");
            }
            fclose($file);
            header('Location: '.$success_page);
            exit;
         }
      }
   }
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supreme Dashboard</title>
<meta name="generator" content="BSN">
<link href="font-awesome.min.css" rel="stylesheet">
<link href="BSN_admin.css" rel="stylesheet">
<link href="changepwd.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_Shape2" style="position:absolute;left:250px;top:322px;width:1300px;height:842px;z-index:0;">
<img src="images/img0009.png" id="Shape2" alt="" width="1300" height="842" style="width:1300px;height:842px;"></div>
<div id="wb_Text3" style="position:absolute;left:2055px;top:837px;width:310px;height:36px;text-align:center;z-index:1;">
<span style="color:#000000;font-family:Arial;font-size:32px;"><strong><em>Change password</em></strong></span></div>
<div id="wb_ResponsiveMenu1" style="position:absolute;left:250px;top:193px;width:1300px;height:117px;z-index:2;">
<label class="toggle" for="ResponsiveMenu1-submenu" id="ResponsiveMenu1-title">Menu<span id="ResponsiveMenu1-icon"><span>&nbsp;</span><span>&nbsp;</span><span>&nbsp;</span></span></label>
<input type="checkbox" id="ResponsiveMenu1-submenu">
<ul class="ResponsiveMenu1" id="ResponsiveMenu1" role="menu">
<li role="menuitem">
<label for="ResponsiveMenu1-submenu-0" class="toggle"><i class="fa fa-hand-peace-o fa-2x">&nbsp;</i>Dashboard<b class="arrow-down"></b></label>
<a href="#"><i class="fa fa-hand-peace-o fa-2x">&nbsp;</i><br>Dashboard<b class="arrow-down"></b></a>
<input type="checkbox" id="ResponsiveMenu1-submenu-0">
<ul role="menu">
<li role="menuitem"><a href="./../verify/pending.php">Verify&nbsp;Business</a></li>
<li role="menuitem"><a href="./../verify/approve.php">Approve&nbsp;Business</a></li>
<li role="menuitem"><a href="./../verify/deactivate.php">Deactivate&nbsp;Business</a></li>
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
<li role="menuitem"><a href="./support_reg.php">User&nbsp;Management</a></li>
<li role="menuitem"><a href="./changepwd.php">Change&nbsp;Passwords</a></li>
<li role="menuitem"><a href="./logout.php">Logout</a></li>
</ul>
</li>
</ul>
</div>
<div id="wb_Text2" style="position:absolute;left:1124px;top:225px;width:229px;height:21px;text-align:right;z-index:3;">
<span style="color:#800080;font-family:Arial;font-size:19px;"><strong><em>Howdy, $ADMIN</em></strong></span></div>
<div id="wb_Image2" style="position:absolute;left:1394px;top:203px;width:64px;height:64px;z-index:4;">
<img src="images/avatar4-sm.jpg" id="Image2" alt="" width="64" height="64"></div>
<div id="wb_Text4" style="position:absolute;left:730px;top:40px;width:529px;height:77px;text-align:center;z-index:5;">
<span style="color:#FFFFFF;font-family:Arial;font-size:35px;"><strong>BUSINESS SOCIAL NETWORK<br>Connect to Opportunity</strong></span></div>
<div id="wb_Image3" style="position:absolute;left:597px;top:15px;width:133px;height:125px;z-index:6;">
<img src="images/logo.png" id="Image3" alt="" width="133" height="125"></div>
<div id="wb_Text1" style="position:absolute;left:745px;top:360px;width:310px;height:36px;text-align:center;z-index:7;">
<span style="color:#FF0000;font-family:Arial;font-size:32px;"><strong><em>User Management</em></strong></span></div>
<div id="wb_ChangePassword1" style="position:absolute;left:536px;top:464px;width:729px;height:409px;z-index:8;">
<form name="changepasswordform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="changepasswordform">
<input type="hidden" name="form_name" value="changepassword">
<table id="ChangePassword1">
<tr>
   <td class="header" colspan="2">Change your password</td>
</tr>
<tr>
   <td class="label"><label for="password">Password</label></td>
   <td class="row"><input class="input" name="password" type="password" id="password"></td>
</tr>
<tr>
   <td class="label"><label for="newpassword">New Password</label></td>
   <td class="row"><input class="input" name="newpassword" type="password" id="newpassword"></td>
</tr>
<tr>
   <td class="label"><label for="confirmpassword">Confirm New Password</label></td>
   <td class="row"><input class="input" name="confirmpassword" type="password" id="confirmpassword"></td>
</tr>
<tr>
   <td colspan="2"><?php echo $error_message; ?></td>
</tr>
<tr>
   <td>&nbsp;</td><td style="text-align:left;vertical-align:bottom"><input class="button" type="submit" name="changepassword" value="Change Password" id="changepassword"></td>
</tr>
</table>
</form>
</div>
</div>
</body>
</html>