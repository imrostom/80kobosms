# 80kobosms.com Smart Messaging System
HTTP Application Programming Interface
Version 2.00. INTRODUCTION

80kobosms.com system offers various methods to send SMS messages. This document contains specifications for the following methods:
 - Send messages using username / password 
 - Sending Message using API key

## Sending Message Using Username / Password
You can send SMS through our API with your 80kobosms username and password.
**URL** : https://api.80kobosms.com/v2/app/sms
**Method** : ***Post***

## Parameters
**Request Parameter Description**
1. **email** Your registered email on 80kobosms
2. **password** Your 80kobosms Password
3. **message** Your message content.
4. **sender_name** Your sender name must not be more than 11
characters
5. **recipients** The recipients number.for multiple recipients, must
be separated by comma. e.g 23480003003034, 2348038833883838, 23470000033883
6. **forcednd** Optional and by default set to 1. If set to 1, MTN
numbers will be charged 2 units and MTN DND numbers will be able to receive the message with a phone number.
7. **listname** Optional , the contact list name on 80kobosms
8. **sendtime** Optional, when this parameter is set, it will take it as
scheduled message
**Note: The sendtime is only needed when you want to schedule the message.**
## Response
Status     Description
1           Ok : Message sent successful   
-2           Invalid Parameter
-3           Account suspended due to fraudulent message
-4           Invalid Display name
-5           Invalid Message content
-6          Invalid recipient
-7          Insufficient unit
-10        Unknown error 
401 Unauthenticated

Along with the status, there is also msg parameter which explain the status code. If the status is 1, the following parameters are also included in the response
**Msgid**: Every message sent have message id which is also used to check the delivery status of the message.
**Units**: The number of units deducted in sending the message.
**Balance**: Your 80kobosms account balance after sending the message
