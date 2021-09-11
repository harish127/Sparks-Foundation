# Sparks Foundation - Basic Banking System

## Index
- [Description](#Description)
- First Time Installation
- How To Run
- Screenshort

## Description
- This a Internship project by Sparks Foundation.
- This project is built on HTML/CSS, Bootstrap, PHP and MySQL.
- Details of Customers are maintained as `Name`, `Email`, `Amount` are fields.
- Transaction is done through PDO, If some Error occured while Transaction changes made to table is Rollback(Reverted).  

## First Time Installation
- Clone the Repository.
- Make sure you have installed XAMP on your computer.
- Copy this folder(Sparks-Foundation) to XAMP installation Directory and then inside htdocs folder.

```
For Example
C:\xampp\htdocs\
```
- Open Xamp Control Panel. Click on Start button near Apache and MySQL.
- Open browser type the following into search bar.
```
http://localhost/Sparks-Foundation/firsttime.php
```
- If everything works fine you would see this on your browser.
```
Conection was established Succesfully.
DATABASE Created Successfully.
Customer Table Created Successfully.
Entries added to table Successfully.
Transaction Table Created Successfully.
```
- This means that you have created a database name bank, a table name customers also added 10 entries to table and finally creating a table name Transaction.

## How To Run
- After following steps above(First Time Installation).
- Make Sure XAMP is active with Apache and MySQL Server Enabled.
- Open Browser Enter the following URL:
```
http://localhost/Sparks-Foundation/
```
OR
```
http://localhost/Sparks-Foundation/index.php
```
- You will land to Homepage of Money Bank Website.
- Click On `View all Customer` from Navigation OR `Get Started` button for viewing detail of all Customers.
- You will see Customer details in table with deatils like(Name, Email, Current balance, etc.).
- Click on `Send` Button Corresponding Any row of table.
- Now We are on Money Transfering Page. Now Enter a Valid Name in `To` textbox and also Enter Amount, Click on checkbox and finally Click on `Send` Button To Start Transfer.
- Make sure the Amount you enter is not grator then current balance of the Person Selected, else it will pop Message.
- If the Transaction is successful Message will displayed and Changes made by above Transaction will be updated to customer table. 