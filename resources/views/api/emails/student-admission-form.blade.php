<!DOCTYPE html>
<html>
   <head>
      <title>Student Admission Form Detail</title>
   </head>
 
       <body style="margin: 0; padding: 0; background-color: #f8f9fc; font-family: 'Arial', sans-serif;">

    <!-- Main container -->
    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color: #f8f9fc; padding: 30px;">
        <tr>
            <td align="center">
                <!-- Email Content -->
                <table width="600" cellpadding="0" cellspacing="0" border="0" style="background-color: #ffffff; border-radius: 15px; padding: 0; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);">
                    <!-- Header Section -->
                    <tr>
                        <td align="center" style="background-color: #FFA500; border-radius: 15px 15px 0 0; padding: 20px;">
                            <img src="https://risnagrota.com/images/homepage/Logo.png" alt="School Logo" style="width: 100px; height: auto; margin-bottom: 10px;">
                            <h1 style="font-size: 22px; color: #ffffff; margin: 0; font-weight: 700;">Rainbow International School</h1>
                        </td>
                    </tr>
                    <!-- Message Section -->
                    <tr>
                        <td style="padding: 30px 20px; text-align: center; color: #4a4a4a;">
                            <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">New Student Admission Created</h2>
                            <p style="font-size: 16px; line-height: 1.6; margin: 0;">Thank you for registering your child with Rainbow International School. Below are the admission details:</p>
                        </td>
                    </tr>
                    <!-- Details Section -->
                    <tr>
                        <td style="padding: 20px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size: 16px; color: #4a4a4a; line-height: 1.8;">
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Student Name:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $is_create_student['student_name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Date of Birth:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $is_create_student['dob'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Class Admitted:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $is_create_student['class_admitted'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Father Name:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $is_create_student['father_name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Mother Name:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $is_create_student['mother_name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Address:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $is_create_student['address'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0;">Status:</td>
                                    <td style="padding: 10px 0;">{{ $is_create_student['status'] }}</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <!-- Footer Section -->
                    <tr>
                        <td style="background-color: #f8f9fc; padding: 20px; text-align: center; border-top: 1px solid #eaeaea; border-radius: 0 0 15px 15px;">
                            <p style="font-size: 14px; color: #6c757d; margin-bottom: 10px;">Thank you for choosing Rainbow International School!</p>
                            <a href="https://risnagrota.com" style="color: #FFA500; font-weight: bold; text-decoration: none; margin-right: 10px;">Visit Our Website</a>
                            <a href="https://risnagrota.com/contact" style="color: #FFA500; font-weight: bold; text-decoration: none;">Contact Us</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
       
       
       
      <!--<h1>New student admission created successfully</h1>
      <p>Student Name:- {{ $is_create_student['student_name'] }}</p>
      <p>Date-Of-Birth:- {{ $is_create_student['dob'] }}</p>
      <p>Class Admittedr:- {{ $is_create_student['class_admitted'] }}</p>
      <p>Father Name:- {{ $is_create_student['father_name'] }}</p>
      <p>Mother Name:- {{ $is_create_student['mother_name'] }}</p>
      <p>Address:- {{ $is_create_student['address'] }}</p>
      <p>Status:- {{ $is_create_student['status'] }}</p>-->
      
      
      
      
      
      
      
   </body>
</html>