# UpStart

I have enjoyed building the site. I did not work with Vue.js before, had to learn and find my way around it.  
 
### Backend 

- Implemented the `BookController` which manages the API requests related to book 
- It can manage the following requests such as: 
    - Providing the list of books 
    - Provide the details of any specified book
    - Store a new book
    - Update the details of any exisiting book (not fully tested)
    - Mark any specified book as sold
    - Delete any specified book
- Used the BookController for all routes
- All route endpoints are prefixed with `api` as specified in the readme 
- I have used [Eloquent ORM](https://lumen.laravel.com/docs/6.x/database) for my database model as specified in the readme 

### Frontend

- All API calls have `/api` prefix
- I have used Vue Router for all frontend routes
- I have broken down Vue components logically with my understanding 
- I have used [vuelidate.js](https://vuelidate.js.org/) for form validation 
- I have used SCSS for styling
- I have used Bootstrap as UI library
- I have used [vue toast notification](https://github.com/ankurk91/vue-toast-notification) for better user experience
- You can see the list of books by visiting the `Books` page (available on the navbar)
- You can see the details of any book by clicking the 'Book Details' button from the `Books` page and also by clicking on any particular book link available on `Dashboard` page (available on the navbar)
- You can remove any spacified book from book details page 
- You can mark any book as sold on `Dashboard` page


### Database

- I have created books table by migration with fields : title, authors, format, original_price, selling_price, condition, picture, created_at, updated_at, deleted_at 
- I have created books seeder to pre-populate some books 
- I have included command related to migration and seeder on init.sh 
- You can run `docker-compose exec backend bash freshdb.sh` to get a fresh database without pre-populated books 

# Get Started

* First of all, you will need to install docker on your computer
* run `docker-compose up -d` to start all services
* run `docker-compose exec backend bash init.sh` to install backend dependencies, you only need to run this once first time.
* visit [http://localhost:8888](http://localhost:8888) to see the UI


### Thank you  

- Thank you for your time 
- I really look forward to working in Quidco 



