<?php
   /**
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: config.php,v 3.0 
   */
   
/** Configuration Variables **/
define(DEVELOPMENT_ENVIRONMENT, FALSE); // DEVELOPMENT_ENVIRONMENT TRUE / FALSE
$CPDebug = FALSE; // DEVELOPMENT_ENVIRONMENT TRUE / FALSE

/** DATABASE CONFIG */
define('DB_NAME', 'realmd'); // DB name ( auth , Realmd etc..)
define('DB_USER', 'root');  // Database Username
define('DB_PASSWORD', 'mangos'); // Database Password
define('DB_HOST', 'localhost'); // Database HOST
define('DB_UCP', 'ucp'); // UCP database
define('USER_SOAP', 'testgm'); // SOAP USER GM >= 3
define('PASS_SOAP', 'mangos'); // SOAP PASS 
define('ADMIN', "FAIANCA"); // Your Account Name ( the only account to have admin panel access ) CAPITAL LETTERS ONLY

/** Web Site Config */
define('SITETITLE', 'WOWPT PAINEL DE CONTROLO | Once we reborn, we rulle forever :D'); // Website Title
define('SITENAME', 'WOWPT PAINEL DE CONTROLO'); // Website NAME
define('SITEURL', 'www.wow.com'); // Website url 
define('BASE_PATH','http://wow.com/painel'); // IMPORTANT!!! please input ur Base Path, example http://ucpmangos.com/framework without / in the end 
define('REALMLIST', 'wow.com'); // Your RealmList
define('VERSION', '3.3.5'); // Your Server Version
 
  /**
   * Choose your emu server:
   * 1 = mangos
   * 2 = trinity
   * 3 = arcemu
   */
   $emuserver = 1; 
   
   // Insert your realmlist ID NAME AND CHARACTERS DB -> follow the logic example below
   // REALM ID, REALM NAME, REALM CHARACTER DB NAME
   $realmdb[0] = array('id' => '1', 'name' => 'Prestige: Blizzlike', 'dbname' => 'char_blizz'); 
   $realmdb[1] = array('id' => '3', 'name' => 'Izanox: BattleGound', 'dbname' => 'char_bg');
   $realmdb[2] = array('id' => '2', 'name' => 'Furzin: MidRate', 'dbname' => 'char_mid');
   $realmdb[3] = array('id' => '4', 'name' => 'Neplox: Funserver', 'dbname' => 'char_fun');
         
  /** Additional info */
  $clientversion = "3.3.5";
  $realmurl = "logon.wow-pt.net";
  
  /** Character Tools Costs! */
  // Modify for character tool costs
  $toolscost = array(
  'name' => '30', 
  'faction' => '150', 
  'sex' => '40', 
  'account' => '40', 
  'race' => '30');

 
  /**
   * Do not Edit Below THIS LINE
---------------------------------------------------------------------------------------------------------------------------
   */
 $version[1] = array('account' => 'account',
 'characters' => 'characters', 'gm' => 'account', 'ban'=> 'account_banned');
 $version[2] = array('account' => 'account',
 'characters' => 'characters', 'gm' => 'account_access', 'ban'=> 'account_banned');
 $version[3] = array('account' => 'account',
 'characters' => 'characters', 'gm' => 'account', 'ban'=> 'account_banned');
 
 $version = $version[$emuserver];
 
  define('DB_GM', $version['gm']); 
  define('DB_ACCOUNT', $version['account']); 
  define('DB_CHARS', $version['characters']);
  define('DB_BAN', $version['ban']);
  define('DB_REALM', 'realmlist');    
  

