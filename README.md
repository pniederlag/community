How it is supposed to work
==========================

Reporting spam
--------------

Other websites can use this public api to open a spam reporting form with prefilled data:

    http://t3org.dev/report-spam?link=http%3A%2F%2Fexample%2Eorg&spammer=839044291c2e494b22008d0e385b01a1

The link is the urlencoded path of the page where the spam is found. It should use anchors on the page
when possible to point as closely to the spam as possible.

The spammer parameter is the md5 of the users email.

Every one logged in to typo3.org is allowed to report spam. The form only accepts reports for urls
that end in `.typo3.org`.

Reviewing spam
--------------

Trusted users of the TYPO3 community that are member of a certain fe_group are allowed to review these reports
in the FE and remove spamming users.

Technically this just sends a message to RabbitMQ and multiple systems (including typo3.org listen to that).

Removing spam
-------------

TBD