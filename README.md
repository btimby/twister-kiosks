# twister
Twitter with an s in the middle for speech.

This application is available in 3 forms.

 - Javascript/Node
 - Python/Django
 - Wordpress plugin

The Javascript and Python flavors can be served behind a reverse proxy or
be incorporated into a larger application.

## What is it?

Twister is a federated microblogging service.

What does that mean? I am glad you asked. First let me define some terms.

 - Federated, multiple distinct entities working as one.
 - Microblogging, short messages including text or multimedia.
 - IPFS, a global peer to peer network.

Anyone can make twister a part of their website. Twister then provides a portal
to a global microblogging service. Each twister portal can host multiple user
accounts, each account can be addressed by an identifier.

An example identifier might be: username@somesite.com/directory

The directory portion is optional, it is only necessary if multiple twister
portals exist on the same domain.

Users can follow each other by entering the identifier of another user.
Microblog posts from followed users will show up in one's account.

The twister portal itself is only responsible for user credentials, the main
application stores all data and media within IPFS. This is done for three
reasons.

1. This keeps the portal codebase small, since there are three versions, this
   is important.
2. This minimizes the data stored within the portal. This is especially useful
   for the wordpress plugin.
3. It provides for account backup and migration.

### Federation

The federation features of this system mean that any number of portals can be
online, and users in any given portal can interact with users of all portals,
in other words, the separate portals FEDERATE into a single global service.
This means that while the system as a whole is resistant to censorship, the
administrator of a given portal has control over it's users. For this reason,
you are urged to use a private portal or a portal of a friend. There are ways
to protect your account even if you cannot run your own portal.

It is possible to export your account details and utilize them at a different
portal. This provides redundant access to your account should a given portal
shut down or remove your user account. There are however a couple of caveats.

Each portal account creates a new identifier. When importing an account from
another portal, you will still be able to post to the imported account. Other
users will also be able to follow either account. However, if either account
is removed, new users can no longer follow you using that identifier. You will
still be able to post to either account.

If you lose access to your account and you have not made a "backup" at another
portal, you will lose access to your account. If you have a backup, you can
send a "Hey following me over at @user@backup_portal.com" or something like
that.

### IPFS

IPFS, the InterPlanetary File System is a peer-to-peer platform that allows for
various types of data to be stored and globally accessible with no centralized
servers. Whenever you post a microblog message, it is stored in IPFS. Any
associated media is likewise stored in IPFS. This means the data is out of
reach of any portal operators, and this is what allows backup accounts and
account migration.

IPFS, being a P2P system means that the data is only as durable as the nodes in
the network. If you want to ensure your data is safe in IPFS, you can utilize
one or more "pinning" services that will promise to hold your data. These
services are free or for profit and are separate from twister. Twister
integrates with many 3rd party pinning services, but it is up to you to deal
with them and set things up.

## Installation

### Docker

```bash
    docker run -ti twister
```

You can use a reverse proxy to host the application at a domain of your choice.

### Wordpress

Just install the plugin and then register an account. The plugin provides
the option to open registration to other users (off by default). This is
recommended unless you are severely resource constrained.

[Read more here](wordpress/README.md)

### Python/Django

You can install the django application and incorporate it into your website.

[Read more here](python/README.md)

### Javascript/Node

You can install the javascript package and incorportate it into your website.

[Read more here](js/README.md)

## Development

There are 4 distinct code modules or sub-projects.

1. js/ - The node.js version of the portal.
2. python/ - The Python/Django version of the portal.
3. wordpress/ - The wordpress plugin (PHP) version of the portal.
4. vue/ - The microblogging application. What the above portals "connect" to.

Obviously, the portals are kept small while the service (being shared) contains
the bulk of functionality.

The microblogging service can be started by:

```bash
    cd vue/
    make up
```

Each portal can then be started by:

'''bash
    cd js/ # or python/ or wordpress/
    make up
'''

The microblogging service and at least one portal must be running for the
system to function. Each portal runs on a unique port, so they can ALL run at
the same time.

A portal is responsible for:

 - User registration
 - Authentication
 - User advertisement

Optionally, a portal can implement:

 - User management (administrative access)



### Modules