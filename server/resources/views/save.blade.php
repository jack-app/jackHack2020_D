<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        
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
        body {
          background-image: url('https://www.pakutaso.com/shared/img/thumb/161103194934DSCF6903.jpg');
          background-color:rgba(255,255,255,0.6);
          background-blend-mode:lighten;
          background-size: cover;
        }

        </style>
    </head>
    <body>
        <div class="content">
          <!--<div class="main">
            <img src="https://www.pakutaso.com/shared/img/thumb/161103194934DSCF6903.jpg">
          </div>-->
          <div class="sub">
            <p>石を拾う</p>
            <div class="upload"><input type="file" name="file" id="file" accept="image/*"></div>
            <img id="result" style="display: none;">
            <form action="status" method="post">
              <input type="text" id = "attack" value="0" style="display: none;">
              <input type="text" id = "defence" value="0" style="display: none;">
              <input type="text" id = "HP" value="0" style="display: none;">
              <input type="text" id = "color" value="0" style="display: none;">
              <input type = "submit" id = "submit" value="強さを判定" style="display: none;">
            </form>
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
                    document.getElementById('submit').style.display="none";
                    document.getElementById('result').style.display="none";
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
                      document.getElementById('HP').value=Math.round(status[0]);
                      document.getElementById('attack').value=Math.round(status[1]);
                      document.getElementById('defence').value=Math.round(status[2]);
                      document.getElementById('color').value=Math.round(status[3]);
                      document.getElementById('submit').style.display="block";
                      // canvasを画像に変換
                      var data = canvas.toDataURL();
                      document.getElementById('result').style.display="block";
                      document.getElementById('result').src = data; //statusにステータスがあります。dataが画像です。
                  }
              }
            </script>
          </div>
        </div>
    </body>
</html>
