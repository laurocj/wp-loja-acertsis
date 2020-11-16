<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-loja-acertsis' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'yEk7ZzqvWyVVVzQvTAVDsntgl9Kp9IJ4gPAwD3kJCsr73PkPs2XW7b2mVgDOHAbn' );
define( 'SECURE_AUTH_KEY',  'OX17n08jqamKN9exfBPym8XbUL2Kn1ZbizcgVcrdqiLUiVQ25L2hfKcdbEecaZxP' );
define( 'LOGGED_IN_KEY',    'rFRHMMWVPFXEhkV7BtG4knGY0GFwyfSN5BJHjzHibYFheJPOUx88a5BZwoqNUW0H' );
define( 'NONCE_KEY',        'ib7MZXG1BLhJ04h36cpakLwKxyNkUUsuK3HKtwjdWaeE5TXrkfKisVOfzaXUrWuZ' );
define( 'AUTH_SALT',        '63EJoPJEhxPBtl0JG72w3obOB0lZmaGKAvgLQBxTIEJT6wkPRg6vV4FN95fsBv41' );
define( 'SECURE_AUTH_SALT', 'cbDnMadqtSjrvOmEM5bAdKJrl7IqkrAfyPQWa5GMuHsQhNspMLUtwOoSaiJTDitj' );
define( 'LOGGED_IN_SALT',   'm1haYOnBNxzt6J3PMRqnGSsMplD3d9Qbm8Q9hpeTitdViAkeyY3oViuGGosV3xFS' );
define( 'NONCE_SALT',       'Oh2BKh9GA6mSACOCQjFvsQtPYOAQbD6FSLGZXdv87sF04h79NPZAy4NFonL4Chl7' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
