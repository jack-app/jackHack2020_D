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
            これはステータス確認ページです。
            <div class="picture">
              <img src="./DSC_0923.png" width="128" height="128" alt="石の画像">
            </div>
            <div class= "status">
              <div class="attack">
                ここが攻撃力
              </div>
              <div class="defence">
                ここが防御力
              </div>
              <div class="HP">
                ここが体力
              </div>
              <div class="stonecolor">
                ここが色
              </div>
            </div>
            <p>
              <input type="button" value="戦う">
            </p>
            <p>
              <input type="button" value="石を選びなおす">
            </p>
        </div>
    </body>
</html>
