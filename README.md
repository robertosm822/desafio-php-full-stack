## Como foi organizado o desafio

- Decidiu-se dividir em pastas separadas o Back-end Laravel (PHP + MySQL) do Front-end Vue 3 (TypeScript):


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

## Iniciando a Aplição Back-end Laravel

- Executando o Laravel:

```bash
    php artisan serve
```


# Desafio Full Stack

## Projeto Front-ent Vue
- Entrar na pasta `/front-end/` e executar a instalação das depêndencias:

```bash
    npm install
```

### Executar o aplicativo Vue

```bash
    npm run serve
```

## Testes com PHPUnit

- Entrar na pasta `/back-end/`.

- Para realizar os testes será necessário executar os fakers em linha de comando para cadastro de exemplos de categorias e produtos ou cadastrar pelo front pelo menos 5 unidades:

- Criado os primeiros testes:

 ```bash
    php artisan make:test CategoriesTest
    php artisan make:test ProductTest
 ```

Criado as factories:

```bash
    php artisan make:factory CategoryFactory
    php artisan make:factory ProductFactory
```
- Recarregar as configurações de classes:

```bash
    composer dump
```

- Usar o utilitário de linha de comando Artisan Tinker:

```bash
    php artisan tinker
 
    Category::factory()->count(5)->create()
    Product::factory()->count(10)->create()
```

Executar os Testes

```bash
    php artisan test
```

