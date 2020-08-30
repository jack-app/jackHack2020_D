<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            .content {
                text-align: center;
                margin-top: 30vh;
            }
        </style>
    </head>
    <body>
        <div class="content">
            これは画像保存ページです。
            <input type = "file" id = "stonepicture" accept="image/*">
            <img id = "preview">
            <input type = "button" value="強さを判定">
            <script type="text/javascript" src="{{ asset('/js/cropimage.js') }}"></script>
            <script type="text/javascript" src="{{ asset('/js/status.js') }}"></script>
            <script type = "text/javascript">
              function previewFile(file) {
                // プレビュー画像を追加する要素
                const preview = document.getElementById('preview');
                // FileReaderオブジェクトを作成
                const reader = new FileReader();
                // URLとして読み込まれたときに実行する処理
                reader.onload = function (e) {
                  const imageUrl = e.target.result; // URLはevent.target.resultで呼び出せる
                  preview.src = imageUrl; // URLをimg要素にセット
                }
                // いざファイルをURLとして読み込む
                reader.readAsDataURL(file);
              }

              const fileInput = document.getElementById('stonepicture');
              const handleFileSelect = () => {
                const files = fileInput.files;
                var file = files[0];
                var image = new Image();
                var croppedImage=cropImage(image);
                var status=getStatus(croppedImage);
                previewFile(croppedImage);
                console.log(status);
              }
              fileInput.addEventListener('change', handleFileSelect);
            </script>
        </div>
    </body>
</html>
