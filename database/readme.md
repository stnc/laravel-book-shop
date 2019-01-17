php artisan make:seeder CommentsTableSeeder
--php artisan make:seeder UserDetailTableSeeder
php artisan make:seeder UserTableSeeder


php artisan make:factory CommentsFactory --model=Models\Comments\
---php artisan make:factory UserDetailFactory --model=Models\UserDetail\
php artisan make:factory UserFactory --model=Models\User\


https://scotch.io/@wisdomanthoni/make-your-laravel-seeder-using-model-factories

https://bagja.net/blog/seeding-table-with-relationships-in-laravel.html



 php artisan db:seed

 php artisan db:seed --class=UserTableSeeder
