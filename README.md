
## Transactions API
Este projeto visa simular uma API de transação de ações. Trata-se de uma API RESTful feita em Laravel utilizando repository pattern para lógica de negócio, também foi utilizado as camadas de Form Request, Resources e roteamento com ApiResource. Para facilitar a testabilidade, a base de dados utilizada foi o SQLite.

## Instalação
```bash
1. faça a clonagem do repositorio ou baixe o arquivo zip
2. use os comandos:
    composer install
    php artisan key:generate
    php artisan migrate
    php artisan optimize
    php artisan serve

4. faça a importação do arquivo postman_collection para testar os endpoints.
```
