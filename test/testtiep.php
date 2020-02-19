<?php 

function encryptCookie( $value ) {
 $key = 'youkey';
 $newvalue = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $key ), $value, MCRYPT_MODE_CBC, md5( md5( $key ) ) ) );
 return( $newvalue );
}
	echo encryptCookie('1234');
	

 ?>