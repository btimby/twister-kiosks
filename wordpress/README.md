# Wordpress Kiosk

This is the twister kiosk for Wordpress. It has equivalent functionality of any Twister kiosk but is integrated into Wordpress.

## Design

This kiosk is a plugin for Wordpress. It is meant to be used as follows.

User registration and management is left up to Wordpress and it's myriad user management plugins.

Administrators or optionally, users can then enable Twister for user accounts. Once enabled, the user will be advertised by the installation, allowing other Twiser users to follow them.

Additionally, this kiosk provides a page that bootstraps Twister within the Wordpress site. Users can of course use any kiosk to access their Twister account, it need not be the kiosk at which they registered. The registration process simply provides a persona or handle that allows remote users to follow a specifc user.

Stated more simply, a kiosk is an index or directory of users, and provides the lookup capability to follow them. Twister itself is a completely decentralized system, so users can access it from any kiosk.

This design provides the following attributes.

 - Wordpress stores users
 - Wordpress stores custom posts for Twister users containing their public key.
 - Wordpress is only involved during the process of following a user.
 - Bandwidth and storage requirements are very low.

### Personas

A persona is the user's username followed by an at sign (@) followed by the domain and directory containing the Wordpress installation. For instance if the user's username is bob, and Wordpress is installed at bobswidgets.com/wp, then Bob's persona would be "bob@bobswidgets.com/wp". The kiosk simply provides a location at which Bob's persona and public key can be retrieved, you can think of a kiosk as a "pool" of users controlled by the adminstrator of that particular kiosk.

If a user is removed from Wordpress or the Twister option for that user is disabled the user can still use Twister (at this or any other kiosk) but the user is no longer exported by this kiosk, and following them will be impossible.

Personas are stored as custom posts within Wordpress and Twister retrieves them via Wordpress's REST API when following is established. The process is fairly simple:

 - A twister user chooses to follow bob@bobswidgets.com/wp
 - Twister will query: http://bobswidgets.com/wp/rest.php?post_type=twister&title=bob
 - Bob's persona and public key will be added to the following user's list of followed users.

### Options

The Wordpress administrator can allow users to enable / disable Twister for their accounts, or disable this feature and manage this themselves from the Wordpress admin. Additionally the administrator can control whether Twister users are publicly available or not, allowing or disallowing follows for users outside of this specific Wordpress installation. Of course, toggling the public option will not affect follows that already exist.
