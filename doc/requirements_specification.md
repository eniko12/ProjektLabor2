# Introduction

Our team is a small but ambitious web developer team that aims to achieve the highest heights. The team consists of five trustworthy, young developers, who are eagerly helping out each other and solve problems together. Our main profile is highly dynamic, database-driven websites, especially webshops. We mainly use the Laravel framework, however, we are flexible with our technologies.

# About this document

Our team accepted a commission of creating a fully functional webshop for *XYZ-Books Kft*. Following the first meeting with the company representatives, this document will describe the project under development. For the full transcript of the meeting see the client report.
This document together with the Requirement Specification establishes the basis for the agreement between *XYZ-Books Kft*. and our team on how the software product should function.
The software requirements specification document lists requirements for the project under development.

# Client Report

To keep this document easy to understand client report is not included. The original transcript is available [here](https://github.com/dombidav/afp2_web/blob/master/doc/parts/Client%20Report.md).

# Current State

XYZ-Books Kft. is a relatively new bookstore chain with shops in Budapest and Eger. The company sells physical copies in multiple languages mainly Hungarian, English and German. As the customer base is growing rapidly it became harder and harder to complete orders in only these two locations over time. For this reason, XYZ-Books decided to expand to new cities and open a webshop, so customers can place orders on books from home.  As of now, the company has a website at XYZ-books.example.com, however, this site is a static website only containing basic contact information. Having a webshop would help the company keep in touch with customers, and help customers to purchase more easily and from a much wider inventory. That is why XYZ-Books Kft. contacted us.

# Standards, Laws

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
-    Microsoft Edge
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
 5. Prerequisite for a successful placing an order, is to provide accurate and real datas at registration as well as at the Order Page.

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
 
## Privacy and Cookie Policy

 Obligation to EU privacy laws, it is our responsibility to inform users about how we handle their personal data. For this reason we will provide a Privacy Policy and a Cookie Policy for users to read. In the functional specification it will be explained in details.


# Current business model

At the moment the customer has an already working bookstore, which provides every necessary product to the customers. Although purchasing books online is not yet possible, due to the lack of XYZ online bookshop. Our current project aims to extend the functionalities of the client company by providing a fully functional online bookstore.

Before the release of the online bookstore, customers have to actually show up in some of the XYZ bookstores, which is not a problem on its own, because buying books in real life can be fun and have its own feeling to hold a book or feel the scent of the new books, but it has very limited possibilities. For example, if a certain product is not available in the bookstore or it has been sold out, customers have to wait for the products sometimes more than a week which is quite frustrating, especially if you need your chosen book in hurry because it's as a gift, or you are in a rush because the beginning of the semester is right here and you don't have your required book for a course, so it's easy to assume that everyone wants to get their products as soon as possible. To solve this problem, we will create an online bookshop, which will be connected directly to the product storage, where the customers can find every single book they need, so it won't be necessary to ship the products to all XYZ bookstores, that means every order will be shipped right from the online bookstore, which makes the book buying/ book shipping so much easier.

Furthermore, ordering an item online is much more convenient than taking any form of public transportation to get to the bookstore, not even mentioning the pollution that cars or any type of public transportation vehicle can cause to the atmosphere, and also you don't need to spend hours to get to the store, trying to find the book you wanted, especially if this day is one of the weekend days, you need to deal with the crowd everywhere in the city, and actually in this time you can't be with your loved ones or you can't just relax at home. Ordering from home is not just convenient but also protects the environment, and protect your nerves from becoming too angry about the lots of people all around the city.

As a result, customers will more likely spend their money on books at the XYZ bookshop and hopefully they want to use the online bookstore more and more often, because it is so much easier if they can make an order from their computer at home, or from their phone at work, or any remote place that is not any of the bookstores of the Company. That is the main reason the website shall be created and help to make the customers' lives so much easier.

# Requested business model

- Customers must have an internet connection in order to connect to the website and use it without any disruption.
- Being a registered user is not neccesary for online purchases.
- Database connection has to be set and fully functional.
- Users have to use a 16:9 pc monitor for the best experience but other aspect rations can be used too.
- Users have to be logged in in order to reach the profile page – guest users do not have a profile page, and only have limited permission to most of the possibilities (mostly only read, but no write.)
- Admins can add, they can delete or modify the items on the online bookstore.
- Admins can set discounts to certain books for limited time.

# Requirement list

- Home page
- Register
- Log in
- Profile page
- Categories
 
- Bestsellers
- Shop page
- Product page
- Shopping cart
- Order page

## Admin interface: 
- Product management
- Order management
