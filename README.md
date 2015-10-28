# le2ispc
Script to generate Let's Encrypt certs and add them to ISPConfig via API

## Limitations

1. Script currently only works with an ISPC install that has MySQL and Apache
2. Currently no real SSL Certs can be created. Beta testing ends mid-november and then it should be publicly available
   so you can use this to test to process and that you can get ssl certs when it's publicly made available
3. I haven't done all return checks etc. --> **expect bugs**

## Installation

1. Get Let's Encrypt - follow instructions here: https://letsencrypt.readthedocs.org/en/latest/using.html
2. Get the le2ispc script (just single script or clone whole repository)
3. Make the le2ispc script execuatable
4. Optionally: You can copy it to a directory in $$PATH, e.g. /usr/bin
5. In ISPC add a remote user that can at least access the "Site Domain Functions"
6. Edit the header section of the le2ispc script - it's important to give a valid email address
7. Run at least once the letsencrypt-auto script with the *auth* parameter: cd letsencrypt; ./letsencrypt-auto auth

## Run

If you have put the script into a location in $PATH then just type:  ```letsencrypt domain.tld```
If not, then go to the place where you have the le2ispc script and run: ```./letsencrypt domain.tld.```