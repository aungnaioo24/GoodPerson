<div class="content">
  <div style="margin: 30px 500px; text-align: center;">
    <h2>Accounts Management</h2>
    <table border="1">
      <tr>
        <th style="width: 150px;">Users' Indexes</th>
        <th style="width: 200px;">Users' Names</th>
        <th style="width: 200px;"></th>
      </tr>
      <?php foreach ($users as $key => $value): ?>
        <tr>
          <td id="user_id"><?php echo $value->user_id; ?></td>
          <td><?php echo $value->u_name; ?></td>
          <td><a href="" id="del-btn">Delete Account</a></td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
</div>
<script type="text/javascript">
$(document).on("click", "#del-btn", function(){
  var user_id = parseInt($(this).closest('tr').find("#user_id").text());

  $.post("AccManage/del", {'user_id':user_id}, function(result){
    if(result.res){
      location.reload();
    }else {
      alert("error");
    }
  }, "json");
});
</script>
