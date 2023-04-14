<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJ_3xZQiU-LAlMd70w10NcFvNR4-Jqw3wa5lN-5L3jmpwhaJacu3inkVSxDiEOzdiKLQ&usqp=CAU" width="400" alt="Laravel Logo"></a></p>



## About ToNote Assement

This assesment is my completed task of  building a simple e-commerce website using LARAVEL PHP and Apache Kafka for message queuing between consumers and producers. The App will allow users to browse products, add items to their cart, and checkout.


The Requirements:

When a user adds an item to their cart, a message should be sent to the Kafka topic "cart_items" with the user ID and the product ID.
A consumer should be listening to the "cart_items" topic and should store the item in the user's cart in the database.
When a user checks out, a message should be sent to the Kafka topic "checkout" with the user ID and the list of product IDs in their cart.
A consumer should be listening to the "checkout" topic and should create an order in the database with the user ID and the list of product IDs.
Tasks:


- Create a Laravel controller for handling cart-related actions (e.g. adding items to cart, removing items from cart).
- Create a Laravel Kafka producer for sending messages to the "cart_items" and "checkout" topics.
- Create a Laravel Kafka consumer for listening to the "cart_items" topic and storing cart items in the database.
- Create a Laravel Kafka consumer for listening to the "checkout" topic and creating orders in the database.



## API DOCUMENTATION

production: appUrl/docs
local: 127.0.0.1:8000/docs
