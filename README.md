# le2ispc
Script to generate Let's Encrypt certs and add them to ISPConfig via API

## Let's Encrypt support in ISPC 3.1

**ISPConfig 3.1 has integreated Let's Encrypt support. So this will not be further developped.**

**You might want to checkout [acme.sh] (https://github.com/Neilpang/acme.sh). It's a LE client purely written in posix shell and it features DNS-01 authentication.**
**An according DNA API plugin exists for ISPConfig. Read [here] (https://www.howtoforge.com/community/threads/letsencrypt-automated-dns-01-challenge-for-ispc-3-1.74850/) for more info.**

## Limitations

1. The le2ispc script currently only works with an ISPC installation that has MySQL and Apache.
2. Currently no real SSL Certs can be created. Beta testing ends mid-november and then it should be publicly available
   so you can use this to test to process and that you can get ssl certs when it's publicly made available.
3. **Probably not working on Master/Slave setups**
4. I haven't done all return checks etc. --> **expect bugs**

## Installation

1. In ISPC add a remote user that can at least access the "Site Domain Functions"
2. Get Let's Encrypt - follow instructions here: https://letsencrypt.readthedocs.org/en/latest/using.html
3. Get the le2ispc script (just single script or clone whole repository)
4. Make the le2ispc script executable
5. Run the install script:  ./install
6. Edit the conf script in /root/.le2ispc/le2ispc.conf.php - it's important to give a valid email address
7. Run at least once the letsencrypt-auto script with the *auth* parameter: cd letsencrypt; ./letsencrypt-auto auth

## Run

If you have put the script into a location in $PATH then just type:  ```le2ispc domain.tld```.

If not, then go to the place where you have the le2ispc script and run: ```./le2ispc domain.tld```.

You can optionally append any number of subdomains to be used as alternate names in your certificate, e.g.: ```le2ispc domain.tld sub1.domain.tld sub2.domain.tld```.

To avoid running into a rate limit ("There were too many requests of a given type :: Error creating new cert :: Too many certificates already issued for domain.tld"), you can execute a dry-run with the -n or --dry-run option: ```le2ispc -n domain.tld sub1.domain.tld sub2.domain.tld```. This will only print the letsencrypt command without executing it.

## Renewal

1. Edit the ```le2ispc_renewer``` script in the git folder.
2. Set the number of days after which the renewer script should retry to get new certs.
3. Make a cron entry to run the script regularly.

**Problem:** 
On my test run on 4 domains there was an error with updating the cert in ISPC through the api.
However the cert was successfully retrieved from the Let's Encrypt servers.
So the last modified date in ''/etc/letsencrypt/live'' was also updated.
The result would be that the renewer script will not re-process that domain for xx days -->

```
PHP Fatal error:  Uncaught SoapFault exception: [HTTP] Error Fetching http headers in /usr/bin/le2ispc:261
Stack trace:
#0 [internal function]: SoapClient->__doRequest('<?xml version="...', 'https://manager...', 'https://manager...', 1, 0)
#1 /usr/bin/le2ispc(261): SoapClient->__call('login', Array)
#2 /usr/bin/le2ispc(261): SoapClient->login('...', '...')
#3 /usr/bin/le2ispc(218): loadDomainData(Array, Object(SoapClient), '5')
#4 {main}
  thrown in /usr/bin/le2ispc on line 261
```
