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
        .name_ele{
          font-size :24px
        }


        </style>
    </head>
    <body>
      <div class="main">
<div class="main-contents">
  <div class="picture">
    <img src="./DSC_0923.png" width="128" height="128" alt="石の画像">
    <div class="name_ele">
    <label id="stone_name"></label>
    (属性:
    <label id="stone_ele"></label>
    )
      </div>
  </div>
</div>
<div class="sub">
  <p>ステータス</p>
  <div class="sub-contents maru">
    <h2 class="marusa">HP</h2>
    <label class="marusa" id="stone_hp"></label>
  </div>
  <div class="sub-contents surudo">
    <h2 class="surudosa">攻撃力</h2>
    <label class="surudosa" id="stone_atk"></label>
  </div>
  <div class="sub-contents ooki">
    <h2 class="ookisa">防御力</h2>
    <label class="ookisa" id="stone_def"></label>

 </div>
 <div>
   <button type="button" onclick="location.href='/fight'">戦う！</button>
 </div>
</div>
    </body>
   
   <script type="text/javascript">
   
   var user_stone_data = @json($user_stone)[0]  ;
   document.getElementById("stone_name").innerText = user_stone_data.stone_name;
   document.getElementById("stone_hp").innerText = user_stone_data.hp;
   document.getElementById("stone_atk").innerText = user_stone_data.attack;
   document.getElementById("stone_def").innerText = user_stone_data.defence;
   var stone_element = "火";
   if (user_stone_data.color == 0) {
     stone_element = "火";
   } else if (user_stone_data.color == 1) {
     stone_element = "木";
   } else if (user_stone_data.color == 2) {
     stone_element = "水";
   }
   document.getElementById("stone_ele").innerText = stone_element;

  

  
  </script>
</html>
