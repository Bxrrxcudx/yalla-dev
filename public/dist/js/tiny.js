tinymce.init({
    selector: '#tinyMCE'
    , theme: 'modern'
    , entity_encoding : "raw"
    , encoding: "UTF-8"
    , height: 400
    , toolber: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
    , plugins: [
        'advlist autolink link image lists charmap preview hr anchor pagebreak spellchecker',
        'searchreplace code fullscreen insertdatetime media nonbreaking',
        'save table contextmenu directionality emoticons paste textcolor'
    ]
    , content_css : '/dist/css/AdminLTE.css'
});