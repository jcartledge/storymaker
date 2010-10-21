<div class="comment">
  <dl>
    <dt>Date: </dt><dd><?php echo $comment->created_at; ?></dd>
    <dt>Author: </dt><dd><?php echo htmlspecialchars($comment->author); ?></dd>
    <dt>Title: </dt><dd><?php echo htmlspecialchars($comment->title); ?></dd>
  </dl>
  <p><?php echo nl2br(htmlspecialchars($comment->comment)); ?></p>
</div>
