# Laravel Blog Post

This is a blog post website built using the Laravel framework. The website allows users to create, edit, and delete blog posts, as well as adding comments to existing posts. The website also includes a scheduled task to delete old posts.

## Features

- Create new blog posts with a title, content, and image
- Add comments to existing blog posts
- Edit and delete blog posts (Soft Delete)
- Scheduled task to delete old posts that are more than 30 days old

## Installation

1. Clone the repository: `git clone https://github.com/your-username/laravel-blog-post-website.git`
2. Install dependencies: `composer install`
3. Create a new database for the project
4. Copy `.env.example` to `.env` and update the `DB_*` variables to match your local database configuration
5. Run database migrations: `php artisan migrate`
6. Start the development server: `php artisan serve`

## Demo

https://user-images.githubusercontent.com/95037451/229960883-6a5b09e5-4985-4058-b1f7-5c082829769e.mp4

## Contributing

If you would like to contribute to the project, please fork the repository and create a new branch for your changes. Once you have made your changes, submit a pull request to be reviewed.

