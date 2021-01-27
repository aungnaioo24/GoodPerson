<div class="content">
  <div class="posts" style="margin: 20px 250px;">
    <input type="text" name="addtitles" class="addptitle" placeholder="Type title of texts here..." required>
    <textarea name="addposts" class="addposts" placeholder="Type text here..." required></textarea>
    <button class="addpost-btn">Add Post</button>
    <br><br>
    <?php if($prev<0): ?>
    <?php else: ?>
      <a href="?start=<?php echo $prev ?>">&laquo; Previous</a>
    <?php endif; ?>
    <ul style="">
      <?php foreach ($knowledgeposts as $key => $value): ?>
      <li>
        <div class="post">
          <input type="hidden" id="postId" value="<?php echo $value->k_id; ?>">
          <div class="textbar">
            <span class="dp_heading"><?php echo $value->k_title; ?></span>
            <small class="dp_date"><?php echo $value->k_date; ?></small><br>
            <p class="dp_text"><?php echo $value->k_text; ?></p>
          </div>
          <div class="feedbackbar">
            <ul class="feedbacks">
              <li>
                <button class="delete-btn">
                  <b>Delete</b>
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
    <?php if($next>=$totalKnowledge): ?>
    <?php else: ?>
      <a href="?start=<?php echo $next; ?>">See more posts</a>
    <?php endif; ?>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", ".addpost-btn", function(){
  var title = $(".addptitle").val();
  var text = $(".addposts").val();

  $.post("AdminKnowledgeFeed/addPosts", {'title':title, 'text':text}, function(result){
    if(result.res){
      location.reload();
    }else {
      alert("error");
    }
  }, "json");
});

$(document).on("click", ".delete-btn", function(){
  var pid = parseInt($(this).closest(".post").find("#postId").val());
  $.post("AdminKnowledgeFeed/delPosts", {'pid':pid}, function(result){
    if(result.res){
      location.reload();
    }else {
      alert("error");
    }
  }, "json");
});
</script>
