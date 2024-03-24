
# Course Listing Application

This is a simple Course Listing Application where users can register and post their course along with their intructor details


## Installation

Step 1: Clone the Project 

```
  git clone https://github.com/regmibipin13/course_listing.git
  cd course_listing
```

Step 2: Update the dependencies

```
  composer install
```

Step 3: Configure the env file

```
  Create the .env file from .env.example and change the necessary configurations for database and others
```

Step 4: Run the migrations and seeders

```
  php artisan migrate --seed
```
(Fake Users, Instructors and Courses Will be Inserted and All Users password is "password". For email please migrate the database populate the seeders and see from the database itself)


Step 5: Install NPM Dependencies

```
  npm install && npm run dev
```

Step 6: Install NPM Dependencies

```
  php artisan serve
```

Now you can access the application through localhost:8000


    

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
