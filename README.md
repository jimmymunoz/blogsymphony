#Jimmy Blog Symfony
=======

A Symfony 3 project created on November 3, 2016, 3:55 pm.

##Content:
	
- IndexAction => Home page (/) List of the last post (page to page),
- PostAction => Show post (/post/$id)
- NewAction => Add
- EditAction => Edit
- DeleteAction => Delete


##Install:

###Requires:
- Composer
- Npm
- Bower

##Install Blog:
```

cd /var/www/html/xxxx
git clone https://github.com/jimmymunoz/blogsymphony.git
sudo chown -R  www-data.www-data /var/www/html/xxxx

composer update

bower install --save bootstrap
bin/console cache:clear --no-warmup
bin/console doctrine:schema:update --force
bin/console assets:install --symlink
```

###Users:
```
php bin/console fos:user:create myuser myemail@email.com password
php bin/console fos:user:promote myuser ROLE_ADMIN
```

##Screenshots

###Index Action:
![Index Action](src/Jimmy/BlogBundle/Resources/public/screentshots/home.png?raw=true "Home")
###Index Action:
![Index Action](src/Jimmy/BlogBundle/Resources/public/screentshots/responsive.png?raw=true "Home Responsive")
###Pagination:
![Edit Action](src/Jimmy/BlogBundle/Resources/public/screentshots/pagination.png?raw=true "Pagination")
###Login:
![Login](src/Jimmy/BlogBundle/Resources/public/screentshots/login.png?raw=true "Login")
###Index Action:
![Index Action](src/Jimmy/BlogBundle/Resources/public/screentshots/home_loged.png?raw=true "Home logged")
###Post Action:
![Post Action](src/Jimmy/BlogBundle/Resources/public/screentshots/post_action.png?raw=true "View Post")
###New Action:
![New Action](src/Jimmy/BlogBundle/Resources/public/screentshots/new_post.png?raw=true "New Post")
###Edit Action:
![Edit Action](src/Jimmy/BlogBundle/Resources/public/screentshots/edit_post.png?raw=true "Edit Post")

