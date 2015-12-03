# le2ispc
Script to generate Let's Encrypt certs and add them to ISPConfig via API

## Limitations

1. The le2ispc script currently only works with an ISPC installation that has MySQL and Apache.
2. Currently no real SSL Certs can be created. Beta testing ends mid-november and then it should be publicly available
   so you can use this to test to process and that you can get ssl certs when it's publicly made available.
3. **Probably not working on Master/Slave setups**
4. I haven't done all return checks etc. --> **expect bugs**

## Installation

1. Get Let's Encrypt - follow instructions here: https://letsencrypt.readthedocs.org/en/latest/using.html
2. Get the le2ispc script (just single script or clone whole repository)
3. Make the le2ispc script executable
4. Optionally: You can copy it to a directory in $$PATH, e.g. /usr/bin
5. In ISPC add a remote user that can at least access the "Site Domain Functions"
6. Edit the header section of the le2ispc script - it's important to give a valid email address
7. Run at least once the letsencrypt-auto script with the *auth* parameter: cd letsencrypt; ./letsencrypt-auto auth

## Run

If you have put the script into a location in $PATH then just type:  ```le2ispc domain.tld```.

If not, then go to the place where you have the le2ispc script and run: ```./le2ispc domain.tld```.

You can optionally append any number of subdomains to be used as alternate names in your certificate, e.g.: ```le2ispc domain.tld sub1.domain.tld sub2.domain.tld```.

To avoid running into a rate limit ("There were too many requests of a given type :: Error creating new cert :: Too many certificates already issued for domain.tld"), you can execute a dry-run with the -n or --dry-run option: ```le2ispc -n domain.tld sub1.domain.tld sub2.domain.tld```. This will only print the letsencrypt command without executing it.