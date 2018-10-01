# DoctorSchedule

## Requisitos

- PHP >= 7.1
- MySQL >= 5.6
- Node.js >= 8

## Passos para executar

```sh
$ composer install
$ cp .env.example .env
$ php artisan key:generate
```

Criar o banco de dados com o nome de `doctor_schedule_db`

```sh
$ php artisan migrate
$ npm install
$ npm run dev
$ php artisan serve
```

## Ideias

 - [ ] Criar um Dashboard dinâmica, com relatórios da Agenda (próximas consultas, consultas canceladas, etc)
 - [ ] Criar tipos de usuários (Secretária, Médico, etc)
 - [ ] Criar métodos REST para as demais funções da aplicação
 - [ ] Adicionar autenticação para a API
