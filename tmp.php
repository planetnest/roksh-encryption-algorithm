<?php

require_once('roksh.crypto.php');

$str = 'Hello World!';

for ($i=0; $i < 5; $i++) { 
    $str = encrypt($str);
    echo "Encrypted: " . $str . "\n";
    $str = decrypt($str); 
    echo "Decrypted: " . $str . "\n\n";        
}
