 var imlocation = "images/random_connexion/";
 var currentdate = 0;
 var image_number = 0;
 function ImageArray (n) {
   this.length = n;
   for (var i =1; i <= n; i++) {
     this[i] = ' '
   }
 }

image = new ImageArray(5)
image[0] = '1.jpg'
image[1] = '2.jpg'
image[2] = '3.jpg' 
image[3] = '4.jpg' 
image[4] = '5.jpg'
 var rand = 60/image.length
 function randomimage() {
 	currentdate = new Date()
 	image_number = currentdate.getSeconds()
 	image_number = Math.floor(image_number/rand)
 	return(image[image_number])
 }
 document.write("<img src='" + imlocation + randomimage()+ "' alt='Episodes' class='bg'>" );