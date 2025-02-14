<!DOCTYPE html>
<html>
   <head>
      <title>Contact Us</title>
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
                            <h2 style="font-size: 20px; font-weight: bold; margin-bottom: 10px;">Enquiry Detail</h2>
                        </td>
                    </tr>
                    <!-- Details Section -->
                    <tr>
                        <td style="padding: 20px;">
                            <table width="100%" cellpadding="0" cellspacing="0" border="0" style="font-size: 16px; color: #4a4a4a; line-height: 1.8;">
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Full Name:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $send_email['name'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Email:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $send_email['email'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold; padding: 10px 0; border-bottom: 1px solid #eaeaea;">Phone Number:</td>
                                    <td style="padding: 10px 0; border-bottom: 1px solid #eaeaea;">{{ $send_email['phone_no'] }}</td>
                                </tr>
                                <tr>
                                    <td style="font-weight: bold !important; padding: 10px 0;  #eaeaea;">Massage:</td>
                                    <td style="padding: 10px 0;  ">{{ $send_email['message'] }}</td>
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
   </body>
</html>