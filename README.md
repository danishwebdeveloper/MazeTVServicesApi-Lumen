# Using Lumen PHP Framework
## Fashionette AG Challenge
## Tasks

The challenge is to create a JSON API.

Consumer can search TV shows by their name: https://json-api.local/?q=deadwood

Any other request to the API is invalid and should return the appropriate response.

Use the third party service TVMaze. API description can be found here: http://www.tvmaze.com/api.

Should filter these values to be non-case sensitive and non-typo tolerant.

Good structure, best practices, readability and maintainability.

Write Test Cases.


## Installation
1. Clone github repo

2. cd into your project

3. Install composer

4. Install Guzzle "composer require guzzlehttp/guzzle"

4. Install Lumen Generator to enable all artisan commands "composer require flipbox/lumen-generator"

5. Register Lumen Geenrator in app.php. $app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);

6. Set the application key : php artisan key:generate

7. Run tests through .\vendor\bin\phpunit --filter TVMazeShowAPITest

8. Run the Get Request http://localhost:8000/tvmazeshow?q=deadwood

## Optimizations
How you think the API can be evolved in the future, and changes you would like to make, given more time.

We can use more features of the MazeApi. We can also remove the condition of Non-typo tolerance so after that we get all the records where deadwood complete word match and it will take around 4 to 5 minutes and I already write the code for this and make it commented. 
Moreover, we can also put some middleware authentication & policies, etc. 


