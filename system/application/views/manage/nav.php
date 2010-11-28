<ul class="manage-nav">
<?php if($this->tank_auth->is_logged_in()) { ?>
  <li>Hi <?php echo $this->tank_auth->get_username(); ?></li>
  <li><a href="<?php echo site_url('auth/logout'); ?>">logout</a></li>
  <li><a href="<?php echo site_url('auth/account'); ?>">account settings</a></li>
  <li><a href="<?php echo site_url('manage'); ?>">manage stuff</a></li>
<?php } else { ?>
<li><a href="<?php echo site_url('auth/login'); ?>">login</a></li>
<li><a href="<?php echo site_url('auth/register'); ?>">sign up</a></li>
<?php } ?>
</ul>
