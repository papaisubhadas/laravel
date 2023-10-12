<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<p><b>Car Type:</b> {{ ($car_type_title != '' ? $car_type_title : '') }}</p>
<p><b>Car Name:</b> {{ ($car_inquiry->car_id != NULL ? $car_title : '') }}</p>
<p><b>Customer Name:</b> {{ $car_inquiry->customer_name }}</p>
<p><b>Customer Email:</b> {{ $car_inquiry->customer_email }}</p>
<p><b>Customer Phone No:</b> {{ $car_inquiry->customer_phone_no }}</p>
@if($car_inquiry->whatsapp_enable != NULL)
<p><b>Whatsapp Enable:</b> {{ ($car_inquiry->whatsapp_enable == 1 || $car_inquiry->whatsapp_enable == "1") ? 'Yes' : 'No' }}</p>
@endif
@if($car_inquiry->start_booking_date != NULL)
    <p><b>Date:</b> {{ $car_inquiry->start_booking_date }} to {{ $car_inquiry->end_booking_date }}</p>
@endif

<p>Thank you</p>
<p>Friends Car Rental</p>
</body>
</html>
