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
        .main{
       text-align :center;
      }
      .sub{
        padding-top :15px;
        width :200px;
        text-aligen :center;
        margin :0 auto;
      }
      .sub p{
        background :blue;
      font-size :40px;
      text-align :center;
      }
      img{
        height :500px;
        width :800px;

      }

        </style>
    </head>
    <body>
      <div class="main">
        <img src="https://www.pakutaso.com/shared/img/thumb/161103194934DSCF6903.jpg">
      </div>
      <div class="sub">
        <!--石を拾うは画像アップロードのコマンド-->　
        <p>石を拾う</p>
      </div>
        <div class="content">
            これは画像保存ページです。
            <div class="upload"><input type="file" name="file" id="file"></div>
            <img id="result">
            <input type = "button" value="強さを判定">
            <canvas id="canvas" style="display: none;"></canvas>
            <script type="text/javascript" src="{{ asset('/js/status.js') }}"></script>
            <script type="text/javascript">
              var file = document.getElementById('file');
              var canvas = document.getElementById('canvas');
              var canvasWidth = 360;
              var canvasHeight = 360;
              var uploadImgSrc;
              // Canvasの準備
              canvas.width = canvasWidth;
              canvas.height = canvasHeight;
              var ctx = canvas.getContext('2d');
              function loadLocalImage(e) {
                  // ファイル情報を取得
                  var fileData = e.target.files[0];
                  // 画像ファイル以外は処理を止める
                  if(!fileData.type.match('image.*')) {
                      alert('画像を選択してください');
                      return;
                  }
                  // FileReaderオブジェクトを使ってファイル読み込み
                  var reader = new FileReader();
                  // ファイル読み込みに成功したときの処理
                  reader.onload = function() {
                      // Canvas上に表示する
                      uploadImgSrc = reader.result;
                      canvasDraw();
                  }
                  // ファイル読み込みを実行
                  reader.readAsDataURL(fileData);
              }
              // ファイルが指定された時にloadLocalImage()を実行
              file.addEventListener('change', loadLocalImage, false);
              // Canvas上に画像を表示する
              function canvasDraw(imgSrc) {
                  // canvas内の要素をクリアする
                  ctx.clearRect(0, 0, canvasWidth, canvasHeight);
                  // Canvas上に画像を表示
                  var img = new Image();
                  img.src = uploadImgSrc;
                  img.onload = function() {
                      var width=img.naturalWidth;
                      var height = img.naturalHeight;
                      var magni = 360/(Math.min(width,height));
                      width*=magni;
                      height*=magni;
                      ctx.drawImage(img,180-width/2,180-height/2,width,height);
                      var imageData = ctx.getImageData(0,0,360,360);
                      var status = getStatus(imageData);
                      // canvasを画像に変換
                      var data = canvas.toDataURL();
                      document.getElementById('result').src = data; //statusにステータスがあります。dataが画像です。
                  }
              }
            </script>
        </div>
    </body>
</html>
