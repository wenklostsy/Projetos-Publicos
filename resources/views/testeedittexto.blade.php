<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tiny.cloud/1/966d3e3as87g56pns5byw8ycmgr4uhoz0hvrkvetrcseoehu/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <title>Teste</title>
</head>

<body>
    <textarea id="mytextarea"></textarea>

    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'advlist autolink lists link image charmap print preview spellchecker autosave',
            toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
            height: 400,
            width: 600,
            language: 'pt_BR',
            placeholder: 'Escreva seu texto aqui...',
            image_advtab: true,
            images_upload_url: 'upload.php',
            link_default_target: '_blank',
            autosave_ask_before_unload: false,
            autosave_interval: '30s'
        });
    </script>

</body>

</html>
