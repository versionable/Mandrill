Mandrill
========

API for interacting with the API at http://mandrillapp.com/api/docs/.

Usage
-----

Example to get information about the current authenticated user:

    use Versionable\Mandrill\Client;
    use Versionable\Mandrill\Manager\UserManager;
    
    $client = new Client($apiKey);
    $userManager = new UserManager($client);
    
    $user = $userManager->info();

Dependancies
------------

To use this library it is recommended that you install the dependancies.

This library uses [Composer](http://getcomposer.org/), to install the dependancies download composer following the
instructions on http://getcomposer.org/ and then run the following:

    php composer.phar install

Tests
-----

You can run the unit tests with the following command:

    phpunit
