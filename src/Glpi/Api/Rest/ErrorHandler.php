<?php
/**
 * --------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of the GLPI API Client Library for PHP,
 * a subproject of GLPI. GLPI is a free IT Asset Management.
 *
 * GLPI is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 *
 * GLPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * --------------------------------------------------------------------
 * @author    Domingo Oropeza - <doropeza@teclib.com>
 * @copyright (C) 2017 Teclib' and contributors.
 * @license   GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link      https://github.com/glpi-project/php-library-glpi
 * @link      http://www.glpi-project.org/
 * --------------------------------------------------------------------
 */

namespace Glpi\Api\Rest;

class ErrorHandler {

   /**
    * List of messages
    */
   const errors = [
      'ERROR_ITEM_NOT_FOUND' => "The desired resource (itemtype-id) was not found in the GLPI database.",
      'ERROR_BAD_ARRAY' => "The HTTP body must be an an array of objects.",
      'ERROR_METHOD_NOT_ALLOWED' => "You specified an inexistent or not not allowed resource.",
      'ERROR_RIGHT_MISSING' => "The current logged user miss rights in his profile to do the provided action. Alter this profile or choose a new one for the user in GLPI main interface.",
      'ERROR_SESSION_TOKEN_INVALID' => "The Session-Token provided in header is invalid. You should redo an Init session request.",
      'ERROR_SESSION_TOKEN_MISSING' => "You miss to provide Session-Token in header of your HTTP request.",
      'ERROR_APP_TOKEN_PARAMETERS_MISSING' => "The current API requires an App-Token header for using its methods.",
      'ERROR_NOT_DELETED' => "You must mark the item for deletion before actually deleting it",
      'ERROR_NOT_ALLOWED_IP' => "We can't find an active client defined in configuration for your IP. Go to the GLPI Configuration > Setup menu and API tab to check IP access.",
      'ERROR_LOGIN_PARAMETERS_MISSING' => "One of theses parameter(s) is missing: login and password or user_token",
      'ERROR_LOGIN_WITH_CREDENTIALS_DISABLED' => "The GLPI setup forbid the login with credentials, you must login with your user_token instead. See your personal preferences page or setup API access in GLPI main interface.",
      'ERROR_GLPI_LOGIN_USER_TOKEN' => "The provided user_token seems invalid. Check your personal preferences page in GLPI main interface.",
      'ERROR_GLPI_LOGIN' => "We cannot login you into GLPI. This error is not relative to API but GLPI core. Check the user administration and the GLPI logs files (in files/_logs directory).",
      'ERROR_ITEMTYPE_NOT_FOUND_NOR_COMMONDBTM' => "We cannot login you into GLPI. This error is not relative to API but GLPI core. Check the user administration and the GLPI logs files (in files/_logs directory).You asked a inexistent resource (endpoint). It's not a predefined (initSession, getFullSession, etc) nor a GLPI CommonDBTM resources. See this documentation for predefined ones or List itemtypes for available resources",
      'ERROR_SQL' => "We suspect an SQL error. This error is not relative to API but to GLPI core. Check the GLPI logs files (in files/_logs directory).",
      'ERROR_RANGE_EXCEED_TOTAL' => "The range parameter you provided is superior to the total count of available data.",
      'ERROR_GLPI_ADD' => "We cannot add the object to GLPI. This error is not relative to API but to GLPI core. Check the GLPI logs files (in files/_logs directory).",
      'ERROR_GLPI_PARTIAL_ADD' => "Some of the object you wanted to add triggers an error. Maybe a missing field or rights. You'll find with this error a collection of results.",
      'ERROR_GLPI_UPDATE' => "We cannot update the object to GLPI. This error is not relative to API but to GLPI core. Check the GLPI logs files (in files/_logs directory).",
      'ERROR_GLPI_PARTIAL_UPDATE' => "Some of the object you wanted to update triggers an error. Maybe a missing field or rights. You'll find with this error a collection of results.",
      'ERROR_GLPI_DELETE' => "We cannot delete the object to GLPI. This error is not relative to API but to GLPI core. Check the GLPI logs files (in files/_logs directory).",
      'ERROR_GLPI_PARTIAL_DELETE' => "Some of the objects you want to delete triggers an error, maybe a missing field or rights. You'll find with this error, a collection of results.",
      'ERROR_RESOURCE_NOT_FOUND_NOR_COMMONDBTM' => "Resource not found or not an instance of CommonDBTM",
      'ERROR_APILIB_ARGUMENTS' => "Missing o wrong argument(s) for this function, please check GLPI API and function documentation.",
      'ERROR_APILIB_ARGS_MANDATORY' => "Missing mandatory param(s) %s.",
   ];

   /**
    * @param string $error
    * @param null $args
    * @return string
    */
   public static function getMessage($error, $args = null) {
      return sprintf(self::errors[$error], $args);
   }
}