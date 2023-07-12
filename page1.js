const backgroundImageUrls = [
    'image/pic1.jpg',
    'image/pic2.jpg',
    'image/pic 3.jpg',
    'image/pic 4.jpg',
    'image/pic 5.jpg',
    'image/pic 6.jpg',
    'image/pic 7.jpg',
    'image/pic 8.jpg',
    'image/pic9.jpg',
    
  ];
  
  let currentIndex = 0;
  
  function changeBackgroundImage() {
    document.body.style.backgroundImage = `url('${backgroundImageUrls[currentIndex]}')`;
    // oDomElement.style.backgroundRepeat = "repeat";
    // oDomElement.style.backgroundSize = "cover";
  
    currentIndex = (currentIndex + 1) % backgroundImageUrls.length;
  }
  
  setInterval(changeBackgroundImage, 5000);