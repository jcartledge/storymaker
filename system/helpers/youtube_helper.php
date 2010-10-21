<?php

function youtube_embed($url, $width = 480, $height = 385) {
  parse_str(array_pop(explode('?', $url, 2)), $querystring);
  return sprintf('
    <object width="%d" height="%d"><param name="movie" value="http://www.youtube.com/v/%s?fs=1&amp;hl=en_US&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/%s?fs=1&amp;hl=en_US&amp;rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="%d" height="%d"></embed></object>
  ', $width, $height, $querystring['v'], $querystring['v'], $width, $height);
}
