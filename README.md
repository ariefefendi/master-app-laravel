# master-app-laravel

Run Postgree Sql
if
Postgree 10 : pg_ctl.exe restart -D "C:\Program Files\PostgreSQL\10\data" ;
Postgree 15 : pg_ctl -D "C:\Program Files\PostgreSQL\15\data" start ;

# Add / install Package

-   Extension For DateTime :
    `composer require nesbot/carbon`
    how to use : https://carbon.nesbot.com/docs/#api-introduction

-   here text
    `code`
    how to use :

-   Migration -
    create file : php artisan make:migration hobies_table
    running migrate : php artisan migrate
    status migrate : php artisan migrate:status

-   Routes -
    list routes : php artisan route:list
    cache clear : php artisan route:cache
-   Seeder -
    Create Seeder : php artisan make:seeder hobiesSeeder
    run : php artisan db:seed

<!-- FOR LOOPING IN SQL -->
<!-- do $$
begin
  for counter in 1..6 by 2 loop
    raise notice 'counter: %', counter;
  end loop;
end; $$ -->
