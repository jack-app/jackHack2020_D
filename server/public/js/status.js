//ImageDataオブジェクトを受け取り, [丸さ, 鋭さ, 大きさ, 色]の配列を返す関数
//丸さ・鋭さ・大きさは整数型, 色は0,1,2で返す(0:R, 1:G, 2:B)
function getStatus(imgData) {
    /*--------画像の色合いを取得(color以外の決定に使用)--------*/
    var r = 0;
    var g = 0;
    var b = 0;
    for (var y = 0;y < imgData.height;y++) {
        for (var x = 0;x < imgData.width;x++) {
            var index = (x + y * imgData.width) * 4;
            r += imgData.data[index];
            g += imgData.data[index + 1];
            b += imgData.data[index + 2];
        }
    }
    //rgbを0~1の値に変換
    r = r / (255 * imgData.width * imgData.height);
    g = g / (255 * imgData.width * imgData.height);
    b = b / (255 * imgData.width * imgData.height);




    /*--------colorの決定--------*/

    //中心のピクセルの座標の取得
    var xCenter = Math.floor(imgData.width / 2);
    var yCenter = Math.floor(imgData.height / 2);
    ///中心のピクセルの座標のデータの先頭のインデックス
    var idx = (xCenter + yCenter * imgData.width) * 4;
    //中心のピクセルのrgb値を取得
    var rCenter = imgData.data[idx];
    var gCenter = imgData.data[idx + 1];
    var bCenter = imgData.data[idx + 2];
    var rgbCenter = [rCenter, gCenter, bCenter];
    var color = rgbCenter.indexOf(Math.max(...rgbCenter));

    /*--------HPの決定--------*/
    var temperHP = g - b / 2 - r / 2;
    var HP = 50 + 10 * temperHP;

    /*--------ATKの決定--------*/
    var temperATK = r - g / 2 - b / 2;
    var ATK = 40 + 10 * temperAT

    /*--------DEFの決定--------*/
    var temperDEF = b - r / 2 - g / 2;
    var DEF = 30 + 10 * temperDEF;


return [HP, ATK, DEF, color];

}