run npm install <br />
run composer update<br />
change .env conf<br />
run php artisan migrate<br />
run php artisan seed<br />

GET     damain.com/login - login <br />

GET     domain.com/api - get token<br />

use token <br />
Accept         application/json<br />
Authorization  Bearer your token<br />

POST    api/activity  - store activity <br />
GET     api/activity  - view all activity<br />
GET     api/activity/join - join user in activity<br />
GET     api/activity/users - view all users in activity<br />
GET     api/activity/leave - leave user in activity<br />
DELETE  api/activity/{activity} - destroy activity<br />
PUT     api/activity/{activity} - update activity<br />
GET     api/activity/{activity} - show activity<br />


POST    api/user  - store user <br />
GET     api/user  - view all users<br />
DELETE  api/user/{user} - destroy activity<br />
PUT     api/user/{user} - update user<br />
GET     api/user/{user} - show user<br />