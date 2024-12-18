PIZZERIA

Pizzeria Food Ordering Web App

Welcome to the Pizzeria Food Ordering Web App, a Laravel 8-based application designed for ordering food like pizza, burgers, and drinks.
This app demonstrates the implementation of user roles and permissions. It is an excellent project for exploring user management and interaction within a Laravel framework.

Features
1. User Roles and Accounts
The web app includes four user roles, each with specific functionalities:
a) User Account
•	Account Creation: Users can create accounts to place orders.
•	Order Tracking: Registered users can track the status of their orders.
•	Guest Orders: Users can place orders without an account; however, they won't be able to track their order status.
b) Admin Account
•	Manage Users:
o	View all registered users.
o	Delete user accounts.
•	Global Access: Admins have the highest level of access and visibility into the app.
c) Manager Account
•	Order Management:
o	View all orders, including details of who placed them.
o	Process orders by updating the status (e.g., "On the Way").
o	Update or delete orders as needed.
d) Publisher Account
•	Content Management:
o	Create and publish news updates on the web app. Examples include new menu items or special deals.
o	Delete outdated or irrelevant news posts.
2. Order Management
•	Users can place orders for pizza, burgers, and drinks.
•	Managers can track, update, and delete orders to ensure smooth operation.
3. News Page
•	Users can view news updates published by the Publisher, such as new menu items or promotional specials.
________________________________________
Accessing the Application
Demo Accounts
You can log in to the application using the following demo accounts:
   Role	        Email	                  Password
   Admin	    admin@pizzerian.com:      Test1234
   Manager	    manager@pizzerian.com:    Test1234
   Publisher	publisher@pizzerian.com:  Test1234

Users
•	Users can create their own accounts to experience the app fully.
•	Guest orders are also supported.
________________________________________
How to Interact
1.	Clone the repository from GitHub.
2.	Set up the Laravel environment using the .env file.
3.	Migrate and seed the database using Laravel Artisan commands.
4.	Start the development server with php artisan serve.
5.	Log in using one of the provided demo accounts or create a new user account.
________________________________________
Technologies Used
•	Laravel 8: Framework for building the application.
•	Blade Templates: For the front-end design.
•	MySQL: Database for storing user and order information.
•	Bootstrap: For styling and responsiveness.

Note: This web app was originally built in 2022 as a learning project to explore user roles and permissions in Laravel. 
      It is being uploaded to GitHub now to showcase my early work and progression over time.
      Since building this project, I have gained deeper experience in Laravel and related technologies, including working on more complex projects. 
      I am showcasing this app to demonstrate my growth and understanding of foundational concepts.
