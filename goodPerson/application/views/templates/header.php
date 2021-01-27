<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$home = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Newfeed';
$profile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Profile';
$discussion = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Discussion';
$knowledge = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Knowledgefeed';
$about = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/About';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>လူငယ္စကား</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/css/styles.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/bootstrap/bootstrap.min.css'; ?>">
    <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/jquery/jquery.min.js'; ?>"></script>
    <script src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/bootstrap/bootstrap.min.js'; ?>"></script>
    <style>
      .error{
        color: red;
      }
    </style>
  </head>
  <body class="body">
    <nav class="navbar navbar-default navbar-fixed-top" id="mnavbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle mtoggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <h2 class="logo"><a class="navbar-brand logolink" href="<?php echo $home; ?>">လူငယ္စကား</a></h2>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav mynav">
            <li><a href="<?php echo $home; ?>" class="nhome">Home</a></li>
            <li><a href="<?php echo $profile; ?>" class="nprofile">Profile</a></li>
            <li><a href="<?php echo $knowledge; ?>" class="nknowledge">Knowledge</a></li>
            <li><a href="<?php echo $about; ?>" class="nabout">About</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right mynav">
            <li><a href="/goodPerson/Logout" class="logout">Logout</a></li>
          </ul>
          <form action="UserProfile/search" method="post" class="searchName navbar-form navbar-right">
            <div class="input-group">
              <input type="text" name="searchName" placeholder="Search Members' Name" class="form-control searchTF">
            </div>
            <input type="submit" value="Search" class="search">
          </form>
        </div>
      </div>
    </nav>
