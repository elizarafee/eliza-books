# UpStart

I have enjoyed building the site. I did not work with Vue.js before, had to learn and find my way around it.  
 
### Backend 

- Implemented the BookController which manages the API requests related to book 
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
- I have used Vue Router to for all rontend routes
- I have broken down Vue components logically with my understanding 
- I have use [vuelidate.js] for form validation 
- I have used SCSS for styling
- I have used Bootstrap as UI library
- I have used vue toast [https://github.com/ankurk91/vue-toast-notification] for better user experience
- You can see the list of books by visiting the 'Books' page (available on the navbar)
- You can see the details of any book by clicking the 'Book Details' button from the 'Books' page and also by clicking on any particular book link available on 'Dashboard' page (available on the navbar) then there will be a button 'Remove' by which you can remove the book
- You can remove any spacified book from book details page 
- You can mark any book as sold on 'Dashboard' page (available on the navbar)


### Database

- I have created books table by migration with fields : title, authors, format, original_price, selling_price, condition, picture, created_at, updated_at, deleted_at 
- I have created books seeder to pre-populate some books 
- I have included command related to migration and seeder on init.sh 
- You can run `docker-compose exec backend bash freshdb.sh` to get a fresh database without pre-populated books 

### Thank you  

- Thank you for your time 
- I really look forward to working in Quidco 



