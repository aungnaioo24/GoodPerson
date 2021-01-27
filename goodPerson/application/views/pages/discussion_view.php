<div class="container" style="margin-top:50px">
  <div class="row content">
    <div class="col-sm-4" id="profilepart">
      <div class="profile hidden-xs">
        <div class="text-center">
          <h3 class="myprohead">My Profile</h3>
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
          <a href="<?php echo $editProfile; ?>">Edit Profile</a>
        </div>
        <?php } ?>
      </div>
    </div>
    <div class="col-sm-8" id="posts">
      <ul>
        <li>
          <div class="post">
            <input type="hidden" id="postId" value="<?php echo $dp_value->dp_id; ?>">
            <div class="textbar">
              <span class="dp_heading"><?php echo $dp_value->dp_heading; ?></span>
              <small class="dp_date" style="float: right;color: gray;"><?php echo $dp_value->dp_date; ?></small>
              <br><br>
              <p class="dp_text">
                <?php echo $dp_value->dp_text; ?>
              </p>
            </div>
            <div class="feedbackbar">
              <div class="btn-group btn-group-justified">
                <div class="btn-group">
                  <button class="btn btn-default">
                    Discuss <span class="badge">
                      <?php
                      if(isset($disNum[$dp_value->dp_id])){
                        echo $disNum[$dp_value->dp_id];
                      }else{
                        echo "0";
                      }
                      ?>
                    </span></button>
                </div>
                <div class="btn-group">
                  <?php
                  if(isset($likeNum[$dp_value->dp_id])){
                    if(in_array($_SESSION['user_id'], $likeUser[$dp_value->dp_id])){ ?>
                      <button class="btn btn-default liked unlike-btn">
                  <?php }else{ ?>
                      <button class="btn btn-default like-btn">
                  <?php }
                  }else{
                   ?>
                      <button class="btn btn-default like-btn">
                  <?php } ?>
                    Like <span class="badge">
                      <?php
                      if(!isset($likeNum[$dp_value->dp_id])){
                        echo "0";
                      }else{
                       echo $likeNum[$dp_value->dp_id];
                      }
                      ?>
                    </span></button>
                </div>
              </div>
            </div>
            <div class="txtfield">
              <input type="hidden" name="dpostid" class="dpostid" value="<?php echo $dp_value->dp_id; ?>">
              <textarea placeholder="Type here to discuss..." class="form-control disField" rows="2"></textarea>
              <button class="btn btn-default disAdd-btn">Discuss</button>
            </div>
            <div class="discussions">
              <ul>
                <?php foreach ($disResult as $key => $value) { ?>
                <li>
                  <?php $disuser_id=$value->dis_user_id; ?>
                  <input type="hidden" name="dis_id" class="dis_id" value="<?php echo $value->dis_id; ?>">
                  <div class="ediscussion">
                    <div class="dusers">
                      <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/UserProfile?disuser_id='.$disuser_id; ?>"><b class="dname"><?php echo $value->u_name; ?></b></a><br>
                      <?php if(!is_dir($propicFile) && file_exists($_SERVER['DOCUMENT_ROOT'].'/goodPerson/static/img/'.$value->u_propic) && $value->u_propic != ""){ ?>
                      <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/img/'.$value->u_propic; ?>" class="img-thumbnail propic" alt="Profile Picture">
                      <?php }else{ ?>
                      <img src="<?php echo $upropicFile ?>" class="img-thumbnail propic" alt="Profile Picture">
                      <?php } ?>
                    </div>
                    <div class="udis">
                      <p>
                        <?php echo $value->dis_text; ?>
                      </p>
                      <?php
                      if(isset($dLikeNum[$value->dis_id])){
                        if(in_array($_SESSION['user_id'], $dLikeUsers[$value->dis_id])){ ?>
                          <button class="btn btn-default undlike-btn dliked">
                      <?php }else{ ?>
                          <button class="btn btn-default dlike-btn">
                      <?php }
                      }else{
                       ?>
                       <button class="btn btn-default dlike-btn">
                        <?php } ?>
                        Like <span class="badge dlikenum">
                          <?php
                          if(!isset($dLikeNum[$value->dis_id])){
                            echo "0";
                          }else{
                           echo $dLikeNum[$value->dis_id];
                          }
                          ?>
                        </span></button>
                        <?php if($_SESSION['user_id']==$value->dis_user_id){ ?>
                        <a href="" style="float: right;" class="delDis">Delete</a>
                        <?php } ?>
                      <small style="padding: 5px; color: gray;">2017-06-11</small>
                    </div>
                  </div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", ".like-btn", function(){
  var postid = $(this).closest(".post").find("#postId").val();
  var likenumbr = parseInt($(this).find("span").text());
  $(this).addClass("tmp");

  $.post("Newfeed/dpLikeClick", {'postid':postid}, function(result){
    if(result.res){
      likenumbr = (likenumbr+1);
      $(".tmp").css("color", "#00b3b3");
      $(".tmp span").css("background", "#00b3b3");
      $(".tmp").find("span").html(likenumbr);
      $(".tmp").removeClass("like-btn");
      $(".tmp").addClass("unlike-btn");
      $(".tmp").removeClass("tmp");
    }
  }, "json");
});

$(document).on("click", ".unlike-btn", function(){
  var upostid = $(this).closest(".post").find("#postId").val();
  var ulikenumbr = parseInt($(this).find("span").text());
  $(this).addClass("utmp");

  $.post("Newfeed/dpUnlikeClick", {'postid':upostid}, function(uresult){
    if(uresult.res){
      ulikenumbr = (ulikenumbr-1);
      $(".utmp").css("color", "gray");
      $(".utmp span").css("background", "gray");
      $(".utmp").find("span").html(ulikenumbr);
      $(".utmp").removeClass("unlike-btn");
      $(".utmp").addClass("like-btn");
      $(".utmp").removeClass("utmp");
    }
  }, "json");
});

$(document).on("click", ".disAdd-btn", function(){
  var disText = $(".disField").val();
  var postid = $(".dpostid").val();
  $.post("Discussion/addDiscussion", {'disText':disText, 'postid':postid}, function(result){
    if(result.res){
      location.reload();
    }
  }, "json");
});

$(document).on("click", ".delDis", function(){

  var dresult = confirm("Are you sure to delete?");
  if(dresult){
    var dis_id = $(this).closest("li").find(".dis_id").val();
    $.post("Discussion/delDiscussion", {'dis_id':dis_id}, function(result){
      if(result.res){
        location.reload();
      }
    }, "json");
  }else{
}
});

$(document).on("click", ".dlike-btn", function(){
  var dis_id = $(this).closest("li").find(".dis_id").val();
  var postid = $(".dpostid").val();
  var dlikenumbr = parseInt($(this).closest("li").find(".dlikenum").text());
  $(this).addClass("tmp");
  $.post("Discussion/likeDiscussion", {'dis_id':dis_id, 'postid':postid}, function(dresult){
    if(dresult.res){
      dlikenumbr = (dlikenumbr+1);
      $(".tmp").css("color", "#00b3b3");
      $(".tmp span").css("background", "#00b3b3");
      $(".tmp").find(".dlikenum").html(dlikenumbr);
      $(".tmp").removeClass("dlike-btn");
      $(".tmp").addClass("undlike-btn");
      $(".tmp").removeClass("tmp");
    }
  }, "json");
});

$(document).on("click", ".undlike-btn", function(){
  var dis_id = $(this).closest("li").find(".dis_id").val();
  var postid = $(".dpostid").val();
  var dlikenumbr = parseInt($(this).closest("li").find(".dlikenum").text());
  $(this).addClass("tmp");
  $.post("Discussion/unlikeDiscussion", {'dis_id':dis_id, 'postid':postid}, function(dresult){
    if(dresult.res){
      dlikenumbr = (dlikenumbr-1);
      $(".tmp").css("color", "gray");
      $(".tmp span").css("background", "gray");
      $(".tmp").find(".dlikenum").html(dlikenumbr);
      $(".tmp").removeClass("undlike-btn");
      $(".tmp").addClass("dlike-btn");
      $(".tmp").removeClass("tmp");
    }
  }, "json");
});
</script>
