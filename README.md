# Camera Auction Website 📷
##  An auction website built in PHP designed to allow the user to buy and sell camera gear
![enter image description here](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)	![enter image description here](https://img.shields.io/badge/Python-FFD43B?style=for-the-badge&logo=python&logoColor=blue) 	![mysqlimage](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white) [![GitHub release](https://img.shields.io/github/release/kubernetes/website.svg)](https://https://github.com/lukemitch23/Camera-Auction-Website/releases/latest)

This project was built for my A-level computer science coursework. It is an auction website that will allow the user to buy and sell camera gear on the platform. Built using PHP, python and MySQL, the webpage includes many features including: 

 1. User registration
 2. Creating a listing
 3. Searching for listings
 4. Messaging the seller
 5. Average sold price updates

## Installation
### Requirements

 1. MySQL server (see database file)
	 - [For help with this follow this link](https://pimylifeup.com/raspberry-pi-mysql/) 
	 - Database should have an account with username  `server` and password `server123`
 2. PHP version 8 `$ sudo apt install php`
 3. Python version 3.8 `$ sudo apt install python3.8`
 4. PHP MySQL connector `$ sudo  apt  install php-mysql`
 5. Python MySQL connector `$ pip install mysql-connector-python`
### Getting up and running
 1. Clone the repository `$ sudo git clone https://github.com/lukemitch23/Camera-Auction-Website.git`
 2. Create a MySQL server with a database called 'site' `CREATE DATABASE site;`
 3. Import the database file from the repository to the server using `$ sudo mysql -u root -p site < database.sql`
 4. Move to the most recent version (currently prototype 3)
 5. Start PHP server `$ sudo php -S localhost:8000 -t Coursework/'prototype 3'`
 6. Open `localhost:8000` in browser and happy selling!

## Contributing
### This project still in early development and so is likely to contain bugs and large errors. You can see that latest developments on the testing branch.
If you find an error please submit an issue with the following parameters:
 - Issue outline
 - Was the error website breaking or still usable
 - Usage leading to error
 - Screenshots of any error messages
 - **OPTIONAL:** Your suggestion of what could be done to fix this
