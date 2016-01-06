<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'eecoonli_wor1');

/** MySQL database username */
define('DB_USER', 'eecoonli_615');

/** MySQL database password */
define('DB_PASSWORD', 'YDS6uE5s');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'KGTcqFcc(pog*P{[BtK{[(ntI>p%gLgurd;%y[nfz-=UmFTHblf)h([ueT{>MyQfgwxrN/bn=$KvoNcVwPrgXNwc(RGXeVbhS-&/v$S^Zc[VJw(Mpzi&=[yHmPQAR?*k');
define('SECURE_AUTH_KEY', '=zyEpxbheEMM$RENc;[N<aA{m]ZzglT=QXLY=_No/x=nu|YzLIv[)brVKv&H]>_yJN*ZV*<cyNTw?^E%={NfrAil!ugXkK*C(R$WNEZ?dLUDiYcf$sd{dUg?we>RHTAp');
define('LOGGED_IN_KEY', 'GCrVNO@ch?ji]-G$u*$XF]BZ&(ct?|i[w$J!K/sBq?Hp$Cjx$S(Qq^;jUfNulE)x[plu>MLje|CP/IP}^!/wiWJcckRdGj|RBsZWPTQ{uNu@G;-&eYrIP<hH*-BrHmf*');
define('NONCE_KEY', '?xD(gj%]t$rX/<V)Os$a&tMjcC{x;XwVT--UrQvvjW<&R[+IuUAhPaAgX>>YmPQ@Zvt({eRF+{&KIX/;X?vLa[A;_/rhH}f|pAm|)y$VHG|]Ih{qe+/</(zl]D=-Y-aI');
define('AUTH_SALT', '-U%!*SOPhF+i@mU{W@<eE<!Zwn/=rW*Erlr{QUlFJV>g{DyP!<h@*|VeOo%J&WHdSx-$*n@dwB-(oFgmX([<<ngQl}&KFs*iOxn[sz;]m;Op%x-TLEdM+dQq>C&%|Qhy');
define('SECURE_AUTH_SALT', 'a]&>?+l]E|fV(?RCStcpQYc}=e+iRYEM*LTkK&;Q!?UdsbHOgG*=yM|UB_x<$podF_T+LS^IKp^QL)SR{-/Czp/N=l*GvzRNY-[&D{R%e}RQTg>$czdWzgoMRhSULqOY');
define('LOGGED_IN_SALT', '{Z!hPZWaoo*N{Ip%?[pHEoi]?AdKt-G<jI{baieB}|rm-={Smf$bR}p)kOij?r&P?m-EYd)s<}Brsa(zUk>OZ@I{u>IAFDarbbN)bImQH%@f^[@_joKhM;Y-fKNa+{;d');
define('NONCE_SALT', 'YfSn*cnxya?*[RxzR>urLO(G@IyN_&[sKJ_+Zk}{Gf-UWb_y[GdOFHJC>P}pKl|&o&BWmFZ[{Xgf/(YgTQ)twdxdJdUJANBfBzxqkjwjUMaEvb>}IrRq^Jx(AT_!m^pb');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_iskx_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
