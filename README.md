## Set-up environment variables

```bash
cat .env.dist | sed "s/USER_ID=1000/USER_ID=$(id -u)/" > .env
```

## run docker 
```bash
sudo docker-compose up -d --build --force-recreate
```


## add hosts

```bash
sudo /bin/bash -c 'echo -e "127.0.0.1 meetup.php" >> /etc/hosts'
```

## application is available at

http://pure.meetup.php/ <- for pure php
http://symfony.meetup.php/ <- for symfony cases
