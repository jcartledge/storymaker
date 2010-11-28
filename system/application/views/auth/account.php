<h2>Account settings</h2>
<dl>
  <dt>Username:</dt><dd><?php echo $user->username; ?></dd>
  <dt>Email:</dt><dd><?php echo $user->email; ?></dd>
  <dt>User type:</dt><dd><?php echo $user->type; ?></dd>
</dl>
<br>
<p>
  <?php echo anchor(site_url('auth/change_password'), 'Change your password'); ?><br>
  <?php echo anchor(site_url('auth/change_email'), 'Change your email address'); ?>
</p>
