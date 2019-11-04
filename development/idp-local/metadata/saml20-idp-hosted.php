<?php

use Sil\PhpEnv\Env;
use Sil\Psr3Adapters\Psr3SamlLogger;

/**
 * SAML 2.0 IdP configuration for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-hosted
 */
$metadata['http://idp'] = [
	/*
	 * The hostname of the server (VHOST) that will use this SAML entity.
	 *
	 * Can be '__DEFAULT__', to use this entry by default.
	 */
	'host' => '__DEFAULT__',

	// X.509 key and certificate. Relative to the cert directory.
	'privatekey' => 'dummy.pem',
	'certificate' => 'dummy.crt',

	/*
	 * Authentication source to use. Must be one that is configured in
	 * 'config/authsources.php'.
	 */
	'auth' => 'example-userpass',
    
    'authproc' => [
        10 => [
            'class' => 'expirychecker:ExpiryDate',
            'accountNameAttr' => 'cn',
            'expiryDateAttr' => 'schacExpiryDate',
            'passwordChangeUrl' => Env::get('PASSWORD_CHANGE_URL'),
            'warnDaysBefore' => 14,
            'dateFormat' => 'Y-m-d',
            'loggerClass' => Psr3SamlLogger::class,
        ],
    ],
];
