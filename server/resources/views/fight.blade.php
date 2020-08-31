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
  .main h1{
    font-size :100px;
    color :red;
  }
  body {
    background-image :url(http://stat.ameba.jp/user_images/20111121/01/makapri/d6/01/j/t02200165_0640048011624197731.jpg);
    background-size :cover;
　　　　}
  .sub{
    background-color :black;
    font-color :white;
    width :300px;
  }
        </style>

        
    </head>
    <body>
      <div class="main">
        <h1>戦闘中</h1>
        <img class="dokuro" src="https://t4.ftcdn.net/jpg/02/65/07/67/240_F_265076737_r3ngw3QCDCTmZ24MlzDsCdsaLfm94rHm.jpg">
    <div>
      敵HP:
      <label id="enemyHP"></label>
      味方HP:
      <label id="friendHP"></label>
    </div>
    <div class="sub">
      <!--ボタンをつける-->
      <button id="command0" type="button" onclick="buttle.buttle(0)">攻撃態勢</button>
      <button id="command1" type="button" onclick="buttle.buttle(1)">防御態勢</button>
    </div>
    <div>
      <button type="button" id="nextWin" style="display: none" onclick="">次へ</button>
      <button type="button" id="nextDraw" style="display: none" onclick="">次へ</button>
      <button type="button" id="nextLose" style="display: none" onclick="">次へ</button>
    </div>
    </div>
    </body>
    <script type="text/javascript">
    //戦闘中の石を管理するクラス
class Stone {
    
    constructor(meName, meHP, meATK, meDEF, meColor) {
        this.Name = meName;
        this.MaxHP = meHP;
        this.HP = meHP;
        this.ATK = meATK;
        this.DEF = meDEF;
        this.Color = meColor;
    }
}

//戦闘を管理するクラス
class StoneBattle {
  constructor(friend, enemy) {
    //friends: [name, HP, ATK, DEF, color]の配列を要素に持つ配列(2次元)
    //enemy: [name, HP, ATK, DEF, color]の配列
    
    /*
    //味方が複数の時にはこっちを使う
    this.friends = []
    friends.foreach( function(friend) {
      this.friends.push(new Stone(friend[0], friend[1], friend[2], friend[3], friend[4]));
    });
    */
   
        this.correctAttributes = [[1.4, 0.8], [0.7, 1.5]];
        this.affinity = [[1, 1.2, 0.8], [0.8, 1, 1.2], [1.2, 0.8, 1]];
        this.friend = new Stone(friend[0], friend[1], friend[2], friend[3], friend[4])
        this.enemy = new Stone(enemy[0], enemy[1], enemy[2], enemy[3], enemy[4]);
    }



    buttle(myAttribute) {

        //返り値の使用大幅変更!!!!!

        //勝負が付いたら整数, バトル続行ならfalseを返す
        //attitude : 0 or 1
        //0: 攻撃態勢 ATK x1.4, DEF x0.8
        //1: 防御態勢 ATK x0.7 DEF x1.5
        //ダメージ計算式 ATK^2 / (ATK + DEF) / 1.2 * 相性倍率(1.2 or 1 or 0.8)
        //friendの攻撃の処理
        //attributeで-1, -1を受け取ると初期化処理
        var enemyAttribute = Math.floor( Math.random() * 2 );
        this.enemy.HP -= Math.floor((this.friend.ATK * this.correctAttributes[myAttribute][0]) **2 / (this.friend.ATK * this.correctAttributes[myAttribute][0] + this.enemy.DEF * this.correctAttributes[enemyAttribute][1]) / 1.2 * this.affinity[this.friend.Color][this.enemy.Color]);
        //enemyの攻撃の処理
        this.friend.HP -= Math.floor((this.enemy.ATK * this.correctAttributes[enemyAttribute][0]) **2 / (this.enemy.ATK * this.correctAttributes[enemyAttribute][0] + this.friend.DEF * this.correctAttributes[myAttribute][1]) / 1.2 * this.affinity[this.enemy.Color][this.friend.Color]);
        //--------------HP減少の表示処理------------------------
        var eHP = document.getElementById("enemyHP");
        var fHP = document.getElementById("friendHP");
        eHP.innerText = Math.max(buttle.enemy.HP, 0);
        fHP.innerText = Math.max(buttle.friend.HP, 0);
        
        this.checkBattleEnd();
        
        
    }

    checkBattleEnd() {
        //HPが0以下になったかどうか判定
        //勝負付いたら[True, 勝敗]を返す
        //-1: 引き分け, 0: プレイヤー勝ち, 1: 敵勝ち
        
        if (this.enemy.HP <= 0 && this.friend.HP <= 0) {
            var next = document.getElementById("nextDraw");
            document.getElementById("command0").disabled = true;
            document.getElementById("command1").disabled = true;
            next.style.display = "block";
        } else if (this.enemy.HP <= 0) {
          var next = document.getElementById("nextWin");
            document.getElementById("command0").disabled = true;
            document.getElementById("command1").disabled = true;
            next.style.display = "block";
        } else if (this.friend.HP <= 0) {
          var next = document.getElementById("nextLose");
            document.getElementById("command0").disabled = true;
            document.getElementById("command1").disabled = true;
            next.style.display = "block";
        }
        
        
    }
}

var buttle = new StoneBattle(["なまえ", 50, 40, 30, 0], ["てき", 50, 40, 30, 1]);
var eHP = document.getElementById("enemyHP");
var fHP = document.getElementById("friendHP");
eHP.innerText = buttle.enemy.HP;
fHP.innerText = buttle.friend.HP;



    </script>

</html>
