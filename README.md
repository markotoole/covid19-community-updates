# Community updates

A lightweight php web app developed to enable collaborative Business & Community Status updates during the Covid-19 crisis

## Getting Started

Getting Started

### Prerequisites

```
PHP 7.3
Postgresql 11
composer
Docker (for develop)
```

### Installing
Commands from code directory:
```
composer install
php artisan migrate
php artisan db:seed
```

### Developing

For developing you can use docker containers which part of the project. 

```
docker-compose up -d
```
 The project will be on 80 port
## Deployment

Root folder of application is /code/public

## Authors

* **[Civiq](https://civiq.co.uk/)** - *Initial work*

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details
