# Overview

## About this document

Our team accepted a commission of creating a fully functional webshop for *XYZ-Books Kft*. Following the first meeting with the company representatives, this document will describe the project under development. For the full transcript of the meeting see the client report.
This document together with the Requirement Specification establishes the basis for the agreement between *XYZ-Books Kft*. and our team on how the software product should function.
The software requirements specification document lists requirements for the project under development.


## Project overview

This document contains various technologies and softwares that are going to be used during development. The Business Requirements, Goals and objectives of the project will be the resources the team will use. Each of the team members are going to work on this project, and what the members will do, is said in the documents above. The documents we need to use during development:

- the Functional Requirements of the project 

- the features requested by the clients

-  the database structure and plan

- the laws and industry standards that this project is subjected

- regulations

- terms and conditions

- cookies

- logging

- privacy policies like: advertising policies and third party privacy policies

- CCPA and GDPR data protection rights

- child protection services (childproofing the webshop).

The clients were really specific about what they wanted and that makes our job much easier.



# Technologies used

## Content management system (CMS) – Laravel

Laravel is a free open source php web framework indtended for the development of web applications following the model–view–controller (MVC) architectural pattern and based on Symfony. Some of the features of Laravel are a modular packaging system with a dedicated dependency manager, different ways for accessing relational databases, utilities that aid in application deployment and maintenance, and its orientation toward syntactic sugar.
We are going to use this system to make the project building procedure faster.


## Web framework – Bootstap

Bootstap will be used to make the dynamic layout of the webshop, so it works smoothly on all resolutions in the browsers.


## Web server – Apache

An Apache web server will be used to store the database information, in which we will store the database writen in MySQL structure.


## Programming language – PHP

We are going to write our code in php, since it is the most used programming language for building websites.
The PHP version which is going to be used is PHP 7.2 or higher since Laravel needs that environment.



## Communication – Discord, GitHub, Trello

Discord is a communication software made for voice chat.
Since Discord is free we are gonna use this software, because it is not sure that all of us will be in the same room when our company develops the webshop the client asked for. With this we will be able to communicate in real time with our coding partners, and since it has a normal chat function that follows the written messages, it will be easy to trace back with the problems that are brought up during development.


GitHub is a free repository where the project will be stored during development. With this we can share and retrivel the versions of our work, and if something is not working we can reroll the changes so we don't have to start from the beginning.


Trello is a free web-based Kanban-style list-making application. We can create our task boards with several columns and move the tasks between them. Typically columns include task statuses: To Do, In Progress and Done.

## Data structure store – MySQL

The database structure will be written accordig to the MySQL standards.
Recommended version: MySQL 8.0


## JavaScript frameworks – jQuery

Since the project requires the use of JavaScript we need a framework that is able to use the language.
During the development of this project our company plans to use the jQuery development library.



# Business Requirements

## Scope
- **Project objectives**
We want to bulid a website that can be used to buy real life books. With using the online bookshop too, we want to help the bookstore in its revenue increase by selling more books.

- **Goals**
We want to bulid a fully working online bookstore where we can register in and log in too for buying some books. Users don't need to be logged in to buy books.  Not just users can use the online bookshop but admins too who can add, modify and delete the products.

- **Sub-phases**
There would be several phases during the work to finish successfully each tasks:
--*Planning*: what we want to create, what would be the best idea.
--*Documenting*: write the documents for the chosen idea.
--*Create*: Start to programming the idea what we already documented, (here the website) while doing tests too.
--*Testing*: Doing major overall tests for know how the program working or is it working the way we want it.
--*Finishing*: Handover the finished program to the customer, and present each features, the working of the website and how to use it properly.

- **Tasks**
--*Writing the documents*:
System Requirements, Functional specification, Requirements specification, Test plan
--*Programming*:
Back End, Database, Front End, Tests
--*Testing*

- **Resources** 
 -- *PHP 7.2*
 -- *Apache 2.4.0*
 --*MySQL 8.0 Recommended IDE*
 -- *NetBeans IDE 9.0*

- **Schedule**
 -- *From 02.13 to 02.27*
 Writing the documents for the website: System Requirements, Functional specification, Requirements specification.
 -- *From 02.27 to 03.05*
 Writing the test plan for the program
 -- *From 03.05 to 04.30*
 Creation of the website
 -- *From 04.30 to 05.07*
Doing the major tests
-- *On 05.14*
Handover to the customer

## Team

Since there isn't any Senior Developer or Lead Programmer, everyone do a little bit in everything: documenting, programming and testing.

**Team members:**

 -- *Dombi Tibor Dávid*

 -- *Marton Péter Márton*

-- *Urbán Regina Enikő*

 -- *Bognár Viktória*
 
## Task workflow

We use an online website for create new tasks, named as Trello where anyone can add a new task with labels to easily find it between the other tasks, we can set dates to them to know how much time left for finish our tasks, we can comment them, give short description and add lists if its needed. We can modify our tasks anytime if we want, for example add new comment, add new list item or marked it as finished.

For make it more simple and easier we can create cards with the names of:

-- **Backlog Work**
-- **Backlog**
-- **In Progress Work**
-- **In Progress**
-- **Validate**
-- **Done Work**
-- **Done**
-- **Sprint Results**

To mark a task finished or completed we put our tasks in the **Validate** card and one member of the team will going through the task and if there is a problem with it, they will report the problem and fix it or leave a comment on the task what they need to, and how to fix it.

# Functional Requirements

## UX requirements 
**Browsing:** The customer should be able to look around between the products at the Shop Page.


**Search:** The customer should be able to filter and search products. The user could search a book by its name, author, publisher or category.


**Detailed information:** The customer should be able to get detailed informations about the product of his/her choice. 


**Shopping cart:** The customer should be able to add products to his/her cart. 


**Purchase:** The customer should be able to buy products. They could buy the products in their shopping cart. They can finalize their order by giving their shipping information. They should select the mode of delivery (the delivery company, the place of receipt). Moreover, they should choose the payment method. They should be able to use coupons.


**Register:** The users should be able to sign up. This is also required for shopping and to use the shopping cart and the wish list. After registration they will have a Profile Page.


**Data modification:** The customer should be able to modify his/her personal informations at the Pofile Page. (after some sort of verification)


## Management requirements 
**Add product:** Should be able to add new product which are displayed at the shop page. They should be able to give the product's title, author, publisher, page number, description, language, year of publication and ISBN and the price.


**Delete product:** Should be able to delete product. After that the product is no longer available at the Shop Page.


**Modify product:** Should be able to modify a product's properties. After the modification, the product displays with the new properties at the Shop Page and the Product Page.


**Order management:** Should be able to rewiew the incoming orders.


## Sales requirements 
The management team should be able to add, delete and modify products. When they modify a product they can change any property which they gave to the product when they added it to the shop.

They can review all the orders at the Order Management Page.


# Features

 **For customers:**

 - Registration

 - Log in / Log out

 - Shopping cart

 - Profile Page with editable personal informations

 - Search by title/publisher/author/year of publication and categories

 - Filter by category

- Browsing the Shop Page

- See detailed informations about the product on the Product Page

**For admins:**

 - Add/delete/modify products

 - Review orders


# Permission Scheme  
  

As the webshop will implement a user authentication system, we must determine who can access the resources, what is allowed for them and what is not. These permissions are the following:  
  

## Guest  
  

Registration is recommended but not necessary. Every unregistered or logged out visitor is in this category.  
Guests are allowed to:  

- See informational pages (about us, policies, etc.)  

- List every item in the shop inventory, if it is not deleted or hidden.  

- Use the item filters.  

- Show the details of a specific item.  

- Purchase items  

- Registrate a new account  

- Log In to an existing account  

- Ask for password reset on an existing account  
  

## Customer  
  

A customer is a user who registered through the registration form of the webshop.  
They are allowed to:  

- See informational pages (about us, policies, etc.)  

- See their own profile  

- Edit the following fields on their own account:  
-- Full name  
-- Email  
-- Password  
-- Date of birth  
-- Default UI language (in a later version)  
-- Saved billing address  
-- Saved shipping address  

- List every item in the shop inventory, if it is not deleted or hidden.  

- Use the item filters.  

- Show the details of a specific item.  

- Purchase items  

- Log Out to an existing account  
  

## Secretary  
  

This role can only be given by an Administrator. This role is responsible for managing stock items. Secretaries have every permission as a customer, furthermore, they can:  

- Add new items  

- Remove items  

- Edit every field on items except the ID field.  
  

## Support  
  

This role can only be given by an Administrator. This role is responsible for the user helpdesk. Supports have every permission as a customer, furthermore, they can:  

- See every detail on customers  

- Modify every field on customers except ID  

- See every detail on orders  

- Modify every field on orders except ID

# Database

## Objects

- **User**: Every account registered on the site. 
	- **ID**: Identification number, **unique** for every user. To avoid index vulnerabilities this field is NOT automaticaly incremented, but a randomly generated hexadecimal number (ex. 5e52c36ecd40a). The business layer is responsible for the uniquenes of the generated number. Can not be changed later!

	- **Full name**: Full name of the user as filled in registration form.

	- **Email**: Email address, must be valid.

	- **Gender**: Choosable on registration.

	- **Date of birth**: Optional. Birth date of user. In later 
versions might be used to automaticaly generate special offers or to recommend featured products

	- **Language**: UI language for later version compatibility.

	- **Password**:  One-way hashed password.

	- **Billing address**: Default billing address for this user (if any).

	- **Shipping address**: Default shipping address for this user (if any). If this is empty, but the Billing address is filled use that as shipping address.

	- **Authority**: Authority of the user. As later versions will come out, new permissions might be implemented. Value can be:
		- 0 = Account is deactivated.
		- 1 = Email is not confirmed.
		- 2 = Customer.
		- 3 = Secretary.
		- 4 = Support.
		- 9 = Admin.

	- **Created at**: This field will contain the date and time when the user registered.

- **Book**: The products in the webshop inventory
	- **ID**: Unique Identifier. Can be automatically incremented.

	- **ISBN**: However this field should be unique it is possible that some book will not  have an ISBN.

	- **Title**: Special UTF-8 characters are possible.

	- **Author**: Multiple authors are possible.

	- **Publisher**: Only one publisher per book.

	- **Year of publishing**: Only the year is sufficient.

	- **Genre**: Most books will be associated with more than one genre.

	- **Page Count**: Page count of the book

	- **Language**: Language of the book

	- **Description**: Short, brief description of the book, mostly used in promotional materials. In a later version the website will operate in multiple languages, but description will be writen in the same language as the book it self. 

	- **Price**: Current price of the book in Hungarian Forints. Decimals are not neccessary.

	- **In Stock**: Number of books on storage.

	- **Can be Ordered**: Marks if this book can be ordered or not.

	- **Can be Preordered**: Marks if users can order this book even if the invenoty does not have the neccessary amount.

- **Order**: Note that order data DOES NOT contain the actualy ordered items. Those will be in a separate helper object, called "[package](#helper-tables)" which will have a referance to the order it self.
	- **ID**: Identification number, **unique** for every order. To avoid index vulnerabilities this field is NOT automaticaly incremented, but a randomly generated hexadecimal number (ex. 5e52c36ecd40a). The business layer is responsible for the uniquenes of the generated number. Can not be changed later!

	- **User**: To determine which user put the order. Can be empty if the customer was not logged in.

	- **Billing**: Billing Address. If the user have a default billing address, copy the id here.

	- **Shipping**: Shipping Address. If the user have a default shippingaddress, copy the id here.

- **Address**: To enable non-registered purchases adresses are stored separately from user data.
	-  **TIN**: Tax Identification number. If the user is registered as a business, this field is neccessary, otherwise it is empty. For this reason logic layer can use this field to determine if the ordering customer is a natural person or a company.

	- **Country**: Only real countries should be allowed

	- **Post code**: Keep in mind that different countries have different postal code format. For now this field is not validated.

	- **City**: In a later version this should be determined from post code.

	- **Street**: Street name

	- **House**: House number with all neccessary other information (floor, door, building, etc.)

	- **Note**: Additional information about the shipping or the order.

- **Author**:
	- **ID**: Unique Identifier. Can be automatically incremented.

	- **Name**: Name of the author

- **Publsiher**:
	- **ID**: Unique Identifier. Can be automatically incremented.

	- **Name**: Name of the publisher 

- **Genre**:
	- **ID**: Unique Identifier. Can be automatically incremented.

	- **Name**: Name of the genre

- **Country**:
	- **ID**: Unique Identifier. Can be automatically incremented.

	- **Name**: Name of the country


## Helper tables

For some table connections additional "helper" tables are required.

- **Multiple author of a single book**:
	- Book ID

	- Author ID

- **Multiple genre of a single book**:
	- Book ID

	- Genre ID

- **Multiple books in a single order (PACKAGE)**:
	- Order ID

	- Book ID

	- Quantity

## Database Plan
Database plan is also available [here](https://dbdiagram.io/d/5e52ac1b07a7395d994e032c)
### DSL
```
//== DATABASE PLANNING IN PRACTICE ==//
//// ENUMS ////

//user_auth {
//  (guest = null)
//  deactivated = 0
//  email_not_confirmed = 1
//  customer  = 2
//  secretary = 3
//  support   = 4
//  admin     = 9
//}

//order_status {
//  processing = 0
//  preparing  = 1
//  shipping   = 2
//  completed  = 3
//  cancelled  = 4
//}

// ------------------- //

//// CREATING TABLES ////

Table user {
  id char(8) [pk]
  username varchar
  name varchar
  created_at timestamp [default: "CURRENT_TIMESTAMP"]
  date_of_birth timestamp [default: null]
  email varchar
  gender tinyint(1)
  password varchar
  user_auth tinyint(1) [default: 0]
  language int [default: 1]
  billing int [null, default: null]
  shipping int [null, default: null]
}

Table author {
  id int [pk, increment]
  name varchar
}

Table country {
  id int [pk]
  name varchar
 }
 
Table language {
   id int [pk, increment]
   name_int varchar // This is the english name like "Hungarian"
   name_nat varchar // This is the native name like "Magyar"
}

Table publisher {
  id int [pk, increment]
  name varchar
}

Table genre {
  id int [pk, increment]
  name_en varchar
}

Table book {
  id int [pk, increment]
  ISBN varchar
  title varchar
  thumbnail varchar
  sample varchar
  author int
  publish_year year
  publisher int
  genre int
  language int
  page_count int
  description varchar
  can_order tinyint(1) [default: 1]
  can_preorder tinyint(1) [default: 1]
  in_stock int
  price int
  discount int [null, default: null]
}

Table address {
  id int [pk, increment]
  country int
  tin varchar [default: null]
  post_code varchar
  city varchar
  street varchar
  house varchar
  note varchar
}

Table order {
  id char(16) [pk]
  user char(8) [null]
  billing int
  shipping int
  status tinyint(1)
  created_at timestamp [default: "CURRENT_TIMESTAMP"]
  coupon char(16) [default: null]
}

Table coupon {
  id char(16)
  action int
  used tinyint(1) [default: 0]
}

Table coupon_action {
  id int [pk, increment]
  description_en varchar
  discount float [null]
  is_percentage tinyint(1) [null, default: 1]
  from_sum tinyint(1) [null, default: 1]
}

// ------------------- //

//// CREATING HELPER TABLES ////

Table book_author {
  author_id int
  book_id int
}

Table book_genre {
  genre_id int
  book_id int
}

Table package {
  order_id char(16)
  book_id int
  quantity int
}

// ------------------- //

//// CREATING REFERENCES ////

Ref: user.language > language.id
Ref: user.billing > address.id
Ref: user.shipping > address.id

Ref: book.publisher > publisher.id
Ref: book.language > language.id
Ref: book_author.book_id > book.author
Ref: book_author.author_id > author.id
Ref: book_genre.book_id > book.genre
Ref: book_genre.genre_id > genre.id

Ref: order.user > user.id
Ref: order.billing > address.id
Ref: order.shipping > address.id
Ref: order.coupon > coupon.id
Ref: package.order_id > order.id
Ref: package.book_id > book.id


Ref: coupon.action > coupon_action.id

Ref: address.country > country.id
```

### UML
![Database plan in UML](https://github.com/dombidav/afp2_web/raw/master/doc/xyz-books_database_uml.png)


# Standards and Laws
## General Standards
Application must meet the following general standards:
 1.  Must be easily understandable and easy to use for the customers.

 2.  Must function in a logical manner for the users.

 3.  Must use the industry best practices.

 4.  Must use styles that are consistent throughout the application and within the associated Web site, including:
 
- Error messages must appear in a consistent location and style.
- Form controls that are not available must be hidden.

## Development Technology, Programming Language, and Web Server Software

Web application requires the use of the following (or higher) technologies:

-   PHP 7.2

-   Apache 2.4.0

-   MySQL 8.0

Recommended IDE:
-   NetBeans IDE 9.0

## Minimum Browser Standards

Web application must function and display properly in the following browser versions:
-   Mozilla Firefox

-   Microsoft Edge

-   Google Chrome

-   Internet Explorer

##  Online shop regulations
**Definitions:**
1. The seller - XYZ-books

2. Customer- An individual who is at least 14 years old, in case he/she is not 18 yet the consent of his/her legal representative is required. / A legal person or organization unit.

3. Online store / Shop / Webshop -Internet service available at (*-not yet clarified-*) through which a customer can purche goods from the seller.

4. Goods - Movaible items presented in the online shop.

5.  Regulations - Rules of the online shop.

**General provisions:**

1.  Online shop is run by the seller.    

2.  The regulations define the rules for the conclusion between the seller and the customer contracts for the sale of goods by means of distance communication and use by customers of the online store.

3. Information about the price given in the online store is binding from the moment of receipt of the e-mails. After successful submission of the order, this price will not change regardless of changes in the prices in the store, which may arise in relation to particular goods.

4. Photos of the goods are placed in the online store for exemplary purposes only and are specifically indicated in the presentation of the goods.

 5. Customers are not able to purchase goods in the online store if they not registrated users.

 6. Prerequisite for a successful placing an order, is to provide accurate and real datas at registration as well as at the Order Page.

**The scope of the terms and conditions of use the online shop:** 
  1. To use the service provided by the online store, the customer need to cognize these rules and accept them.  

  2. The provided informations in the registration form and Order Page should be truthful and current. If the customer provides incorrect or outdated information, in particular as regards to the personal data of the customer, the seller is not obliged to carry out orders. It is prohibited to transfer or make available by the customer illegal content or infringe the rights of third parties.  
  
3. Seller shall take the necessary technical and organizational measures to prevent acquisition and modification data provided by the customer during registration and when ordering by unauthorized users.

**Placing an order:**
    
1. Orders for goods available in the online shop are made through the Order Page, available in the store.  
  
2. Placing an order through Order Page is possible around the clock, every day of the week. Orders placed on weekdays will be implemented on  an ongoing basis. Orders placed on saturdays, sundays and holidays will be implemented no earlier than the next business day.
    
3. An order shall be made by logging in to the store, addition of the goods to the shopping cart and confirmation of the order. In the absence of the customer registration in the online shop placing an oreder is not possible.  

4. Sending the order by the customer constitutes an offer submitted by the customer to the seller to enter into a contract of sale, in accordance with the regulations.  

 5. After sending the order the customer receives confirmation of acceptance of his offer by electronic means (confirmation of the order), at the e-mail address indicated by the customer. After receiving above-mentioned acceptance agreement of sale is valid.
 
For Privacy and Cookie Policy see appendix.

# Appendics
## Terms and Acronyms
|  TERM / ACRONYM|  DEFINITION|
|--|--|
| API | Application Program Interface |
| DEV | Developer |
| APP | Application under development|
| FE | Front end, during development mostly used to refer to the HTML and/or CSS code |
| BE | Back end, during development mostly used to refer to PHP codes |
| DB | Database
| MVC | Model-view-controller (architecture)

#### Only applicapble on Trello board:

|  TERM / ACRONYM|  DEFINITION|
|--|--|
| RQ | Requirement specification |
| FUNC | Functional specification |
| SYS | System plan|

## Privacy Policy

At XYZ-books, accessible from XYZ-books.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by XYZ-books and how we use it.

If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.

This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in XYZ-books. This policy is not applicable to any information collected offline or via channels other than this website.

### Consent

By using our website, you hereby consent to our Privacy Policy and agree to its terms.

### Information we collect

The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.

If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.

When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.

### How we use your information

We use the information we collect in various ways, including to:

-   Provide, operate, and maintain our website

-   Improve, personalize, and expand our website

-   Understand and analyze how you use our website

-   Develop new services, features, and functionality

-   Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the webste, and for marketing and promotional purposes

-   Send you emails

-   Find and prevent fraud

### Log Files

XYZ-books follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users' movement on the website, and gathering demographic information.

### Cookies and Web Beacons

Like any other website, XYZ-books uses 'cookies'. These cookies are used to store information including visitors' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users' experience by customizing our web page content based on visitors' browser type and/or other information.

### Google DoubleClick DART Cookie

Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL:  [https://policies.google.com/technologies/ads](https://policies.google.com/technologies/ads)

### Advertising Partners Privacy Policies

Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on XYZ-books, which are sent directly to users' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.

Note that XYZ-books has no access to or control over these cookies that are used by third-party advertisers.

### Third Party Privacy Policies

XYZ-books's Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.

You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers' respective websites. What Are Cookies?

### CCPA Privacy Rights

Under the CCPA, among other rights, California consumers have the right to:

- Request that a business that collects a consumer's personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.

- Request that a business delete any personal data about the consumer that a business has collected.

- Request that a business that sells a consumer's personal data, not sell the consumer's personal data.

- If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.

### GDPR Data Protection Rights

We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:

- **The right to access** – You have the right to request copies of your personal data. We may charge you a small fee for this service.

- **The right to rectification** – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.

- **The right to erasure** – You have the right to request that we erase your personal data, under certain conditions.

- **The right to restrict processing** – You have the right to request that we restrict the processing of your personal data, under certain conditions.

- **The right to object to processing** – You have the right to object to our processing of your personal data, under certain conditions.

- **The right to data portability** – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.

If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.

### Children's Information

Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and / or monitor and guide their online activity.

XYZ-books does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.

## Cookie Policy

This website, XYZ-books.com (the "Website"), is operated by XYZ-books.

### What are cookies?

Cookies are a small text files that are stored in your web browser that allows XYZ-books or a third party to recognize you. Cookies can be used to collect, store and share bits of information about your activities across websites, including on XYZ-books.com website.

Cookies might be used for the following purposes:

-   To enable certain functions

-   To provide analytics

-   To store your preferences

-   To enable ad delivery and behavioral advertising

XYZ-books.com uses both session cookies and persistent cookies.

A session cookie is used to identify a particular visit to our Website. These cookies expire after a short time, or when you close your web browser after using our Website. We use these cookies to identify you during a single browsing session, such as when you log into our Website.

A persistent cookie will remain on your devices for a set period of time specified in the cookie. We use these cookies where we need to identify you over a longer period of time. For example, we would use a persistent cookie if you asked that we keep you signed in.

### How do third parties use cookies on the XYZ-books Website?

Third party companies like analytics companies and ad networks generally use cookies to collect user information on an anonymous basis. They may use that information to build a profile of your activities on the XYZ-books website and other websites that you've visited.

### What are your cookies options?

If you don't like the idea of cookies or certain types of cookies, you can change your browser's settings to delete cookies that have already been set and to not accept new cookies. To learn more about how to do this, visit the help pages of your browser.

Please note, however, that if you delete cookies or do not accept them, you might not be able to use all of the features we offer, you may not be able to store your preferences, and some of our pages might not display properly.

### Where can I find more information about cookies?

You can learn more about cookies by visiting the following third party websites:

-   [About.com Browser Guide](http://browsers.about.com/od/faq/tp/delete-cookies.htm)

-   [All About Cookies.org](http://allaboutcookies.org/)

-   [Network Advertising Initiative](https://www.networkadvertising.org/)
