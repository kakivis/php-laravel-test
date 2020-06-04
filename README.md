## A PHP+Laravel+MySQL simple application

#### At this project we built an application that has the following features:

- A MySQL database with at least two tables, 'user' and 'user_access'
- A page where the admin can consult the data of this database with the columns Name, Email, Number of logins, Status (active or inactive)
- Search by name
- Search by email
- Search by status
- Search by logged between two dates
- Top ten most logged in users
- Top ten least logged in users
- Pagination (10, 20, 30 or 100 per page)

#### Intro
The project has an index page which shows you three links: User Report, User Access Report and Composite Report. The first two are just a simple CRUD, the report with contains all the features listed above is the Composite Report.

#### Setup

- Install docker (For linux, you can check this [docker setup tutorial](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-docker-on-ubuntu-18-04))
- Install docker-compose (For linux, you can check this [docker compose setup tutorial](https://www.digitalocean.com/community/tutorials/how-to-install-docker-compose-on-ubuntu-18-04))
- run `docker-compose up`
- run `docker-compose exec app php artisan migrate` to execute the db migrations
- run `docker-compose exec app php artisan db:seed` to populate the database with random user+user_access data
- The application should be running at http://localhost:8009
