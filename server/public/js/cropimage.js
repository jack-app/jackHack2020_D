function cropImage(img) {
  var cv=document.createElement('canvas');
  var width=img.naturalWidth;
  var height = img.naturalHeight;
  var magni = 360/Math.min(width,height);
  width*=magni;
  height*=magni;
  const ctx = cv.getContext("2d");
  ctx.drawImage(img,180-width/2,180-height/2,width,height);
  var myImageData = ctx.getImageData(0,0,360,360);
  return myImageData;
}
/*function createImageData(img){
  var cv = document.createElement('canvas');
  cv.width = img.naturalWidth;
  cv.height = img.naturalHeight;
  var ct = cv.getContext('2d');
  ct.drawImage(img,0,0);
  var data = ct.getImageData(0,0,cv.width,cv.height);
  return data;
}*/
