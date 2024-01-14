# Notes - PHP Web App

# Table of Contents
- <a href="#about">About this Project</a>
- <a href="#how-to-run">How to run the app on your computer</a>
- <a href="#features">Features</a>
- <a href="#project-structure">Project Structure</a>
- <a href="#tools">Tools</a>
- <a href="#application-pictures">Application Pictures</a>

# <p id="about">About this project</p>

The idea behind this project is to learn PHP and MySQL. You can perform Notes CRUD operations. Implemented a simple authentication mechanism.

# <p id="how-to-run">How to run the app on your computer</p>

1. You can download the project ZIP file, or you can clone the repository directly.
2. Navigate to the public directory using the `cd public` command. The only folder we need to expose to the PHP server is that one.
3. Open the project with IDE/Code Editor like VS Code or any Jetbrains product that supports the PHP syntax.
4. Type `php -S localhost:8000` to start a PHP server on your computed. It will start on `http://localhost:8000`. You can use an alternative port if you want.

# <p id="features">Features</p>

- <strong>Notes</strong>
    - Perform CRUD operations

- <strong>Authentication</strong>
    - Simple authentication process implemented only with PHP. No framework or any third-party package.

# <p id="project-structure">Project Structure</p>
- views
    - notes
        - create.view
            - Create a note view page
        - edit.view
            - Edit a note view page
        - index.view
            - Show all notes view page 
        - show.view
            - Show an individual note view page
    - partials
        - Reusable template such as the banner, the footer, and the header
    - register
       - create.view
           - Register form view page
    - session
        - create.view
            - Login form view page
    - 403.view - a template when 403 HTTP code occurs
    - 404.view - a template when 404 HTTP code occurs
    - index.view - the home page
- public - stores all web assets that are exposed to the PHP web server. It stores index.php file which is the main entry point for all requests
- Http - all project related stuff such as Controllers and Form validations
    - Controllers
        - notes - all controllers that are responsible for handling the /notes related URL paths
        - register - all controllers that are responsible for handling the /register related URL paths
        - session - all controllers that are responsible for handling the /login related URL paths
        - 403.php - a controller that is responsible for handling a 403 HTTP code request
        - 404.php - a controller that is responsible for handling a 404 HTTP code request
        - index.php - a controller that handles the main page (the home page pointing to /)
- Core - all the generic stuff that can be reused in other projects
    - Middleware - whenever a request occurs before hitting the controller it first needs to pass a certain middleware (works as a guard)
        - Auth - determines whether a user is authenticated
        - Guest - determines whether a user is not authenticated
        - Middleware - works as a mapper for all middlewares
    - App - attaches a service container to the application
    - Authenticator - works as an ORM (Object-Relational Mapping). Works as a bridge between the OOP and the relational database (in our case that is MySQL)
    - Container - creates a service container that holds the services
    - Database - works with PDO (PHP Data Objects). Building a DSN (data source name) or more simply said - a connection string to the database.
    - functions - holds helper functions. This file is imported at the beginning (public/index.php) so that all other classes and files can have access to these methods
    - Response - Response status codes defined as constants
    - Router - router service
    - Session - defines CRUD operations related to the PHP session
    - ValidationException - inherits the behavior from the parent class - Exception
    - Validator - exposes helper methods for validating strings and emails
# <p id="tools">Tools</p>

- <a href="https://www.php.net/">PHP</a>
- <a href="https://getcomposer.org/">Composer</a>
- <a href="https://tailwindcss.com/">TailwindCSS</a>

# <p id="application-pictures">Application Pictures</p>

## Desktop

## Mobile
