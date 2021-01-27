<div class="container" style="margin-top:50px">
  <div class="row content">
    <div class="" id="profilepart">
      <div class="profile">
        <div class="text-center">
          <h3 class="myprohead">Profile</h3>
          <?php
          if(isset($userData)){
              $propicFile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/img/'.$userData->u_propic;
              $upropicFile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/img/unknown.png';
              $editProfile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Profile';
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
          <?php if ($userData->user_id == $_SESSION['user_id']) { ?>
          <a href="<?php echo $editProfile; ?>">Edit Profile</a>
          <?php } ?>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
