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
    correctAttributes = [[1.4, 0.8], [0.7, 1.5]];
    affinity = [[1, 1.2, 0.8], [0.8, 1, 1.2], [1.2, 0.8, 1]];
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
       
        this.friend = new Stone(friend[0], friend[1], friend[2], friend[3], friend[4])
        this.enemy = new Stone(enemy[0], enemy[1], enemy[2], enemy[3], enemy[4]);
    }



    buttle(myAttitude, enemyAttitude) {
        //勝負が付いたら整数, バトル続行ならfalseを返す
        //attitude : 0 or 1
        //0: 攻撃態勢 ATK x1.4, DEF x0.8
        //1: 防御態勢 ATK x0.7 DEF x1.5
        //ダメージ計算式 ATK^2 / (ATK + DEF) / 1.2 * 相性倍率(1.2 or 1 or 0.8)
        //friendの攻撃の処理
        this.enemy.HP -= (this.friend.ATK * correctAttributes[myAttribute][0]) **2 / (this.friend.ATK * correctAttributes[myAttribute][0] + this.enemy.DEF[enemyAttitude][1]) / 1.2 * affinity[this.friend.Color][this.enemy.Color];
        //enemyの攻撃の処理
        this.friend.HP -= (this.enemy.ATK * correctAttributes[enemyAttribute][0]) **2 / (this.enemy.ATK * correctAttributes[enemyAttribute][0] + this.friend.DEF[myAttitude][1]) / 1.2 * affinity[this.enemy.Color][this.friend.Color];
        isButtleEnd = checkBattleEnd();
        if (isButtleEnd[0]) {
            //勝負ついたとき
            return isButtleEnd[1];
        }
        return false;
    }

    checkBattleEnd() {
        //HPが0以下になったかどうか判定
        //勝負付いたら[True, 勝敗]を返す
        //-1: 引き分け, 0: プレイヤー勝ち, 1: 敵勝ち
        
        if (this.enemy.HP <= 0 && this.friend.HP <= 0) {
            return [True, -1];
        } else if (this.enemy.HP <= 0) {
            return [True, 0];
        } else if (this.friend.HP <= 0) {
            return [True, 1];
        }
        return [False, NULL];
    }
}