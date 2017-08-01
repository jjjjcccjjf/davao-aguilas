<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code



/**
* Custom constants
* @author: @jjjjcccjjf
*/
defined('DEFAULT_FOLDER_PERMISSIONS') OR define('DEFAULT_FOLDER_PERMISSIONS', 755); // highest automatically-assigned error code
defined('DEFAULT_SQUAD') OR define('DEFAULT_SQUAD', 'Davao Aguilas'); // highest automatically-assigned error code
const PLAYER_POSITIONS = ['Goalkeeper', 'Defender', 'Midfielder', 'Forward', "Manager"]; # We're using this syntax because 5.6 doesn't support the one above!
const COURT_TYPES = ['Home', 'Away']; # We're using this syntax because 5.6 doesn't support the one above!
const VIDEO_TYPES = ['Club Videos', 'News &amp; Highlights']; # We're using this syntax because 5.6 doesn't support the one above!
const PLAYER_STATISTICS = ['Assists', 'Goals', 'Total Passes', 'Crosses', 'Shots on Target', 'Shots inside penalty box', 'Shots outside penalty box', 'Shot accuracy']; # We're using this syntax because 5.6 doesn't support the one above!
const MATCH_PROGRESS_TYPES = ['Upcoming', 'Ongoing', 'Final']; # We're using this syntax because 5.6 doesn't support the one above!
const MATCH_STAT_NAMES = ['Goals', 'Assists', 'Total Shots', 'Attacks', 'Corners', 'Fouls', 'Free Kicks']; # We're using this syntax because 5.6 doesn't support the one above!
const TEAM_STAT_NAMES = ['Goals', 'Goals Conceded', 'Total Shots',
'Shooting Accuracy', 'Total Passes', 'Passing Accuracy', 'Crossing Accuracy',
'Tackles Won', 'Total Fouls Won', 'Total Fouls Conceded', 'Duels Won',
'Total Clearances', 'Blocks', 'Aerial Duels', 'Aerial Duels Lost',
'Aerial Duels Won', 'Attempts from Set Pieces', 'Blocked Shots',
'Catches', 'Clean Sheets', 'Clearances Off the Line', 'Corners Taken',
'Corners Won', 'Drops', 'Duels', 'Duels Lost', 'Foul Attempted Tackle',
'Foul Won Penalty', 'GK Successful Distribution', 'GK Unsuccessful Distribution',
'Games Played', 'Goal Assists', 'Goal Conversion', 'Goals Conceded Inside Box',
'Goals Conceded Outside Box', 'Goals from Inside Box', 'Goals from Outside Box',
'Ground Duels', 'Grounds Duels Lost', 'Ground Duels Won', 'Handballs Conceded',
'Headed Goals', 'Hit Woodwork', 'Interception', 'Key Passes', 'Last Man Tackle',
'Left Foot Goals', 'Offsides', 'Open Play Passes', 'Own Goals Accrued',
'Passing % Opp Half', 'Penalties Conceded', 'Penalties Saved', 'Penalties Taken',
'Penalty Goals', 'Points Dropped from Winnings', 'Points Gained from Losing',
'Possession Percentage', 'Put Through/Blocked', 'Recoveries', 'Red Card - 2nd Yellow',
'Right Foot Goals', 'Set Pieces Goals', 'Shots Off Target', 'Straight Red Cards',
'Successful Corners into Box', 'Successful Crosses & Corners', 'Successful Crosses Open',
'Successful Dribbles', 'Successful Launches', 'Successful Lay-offs',
'Successful Long Passes', 'Successful Open Play Passes', 'Successful Passes Opposition',
'Successful Passes Own Half', 'Successful Short Passes', 'Tackles Success',
'Tackles Lost', 'Throw Ins to Opposition', 'Throw Ins to Own Player',
'Total Losses of Possession', 'Total Red Cards', 'Total Shots Conceded',
'Total Successful Passes', 'Total Unsuccessful Passes', 'Unsuccessful Corners',
'Unsuccessful Crosses', 'Unsuccessful Crosses Ope...TODO', 'Unsuccessful Dribbles',
'Unsuccessful Launches', 'Unsuccessful Long Passes', 'Unsuccessful Passes Opp...TODO',
'Unsuccessful Passes Own...TODO', 'Unsuccessful Short Passes', 'Unsuccessful Lay-Offs',
'Yellow Cards']; # We're using this syntax because 5.6 doesn't support the one above!
