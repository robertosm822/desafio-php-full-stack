## Instruções para execução

- Executar o comando composer para baixar as depências do framework e projeto:

```bash
    composer update
```

- Criado as estruturas de entidades relacionais do banco usando o `artisan command line`:

```bash
    php artisan make:migration create_categories_table
    php artisan make:migration create_products_table
```

- Configurar o banco nos arquivos `.env`.

- Configurado os campos default para cada `migration` criada;

- Executar as migrações das tabelas que serão utilizadas no CRUD:

```bash
    php artisan migrate
```

- Criado estrutura de `Models` e `relationships`:

```bash
    php artisan make:model Category
    php artisan make:model Product
```

- Construido `Repository Layer Concepts Pattern` para `Categories Entity`;
- Construido `Repository Layer Concepts Pattern` para `Products Entity`;

- Construido o `Provider` para controle dos `Repositories` criados:

```bash
    php artisan make:provider CategoryServiceProvider
    php artisan make:provider ProductServiceProvider
```

- Registrado em `config/app.php` os `providers`:

```php
    'providers' => [
        // ...outros providers declarados
        App\Providers\CategoryServiceProvider::class,
        App\Providers\ProductServiceProvider::class,
    ];
```

- Importante executar após criar essas estruturas o `composer dump` para o auto-load ser carregado corretamente.

- Trabalhado com Exceptions personalizadas:

```bash
    php artisan make:exception CategoryException
    php artisan make:exception ProductException
```

## Configurações e como foi construido o Front-End Vue.Js

- Instalado as dependências do projeto:

```bash
    npm install vue vue-router vue-axios --save
    npm install
```

- Executando os recursos do Front-end:

```bash
    npm run watch
```

- Executando o Laravel:

```bash
    php artisan serve
```
