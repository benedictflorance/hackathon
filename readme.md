## Smart Aadhaar Health Care System

* Every public can register in the android app through Aadhar ID. OTP verification is sent to the mobile number linked with the aadhaar so as to check the authenticity of the user.

* Ever doctor can register in the website through their registered medical practitioner ID. E-mail verification is sent to the e-mail linked with the practitioner ID to check the authenticity of the user.

* Users can add trusted doctors in their app. 

* For every health checkup the user undertakes, his/her trusted doctor can update the consulting advice, medicines prescribed and other such details in the  website. 

* So, for any health checkup the patient makes, the trusted doctors can easily view the medical history of the patient irrespective of the hospital the patient has undergone treatment. 

* Similarly, the user can view all of his medical records through the android app customized for the user.

* This system is very secure and reliable as only aadhar-authenticated person can login, prevents fake doctors as only trusted, registered medical practitioners can update patient's details. 

* The system also prevents the usage of papers for prescriptions, ease of access for earlier medical records of the patient and prevents improper understanding of the illegible doctor's prescription. 


### Documentation

* This repo contains the source code of Aadhar Health Care System doctor's website and also serves JSON API's for the android application for the users.

* Adjust the base url of the JSON API requests to the url where the website is hosted.

* Every response has status_code and data keys. (`200`-OK, `400`-Bad Request, `401`-Unauthorized, `500`-Internal Server Error)

### Table Description

Table Name        |  Description
-----------------------------------------------------------------------------------------------------------------------------------
`official_users`  | Analogous to the official Aadhaar database of the government (every aadhar linked with a mobile number and OTP)
`official_doctos` | Analogous to the official doctor database of the government (every doctor linked with registed practitioner ID)
`users`           | Users details upon registration
`doctors`         | Doctors details upon registration
`trusted_doctors` | Trusted Doctors details of users. Aadhar ID linked with multiple practitioner IDs.
`checkups`        | Checkup details of all users

### Build Instructions

1. Clone the repository
2. Run composer install in the home directory which will install all dependencies
3. Change .env.example to .env and run php artisan key:generate
4. Edit database parameters in .env file
5. Run php artisan migrate to run the migrations
6. Alter your way2sms `username` and `password` in the OTPController of the API.
7. Start the server with php artisan serve
 