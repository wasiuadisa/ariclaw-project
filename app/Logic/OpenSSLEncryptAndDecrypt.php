<?php

namespace App\Logic;

class OpenSSLEncryptAndDecrypt
{
   /**
     * Encrypt given parameter using OpenSSL encryption
     */
    public function encryptParameter($givenString)
    {
         // Store the cipher method 
         $ciphering = "AES-128-CTR"; 

         // Use OpenSSl Encryption method 
         $iv_length = openssl_cipher_iv_length($ciphering); 

         $options = 0; 

         // Non-NULL Initialization Vector for encryption 
         $encryption_iv = '1234567891011121'; 

         // Store the encryption key 
         $encryption_key = config('app.short_name'); 

         // Use openssl_encrypt() function to encrypt the data 
         $encryption = openssl_encrypt($givenString, $ciphering, $encryption_key, $options, $encryption_iv);

         return $encryption;
    }

   /**
     * Decrypt given encrypted string using OpenSSL decryption
     */
    public function decryptParameter($givenEncryptedString)
    {
         // Store the cipher method 
         $ciphering = "AES-128-CTR";

         // Use OpenSSl Encryption method 
//         $iv_length = openssl_cipher_iv_length($ciphering); 

         $options = 0; 

         // Non-NULL Initialization Vector for decryption
         $decryption_iv = '1234567891011121'; 

         // Store the decryption key 
         $decryption_key = config('app.short_name'); 
          
         // Use openssl_decrypt() function to decrypt the data 
         $decryption = openssl_decrypt($givenEncryptedString, $ciphering, $decryption_key, $options, $decryption_iv);

         return $decryption;
    }
}
