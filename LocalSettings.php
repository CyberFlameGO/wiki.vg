<?php
# See includes/DefaultSettings.php for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.

#########################################################
# This file has been heavily customized for wiki.vg.
# Most settings are hardcoded in here except for secrets.
#########################################################

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

$wgSitename = "wiki.vg";
$wgMetaNamespace = "wikivg";

# The URL base path to the directory containing the wiki;
# defaults for all runtime URL paths are based off of this.
# For more information on customizing the URLs
# (like /w/index.php/Page_title to /wiki/Page_title) please see:
# http://www.mediawiki.org/wiki/Manual:Short_URL
#$wgScriptPath = "";
#$wgScriptExtension = ".php";
$wgScriptPath = "";
$wgScriptExtension = ".php";
$wgArticlePath = "/$1";
$wgUsePathInfo = true;

# The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wiki.vg";

# The relative URL path to the skins directory
$wgStylePath = "$wgScriptPath/skins";

# wfLoadSkin( 'CologneBlue' );
# wfLoadSkin( 'Modern' );
# wfLoadSkin( 'MonoBook' );
wfLoadSkin( 'Vector' );

## The relative URL path to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogo = "https://wiki.vg/images/c/cf/120px-Logotemp.png";

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = false; # UPO

$wgEmergencyContact = "tk@tkte.ch";
$wgPasswordSender = "wiki@wiki.vg";

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = false; # UPO
$wgEmailAuthentication = true;
$wgEmailConfirmToEdit = true;

$wgSMTP = array(
  'host' => getenv('MW_SMTP_HOST'),
  'port' => getenv('MW_SMTP_PORT'),
  'IDHost' => getenv('MW_SMTP_IDHOST'),
  'auth' => true,
  'username' => getenv('MW_SMTP_USERNAME'),
  'password' => getenv('MW_SMTP_PASSWORD')
);

## Database settings

$dbURL = parse_url(getenv("DATABASE_URL"));
$wgDBtype = "mysql";
$wgDBserver = $dbURL["host"];
$wgDBname = substr($dbURL["path"], 1);
$wgDBuser = $dbURL["user"];
$wgDBpassword = $dbURL["pass"];

# MySQL specific settings
$wgDBprefix = "wiki_";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Experimental charset support for MySQL 5.0.
$wgDBmysql5 = false;

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
# $wgMemCachedServers = array();

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
#$wgUseImageMagick = true;
#$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from http://commons.wikimedia.org
$wgUseInstantCommons = false;

## If you use ImageMagick (or any other shell command) on a
## Linux server, this will need to be set to the name of an
## available UTF-8 locale
$wgShellLocale = "en_US.utf8";

## If you want to use image uploads under safe mode,
## create the directories images/archive, images/thumb and
## images/temp, and make them all writable. Then uncomment
## this, if it's not already uncommented:
#$wgHashedUploadDirectory = false;

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publically accessible from the web.
$wgCacheDirectory = "$IP/cache";
$wgUseGzip = true;

# Site language code, should be one of the list in ./languages/Names.php
$wgLanguageCode = "en";

$wgSecretKey = getenv('MW_SECRET_KEY');

# Site upgrade key. Must be set to a string (default provided) to turn on the
# web installer while LocalSettings.php is in place
$wgUpgradeKey = getenv('MW_UPGRADE_KEY');

## Default skin: you can change the default skin. Use the internal symbolic
## names, ie 'standard', 'nostalgia', 'cologneblue', 'monobook', 'vector':
$wgDefaultSkin = "vector";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "http://creativecommons.org/licenses/by-sa/3.0/";
$wgRightsText = "Creative Commons Attribution Share Alike";
$wgRightsIcon = "{$wgStylePath}/common/images/cc-by-sa.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Query string length limit for ResourceLoader. You should only set this if
# your web server has a query string length limit (then set it to that limit),
# or if you have suhosin.get.max_value_length set in php.ini (then set it to
# that value)
$wgResourceLoaderMaxQueryLength = -1;

# Disable writing for everyone.
$wgGroupPermissions['*']['edit']             = false;
$wgGroupPermissions['*']['createpage']       = false;
$wgGroupPermissions['*']['createtalk']       = false;
$wgGroupPermissions['*']['writeapi']         = false;
 
# Effectively disable autoconfirm.
$wgAutoConfirmAge = 86400 * 365;
$wgGroupPermissions['autoconfirmed']['autoconfirmed'] = false;

define('NS_UNREAL', 120);
define('NS_UNREAL_TALK', 121);
define('NS_ZH', 130);
define('NS_ZH_TALK', 131);

$wgExtraNamespaces[NS_UNREAL] = 'Unreal';
$wgExtraNamespaces[NS_UNREAL_TALK] = 'Unreal_Talk';

$wgExtraNamespaces[NS_ZH] = 'Zh';
$wgExtraNamespaces[NS_ZH_TALK] = 'Zh_Talk';

$wgNamespacesWithSubpages[NS_MAIN] = true;
$wgNamespacesWithSubpages[NS_UNREAL] = true;
$wgNamespacesWithSubpages[NS_ZH] = true;

$wgNamespacesToBeSearched[NS_UNREAL] = true;
$wgNamespacesToBeSearched[NS_ZH] = true;

wfLoadExtensions([
	'ConfirmEdit',
	'ConfirmEdit/QuestyCaptcha',
	'Cite',
	'ParserFunctions',
	'SyntaxHighlight_GeSHi',
	'Variables',
	'Nuke'
]);

$wgPFEnableStringFunctions = true;

$wgCaptchaQuestions = [
	'What came first, C or C++?' => 'C'
];

# $wgReadOnly = 'Maintenance in progress.';
