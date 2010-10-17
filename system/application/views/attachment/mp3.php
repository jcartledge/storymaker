<div id="player_<?php echo basename($attachment); ?>">
  <a href="<?php echo $attachment; ?>">Download <?php echo basename($attachment); ?></a>
</div>
<script type="text/javascript">
  var fo = new SWFObject("/swf/mp3player.swf", "mp3Player", "300", "20", "7", "#ffffff", true);
  fo.addParam( "flashVars", "file=<?php echo $attachment; ?>&autostart=false");
  fo.write("player_<?php echo basename($attachment); ?>");
</script>

