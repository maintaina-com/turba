=====================
 Installing Turba H5
=====================

:Contact: turba@lists.horde.org

.. contents:: Contents
.. section-numbering::

This document contains instructions for installing the Turba contact manager
on your system.

For information on the capabilities and features of Turba, see the file
README_ in the top-level directory of the Turba distribution.


Prerequisites
=============

To function properly, Turba **requires** the following:

1. A working Horde installation.

   Turba runs within the `Horde Application Framework`_, a set of common tools
   for web applications written in PHP.  You must install Horde before
   installing Turba.

   .. Important:: Turba H5 requires version 5.0+ of the Horde Framework -
                  earlier versions of Horde will **not** work.

   .. Important:: Be sure to have completed all of the steps in the
                  `horde/doc/INSTALL`_ file for the Horde Framework before
                  installing Turba. Many of Turba's prerequisites are also
                  Horde prerequisites. Additionally, many of Turba's optional
                  features are configured via the Horde install.

   .. _`Horde Application Framework`: http://www.horde.org/apps/horde

The following are not required, but are strongly recommended:

1. SQL and/or LDAP support in PHP.

   Turba can store its contacts entries in either an SQL or an LDAP database,
   and can query public (read-only) LDAP databases for contacts as well.
   Build PHP with whichever LDAP or SQL drivers you require; see the Horde
   INSTALL_ file for details.


Installing Turba
================

The **RECOMMENDED** way to install Turba is using the PEAR installer.
Alternatively, if you want to run the latest development code or get the
latest not yet released fixes, you can install Turba from Git.

Installing with PEAR
~~~~~~~~~~~~~~~~~~~~

First follow the instructions in `horde/doc/INSTALL`_ to prepare a PEAR
environment for Horde and install the Horde Framework.

When installing Turba through PEAR now, the installer will automatically
install any dependencies of Turba too. If you want to install Turba with all
optional dependencies, but without the binary PECL packages that need to be
compiled, specify both the ``-a`` and the ``-B`` flag::

   pear install -a -B horde/turba

By default, only the required dependencies will be installed::

   pear install horde/turba

If you want to install Turba even with all binary dependencies, you need to
remove the ``-B`` flag. Please note that this might also try to install PHP
extensions through PECL that might need further configuration or activation in
your PHP configuration::

   pear install -a horde/turba

Installing from Git
~~~~~~~~~~~~~~~~~~~

See http://www.horde.org/source/git.php


Configuring Turba
=================

1. Configuring Turba.

   You must login to Horde as a Horde Administrator to finish the
   configuration of Turba.  Use the Horde ``Administration`` menu item to get
   to the administration page, and then click on the ``Configuration`` icon to
   get the configuration page.  Select ``Address Book`` from the selection
   list of applications.  Fill in or change any configuration values as
   needed.  When done click on ``Generate Address Book Configuration`` to
   generate the ``conf.php`` file.  If your web server doesn't have write
   permissions to the Turba configuration directory or file, it will not be
   able to write the file.  In this case, go back to ``Configuration`` and
   choose one of the other methods to create the configuration file
   ``turba/config/conf.php``.

   Documentation on the format and purpose of the other configuration files in
   the ``config/`` directory can be found in each file. You may create
   ``*.local.php`` versions of these files if you wish to customize Turba's
   appearance and behavior. See the header of the configuration files for
   details and examples. The defaults will be correct for most sites.

   You must create and configure a ``backends.local.php`` unless you only want
   to use the default SQL backend. Any LDAP or custom address book requires
   manual configuration.

2. Creating databases

   Once you finished the configuration in the previous step, you can create all
   database tables by clicking the ``DB schema is out of date.`` link in the
   Turba row of the configuration screen.

   Alternatively you creating the Turba database tables can be accomplished
   with horde's ``horde-db-migrate`` utility.  If your database is properly
   setup in the Horde configuration, just run the following::

      horde/bin/horde-db-migrate turba

3. Securing Turba

   Before you can secure Turba, you need a secure Horde installation.  Please
   read the file in `horde/doc/SECURITY`_ for Horde security information
   before proceeding.

   Some of Turba's configuration files might contain passwords which local
   users could use to access your database.  It is recommended to ensure that
   at least the Turba configuration files (in ``config/``) are not readable to
   system users.  There are ``.htaccess`` files restricting access to
   directories that do not need to be accessed directly; before relying on
   those, ensure that your webserver supports ``.htaccess`` and is configured
   to use them, and that the files in those directories are in fact
   inaccessible via the browser.

   An additional approach is to make Turba's configuration files owned by the
   user ``root`` and by a group which only the webserver user belongs to, and
   then making them readable only to owner and group.  For example, if your
   webserver runs as ``www.www``, do as follows::

      chown root.www config/*
      find config/ -type f -exec chmod 0440 '{}' \;

4. Testing Turba

   To verify that Turba is working correctly, attempt to look up a known
   existing and a known nonexisting entry in each of your data sources, and to
   create and then look up a new entry in each data source which allows users
   to create new entries.


Obtaining Support
=================

If you encounter problems with Turba, help is available!

The Horde Frequently Asked Questions List (FAQ), available on the Web at

  http://wiki.horde.org/FAQ

The Horde Project runs a number of mailing lists, for individual applications
and for issues relating to the project as a whole.  Information, archives, and
subscription information can be found at

  http://www.horde.org/community/mail

Lastly, Horde developers, contributors and users may also be found on IRC,
on the channel #horde on the Freenode Network (irc.freenode.net).

Please keep in mind that Turba is free software written by volunteers.  For
information on reasonable support expectations, please read

  http://www.horde.org/community/support

Thanks for using Turba!

The Horde team


.. _README: README
.. _INSTALL:
.. _`horde/doc/INSTALL`: ../../horde/doc/INSTALL
.. _`horde/doc/PERFORMANCE`: ../../horde/doc/PERFORMANCE
.. _`horde/doc/SECURITY`: ../../horde/doc/SECURITY
.. _`horde/doc/TRANSLATIONS`: ../../horde/doc/TRANSLATIONS
