
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span>[Global Namespace]                    </div>                    <div class="bd">                                <ul>                <li data-name="class:Glpi_Api_Rest_Client" >                    <div style="padding-left:26px" class="hd leaf">                        <a href="Glpi/Api/Rest/Client.html">Client</a>                    </div>                </li>                            <li data-name="class:Glpi_Api_Rest_EndPointHandler" >                    <div style="padding-left:26px" class="hd leaf">                        <a href="Glpi/Api/Rest/EndPointHandler.html">EndPointHandler</a>                    </div>                </li>                            <li data-name="class:Glpi_Api_Rest_ErrorHandler" >                    <div style="padding-left:26px" class="hd leaf">                        <a href="Glpi/Api/Rest/ErrorHandler.html">ErrorHandler</a>                    </div>                </li>                            <li data-name="class:Glpi_Api_Rest_Exception_BadEndpointException" >                    <div style="padding-left:26px" class="hd leaf">                        <a href="Glpi/Api/Rest/Exception/BadEndpointException.html">BadEndpointException</a>                    </div>                </li>                            <li data-name="class:Glpi_Api_Rest_Exception_InsufficientArgumentsException" >                    <div style="padding-left:26px" class="hd leaf">                        <a href="Glpi/Api/Rest/Exception/InsufficientArgumentsException.html">InsufficientArgumentsException</a>                    </div>                </li>                            <li data-name="class:Glpi_Api_Rest_ItemHandler" >                    <div style="padding-left:26px" class="hd leaf">                        <a href="Glpi/Api/Rest/ItemHandler.html">ItemHandler</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "Glpi.html", "name": "Glpi", "doc": "Namespace Glpi"},{"type": "Namespace", "link": "Glpi/Api.html", "name": "Glpi\\Api", "doc": "Namespace Glpi\\Api"},{"type": "Namespace", "link": "Glpi/Api/Rest.html", "name": "Glpi\\Api\\Rest", "doc": "Namespace Glpi\\Api\\Rest"},{"type": "Namespace", "link": "Glpi/Api/Rest/Exception.html", "name": "Glpi\\Api\\Rest\\Exception", "doc": "Namespace Glpi\\Api\\Rest\\Exception"},
            
            {"type": "Class", "fromName": "Glpi\\Api\\Rest", "fromLink": "Glpi/Api/Rest.html", "link": "Glpi/Api/Rest/Client.html", "name": "Glpi\\Api\\Rest\\Client", "doc": "&quot;Class Client&quot;"},
                                                        {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method___construct", "name": "Glpi\\Api\\Rest\\Client::__construct", "doc": "&quot;Client constructor.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_setAppToken", "name": "Glpi\\Api\\Rest\\Client::setAppToken", "doc": "&quot;Set an application token to be used for each request&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_initSessionByCredentials", "name": "Glpi\\Api\\Rest\\Client::initSessionByCredentials", "doc": "&quot;Initialize a session with user credentials&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_initSessionByUserToken", "name": "Glpi\\Api\\Rest\\Client::initSessionByUserToken", "doc": "&quot;initialize a session with a user token&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_killSession", "name": "Glpi\\Api\\Rest\\Client::killSession", "doc": "&quot;Kill client session.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_request", "name": "Glpi\\Api\\Rest\\Client::request", "doc": "&quot;Prepare and send a request to the GLPI Api.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_getFullSession", "name": "Glpi\\Api\\Rest\\Client::getFullSession", "doc": "&quot;Return the current php $_SESSION.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_getGlpiConfig", "name": "Glpi\\Api\\Rest\\Client::getGlpiConfig", "doc": "&quot;Return the current $CFG_GLPI.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_recoveryPassword", "name": "Glpi\\Api\\Rest\\Client::recoveryPassword", "doc": "&quot;Allows to request password recovery.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\Client", "fromLink": "Glpi/Api/Rest/Client.html", "link": "Glpi/Api/Rest/Client.html#method_resetPassword", "name": "Glpi\\Api\\Rest\\Client::resetPassword", "doc": "&quot;Allows to request a password reset.&quot;"},
            
            {"type": "Class", "fromName": "Glpi\\Api\\Rest", "fromLink": "Glpi/Api/Rest.html", "link": "Glpi/Api/Rest/EndPointHandler.html", "name": "Glpi\\Api\\Rest\\EndPointHandler", "doc": "&quot;Class EndPointHandler&quot;"},
                                                        {"type": "Method", "fromName": "Glpi\\Api\\Rest\\EndPointHandler", "fromLink": "Glpi/Api/Rest/EndPointHandler.html", "link": "Glpi/Api/Rest/EndPointHandler.html#method___construct", "name": "Glpi\\Api\\Rest\\EndPointHandler::__construct", "doc": "&quot;EndPointHandler constructor.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\EndPointHandler", "fromLink": "Glpi/Api/Rest/EndPointHandler.html", "link": "Glpi/Api/Rest/EndPointHandler.html#method_getClient", "name": "Glpi\\Api\\Rest\\EndPointHandler::getClient", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\EndPointHandler", "fromLink": "Glpi/Api/Rest/EndPointHandler.html", "link": "Glpi/Api/Rest/EndPointHandler.html#method_getMyProfiles", "name": "Glpi\\Api\\Rest\\EndPointHandler::getMyProfiles", "doc": "&quot;Return all the profiles associated to logged user.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\EndPointHandler", "fromLink": "Glpi/Api/Rest/EndPointHandler.html", "link": "Glpi/Api/Rest/EndPointHandler.html#method_getActiveProfile", "name": "Glpi\\Api\\Rest\\EndPointHandler::getActiveProfile", "doc": "&quot;Return the current active profile.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\EndPointHandler", "fromLink": "Glpi/Api/Rest/EndPointHandler.html", "link": "Glpi/Api/Rest/EndPointHandler.html#method_changeActiveProfile", "name": "Glpi\\Api\\Rest\\EndPointHandler::changeActiveProfile", "doc": "&quot;Change active profile to the profiles_id one.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\EndPointHandler", "fromLink": "Glpi/Api/Rest/EndPointHandler.html", "link": "Glpi/Api/Rest/EndPointHandler.html#method_getMyEntities", "name": "Glpi\\Api\\Rest\\EndPointHandler::getMyEntities", "doc": "&quot;Return all the possible entities of the current logged user (and for current active profile).&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\EndPointHandler", "fromLink": "Glpi/Api/Rest/EndPointHandler.html", "link": "Glpi/Api/Rest/EndPointHandler.html#method_getActiveEntities", "name": "Glpi\\Api\\Rest\\EndPointHandler::getActiveEntities", "doc": "&quot;Return active entities of current logged user.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\EndPointHandler", "fromLink": "Glpi/Api/Rest/EndPointHandler.html", "link": "Glpi/Api/Rest/EndPointHandler.html#method_changeActiveEntities", "name": "Glpi\\Api\\Rest\\EndPointHandler::changeActiveEntities", "doc": "&quot;Change active entity to the entities_id one.&quot;"},
            
            {"type": "Class", "fromName": "Glpi\\Api\\Rest", "fromLink": "Glpi/Api/Rest.html", "link": "Glpi/Api/Rest/ErrorHandler.html", "name": "Glpi\\Api\\Rest\\ErrorHandler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ErrorHandler", "fromLink": "Glpi/Api/Rest/ErrorHandler.html", "link": "Glpi/Api/Rest/ErrorHandler.html#method_getMessage", "name": "Glpi\\Api\\Rest\\ErrorHandler::getMessage", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "Glpi\\Api\\Rest\\Exception", "fromLink": "Glpi/Api/Rest/Exception.html", "link": "Glpi/Api/Rest/Exception/BadEndpointException.html", "name": "Glpi\\Api\\Rest\\Exception\\BadEndpointException", "doc": "&quot;Class BadEndpointException&quot;"},
                    
            {"type": "Class", "fromName": "Glpi\\Api\\Rest\\Exception", "fromLink": "Glpi/Api/Rest/Exception.html", "link": "Glpi/Api/Rest/Exception/InsufficientArgumentsException.html", "name": "Glpi\\Api\\Rest\\Exception\\InsufficientArgumentsException", "doc": "&quot;Class InsufficientArgumentsException&quot;"},
                    
            {"type": "Class", "fromName": "Glpi\\Api\\Rest", "fromLink": "Glpi/Api/Rest.html", "link": "Glpi/Api/Rest/ItemHandler.html", "name": "Glpi\\Api\\Rest\\ItemHandler", "doc": "&quot;These methods are dynamically handled by the __call() function to help developers&#039; IDE.&quot;"},
                                                        {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method___construct", "name": "Glpi\\Api\\Rest\\ItemHandler::__construct", "doc": "&quot;ItemHandler constructor.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_getClient", "name": "Glpi\\Api\\Rest\\ItemHandler::getClient", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_getItem", "name": "Glpi\\Api\\Rest\\ItemHandler::getItem", "doc": "&quot;Return the instance fields of itemtype identified by id.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_getAllItems", "name": "Glpi\\Api\\Rest\\ItemHandler::getAllItems", "doc": "&quot;Return a collection of rows of the itemtype.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_getSubItems", "name": "Glpi\\Api\\Rest\\ItemHandler::getSubItems", "doc": "&quot;Return a collection of rows of the itemtype.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_getMultipleItems", "name": "Glpi\\Api\\Rest\\ItemHandler::getMultipleItems", "doc": "&quot;Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_listSearchOptions", "name": "Glpi\\Api\\Rest\\ItemHandler::listSearchOptions", "doc": "&quot;Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_searchItems", "name": "Glpi\\Api\\Rest\\ItemHandler::searchItems", "doc": "&quot;Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_addItems", "name": "Glpi\\Api\\Rest\\ItemHandler::addItems", "doc": "&quot;Add an object (or multiple objects) into GLPI.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_updateItems", "name": "Glpi\\Api\\Rest\\ItemHandler::updateItems", "doc": "&quot;Update an object (or multiple objects) existing in GLPI.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_deleteItems", "name": "Glpi\\Api\\Rest\\ItemHandler::deleteItems", "doc": "&quot;Delete an object&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method___call", "name": "Glpi\\Api\\Rest\\ItemHandler::__call", "doc": "&quot;Magic method to execute CRUD actions with a single ItemTypes dynamically.&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Alert", "name": "Glpi\\Api\\Rest\\ItemHandler::Alert", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_AuthLDAP", "name": "Glpi\\Api\\Rest\\ItemHandler::AuthLDAP", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_AuthLdapReplicate", "name": "Glpi\\Api\\Rest\\ItemHandler::AuthLdapReplicate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_AuthMail", "name": "Glpi\\Api\\Rest\\ItemHandler::AuthMail", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_AutoUpdateSystem", "name": "Glpi\\Api\\Rest\\ItemHandler::AutoUpdateSystem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Blacklist", "name": "Glpi\\Api\\Rest\\ItemHandler::Blacklist", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_BlacklistedMailContent", "name": "Glpi\\Api\\Rest\\ItemHandler::BlacklistedMailContent", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Bookmark", "name": "Glpi\\Api\\Rest\\ItemHandler::Bookmark", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Bookmark_User", "name": "Glpi\\Api\\Rest\\ItemHandler::Bookmark_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Budget", "name": "Glpi\\Api\\Rest\\ItemHandler::Budget", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Calendar", "name": "Glpi\\Api\\Rest\\ItemHandler::Calendar", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Calendar_Holiday", "name": "Glpi\\Api\\Rest\\ItemHandler::Calendar_Holiday", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CalendarSegment", "name": "Glpi\\Api\\Rest\\ItemHandler::CalendarSegment", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Cartridge", "name": "Glpi\\Api\\Rest\\ItemHandler::Cartridge", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CartridgeItem", "name": "Glpi\\Api\\Rest\\ItemHandler::CartridgeItem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CartridgeItem_PrinterModel", "name": "Glpi\\Api\\Rest\\ItemHandler::CartridgeItem_PrinterModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CartridgeItemType", "name": "Glpi\\Api\\Rest\\ItemHandler::CartridgeItemType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Change", "name": "Glpi\\Api\\Rest\\ItemHandler::Change", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Change_Group", "name": "Glpi\\Api\\Rest\\ItemHandler::Change_Group", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Change_Item", "name": "Glpi\\Api\\Rest\\ItemHandler::Change_Item", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Change_Problem", "name": "Glpi\\Api\\Rest\\ItemHandler::Change_Problem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Change_Project", "name": "Glpi\\Api\\Rest\\ItemHandler::Change_Project", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Change_Supplier", "name": "Glpi\\Api\\Rest\\ItemHandler::Change_Supplier", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Change_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::Change_Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Change_User", "name": "Glpi\\Api\\Rest\\ItemHandler::Change_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ChangeCost", "name": "Glpi\\Api\\Rest\\ItemHandler::ChangeCost", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ChangeTask", "name": "Glpi\\Api\\Rest\\ItemHandler::ChangeTask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ChangeValidation", "name": "Glpi\\Api\\Rest\\ItemHandler::ChangeValidation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonDBChild", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonDBChild", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonDBConnexity", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonDBConnexity", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonDBRelation", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonDBRelation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonDevice", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonDevice", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonDropdown", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonDropdown", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonImplicitTreeDropdown", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonImplicitTreeDropdown", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonITILActor", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonITILActor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonITILCost", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonITILCost", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonITILObject", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonITILObject", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonITILTask", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonITILTask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonITILValidation", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonITILValidation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CommonTreeDropdown", "name": "Glpi\\Api\\Rest\\ItemHandler::CommonTreeDropdown", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Computer", "name": "Glpi\\Api\\Rest\\ItemHandler::Computer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Computer_Item", "name": "Glpi\\Api\\Rest\\ItemHandler::Computer_Item", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Computer_SoftwareLicense", "name": "Glpi\\Api\\Rest\\ItemHandler::Computer_SoftwareLicense", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Computer_SoftwareVersion", "name": "Glpi\\Api\\Rest\\ItemHandler::Computer_SoftwareVersion", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ComputerDisk", "name": "Glpi\\Api\\Rest\\ItemHandler::ComputerDisk", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ComputerModel", "name": "Glpi\\Api\\Rest\\ItemHandler::ComputerModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ComputerType", "name": "Glpi\\Api\\Rest\\ItemHandler::ComputerType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ComputerVirtualMachine", "name": "Glpi\\Api\\Rest\\ItemHandler::ComputerVirtualMachine", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Config", "name": "Glpi\\Api\\Rest\\ItemHandler::Config", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Consumable", "name": "Glpi\\Api\\Rest\\ItemHandler::Consumable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ConsumableItem", "name": "Glpi\\Api\\Rest\\ItemHandler::ConsumableItem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ConsumableItemType", "name": "Glpi\\Api\\Rest\\ItemHandler::ConsumableItemType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Contact", "name": "Glpi\\Api\\Rest\\ItemHandler::Contact", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Contact_Supplier", "name": "Glpi\\Api\\Rest\\ItemHandler::Contact_Supplier", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ContactType", "name": "Glpi\\Api\\Rest\\ItemHandler::ContactType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Contract", "name": "Glpi\\Api\\Rest\\ItemHandler::Contract", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Contract_Item", "name": "Glpi\\Api\\Rest\\ItemHandler::Contract_Item", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Contract_Supplier", "name": "Glpi\\Api\\Rest\\ItemHandler::Contract_Supplier", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ContractCost", "name": "Glpi\\Api\\Rest\\ItemHandler::ContractCost", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ContractType", "name": "Glpi\\Api\\Rest\\ItemHandler::ContractType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CronTask", "name": "Glpi\\Api\\Rest\\ItemHandler::CronTask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_CronTaskLog", "name": "Glpi\\Api\\Rest\\ItemHandler::CronTaskLog", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DBConnection", "name": "Glpi\\Api\\Rest\\ItemHandler::DBConnection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceCase", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceCase", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceCaseType", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceCaseType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceControl", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceControl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceDrive", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceDrive", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceGraphicCard", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceGraphicCard", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceHardDrive", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceHardDrive", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceMemory", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceMemory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceMemoryType", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceMemoryType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceMotherboard", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceMotherboard", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceNetworkCard", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceNetworkCard", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DevicePci", "name": "Glpi\\Api\\Rest\\ItemHandler::DevicePci", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DevicePowerSupply", "name": "Glpi\\Api\\Rest\\ItemHandler::DevicePowerSupply", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceProcessor", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceProcessor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DeviceSoundCard", "name": "Glpi\\Api\\Rest\\ItemHandler::DeviceSoundCard", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DisplayPreference", "name": "Glpi\\Api\\Rest\\ItemHandler::DisplayPreference", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Document", "name": "Glpi\\Api\\Rest\\ItemHandler::Document", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Document_Item", "name": "Glpi\\Api\\Rest\\ItemHandler::Document_Item", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DocumentCategory", "name": "Glpi\\Api\\Rest\\ItemHandler::DocumentCategory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DocumentType", "name": "Glpi\\Api\\Rest\\ItemHandler::DocumentType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Domain", "name": "Glpi\\Api\\Rest\\ItemHandler::Domain", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_DropdownTranslation", "name": "Glpi\\Api\\Rest\\ItemHandler::DropdownTranslation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Entity", "name": "Glpi\\Api\\Rest\\ItemHandler::Entity", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Entity_KnowbaseItem", "name": "Glpi\\Api\\Rest\\ItemHandler::Entity_KnowbaseItem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Entity_Reminder", "name": "Glpi\\Api\\Rest\\ItemHandler::Entity_Reminder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Entity_RSSFeed", "name": "Glpi\\Api\\Rest\\ItemHandler::Entity_RSSFeed", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Event", "name": "Glpi\\Api\\Rest\\ItemHandler::Event", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Fieldblacklist", "name": "Glpi\\Api\\Rest\\ItemHandler::Fieldblacklist", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_FieldUnicity", "name": "Glpi\\Api\\Rest\\ItemHandler::FieldUnicity", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Filesystem", "name": "Glpi\\Api\\Rest\\ItemHandler::Filesystem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_FQDN", "name": "Glpi\\Api\\Rest\\ItemHandler::FQDN", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_FQDNLabel", "name": "Glpi\\Api\\Rest\\ItemHandler::FQDNLabel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Group", "name": "Glpi\\Api\\Rest\\ItemHandler::Group", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Group_KnowbaseItem", "name": "Glpi\\Api\\Rest\\ItemHandler::Group_KnowbaseItem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Group_Problem", "name": "Glpi\\Api\\Rest\\ItemHandler::Group_Problem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Group_Reminder", "name": "Glpi\\Api\\Rest\\ItemHandler::Group_Reminder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Group_RSSFeed", "name": "Glpi\\Api\\Rest\\ItemHandler::Group_RSSFeed", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Group_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::Group_Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Group_User", "name": "Glpi\\Api\\Rest\\ItemHandler::Group_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Holiday", "name": "Glpi\\Api\\Rest\\ItemHandler::Holiday", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Infocom", "name": "Glpi\\Api\\Rest\\ItemHandler::Infocom", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_InterfaceType", "name": "Glpi\\Api\\Rest\\ItemHandler::InterfaceType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_IPAddress", "name": "Glpi\\Api\\Rest\\ItemHandler::IPAddress", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_IPAddress_IPNetwork", "name": "Glpi\\Api\\Rest\\ItemHandler::IPAddress_IPNetwork", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_IPNetmask", "name": "Glpi\\Api\\Rest\\ItemHandler::IPNetmask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_IPNetwork", "name": "Glpi\\Api\\Rest\\ItemHandler::IPNetwork", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_IPNetwork_Vlan", "name": "Glpi\\Api\\Rest\\ItemHandler::IPNetwork_Vlan", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceCase", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceCase", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceControl", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceControl", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceDrive", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceDrive", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceGraphicCard", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceGraphicCard", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceHardDrive", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceHardDrive", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceMemory", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceMemory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceMotherboard", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceMotherboard", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceNetworkCard", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceNetworkCard", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DevicePci", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DevicePci", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DevicePowerSupply", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DevicePowerSupply", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceProcessor", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceProcessor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_Devices", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_Devices", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_DeviceSoundCard", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_DeviceSoundCard", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_Problem", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_Problem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_Project", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_Project", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Item_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::Item_Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ITILCategory", "name": "Glpi\\Api\\Rest\\ItemHandler::ITILCategory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_KnowbaseItem", "name": "Glpi\\Api\\Rest\\ItemHandler::KnowbaseItem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_KnowbaseItem_Profile", "name": "Glpi\\Api\\Rest\\ItemHandler::KnowbaseItem_Profile", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_KnowbaseItem_User", "name": "Glpi\\Api\\Rest\\ItemHandler::KnowbaseItem_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_KnowbaseItemCategory", "name": "Glpi\\Api\\Rest\\ItemHandler::KnowbaseItemCategory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_KnowbaseItemTranslation", "name": "Glpi\\Api\\Rest\\ItemHandler::KnowbaseItemTranslation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Link", "name": "Glpi\\Api\\Rest\\ItemHandler::Link", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Link_Itemtype", "name": "Glpi\\Api\\Rest\\ItemHandler::Link_Itemtype", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Location", "name": "Glpi\\Api\\Rest\\ItemHandler::Location", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Log", "name": "Glpi\\Api\\Rest\\ItemHandler::Log", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_MailCollector", "name": "Glpi\\Api\\Rest\\ItemHandler::MailCollector", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Manufacturer", "name": "Glpi\\Api\\Rest\\ItemHandler::Manufacturer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Monitor", "name": "Glpi\\Api\\Rest\\ItemHandler::Monitor", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_MonitorModel", "name": "Glpi\\Api\\Rest\\ItemHandler::MonitorModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_MonitorType", "name": "Glpi\\Api\\Rest\\ItemHandler::MonitorType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Netpoint", "name": "Glpi\\Api\\Rest\\ItemHandler::Netpoint", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Network", "name": "Glpi\\Api\\Rest\\ItemHandler::Network", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkAlias", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkAlias", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkEquipment", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkEquipment", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkEquipmentFirmware", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkEquipmentFirmware", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkEquipmentModel", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkEquipmentModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkEquipmentType", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkEquipmentType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkInterface", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkInterface", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkName", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkName", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPort", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPort", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPort_NetworkPort", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPort_NetworkPort", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPort_Vlan", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPort_Vlan", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPortAggregate", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPortAggregate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPortAlias", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPortAlias", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPortDialup", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPortDialup", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPortEthernet", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPortEthernet", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPortInstantiation", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPortInstantiation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPortLocal", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPortLocal", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPortMigration", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPortMigration", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NetworkPortWifi", "name": "Glpi\\Api\\Rest\\ItemHandler::NetworkPortWifi", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Notepad", "name": "Glpi\\Api\\Rest\\ItemHandler::Notepad", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Notification", "name": "Glpi\\Api\\Rest\\ItemHandler::Notification", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationEvent", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationEvent", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationMailSetting", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationMailSetting", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTarget", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTarget", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetCartridgeItem", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetCartridgeItem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetChange", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetChange", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetCommonITILObject", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetCommonITILObject", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetConsumableItem", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetConsumableItem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetContract", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetContract", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetCrontask", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetCrontask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetDBConnection", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetDBConnection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetFieldUnicity", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetFieldUnicity", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetInfocom", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetInfocom", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetMailCollector", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetMailCollector", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetPlanningRecall", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetPlanningRecall", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetProblem", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetProblem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetProject", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetProject", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetProjectTask", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetProjectTask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetReservation", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetReservation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetSoftwareLicense", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetSoftwareLicense", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetTicket", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetTicket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTargetUser", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTargetUser", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTemplate", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotificationTemplateTranslation", "name": "Glpi\\Api\\Rest\\ItemHandler::NotificationTemplateTranslation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_NotImportedEmail", "name": "Glpi\\Api\\Rest\\ItemHandler::NotImportedEmail", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_OperatingSystem", "name": "Glpi\\Api\\Rest\\ItemHandler::OperatingSystem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_OperatingSystemServicePack", "name": "Glpi\\Api\\Rest\\ItemHandler::OperatingSystemServicePack", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_OperatingSystemVersion", "name": "Glpi\\Api\\Rest\\ItemHandler::OperatingSystemVersion", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Peripheral", "name": "Glpi\\Api\\Rest\\ItemHandler::Peripheral", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_PeripheralModel", "name": "Glpi\\Api\\Rest\\ItemHandler::PeripheralModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_PeripheralType", "name": "Glpi\\Api\\Rest\\ItemHandler::PeripheralType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Phone", "name": "Glpi\\Api\\Rest\\ItemHandler::Phone", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_PhoneModel", "name": "Glpi\\Api\\Rest\\ItemHandler::PhoneModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_PhonePowerSupply", "name": "Glpi\\Api\\Rest\\ItemHandler::PhonePowerSupply", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_PhoneType", "name": "Glpi\\Api\\Rest\\ItemHandler::PhoneType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_PlanningRecall", "name": "Glpi\\Api\\Rest\\ItemHandler::PlanningRecall", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Plugin", "name": "Glpi\\Api\\Rest\\ItemHandler::Plugin", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Printer", "name": "Glpi\\Api\\Rest\\ItemHandler::Printer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_PrinterModel", "name": "Glpi\\Api\\Rest\\ItemHandler::PrinterModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_PrinterType", "name": "Glpi\\Api\\Rest\\ItemHandler::PrinterType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Problem", "name": "Glpi\\Api\\Rest\\ItemHandler::Problem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Problem_Supplier", "name": "Glpi\\Api\\Rest\\ItemHandler::Problem_Supplier", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Problem_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::Problem_Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Problem_User", "name": "Glpi\\Api\\Rest\\ItemHandler::Problem_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProblemCost", "name": "Glpi\\Api\\Rest\\ItemHandler::ProblemCost", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProblemTask", "name": "Glpi\\Api\\Rest\\ItemHandler::ProblemTask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Profile", "name": "Glpi\\Api\\Rest\\ItemHandler::Profile", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Profile_Reminder", "name": "Glpi\\Api\\Rest\\ItemHandler::Profile_Reminder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Profile_RSSFeed", "name": "Glpi\\Api\\Rest\\ItemHandler::Profile_RSSFeed", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Profile_User", "name": "Glpi\\Api\\Rest\\ItemHandler::Profile_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProfileRight", "name": "Glpi\\Api\\Rest\\ItemHandler::ProfileRight", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Project", "name": "Glpi\\Api\\Rest\\ItemHandler::Project", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProjectCost", "name": "Glpi\\Api\\Rest\\ItemHandler::ProjectCost", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProjectState", "name": "Glpi\\Api\\Rest\\ItemHandler::ProjectState", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProjectTask", "name": "Glpi\\Api\\Rest\\ItemHandler::ProjectTask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProjectTask_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::ProjectTask_Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProjectTaskTeam", "name": "Glpi\\Api\\Rest\\ItemHandler::ProjectTaskTeam", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProjectTaskType", "name": "Glpi\\Api\\Rest\\ItemHandler::ProjectTaskType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProjectTeam", "name": "Glpi\\Api\\Rest\\ItemHandler::ProjectTeam", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ProjectType", "name": "Glpi\\Api\\Rest\\ItemHandler::ProjectType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_QueuedMail", "name": "Glpi\\Api\\Rest\\ItemHandler::QueuedMail", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RegisteredID", "name": "Glpi\\Api\\Rest\\ItemHandler::RegisteredID", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Reminder", "name": "Glpi\\Api\\Rest\\ItemHandler::Reminder", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Reminder_User", "name": "Glpi\\Api\\Rest\\ItemHandler::Reminder_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RequestType", "name": "Glpi\\Api\\Rest\\ItemHandler::RequestType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Reservation", "name": "Glpi\\Api\\Rest\\ItemHandler::Reservation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_ReservationItem", "name": "Glpi\\Api\\Rest\\ItemHandler::ReservationItem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RSSFeed", "name": "Glpi\\Api\\Rest\\ItemHandler::RSSFeed", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RSSFeed_User", "name": "Glpi\\Api\\Rest\\ItemHandler::RSSFeed_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Rule", "name": "Glpi\\Api\\Rest\\ItemHandler::Rule", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleAction", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleAction", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleCriteria", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleCriteria", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryComputerModel", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryComputerModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryComputerModelCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryComputerModelCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryComputerType", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryComputerType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryComputerTypeCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryComputerTypeCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryDropdown", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryDropdown", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryDropdownCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryDropdownCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryManufacturer", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryManufacturer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryManufacturerCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryManufacturerCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryMonitorModel", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryMonitorModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryMonitorModelCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryMonitorModelCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryMonitorType", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryMonitorType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryMonitorTypeCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryMonitorTypeCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryNetworkEquipmentModel", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryNetworkEquipmentModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryNetworkEquipmentModelCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryNetworkEquipmentModelCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryNetworkEquipmentType", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryNetworkEquipmentType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryNetworkEquipmentTypeCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryNetworkEquipmentTypeCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryOperatingSystem", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryOperatingSystem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryOperatingSystemCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryOperatingSystemCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryOperatingSystemServicePack", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryOperatingSystemServicePack", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryOperatingSystemServicePackCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryOperatingSystemServicePackCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryOperatingSystemVersion", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryOperatingSystemVersion", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryOperatingSystemVersionCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryOperatingSystemVersionCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPeripheralModel", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPeripheralModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPeripheralModelCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPeripheralModelCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPeripheralType", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPeripheralType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPeripheralTypeCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPeripheralTypeCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPhoneModel", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPhoneModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPhoneModelCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPhoneModelCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPhoneType", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPhoneType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPhoneTypeCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPhoneTypeCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPrinter", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPrinter", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPrinterCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPrinterCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPrinterModel", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPrinterModel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPrinterModelCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPrinterModelCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPrinterType", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPrinterType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnaryPrinterTypeCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnaryPrinterTypeCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnarySoftware", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnarySoftware", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleDictionnarySoftwareCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleDictionnarySoftwareCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleImportComputer", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleImportComputer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleImportComputerCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleImportComputerCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleImportEntity", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleImportEntity", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleImportEntityCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleImportEntityCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleMailCollector", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleMailCollector", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleMailCollectorCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleMailCollectorCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleRight", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleRight", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleRightCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleRightCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleRightParameter", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleRightParameter", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleSoftwareCategory", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleSoftwareCategory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleSoftwareCategoryCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleSoftwareCategoryCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleTicket", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleTicket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_RuleTicketCollection", "name": "Glpi\\Api\\Rest\\ItemHandler::RuleTicketCollection", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SLA", "name": "Glpi\\Api\\Rest\\ItemHandler::SLA", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SlaLevel", "name": "Glpi\\Api\\Rest\\ItemHandler::SlaLevel", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SlaLevel_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::SlaLevel_Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SlaLevelAction", "name": "Glpi\\Api\\Rest\\ItemHandler::SlaLevelAction", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SlaLevelCriteria", "name": "Glpi\\Api\\Rest\\ItemHandler::SlaLevelCriteria", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Software", "name": "Glpi\\Api\\Rest\\ItemHandler::Software", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SoftwareCategory", "name": "Glpi\\Api\\Rest\\ItemHandler::SoftwareCategory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SoftwareLicense", "name": "Glpi\\Api\\Rest\\ItemHandler::SoftwareLicense", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SoftwareLicenseType", "name": "Glpi\\Api\\Rest\\ItemHandler::SoftwareLicenseType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SoftwareVersion", "name": "Glpi\\Api\\Rest\\ItemHandler::SoftwareVersion", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SolutionTemplate", "name": "Glpi\\Api\\Rest\\ItemHandler::SolutionTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SolutionType", "name": "Glpi\\Api\\Rest\\ItemHandler::SolutionType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SsoVariable", "name": "Glpi\\Api\\Rest\\ItemHandler::SsoVariable", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_State", "name": "Glpi\\Api\\Rest\\ItemHandler::State", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Supplier", "name": "Glpi\\Api\\Rest\\ItemHandler::Supplier", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Supplier_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::Supplier_Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_SupplierType", "name": "Glpi\\Api\\Rest\\ItemHandler::SupplierType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TaskCategory", "name": "Glpi\\Api\\Rest\\ItemHandler::TaskCategory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Ticket_Ticket", "name": "Glpi\\Api\\Rest\\ItemHandler::Ticket_Ticket", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Ticket_User", "name": "Glpi\\Api\\Rest\\ItemHandler::Ticket_User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketCost", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketCost", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketFollowup", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketFollowup", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketRecurrent", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketRecurrent", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketSatisfaction", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketSatisfaction", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketTask", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketTask", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketTemplate", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketTemplate", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketTemplateHiddenField", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketTemplateHiddenField", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketTemplateMandatoryField", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketTemplateMandatoryField", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketTemplatePredefinedField", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketTemplatePredefinedField", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_TicketValidation", "name": "Glpi\\Api\\Rest\\ItemHandler::TicketValidation", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Transfer", "name": "Glpi\\Api\\Rest\\ItemHandler::Transfer", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_User", "name": "Glpi\\Api\\Rest\\ItemHandler::User", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_UserCategory", "name": "Glpi\\Api\\Rest\\ItemHandler::UserCategory", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_UserEmail", "name": "Glpi\\Api\\Rest\\ItemHandler::UserEmail", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_UserTitle", "name": "Glpi\\Api\\Rest\\ItemHandler::UserTitle", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_VirtualMachineState", "name": "Glpi\\Api\\Rest\\ItemHandler::VirtualMachineState", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_VirtualMachineSystem", "name": "Glpi\\Api\\Rest\\ItemHandler::VirtualMachineSystem", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_VirtualMachineType", "name": "Glpi\\Api\\Rest\\ItemHandler::VirtualMachineType", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_Vlan", "name": "Glpi\\Api\\Rest\\ItemHandler::Vlan", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "Glpi\\Api\\Rest\\ItemHandler", "fromLink": "Glpi/Api/Rest/ItemHandler.html", "link": "Glpi/Api/Rest/ItemHandler.html#method_WifiNetwork", "name": "Glpi\\Api\\Rest\\ItemHandler::WifiNetwork", "doc": "&quot;&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


