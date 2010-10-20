<form class="comment-form" action="/comment/post/<?php echo $story_id; ?>" method="post">
  <p>
    <label for="commenter">Your name:</label>
    <input name="commenter">
  </p>
  <p>
    <label for="title">Title:</label>
    <input name="title">
  </p>
  <p>
    <label for="comment">Comment:</label>
    <textarea name="comment"></textarea>
  </p>
  <p><input type="submit" value="Add comment"></p>
</form>
