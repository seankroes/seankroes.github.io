<?php
/**
 *
 *
 * @author Josh Lobe
 * http://ultimatetinymcepro.com
 */
?>

<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/jquery-ui-git.js"></script>
<script type="text/javascript" src="includes/youTube.js"></script>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/themes/smoothness/jquery-ui.css" />
<link rel="stylesheet" href="includes/youTube.css" />


<input type="text" id="youtube_url" size="80" class="form-control" placeholder="YouTube Url..." >
<br />


<input type="text" style="visibility: hidden; display: none;" id="youtube_width" size="2" class="form-control" value="100%" />
<input type="text" style="visibility: hidden; display:none;" id="youtube_height" size="2" class="form-control" value="100%" />


<button id="youtube_insert" class="btn-primary">Insert and Close</button>
<button id="youtube_cancel" class="btn-default">Cancel</button> 