<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Apply - {{ $internship->internship_function }}</title>
</head>
<body>
    <h1>{{ $internship->internship_function }}</h1>

    <h3>Info</h3>
    
    <h3>{{ $internship->internship_discription }}</h3>
    <p>City: {{ $internship->company_city }}</p>
    
    <h4>{{ $internship->available_spots }} available</h4>
</body>
</html>