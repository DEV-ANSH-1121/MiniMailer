## MiniMailer App

Laravel Version: 10.10

# Steps to setup
Get inside your working directory (Like htdocs in xampp)
Run this command in terminal: 
git clone https://github.com/DEV-ANSH-1121/MiniMailer.git

After successfull cloning of the project, run the following command:
composer update
cp .env.example .env
php artisan key:generate

Create a database and inside your .env file set the value for database details and then run following command:
php artisan migrate

Finally open 2 separate terminals and run these 2 commands separately:
Terminal 1: php artisan serve
Terminal 2: php artisan queue:work


## About App
MiniMailer app allows you to create simple mails and send them to the recipients.
It also comes with history of sent mail log.


## Site Flow
Landing Page of this application will ask you for an email ID.
Enter any Email Id (No verification needed). This will automatically log you in the app.
After successfull login, you will land on "Compose Mail" page.
Compose Mail page contains a form to create mail.
Enter the recipient email, Mail Subject and Mail body (CKEditor installed for Mail Body).
Press "Submit" button. This will send an email to the enter recipient.
You can also check your "Sent Mail" by navigating to "Sent mail" page from sidebar option.
"Sent Mail" page contains history of each and every mail sent by you.
