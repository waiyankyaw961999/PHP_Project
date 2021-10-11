# User-Management-Dashboard

This project is from the book of PHP On Point written by Sir Ei Maung(Fairway Technology). This project is about managing users. I replicated the desing ideas and patterns as described in the book and added new features for admin roles. 
## Tree Structure of the whole Project

```
project/
├── _actions/
│ ├── photos/                   // users' profiles
│ ├── create.php                // to insert data from register.php
│ ├── delete.php                // to delete requested user by id and avoid deleting while logged in and other admin accounts
│ ├── login.php                 // to validate and check whether the user is authourized to enter 
│ ├── logout.php                // to unset user in the session after logout
│ ├── populate.php              // this is to create fake data using faker library.
│ ├── role.php                  // to set role ffor users you can change roles of other users if you are an admin
│ ├── suspend.php               // to block users
│ ├── unsuspend.php             // to unblock users
│ └── edit.php                  // edit for single user
| └── edit_profile.php          // actions requested from edit.php
│
├── _classes/
│ ├── Helpers/
│ │ ├── Auth.php                //check authourization
│ │ └── HTTP.php                // redirect page
| | └── showMessage.php         // to show session message
│ └── Libs/
│ └── Database/
│ ├── MySQL.php                 // sql connect using dependencies injection
│ └── UsersTable.php            // managing user tables with with OOP
│ admin.php                     // admin dashboard
│ profile.php                   // profile view
│ register.php                  // register page
│ index.php                     // login page / entry page
