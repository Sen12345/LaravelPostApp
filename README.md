Laravel Posts App
Use laravel migration to create users 
Authenticate use's login using Laravel Authentication service and Session Facades to implement cookie-base authentication on request that are initiated from the browser
Impliment protection against Cross Site Request Forgery (CSRF)
Restrict posting, edit posts, delete posts to only authenticated user 
Explore laravel (length aware paginator) to organize posts 
Use laravel model Factories to generate use cases i.e testing and database seeding 
Use the date carbon instance to format dates & times 
Implemented like/dislike features for use to liking/disliking posts 
Use auth middleware to regulate user likes i.e restricting duplicate likes by the same user, displaying total likes from all post belongs to the authenticated user. 
configuring automatic email alert to a user when someone likes a posts that belongs to the user 
Use debugbar to monitor http request/response 
Reduce request traffic by eager-loading Model instances into db queries
Route model binding as a simpler way of querying database resources, e.g include model names in routes

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
