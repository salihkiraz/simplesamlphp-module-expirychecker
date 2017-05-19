# ExpiryChecker simpleSAMLphp Module #
simpleSAMLphp module for warning users that their password will expire soon or 
has already expired.

The expirychecker module validates user's expiry date attribute by showing
warning to the user whose NetID is about to expire or denying access if NetID
has already expired.

The expirychecker module is implemented as an Authentication Processing Filter.
That means it can be configured in the global config.php file or the SP remote
or IdP hosted metadata.

It is recommended to run the expirychecker module at the IdP, and configure the
filter to run before all the other filters you may have enabled.

## How to use the module ##
Simply include `simplesamlphp/composer-module-installer` and this module as 
required in your `composer.json` file.

Then you need to set filter parameters in your config.php file.

Example:

	10 => array(
		'class' 	  => 'expirychecker:ExpiryDate',
		'netid_attr' 	  => 'eduPersonPrincipalName',
		'expirydate_attr' => 'schacExpiryDate',
		'warndaysbefore'  => '60',
		'date_format' 	  => 'd.m.Y',
	),


Parameter netid_attr represents (ldap) attribute name which has user's NetID stored in it,
parameter expirydate_attr represents (ldap) attribute name which has user's expiry date
(date must be formated as YYYYMMDDHHMMSSZ, e.g. 20111011235959Z) stored in it. Those two
attributes needs to be part of the attribute set, which is retrived from ldap during
authentication process.
Parameter warndaysbefore set as a number, which represents how many days before expiry
date the "about to expire" warning will show to the user.
Parameter date_format defines date representation format. PHP Date() syntax
is used. More info: http://php.net/manual/en/function.date.php

## Contributing ##
To contribute, please submit issues or pull requests at 
https://github.com/silinternational/simplesamlphp-module-expirychecker

## Acknowledgements ##
This is adapted from the `ssp-iidp-expirycheck` and `expirycheck` modules. 
Thanks to Alex Mihičinac, Steve Moitozo, and Steve Bagwell for the initial they 
did on those two modules.
