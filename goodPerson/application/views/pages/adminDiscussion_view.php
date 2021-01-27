<div class="content">
  <!-- This is posts codes -->
  <div class="posts">
    <ul>
      <li>
        <!-- Post Texts -->
        <div class="post" style="margin: 20px 260px;">
          <input type="hidden" id="postId" value="<?php echo $dp_value->dp_id; ?>">
          <div class="textbar" style="border-bottom: 1px solid #a6a6a6;">
            <span class="dp_heading"><?php echo $dp_value->dp_heading; ?></span>
            <small class="dp_date"><?php echo $dp_value->dp_date; ?></small><br>
            <p class="dp_text"><?php echo $dp_value->dp_text; ?></p>
          </div>
          <div class="discussions">
            <ul>
              <?php foreach ($disResult as $key => $value) { ?>
                <?php
                  $propicFile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/img/'.$value->u_propic;
                  $upropicFile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/img/unknown.png';
                  $editProfile = 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/Profile';
                ?>
              <li>
                <?php $disuser_id=$value->dis_user_id; ?>
                <input type="hidden" name="dis_id" class="dis_id" value="<?php echo $value->dis_id; ?>">
                <div class="ediscussion">
                  <!-- User Name and Propic -->
                  <div class="dusers">
                    <a href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/UserProfile?disuser_id='.$disuser_id; ?>" class="duname"><?php echo $value->u_name; ?></a><br>
                    <?php if(!is_dir($propicFile) && file_exists($_SERVER['DOCUMENT_ROOT'].'/goodPerson/static/img/'.$value->u_propic) && $value->u_propic != ""){ ?>
                    <img src="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/static/img/'.$value->u_propic; ?>" class="dupropic">
                    <?php }else{ ?>
                    <img src="<?php echo $upropicFile ?>" class="dupropic">
                    <?php } ?>
                  </div>
                  <div class="udis">
                    <p><?php echo $value->dis_text; ?></p>
                    <a href="" style="float: right;" class="delDis">Delete</a>
                    <small style="float: right; padding: 5px; color: gray;"><?php echo $value->dis_date; ?></small>
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
<script type="text/javascript">
$(document).on("click", ".delDis", function(){
  var dis_id = $(this).closest("li").find(".dis_id").val();
  $.post("AdminDiscussion/delDiscussion", {'dis_id':dis_id}, function(result){
    if(result.res){
      location.reload();
    }
  }, "json");
});
</script>
