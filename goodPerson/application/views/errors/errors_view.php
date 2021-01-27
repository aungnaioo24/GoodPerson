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
    <div class="alert alert-warning" style="margin: 30px; margin-bottom: 20px;">
      <strong><?php echo $etitle; ?></strong>
      <br><br>
      <p><?php echo $etext; ?></p>
    </div>
