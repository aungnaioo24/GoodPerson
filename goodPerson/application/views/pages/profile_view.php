<div class="container" style="margin-top:50px">
  <div class="row content">
    <div class="col-sm-6" id="profilepart">
      <div class="profile">
        <div class="text-center">
          <h3 class="myprohead">My Profile</h3>
          <?php
          if(isset($userData)){
              $propicFile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/img/'.$userData->u_propic;
              $upropicFile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/img/unknown.png';
              if(!is_dir($propicFile) && file_exists($_SERVER['DOCUMENT_ROOT'].'/goodPerson/static/img/'.$userData->u_propic) && $userData->u_propic != ""){
          ?>
                <img src="<?php echo $propicFile; ?>" class="img-thumbnail propic" alt="Profile Picture">
          <?php }else{ ?>
                <img src="<?php echo $upropicFile; ?>" class="img-thumbnail propic" alt="Profile Picture">
          <?php } ?>
          <h4 class="myproname"><?php echo $userData->u_name; ?></h4>
          </div>
          <div class="myprodetail">
            <table class="prodetailTable">
          <?php if($userData->u_ambition != ""){ ?>
            <tr>
              <td class="td1"><span>Ambition - </span></td>
              <td class="td2"><span class="text-info"><?php echo $userData->u_ambition; ?></span></td>
            </tr>
          <?php }
                if($userData->u_favquote != ""){
           ?>
            <tr>
              <td class="td1"><span>Favourite Quote - </span></td>
              <td class="td2"><span class="text-info"><?php echo $userData->u_favquote; ?></span></td>
            </tr>
          <?php }
                if($userData->u_university != ""){
          ?>
            <tr>
              <td class="td1"><span>University - </span></td>
              <td class="td2"><span class="text-info"><?php echo $userData->u_university; ?></span></td>
            </tr>
          <?php }
                if($userData->u_work != ""){
          ?>
            <tr>
              <td class="td1"><span>Work at - </span></td>
              <td class="td2"><span class="text-info"><?php echo $userData->u_work; ?></span></td>
            </tr>
          <?php }
                if($userData->u_city != ""){
          ?>
            <tr>
              <td class="td1"><span>Live in - </span></td>
              <td class="td2"><span class="text-info"><?php echo $userData->u_city; ?></span></td>
            </tr>
          <?php } ?>
          </table>
          <br>
          <a href="#profile" class="hidden-sm hidden-md hidden-lg">Edit Profile</a>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-sm-6" id="editProfilePart">
      <h3 class="views text-center">Profile</h3>
      <div class="profile" id="profile">
        <h3>Edit Profile</h3>
        <form action="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Profile/edit'; ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
          <input type="hidden" name="id" value="<?php echo $userData->user_id; ?>">
          <label for="propic">Profile Picture: </label><br>
          <?php
              if(!is_dir($propicFile) && file_exists($_SERVER['DOCUMENT_ROOT'].'/goodPerson/static/img/'.$userData->u_propic) && $userData->u_propic != ""){
          ?>
                <img src="<?php echo $propicFile ?>" class="img-thumbnail propic" alt="Profile Picture"><br>
          <?php }else{ ?>
                <img src="<?php echo $upropicFile ?>" class="img-thumbnail propic" alt="Profile Picture"><br>
          <?php } ?>
          <input type="file" name="propic" id="propic"><br>
          <div class="form-group">
            <label class="control-label col-sm-4" for="name">Name: </label>
            <div class="col-sm-8">
              <input type="text" name="name" id="name" value="<?php echo $userData->u_name; ?>" placeholder="Name" required class="form-control"><small style="color: orange;"> You must use this edit name when you login</small>
            </div>
            <?php if(isset($nameErr)) echo '<br><span class="error">* '.$nameErr.'</span>' ?>
            </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="email">Email: </label>
            <div class="col-sm-8">
              <input type="email" name="email" id="email" value="<?php echo $userData->u_email; ?>" placeholder="Email" required class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="city">City: </label>
            <div class="col-sm-8">
              <input type="text" name="city" id="city" value="<?php echo $userData->u_city; ?>" placeholder="City" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="address">Address: </label>
            <div class="col-sm-8">
              <textarea name="address" id="address" placeholder="Address" class="form-control" rows="1"><?php echo $userData->u_address; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="favquote">Favourite Quote: </label>
            <div class="col-sm-8">
              <textarea name="favquote" id="favquote" placeholder="Favourite Quote" class="form-control" rows="1"><?php echo $userData->u_favquote; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="ambition">Ambition: </label>
            <div class="col-sm-8">
              <textarea name="ambition" id="ambition" placeholder="Ambition" class="form-control" rows="1"><?php echo $userData->u_ambition; ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="university">University: </label>
            <div class="col-sm-8">
              <input type="text" name="university" id="university" value="<?php echo $userData->u_university; ?>" placeholder="University" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-4" for="work">Work: </label>
            <div class="col-sm-8">
              <input type="text" name="work" id="work" value="<?php echo $userData->u_work; ?>" placeholder="Work" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8">
              <input type="submit" value="Update" class="btn btn-default">
            </div>
          </div>
        </form>
        <br>
        <a href="" class="del">Delete Account</a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", ".del", function(){
  var result = confirm("Are you sure to delete?");
  if(result){
    window.location.href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Profile/del' ?>";
  }else{
  }
});
</script>
