/**
 *
 *
 * @author Josh Lobe
 * http://ultimatetinymcepro.com
 */
 
jQuery(document).ready(function($) {


	tinymce.PluginManager.add('youTube', function(editor, url) {
		
		
		editor.addButton('youTube', {
			
			image: url + '/images/youtube.png',
			tooltip: 'YouTube Video',
			onclick: open_youTube
		});
		
		function open_youTube() {
			
			editor.windowManager.open({
					
				title: 'Enter YouTube URL',
				width: "100%",
				height: 150,
				url: url+'/youTube.php'
			})
		}
		
	});
});