#Jimmy Blog Symfony
=======

A Symfony 3 project created on November 3, 2016, 3:55 pm.

##Install:

###Composer:
```
clean dir > Terminal > mkdir composer
cd composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/ vim ~/.bash_profile
alias composer="php /usr/local/bin/composer.phar"
```
###Npm:
```
apt-get install npm
ln -s /usr/bin/nodejs /usr/bin/node
```
###Bower:
```
npm install -g bower

###Blog:
```
cd /var/www/html/xxxx
git clone https://github.com/jimmymunoz/blogsymphony.git
sudo chown -R  www-data.www-data /var/www/html/xxxx

bower install --save bootstrap
bin/console cache:clear --no-warmup
bin/console doctrine:schema:update --force
bin/console assets:install --symlink
```

####Users:
```
php bin/console fos:user:create myuser myemail@email.com password
php bin/console fos:user:promote myuser ROLE_ADMIN
```

##Screenshots

![Index Action](src/Jimmy/BlogBundle/Resources/public/screentshots/home.png?raw=true "Home")
![Index Action](src/Jimmy/BlogBundle/Resources/public/screentshots/responsive.png?raw=true "Home Responsive")
![Login](src/Jimmy/BlogBundle/Resources/public/screentshots/login.png?raw=true "Login")
![Index Action](src/Jimmy/BlogBundle/Resources/public/screentshots/home_loged.png?raw=true "Home logged")
![Post Action](src/Jimmy/BlogBundle/Resources/public/screentshots/post_action.png?raw=true "View Post")
![New Action](src/Jimmy/BlogBundle/Resources/public/screentshots/new_post.png?raw=true "New Post")
![Edit Action](src/Jimmy/BlogBundle/Resources/public/screentshots/edit_post.png?raw=true "Edit Post")

