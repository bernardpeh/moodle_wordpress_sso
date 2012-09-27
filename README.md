Introduction:

This plugin allows moodle to authenticate against wordpress DB via curl without hacking the moodle core. I suggest that you disable profile update in moodle and redirect users to update their profile in wordpress instead so that users won't get confused with 2 profiles in 2 systems.

When authenticating, if user doesn't exist in moodle, it doesn't create it. So make sure you sync the users over to moodle through any ways that you can think of. There are alot more hooks in wordpress than moodle.

Installation:

1. create a folder "wordpress_sso" under your moodle/auth folder.

2. Activate the plugin in moodle -> sys admin -> authentication

3. Manually Change the authentication mechanism for any users that want to use this method.

License:

GPL2 - as per moodle.

Future:

Maintaining multiple user profiles in different systems can be disastrous in the long run. The solution offered here might be suitable for some and not suitable fo the others. There are also other single sign on ideas such as such as openid, oauth, ldap, cas..etc. This solution certainly works for me under tight constrains. 

Use it under at your own discretion and tweak as you see fit.

cheers,
Bernard Peh
