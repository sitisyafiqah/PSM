<?php 
function EncryptData($source) 
{ 
   $fp=fopen("http://localhost/PSM/app/controllers/encryption/public.pem","r"); 
  $pub_key=fread($fp,8192); 
  fclose($fp); 

  openssl_public_encrypt($source,$crypttext,$pub_key); 

  return base64_encode($crypttext); 
} 

function DecryptData($encrypted_data)
{
	$fp=fopen("http://localhost/PSM/app/controllers/encryption/private.pem","r");
	$priv_key=fread($fp,8192);
	fclose($fp);
	
	openssl_private_decrypt(base64_decode($encrypted_data),$decrypted_data,$priv_key);
	
	return $decrypted_data;
}

?>
