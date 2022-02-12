tinymce.init({ selector:'textarea',
branding: false, forced_root_block : "",
skin: "default",
image_dimensions: false,
         image_class_list: [
            {title: 'Responsive', value: 'img-responsive'}
        ],
plugins: [
"advlist autolink link image charmap print anchor",
"searchreplace visualblocks code fullscreen",
"insertdatetime media table contextmenu paste youTube" , "wordcount" , "youTube"
],
toolbar: "insertfile undo redo | bold italic underline strikethrough | link image youTube | center",
 setup: function (editor) {
editor.on('change', function () {
tinymce.triggerSave();
});

editor.addButton('center', {
  text: "center",
  onclick: function () {
     // Add your own code to execute something on click 
    editor.focus();
    editor.selection.setContent('<a style="display: table; margin: 0 auto;">' + editor.selection.getContent() + '</a>');
  }
});


}});