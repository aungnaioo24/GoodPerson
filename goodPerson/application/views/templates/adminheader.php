<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$home = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Admin';
$profile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/AccManage';
//$discussion = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Discussion';
$knowledge = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/AdminKnowledgeFeed';
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>လူငယ္စကား</title>
    <link rel="stylesheet" type="text/css" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/css/style.css'; ?>" />
    <script type="text/javascript" src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/jquery/jquery.min.js'; ?>"></script>
    <style>
      .error{
        color: red;
      }
    </style>
  </head>
  <body>
    <nav class="navbar">
			<h2 class="logo"><a href="<?php echo $home; ?>">လူငယ္စကား</a></h2>
			<ul class="nav">
        <li><a href="<?php echo $home; ?>">Home</a></li>
        <li><a href="<?php echo $profile; ?>">Profile</a></li>
        <li><a href="<?php echo $knowledge ?>">Knowledge</a></li>
      </ul>
      <a href="/goodPerson/AdminLogout" class="logout">Logout</a>
		</nav>
