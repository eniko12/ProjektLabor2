# Test Plan

## Introduction

The Test Plan is designed to prescribe the scope, approach, resources, and schedule of all testing activities of the project.
The plan is to identify the items, that need to be tested, the features to be tested, the types of testing to be performed, the personnel responsible for testing, the resources and schedule required to complete testing, and the risks associated with the plan.

### Scope

All the feature of the website which were defined in software requirement specs are need to be tested.

#### In Scope

| Module Name | As Guest | As Customer | As Secretary | As Support | As Supervisor |
| -- | -- | -- | -- | -- | --|
| Profile | Register, Log in, Ask for password reset,
Informational pages | Log out, Edit profile, Save billing/shipping address | Can only be created by Supervisor | See Customer details, Edit Customer details except Id | Create Support/Secretary profiles, See/Edit Customer details except Id |
| Order | Purchase items | Purchase Items | Same as Customer | Same as Customer, See Order details, Edit Order details except Id | Has the permissions of Customer, Secretary,Support |
| Items | See Items, Use filters on shop page, See rating on items, See comments on items | Add/remove Items, Edit Items except the Item Id | Same as Secretary/Support |

#### Out of Scope

These features are not be tested because they are not included in the software requirement specifications:
	-Hardware Interfaces
	-API
	-Website Security and Performance

### Quality Objective

We must make sure:
	-Ensure the Application Under Test conforms to functional and non-functional requirements
	-Ensure the AUT meets the quality specifications defined by the client
	-Bugs/issues are identified and fixed before go live

### Roles and Responsibilities

Testing will be executed by:
	-Marton Péter Márton: Test manager, responsible for UI/UX testing
	-Urbán Regina Enikő: responsible for UI/UX testing
	-Bognár Viktória: responsible responsible for test documentations
	-Dombi Tibor Dávid: responsible for DB testing
# Test Methodology

## Overview

As our development process will follow the scrum method, therefore we adjusted our testing cycles to this. Every week is a new sprint, and we test every module right after implementation. This means we execute tests and write testing documents and reports near the end of the current sprint.

## Test Levels

In the project, the following tests should be conducted.

###	Functionality testing:

This is used to check if your product is as per the specifications you intended for it as well as the functional requirements charted out in developmental documentation. Testing Activities includes:
- Test all links in webpages are working correctly and make sure there are no broken links.

Links to be checked will include:
- Outgoing links
- Internal links
- Anchor links
- MailTo links
- Test Forms are working as expected. This will include:
-- Scripting checks on the form are working as expected. (For example: if a user does not fill a mandatory field in a form an error message is shown.)
-- Check default values are being populated
-- Once submitted, the data in the forms is submitted to a live database or is linked to a working email address
-- Forms are optimally formatted for better readability

- Test Cookies are working as expected. Cookie Testing will include:
-- Testing cookies (sessions) are deleted either when cache is cleared or when they reach their expiry.
-- Delete cookies (sessions) and test that login credentials are asked for when you next visit the site.

- Test HTML and CSS to ensure that search engines can check the site easily. This will include:
-- Checking for Syntax Errors
-- Readable Color Schemas
-- Standard Compliance. Ensure standards are followed.
-- Test negative scenarios, such that when a user executes an unexpected step, appropriate error message or help is shown in your web application.

###	Usability Testing

Test the site Navigation:
- Menus, buttons or Links to different pages on your site should be easily visible and consistent on all webpages

Test the Content:
- Content should be legible with no spelling or grammatical errors.
- Images if present should contain an "alt" text

###	Interface Testing

Three areas to be tested here are - Application, Web and Database Server

- Application: Test requests are sent correctly to the Database and output at the client side is displayed correctly. Errors if any must be caught by the application and must be only shown to the administrator and not the end user.

- Web Server: Test Web server is handling all application requests without any service denial.

- Database Server: Make sure queries sent to the database give expected results.

- Errors: Test system response when connection between the three layers (Application, Web and Database) cannot be established and appropriate message is shown to the end user.

###	Database Testing

Database is one critical component the web application and stress must be laid to test it thoroughly. Testing activities will include:
- Test if any errors are shown while executing queries
- Data Integrity is maintained while creating, updating or deleting data in database.

- Check response time of queries and fine tune them if necessary.
- Test data retrieved from your database is shown accurately in your web application

###	Compatibility Testing

Compatibility tests ensures that your web application displays correctly across different devices. This includes:

- Browser Compatibility Test: Same website in different browsers will display differently. We need to test if the web application is being displayed correctly across browsers, JavaScript, AJAX and authentication is working fine. It is also mandatory to check for Mobile Browser Compatibility.

- The rendering of web elements like buttons, text fields etc. changes with change in Operating System. We must make sure the website works fine for various combination of Operating systems such as Windows, Linux, Mac and Browsers such as Firefox, Internet Explorer, Safari etc.

#### Functionality Testing

<!--TEXT-->

#### Usability Testing

<!--TEXT-->

#### Interface Testing

<!--TEXT-->

#### Database Testing

<!--TEXT-->

#### Compatibility Testing

<!--TEXT-->

### Bug Triage

<!--TEXT-->

### Test Completness

<!--TEXT-->

## Test Deliverables

The following documents are needed to be delivered during test lifecycle:

- **Test Plan**: *Test plan* document is a document which contains the plan for all the testing activities to be done to deliver a quality product.

- **Test Cases/Scripts**: *Test cases* are the set of positive and negative executable steps of a test scenario which has a set of pre-conditions, test data, expected result, post-conditions and actual results.

- **Defect Report/Bug Report**: The purpose of using *Defect report* template or *Bug report* template is to convey the detailed information about the bug to the developers. It allows developers to replicate the bug easily.

 - **Test summary report**: It contains the summary of test activities and final test results.

## Resource and Enviroment Needs

### Testing Tools

The following tool will be used for testing: (all included in “tests” folder)

- Functional testing: Selenium on python
- Usability testing: Any screenshot tool
- Interface testing: Selenium on python
- Database testing: various PHP scripts
- Compatibility testing: Selenium on python


### Test Environment

The person executing tests will need the following software enviroment (or newer versions):

- PHP 7.2
- Composer 1.9.3
- Apache 2.4.0
- MySQL 8.0
-- MariaDB 10.1.38

- Python 3.7.6
-- bs4
-- urllib
-- colorama
-- selenium


## Terms and Acronyms

Terms and acronyms used in the project

|TERM/ACRONYM                          | DEFINITION                       |
|-------------------------------|-----------------------------|
|   API | Application Program Interface|
| AUT |  Application Under Test |
| DB | Database |
| BE | Back end, during development mostly used to refer to PHP codes |
| FE | Front end, during development mostly used to refer to the HTML and/or CSS code |
| JS | JavaScript |
| SYS | System plan |
| RQ | Requirements specification |
| FQ/FUNC | Functional specification | 
