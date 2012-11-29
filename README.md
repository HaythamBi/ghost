# Ghost
## Ghost is just a blogging platform.

Concept by John O'Nolan, see the original concept [here](http://john.onolan.org/ghost/)

### Installation

Know that this is a Laravel application and Laravel requires php 5.3+
If you're on OS X, you might need to update your php installation to 5.4.x

To run the development version, you can do the following:

1. Clone the ghost project: `git clone git://github.com/knnktr/ghost.git`
2. Set your virtual host's webroot to be the source/public directory inside the repository.
3. Add a 32-character key to line 56 of source/config/application.php
4. Ensure that the database settings starting on line 65 on source/config/database.php match a database available on your server.
5. `cd` into your repository and (type) `make`
6. `cd` into the `source` directory and type `php artisan migrate:install`
7. type `php artisan migrate`

You should probably insert a user for yourself to use as there's no first-run process yet.

Go to source/routes.php and between lines 26 & 27, add a new line:

    var_dump(Hash::make('secret')); (Put whatever you want your password to be in for "secret".)

Then load your site in a browser: [url]/login

Take the hashed password and insert your user into the DB, replacing [password] with your newly-hashed password.

    INSERT INTO `authors` VALUES (NULL, '[email address]', '[password]', '[firstname]', '[lastname]', NOW(), NOW());

Now you should be able to log in with the email address and password you just inserted.