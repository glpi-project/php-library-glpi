---
layout: home
---
## Access to GLPI from PHP

This library created in PHP is designed to make interacting with GLPI seamless and efficient. It provides you all the methods that belong to the GLPI REST API, easily to understand and therefore simplifying the access to GLPI.

## Most outstanding features

* HTTP/HTTPS transport to APIs, as the foundation of data communication and the importance of privacy protection and integrity of the exchanged data
* Error handling, if an error is found, you will have all the information require to handle it
* Authentication, the library helps you to authenticate your information using the base64encode
* JSON parsing, it provides a greater reach across different languages, also it's lightweight and more compact for sending data
* Custom ItemTypes, you will be able to customize more than 200 itemtypes available in the GLPI API, which could be an asset, an itil or a configuration object, etc.
* Media download/upload, the library contains convenience methods for media upload and download
* Batching, you can batch multiple API calls together into a single request

## Methods Available

- initsession() 
- killsession()
- getMyProfiles()
- getActiveProfile() 
- changeActiveProfile()
- getMyEntities()
- getActiveEntities()
- changeActiveEntities()
- getFullSession()
- getAnTtem()
- getAllItems()
- getSubItems()
- getMultipleItems()
- listSearchOptions()
- searchItems()
- addItems()
- updateItems()
- deleteItems()

To see samples of these methods and the list of the itemtypes, check our Wiki section.

