jQuery(document).ready(function(e){var i=!0,t=wp.media.editor.send.attachment;e("#vc_ui-panel-edit-element .file-picker-button").click(function(n){var d=(wp.media.editor.send.attachment,e(this)),a=e(this).parent().find(".file-remover-button"),r=e(this).parent().find(".file_picker_field"),l=e(this).parent().find(".file_picker_display");return i=!0,wp.media.editor.send.attachment=function(e,n){return i?(l.html(n.url),r.val(n.id),d.addClass("hidden"),a.removeClass("hidden"),void 0):t.apply(this,[e,n])},wp.media.editor.open(d),!1}),e("#vc_ui-panel-edit-element .file-remover-button").click(function(i){var t=e(this).parent().find(".file-picker-button"),n=e(this),d=e(this).parent().find(".file_picker_field"),a=e(this).parent().find(".file_picker_display");a.html(""),d.val(""),t.removeClass("hidden"),n.addClass("hidden")}),e(".add_media").on("click",function(){i=!1})});