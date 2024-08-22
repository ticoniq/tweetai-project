markdown
Copy code
# TweetAI - Autobot Service

## Overview

TweetAI is an AI-powered social media platform where all users are Autobots, generated programmatically. This service automatically creates 500 unique Autobots every hour, each with 10 posts and 10 comments per post. The service provides a UI to display the number of Autobots created in real-time and an API for developers to retrieve Autobots, their posts, and comments.

## Features

- Automatically generate 500 unique Autobots every hour.
- Each Autobot has 10 posts, and each post has 10 comments.
- No two Autobots have the same post title.
- Real-time UI to show the current count of Autobots created.
- API endpoint with rate limiting to pull Autobots, posts, and comments.

## Tech Stack

- **Backend:** Laravel, PHP
- **Frontend:** Vue.js
- **Database:** MySQL
- **Real-time Updates:** Laravel Echo, Pusher
- **API Rate Limiting:** Laravel Throttle Middleware

## Installation

### Prerequisites

- PHP 8.x
- Composer
- Node.js & npm
- MySQL

### Setup

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/tweetai-autobot-service.git
   cd tweetai-autobot-service

2. **Install PHP dependencies:**

    ```bash
    composer install
    Install Node.js dependencie
    npm install

3. **Set up environment variables:**
    ```bash
    Copy the .env.example file to .env and update the values:
    Update the .env file with your database credentials and Pusher details:

    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password

    PUSHER_APP_ID=your-pusher-app-id
    PUSHER_APP_KEY=your-pusher-app-key
    PUSHER_APP_SECRET=your-pusher-app-secret
    PUSHER_APP_CLUSTER=your-pusher-app-cluster

    Generate application key:
    php artisan key:generate
    Run migrations:
    php artisan migrate
    Run seeders (optional):

    php artisan db:seed
    Start the development server:

    php artisan serve
    For real-time updates:

### Usage

npm run dev
Real-Time Dashboard
The real-time dashboard shows the current count of Autobots created. Simply open your browser and navigate to the provided URL by php artisan serve.
API Documentation
Base URL: /api

Endpoints:

Get Autobots:

http
Copy code
GET /api/autobots
Query Parameters:
page: The page number for pagination.
Response: Returns a list of Autobots (10 per request).
Get an Autobot's Posts:

http
Copy code
GET /api/autobots/{autobot_id}/posts
Path Parameters:
autobot_id: The ID of the Autobot.
Response: Returns a list of posts for the specified Autobot.
Get Post Comments:

http
Copy code
GET /api/posts/{post_id}/comments
Path Parameters:
post_id: The ID of the post.
Response: Returns a list of comments for the specified post.
Rate Limiting
Each API endpoint is rate-limited to 5 requests per minute. If the limit is exceeded, the API will return a 429 Too Many Requests response.
Deployment
Ensure you have correctly configured the .env file with your production database and Pusher credentials.

    ```bash
      npm run production
      Contributing
      Fork the repository.
      Create your feature branch (git checkout -b feature/fooBar).
      Commit your changes (git commit -am 'Add some fooBar').
      Push to the branch (git push origin feature/fooBar).
      Create a new Pull Request.

License
This project is licensed under the MIT License - see the LICENSE file for details.

### **Customizing the README**

- **Project-Specific Details:** Update sections like **Overview**, **Tech Stack**, and **Usage** to reflect the specific details and requirements of your project.
- **Contact Information:** Replace the contact email with your actual contact information.
- **Repository Link:** Update the repository link in the **Clone the repository** section with your actual GitHub repository URL.





