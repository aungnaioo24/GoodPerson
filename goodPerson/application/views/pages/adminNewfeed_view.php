<div class="content">
  <div class="posts" style="margin: 20px 260px;">
    <input type="text" name="addtitles" class="addptitle" placeholder="Type title of texts here..." required>
    <textarea name="addposts" class="addposts" placeholder="Type text here..." required></textarea>
    <button class="addpost-btn">Add Post</button>
    <br><br>
    <?php if($prev<0): ?>
    <?php else: ?>
      <a href="?start=<?php echo $prev ?>">&laquo; Previous</a>
    <?php endif; ?>
    <ul>
      <?php foreach ($disposts as $dp_key => $dp_value):
      ?>
      <li>
        <div class="post">
          <input type="hidden" id="postId" value="<?php echo $dp_value->dp_id; ?>">
          <div class="textbar">
            <span class="dp_heading"><?php echo $dp_value->dp_heading; ?></span>
            <small class="dp_date"><?php echo $dp_value->dp_date; ?></small><br>
            <p class="dp_text"><?php echo $dp_value->dp_text; ?></p>
          </div>
          <div class="feedbackbar">
            <ul class="feedbacks">
              <li>
                <button class="delete-btn">
                  <b>Delete</b>
                </button>
              </li>
              <li>
                <button class="discussion-btn">
                  <b>Discussions</b>
                </button>
              </li>
            </ul>
          </div>
        </div>
      </li>
      <?php
      endforeach;
      ?>
    </ul>
    <?php if($next>=$totalDisPost): ?>
    <?php else: ?>
      <a href="?start=<?php echo $next; ?>">See more posts</a>
    <?php endif; ?>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", ".addpost-btn", function(){
  var title = $(".addptitle").val();
  var text = $(".addposts").val();

  $.post("Admin/addPosts", {'title':title, 'text':text}, function(result){
    if(result.res){
      location.reload();
    }else {
      alert("error");
    }
  }, "json");
});

$(document).on("click", ".delete-btn", function(){
  var pid = parseInt($(this).closest(".post").find("#postId").val());
  $.post("Admin/delPosts", {'pid':pid}, function(result){
    if(result.res){
      location.reload();
    }else {
      alert("error");
    }
  }, "json");
});

$(document).on("click", ".discussion-btn", function(){
  var pid = parseInt($(this).closest(".post").find("#postId").val());
  window.location.href="<?php echo 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].'/goodPerson/AdminDiscussion?postid=' ?>"+pid;
});
</script>
