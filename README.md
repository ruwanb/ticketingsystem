
## Instructions
 - [01. Clone the repository ]
 - [02. Run "composer install" in the root directory ]
 - [03. Run "npm install" in the root directory ] 
 - [04. Run "npm run dev" in the root directory ] 
 - [05. rename .env.example to .env] 
 - [06. Run "php artisan key:generate" to generate the key ] 
 - [07. Add the local email server setting that you used ] 
 - [08. Run "php artisan queue:work" before testing the emails ] 
 - [09. create "database.sqlite" file in the database directory ] 
 - [10. Run "php artisan migrate:fresh --seed" to seed the dummy data to the data base. ]  
 - [11. Use the following login credentials to login as agent]
        email: agent1@example.com
        password: password

## Assumptions
- The tickets have two status. They are "pending and completed"
- While creating the ticket create an account for the customer.

## Packages used
- Laravel Breeze starter kit
- Laravel Livewire v3




