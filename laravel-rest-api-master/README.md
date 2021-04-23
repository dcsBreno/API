
Você pode criar a API REST seguindo as etapas abaixo

# Instalação
1. Clone este repositorio
```
https://github.com/samironbarai/laravel-rest-api.git
```

2. Instalar composer packages
```
cd laravel-rest-api
$ composer install
```

3. Crie e configure o arquivo .env
```
faça uma cópia de .env.example e renomeie para .env
$ php artisan key:generate
coloque as credenciais do banco de dados no arquivo .env
```

4. Fazer Migrate and insert dos dados
```
$ php artisan migrate
$ php artisan db:seed
```
