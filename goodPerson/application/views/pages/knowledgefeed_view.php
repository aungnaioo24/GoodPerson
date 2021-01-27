<div class="container" style="margin-top:50px">
  <div class="row content">
    <div class="col-sm-4" id="profilepart">
      <div class="profile">
        <div class="text-center">
          <h3 class="myprohead hidden-xs">My Profile</h3>
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
            <table class="prodetailTable hidden-xs">
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
      <h3 class="views text-center">Knowledges</h3>
      <?php if($prev<0): ?>
      <?php else: ?>
        <a href="?start=<?php echo $prev ?>">&laquo; Previous</a>
      <?php endif; ?>
      <ul>
        <?php foreach ($knowledgeposts as $key => $value): ?>
        <li>
          <div class="post">
            <input type="hidden" id="postId" value="<?php echo $value->k_id; ?>">
            <div class="textbar">
              <span class="dp_heading"><?php echo $value->k_title; ?></span>
              <small class="dp_date" style="float: right;color: gray;"><?php echo $value->k_date; ?></small>
              <br><br>
              <p class="dp_text">
                <?php echo $value->k_text; ?>
              </p>
            </div>
            <div class="feedbackbar">
              <div class="btn-group btn-group-justified">
                <div class="btn-group">
                  <?php
                  if(isset($likeNum[$value->k_id])){
                    if(in_array($_SESSION['user_id'], $likeUser[$value->k_id])){ ?>
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
                      if(!isset($likeNum[$value->k_id])){
                        echo "0";
                      }else{
                       echo $likeNum[$value->k_id];
                     }
                      ?>
                    </span></button>
                </div>
              </div>
            </div>
          </div>
        </li>
        <?php
        endforeach;
        ?>
      </ul>
      <?php if($next>=$totalKnowledge): ?>
      <?php else: ?>
        <a href="?start=<?php echo $next; ?>">See more posts</a>
      <?php endif; ?>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(document).on("click", ".like-btn", function(){
    var postid = $(this).closest(".post").find("#postId").val();
    var likenumbr = parseInt($(this).find("span").text());
    $(this).addClass("tmp");

    $.post("Knowledgefeed/kLikeClick", {'postid':postid}, function(result){
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

    $.post("Knowledgefeed/kUnlikeClick", {'postid':upostid}, function(uresult){
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
</script>
