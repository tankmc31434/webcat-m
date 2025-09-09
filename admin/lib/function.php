<?php

function print_pre($expression, $wrap = false)
{
   $css = 'border:1px dashed #06f;background:#69f;padding:1em;text-align:left;z-index:99999;font-size:12px;position:relative;color:white';
   if ($wrap) {
      $str = '<p style="' . $css . '"><tt>' . str_replace(
         array('  ', "\n"),
         array('&nbsp; ', '<br />'),
         htmlspecialchars(print_r($expression, true))
      ) . '</tt></p>';
   } else {
      $str = '<pre style="' . $css . '">' . print_r($expression, true) . '</pre>';
   }
   echo $str;
}

function get_real_ip()
{
   ############################################
   $ip = false;
   if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
   }
   if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ips = explode(", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
      if ($ip) {
         array_unshift($ips, $ip);
         $ip = false;
      }
      for ($i = 0; $i < count($ips); $i++) {
         if (!preg_match("/^(10|172\.16|192\.168)\./i", $ips[$i])) {
            if (version_compare(phpversion(), "5.0.0", ">=")) {
               if (ip2long($ips[$i]) != false) {
                  $ip = $ips[$i];
                  break;
               }
            } else {
               if (ip2long($ips[$i]) != -1) {
                  $ip = $ips[$i];
                  break;
               }
            }
         }
      }
   }
   return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}

############################################

function _getURL()
{
   ############################################
   $Parameter = (strlen($_SERVER["QUERY_STRING"]) > 0) ? "?" . $_SERVER["QUERY_STRING"] : "";
   return 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"] . $Parameter; #$_SERVER['REQUEST_URI'];
}


function logs_access($actionType)
{
   global $db;

   $core_tb_log = "logs";
   $core_pathname_logs = "../../logs";
   $CurrentPath = $core_pathname_logs . "";
   if (!is_dir($CurrentPath)) {
      mkdir($CurrentPath, 0777);
   }

   $myDateNow = date("Y-m-d");
   $myTimeNow = date("H:i:s");

   ## section logs ##
   if (!is_dir($CurrentPath . "/access-action")) {
      mkdir($CurrentPath . "/access-action", 0777);
   } # ÊÃéÒ§ path

   $logsfile = $CurrentPath . "/access-action/" . $myDateNow . ".logs";

   if (!is_file($logsfile)) {
      $fp = @fopen($logsfile, 'w+');
      fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . _getURL() . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
      fclose($fp);
      chmod($logsfile, 0666);
   } else {
      $fp = @fopen($logsfile, 'a');
      fwrite($fp, $actionType . "|:|" . session_id() . "|:|" . _getURL() . "|:|" . get_real_ip() . "|:|" . $myDateNow . " " . $myTimeNow . "\n");
      fclose($fp);
   }


   /* ################## Start Insert Access User DB ########################## */

   $insert[$core_tb_log . "_action"] = "'" . $actionType . "'";
   $insert[$core_tb_log . "_sessid"] = "'" . session_id() . "'";
   $insert[$core_tb_log . "_ip"] = "'" . get_real_ip() . "'";
   $insert[$core_tb_log . "_time"] = "NOW()";
   $insert[$core_tb_log . "_type"] = "'Access Menu'";

   $insert[$core_tb_log . "_url"] = "'" . _getURL() . "'";


   $sqlLog = "INSERT INTO " . $core_tb_log . "(" . implode(",", array_keys($insert)) . ") VALUES (" . implode(",", array_values($insert)) . ")";
   $queryLog = $db->Execute($sqlLog);

   /* ################## End Insert Access User DB ########################## */
}

################## Query DB ##########################

function QueryDB($valCoreDB = null, $valSqlQuery = null)
{
   ################## Set Up Function ###############################
   global $db;
   $valQueryDB = $db->execute($valSqlQuery);
   return $valQueryDB;
}

################## Num Rows DB ##########################

function NumRowsDB($valCoreDB = null, $valQueryDB = null)
{
   ################## Set Up Function ###############################
   return $valQueryDB->_numOfRows;
}

################## Fetch Array DB ##########################

function FetchArrayDB($valCoreDB = null, $valQueryDB = null)
{
   //################## Set Up Function ###############################
   return $valQueryDB->FetchRow();
}

//#################################################
function dateFormatReal($DateTime, $type = true)
{
   //#################################################
   global $core_session_language;
   if ($DateTime == "0000-00-00 00:00:00") {
      $valReturnData = "";
   } else {
      $DateTime = date("Y-m-d H:i", strtotime($DateTime));

      if ($DateTime != "") {
         $DateTimeArr = explode(" ", $DateTime);
         $Date = $DateTimeArr[0];
         $Time = $DateTimeArr[1];

         $DateArr = explode("-", $Date);

         if ($core_session_language == "Thai")
            $DateArr[0] = ($DateArr[0] + 543);
         $valReturnData = $DateArr[2] . "/" . $DateArr[1] . "/" . $DateArr[0];
      } else {
         $valReturnData = "-";
      }
   }
   return $valReturnData;
}

//#################################################
function timeFormatReal($DateTime)
{
   //#################################################
   global $core_session_language;
   $DateTime = date("Y-m-d H:i", strtotime($DateTime));

   $DateTimeArr = explode(" ", $DateTime);
   $Date = $DateTimeArr[0];
   $Time = $DateTimeArr[1];

   $timeArr = explode(":", $Time);


   return $timeArr[0] . ":" . $timeArr[1];
}

############################################
function encodeStr($variable)
{
   ############################################
   $key = "xitgmLwmp";
   $index = 0;
   $temp = "";
   $variable = str_replace("=", "?O", $variable);
   for ($i = 0; $i < strlen($variable); $i++) {
      $temp .= $variable[$i] . $key[$index];
      $index++;
      if ($index >= strlen($key)) $index = 0;
   }
   $variable = strrev($temp);
   $variable = base64_encode($variable);
   $variable = utf8_encode($variable);
   $variable = urlencode($variable);
   $variable = str_rot13($variable);
   return $variable;
}
############################################
function decodeStr($enVariable)
{
   ############################################
   $enVariable = str_rot13($enVariable);
   $enVariable = urldecode($enVariable);
   $enVariable = utf8_decode($enVariable);
   $enVariable = base64_decode($enVariable);
   $enVariable = strrev($enVariable);
   $current = 0;
   $temp = "";
   for ($i = 0; $i < strlen($enVariable); $i++) {
      if ($current % 2 == 0) {
         $temp .= $enVariable[$i];
      }
      $current++;
   }
   $temp = str_replace("?O", "=", $temp);
   parse_str($temp, $variable);
   return $temp;
}
function txtReplaceHTML($data)
{
   ####################################################
   $dataHTML = str_replace("\\", "", $data);
   return $dataHTML;
}

function getHospital()
{
   ############################################
   global $coreLanguageSQL;
   $tb_clinic = "clinic";
   $sql = "SELECT " . $tb_clinic . "_id FROM " . $tb_clinic . " WHERE " . $tb_clinic . "_status='Enable'";
   //print_pre($sql);
   $Query = QueryDB($coreLanguageSQL, $sql);
   $RecordCount = NumRowsDB($coreLanguageSQL, $Query);
   return ($RecordCount);
}

function getHelp()
{
   ############################################
   global $coreLanguageSQL;
   $tb_help = "track";
   $sql = "SELECT " . $tb_help . "_id FROM " . $tb_help . " WHERE " . $tb_help . "_status != 'Disable'";
   //print_pre($sql);
   $Query = QueryDB($coreLanguageSQL, $sql);
   $RecordCount = NumRowsDB($coreLanguageSQL, $Query);
   return ($RecordCount);
}

function getHelpSuccess()
{
   ############################################
   global $coreLanguageSQL;
   $tb_help = "track";
   $sql = "SELECT " . $tb_help . "_id FROM " . $tb_help . " WHERE " . $tb_help . "_status = 'Success'";
   //print_pre($sql);
   $Query = QueryDB($coreLanguageSQL, $sql);
   $RecordCount = NumRowsDB($coreLanguageSQL, $Query);
   return ($RecordCount);
}

function getAn()
{
   ############################################
   global $coreLanguageSQL;
   $tb_help = "annouce";
   $sql = "SELECT " . $tb_help . "_id FROM " . $tb_help . " WHERE " . $tb_help . "_status = 'Enable'";
   //print_pre($sql);
   $Query = QueryDB($coreLanguageSQL, $sql);
   $RecordCount = NumRowsDB($coreLanguageSQL, $Query);
   return ($RecordCount);
}

