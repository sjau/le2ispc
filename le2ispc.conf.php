<?php

# Provide path to the letsencrypt script
$letsencrypt = "/root/letsencrypt/letsencrypt-auto";

$server["type"]         = "apache";     # Provide the webserver you're using: apache or nginx
$server["version"]      = "2.4";        # If using apache, provide the version: 2.2 or 2.4
$server["htaccess"]     = "y";          # Set y/n; "y" will rename a .htaccess in the webroot for the time of the certificate update.
                                        # Some .htaccess cause otherwise the process to fail
$server["modules"]      = "";           # Comma seperated list of modules that should be deactivated while let's encrypt is running, e.g. = "mod_proxy,mod_cache"

# Provide API Infos
$server["username"]     = "user";
$server["password"]     = "password";
$server["soap_uri"]     = "https://localhost:8080/remote/";

# Give email for cert creation
$email                  = "user@domain.tld";

# Force Apache/Nginx to rewrite non-ssl to ssl
$forceSSL               = "y";



/**************************************************************************************************************
*                                                                                                             *
*                                         HERE BE DRAGONS                                                     *
*                                                                                                             *
**************************************************************************************************************/



$version                = "2016-01-14-1";


?>
