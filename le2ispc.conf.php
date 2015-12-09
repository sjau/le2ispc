<?php

# Provide path to the letsencrypt script
$letsencrypt = "/root/letsencrypt/letsencrypt-auto";

# Provide the webserver you're using: apache or nginx
$server["type"]         = "apache";
$server["htaccess"]     = "y";          # Set y/n; "y" will rename a .htaccess in the webroot for the time of the certificate update.
                                        # Some .htaccess cause otherwise the process to fail

# Provide API Infos
$server["username"]     = "user";
$server["password"]     = "password";
$server["soap_uri"]     = "https://ispc.domain.tld:8080/remote/";

# Give email for cert creation
$email                  = "user@domain.tld";

# Force Apache/Nginx to rewrite non-ssl to ssl
$forceSSL               = "y";



/**************************************************************************************************************
*                                                                                                             *
*                                         HERE BE DRAGONS                                                     *
*                                                                                                             *
**************************************************************************************************************/



$version                = "2015-12-06-1";


?>