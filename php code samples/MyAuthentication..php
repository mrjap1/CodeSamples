

<?php
// This is my Authenticating against .htpasswd style files.
if( !($passwd = @fopen( "passwords", "r" ))) 
{  echo "Cannot open password file."; 
   exit; 
} 

if( !$PHP_AUTH_USER ) 
{  Header( "WWW-authenticate: basic realm=\"Realm\"" ); 
   Header( "HTTP/1.0 401 Unauthorized" ); 
   echo "Text to see if user hits 'Cancel'"; 
   exit; 
} 

// file format => username:passwd{\n} 
while( $pwent = fgets( $passwd, 100 )) 
{  $part = split( ":", ereg_replace( "\n", "", $pwent )); 
   if( $part[0] != $PHP_AUTH_USER ) 
      continue; 

   // Username was found - verify passwd 
   if( $part[1] != 
        // The crypt salt is stored as chars 1&2 of passwd 
        crypt( $PHP_AUTH_PW, substr( $part[1], 0, 2 ))) 
      break; 

   echo "Hello $PHP_AUTH_USER.<p>\n"; 
} 

// This only has effect of no text was output previously, so 
//  it is ignored in all cases except authentication error. 
@Header( "HTTP/1.0 401 Unauthorized" );


?>
