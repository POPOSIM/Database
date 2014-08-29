<?php 
	
header("content-type:image/png");  	  
$image_width=70;                     
$image_height=18;              

$new_number=$_GET[num];
$num_image=imagecreate($image_width,$image_height); 
imagecolorallocate($num_image,255,255,255);     	

for($i=0;$i<strlen($new_number);$i++){ 
   $font=mt_rand(3,5);                            	
   $x=mt_rand(1,8)+$image_width*$i/4;               
   $y=mt_rand(1,$image_height/4);                  
   $color=imagecolorallocate($num_image,mt_rand(0,100),mt_rand(0,150),mt_rand(0,200));  	 
   imagestring($num_image,$font,$x,$y,$new_number[$i],$color);				     
}

imagepng($num_image);      			
imagedestroy($num_image);  			
?>
