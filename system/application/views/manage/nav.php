<ul class="manage-nav">
<?php if($auth->is_logged_in()) { ?>
  <li>Hi <?php echo $auth->get_username(); ?></li>
  <li><a href="/auth/logout">logout</a></li>
  <li><a href="/manage">manage stuff</a></li>
<?php } else { ?>
  <li><a href="/auth/login">login</a></li>
<?php } ?>
</ul>