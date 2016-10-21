# SymfonyLinodeProvisioner
Creates and clones Linodes from an easy Web Interface.

## Configuration
Configuring is simple:
```
composer install
```

Add parameters to `parameters.yml` (Symfony will prompt you for these during `composer install`):
```
linode.token:      TestToken123     # Linode API Token
ssh.username:      john             # Default username for the source Linode
ssh.password:      123qaz           # Default password for the source Linode
ssh.port:          2321             # The SSH port for the source Linode
script.path:       bin/deploy.sh    # The local path to the deployment script
script.dest:       /tmp/deploy.sh   # The remote path for the deployment script
```

## Usage
Usage is pretty straight forward.  There are a few routes:
```
/clone
/create
/
```

## Deployment
For local deployments, a basic `docker-compose.yml` is provided.  `docker-compose up`
should do the trick.

Otherwise, I recommend following the official Symfony docs on deploying an app.
http://symfony.com/doc/current/deployment.html

## Caveats
This project currently assumes cloning of a single 'template' Linode (hence the password
configuration variables).  The Username/Password could easily (and should) be moved to
the Provisioning Form.

This application is also very specific to a custom deployment script with specific parameters.
