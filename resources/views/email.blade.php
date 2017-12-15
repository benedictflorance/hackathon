@component('mail::message')
<img src="https://uidai.gov.in/templates/uidainewdesign/images/uidai-logo_en-GB.png" alt="UIDAI logo"></img>
<img src="https://uidai.gov.in/templates/uidainewdesign/images/aadhaar-logo_en-GB.png" alt="Aadhar Logo"></img>
<hr>
# Dear Doctor,

Register your details with the Aadhar HealthCare System by clicking the following button.<br>
If you didn't make this request, kindly ignore.

@component('mail::button', ['url' => $url])
Fill Details
@endcomponent

Thanks,<br>
UIDAI
@endcomponent