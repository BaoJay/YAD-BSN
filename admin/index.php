<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['form_name']) && $_POST['form_name'] == 'loginform')
{
   $success_page = './verify/pending.php';
   $error_page = basename(__FILE__);
   $mysql_server = 'localhost';
   $mysql_username = 'root';
   $mysql_password = '';
   $mysql_database = 'bsn_dbs';
   $mysql_table = 'admin';
   $crypt_pass = md5($_POST['password']);
   $found = false;
   $db_email = '';
   $db_fullname = '';
   $db_username = '';
   $db_role = '';
   $db_avatar = '';
   $session_timeout = 600;
   $db = mysqli_connect($mysql_server, $mysql_username, $mysql_password);
   if (!$db)
   {
      die('Failed to connect to database server!<br>'.mysqli_error($db));
   }
   mysqli_select_db($db, $mysql_database) or die('Failed to select database<br>'.mysqli_error($db));
   mysqli_set_charset($db, 'utf8');
   $sql = "SELECT * FROM ".$mysql_table." WHERE username = '".mysqli_real_escape_string($db, $_POST['username'])."'";
   $result = mysqli_query($db, $sql);
   if ($data = mysqli_fetch_array($result))
   {
      if ($crypt_pass == $data['password'] && $data['active'] != 0)
      {
         $found = true;
         $db_email = $data['email'];
         $db_fullname = $data['fullname'];
         $db_username = $data['username'];
         $db_role = $data['role'];
         $folder = substr($_SERVER['REQUEST_URI'], 0, strrpos($_SERVER['REQUEST_URI'], '/') + 1);
         $db_avatar = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$folder" . "avatars/" . $data['avatar'];
      }
   }
   mysqli_close($db);
   if ($found == false)
   {
      header('Location: '.$error_page);
      exit;
   }
   else
   {
      $_SESSION['email'] = $db_email;
      $_SESSION['fullname'] = $db_fullname;
      $_SESSION['username'] = $db_username;
      $_SESSION['role'] = $db_role;
      $_SESSION['avatar'] = $db_avatar;
      $_SESSION['expires_by'] = time() + $session_timeout;
      $_SESSION['expires_timeout'] = $session_timeout;
      header('Location: '.$success_page);
      exit;
   }
}
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
$password = isset($_COOKIE['password']) ? $_COOKIE['password'] : '';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Supreme Dashboard</title>
<meta name="generator" content="BSN">
<link href="BSN_admin.css" rel="stylesheet">
<link href="index.css" rel="stylesheet">
</head>
<body>
<div id="container">
<div id="wb_Text1" style="position:absolute;left:702px;top:192px;width:529px;height:77px;text-align:center;z-index:0;">
<span style="color:#FFFFFF;font-family:Arial;font-size:35px;"><strong>BUSINESS SOCIAL NETWORK<br>Connect to Opportunity</strong></span></div>
<div id="wb_Text2" style="position:absolute;left:603px;top:340px;width:595px;height:54px;text-align:center;z-index:1;">
<span style="color:#FFFF00;font-family:Arial;font-size:48px;"><strong>SUPREME DASHBOARD</strong></span></div>
<div id="wb_ad_login" style="position:absolute;left:569px;top:456px;width:662px;height:285px;text-align:center;z-index:2;">
<form name="loginform" method="post" accept-charset="UTF-8" action="<?php echo basename(__FILE__); ?>" id="loginform">
<input type="hidden" name="form_name" value="loginform">
<table id="ad_login" class="h2">
<tr>
   <td class="header" colspan="2">Welcome to Supreme Dashboard of BSN</td>
</tr>
<tr>
   <td class="label"><label for="username">Who are you?</label></td>
   <td class="row"><input class="input" name="username" type="text" id="username" value="<?php echo $username; ?>"></td>
</tr>
<tr>
   <td class="label"><label for="password">Password</label></td>
   <td class="row"><input class="input" name="password" type="password" id="password" value="<?php echo $password; ?>"></td>
</tr>
<tr>
   <td style="text-align:right;vertical-align:bottom" colspan="2"><input class="button" type="submit" name="login" value="OK, LET'S GET IN" id="login"></td>
</tr>
</table>
</form>
</div>
<div id="wb_Image1" style="position:absolute;left:569px;top:166px;width:133px;height:125px;z-index:3;">
<img src="images/logo.png" id="Image1" alt="" width="133" height="125"></div>
<div id="wb_Shape1" style="position:absolute;left:1026px;top:637px;width:188px;height:57px;z-index:4;">
<a href="#" onclick="window.location.href='./verify/pending.php';return false;"><img src="images/img0010.png" id="Shape1" alt="" width="188" height="57" style="width:188px;height:57px;"></a></div>
</div>
</body>
</html>