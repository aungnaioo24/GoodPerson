<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
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

			.warning{
				color: #ffa31a;
			}
		</style>
  </head>
  <body class="body">
    <nav class="navbar navbar-default" id="mnavbar">
      <div class="container-fluid">
        <div class="navbar-header">
          <h2 class="logo"><a class="navbar-brand logolink" href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/'; ?>">လူငယ္စကား</a></h2>
        </div>
        <div id="myNavbar">
          <form class="form-inline navbar-right login" action="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/welcome/formLogin'; ?>" method="post">
            <div class="form-group">
              <label for="name">Name: </label>
				      <input type="text" required name="name" id="name" placeholder="Name" class="form-control" />
            </div>
            <div class="form-group">
              <label for="lpassword">Password: </label>
				      <input type="password" required name="password" id="lpassword" placeholder="Password" class="form-control" />
            </div>
            <input type="submit" value="Login" class="btn btn-default">
            <br><a href="#register" class="hidden-sm hidden-md hidden-lg" style="color: #ffffff;text-decoration: underline;">If you don't have account, register easily here.</a>
          </form>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 well" id="welcome">
          <h2 class="text-center">လူငယ္စကား website မွႀကိဳဆိုပါသည္</h2>
          <p>
              လူငယ္စကား website သည္ ေပးထားေသာအေၾကာင္းအရာတစ္ခုေအာက္တြင္ လူငယ္မ်ား၏အသိပညာမ်ား၊ ဖတ္႐ွဳေလ့လာထားေသာ အေၾကာင္းအရာမ်ားျဖင့္ ပါ၀င္ေဆြးေႏြးရေသာ
               website တစ္ခုျဖစ္သည္။ သည္ website တြင္
          </p>
          <ul>
            <li>Server မွေပးထားေသာ ေခါင္းစဥ္၏ေအာက္တြင္ Discuss ခလုတ္ကိုႏိွပ္ၿပီး ေဆြးေႏြးႏိုင္သည္။</li>
            <li>ကိုယ္ႀကိဳက္ေသာ ေဆြးေႏြးခ်က္မ်ားကို vote လုပ္ႏိုင္သည္။</li>
            <li>Knowledgefeed တြင္လည္း လူငယ္မ်ားအတြက္ ဗဟုသုတ မ်ားကို ဖတ္ႏိုင္မည္။</li>
            <li>မိမိ ေဆြးေႏြးလိုေသာ အေၾကာင္းအရာ မ်ားကိုလည္း post တစ္ခုခုေအာက္တြင္ အၾကံျပဳႏိုင္သည္။</li>
          </ul>
          <p>အေသးစိတ္ အေၾကာင္းအရာမ်ားကို login ၀င္ၿပီး about တြင္ၾကည့္ႏိုင္မည္။</p>
          <i>P.S သည္ website သည္ IT ေက်ာင္းသားတစ္ေယာ္အေနျဖင့္စမ္းသပ္ေရးထားေသာ website ျဖစ္သည္။</i>
        </div>
        <div class="col-sm-6">
          <div class="register well" id="register">
            <h3>Register</h3>
            <span style="color: blue;">If you don't have account, register here.</span><br><br>
				    <form action="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/welcome/formRegister'; ?>" method="post" class="form-horizontal">
              <div class="form-group">
                <span class="warning text-warning">(Name can only be letters, numbers and underscored)</span><br>
                <label for="rname" class="control-label col-sm-4">Name: </label>
                <div class="col-sm-8">
                  <input type="text" required name="name" id="rname" placeholder="Name" class="form-control">
                </div>
              </div>
              <?php if(isset($nameErr)) echo '<br><span class="error">* '.$nameErr.'</span>' ?>
              <div class="form-group">
                <label for="email" class="control-label col-sm-4">Email: </label>
                <div class="col-sm-8">
                  <input type="email" required name="email" id="email" placeholder="Email" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="password" class="control-label col-sm-4">Password: </label>
                <div class="col-sm-8">
                  <input type="password" required name="password" id="password" placeholder="Password" class="form-control">
                </div>
              </div>
              <div class="form-group">
                <label for="cpassword" class="control-label col-sm-4">Comfirm Password: </label>
                <div class="col-sm-8">
                  <input type="password" required name="cpassword" id="cpassword" placeholder="Comfirm Password" class="form-control">
                </div>
              </div>
              <?php if(isset($passErr)) echo '<br><span class="error">* '.$passErr.'</span>' ?>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" value="Register" class="btn btn-default">
                </div>
              </div>
				    </form>
          </div>
        </div>
      </div>
    </div>
    <footer class="container-fluid text-center" id="footer">
      <p>2017 Created by Aung Nai Oo(WYTU)</p>
    </footer>
  </body>
</html>
