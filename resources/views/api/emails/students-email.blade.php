<!DOCTYPE html>
<html>
<head>
    <title>Red3sixty.com</title>
</head>
    <body>
        <h1>Student Detail</h1>
       <p>Fisrt Name:- {{ $mailData['first_name'] }}</p>
       <p>Last Name:- {{ $mailData['last_name'] }}</p>
       <p>Date of birth:- {{ $mailData['d_o_b'] }}</p>
       <p>Gender:- {{ $mailData['gender'] }}</p>
       <p>Class:- {{ $mailData['class_name'] }}</p>
       <h1>Parents Detail</h1>
       <p>Father Name:- {{ $mailData['father_name'] }}</p>
       <p>Mother Name:- {{ $mailData['mother_name'] }}</p>
       <p>Occupation:- {{ $mailData['occupation'] }}</p>
       <p>Phone Number:- {{ $mailData['phone'] }}</p>
       <p>Address Line 1:- {{ $mailData['address_line_1'] }}</p>
       <p>Address Line 1:- {{ $mailData['address_line_2'] }}</p>
       <p>Message:- {{ $mailData['description'] }}</p>


   </body>
</html>