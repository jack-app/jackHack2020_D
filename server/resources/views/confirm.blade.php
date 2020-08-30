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
          background : #999999;
}


        }
        .main-contents{
          width : 500px ;
          text-aligen :center;
          margin :0 auto;
          background :
        }
        .picture{
          padding-top :15px ;
          margin-top :15px;

        }
        .sub{
          margin-top :20px;
          width :500px;
          margin:0 auto;
          background : #666666;
        }
        .sub p{
          border-bottom :1px solid #dee7ec;
        }
        .sub-contents{
          float :left;
          width :110px;
          padding:30px 20px;

          margin-right :10px;
          height :150px;
        }
        .sub-contents h2{
          font-size :30px;
          opacity :0.8;

        }
        .marusa {
          color :red;
          opacity :0.8;
        }
        .surudosa{
          color :blue;
          opacity :0.8;
        }
        .ookisa{
          color :yellow;
          opacity :0.8;
        }
        .maru{
          background :#FF99FF;
        }
        .surudo{
          background :#CCFFFF;
        }
        .ooki{
          background :#FFCC00;
        }

        </style>
    </head>
    <body>
      <div class="main">
<div class="main-contents">
  <div class="picture">
    <img src="./DSC_0923.png" width="128" height="128" alt="石の画像">
  </div>
</div>
<div class="sub">
  <p>ステータス</p>
  <div class="sub-contents maru">
    <h2 class="marusa">丸さ</h2>
  </div>
  <div class="sub-contents surudo">
    <h2 class="surudosa">鋭さ</h2>
  </div>
  <div class="sub-contents ooki">
    <h2 class="ookisa">大きさ</h2>
  </div>
 </div>
</div>
    </body>
</html>
