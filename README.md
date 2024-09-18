# Welcome to ClientEntryDashboard

This is a web app I developed that aims to help people send automatic emails. The emails in place do not exist and are just examples. This was created with a very specific use case in mind to solve an issue and make the necessary email sending when accepting a new client much more lean and clean, with the goal of optimizing the time wasted on this chore. Instead of spending time setting up three emails, even utilizing already in-use copy and paste pre-made emails and send list/cc and bcc, you just need to insert the client number (or whatever data you want to transmit to these people) and it will automatically send extra emails. There is an optional field that can be filled or not. If you want, you can alter the code to make all of them optional or add more cases.

## Part 0 - Setup

To run this project, you will need to:

1. Download Docker on your machine.
2. Set up a database and connect it through the environment file values:
    - `DB_HOST`: Your database host.
    - `DB_NAME`: The name of your database.
    - `DB_USER`: The user for your database.
    - `DB_PASS`: The password for your database user.
    - `DATABASE_URL`: To set up your Doctrine connection.
    - `REDIS_URL`: Your Redis Config path.


## Part  1- Alter necessary data

Inside the EmailController, change the email data you want to use. You can change the message, cc, and bcc (remember to use the inserted data in the message and probably also the title). 


## Part 2 - Initializing and Migrating

Run `docker-compose up` and navigate to your chosen localhost port.
.
Enter the Docker container running the project and execute the following command to create the database tables:

```
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

Then execute the following command to install all the project dependencies:

```
composer install
```

## Part 3 - Access the website

Go to your localhost chosen port and you should have a questionnaire. Fill it with the data, click submit, and you are done—you just sent the automatic email.

Overall, this was a very satisfying project to work on. This was made in an afternoon as a quick solution for my wife that can have multiple uses. It keeps no information, so it’s safe for anyone to use. I thought about how many people need to send the same emails with just a different line every day, maybe multiple times a day, so I decided to make this public in case someone else wants to use it.

Enjoy the app!
