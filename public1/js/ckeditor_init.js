let blockCk = document.querySelectorAll('.ckeditor');

blockCk.forEach(function (item) {
    let textarea = item.querySelector('textarea');

    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( textarea );



});