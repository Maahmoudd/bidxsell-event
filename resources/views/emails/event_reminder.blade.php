<!DOCTYPE html>
<html>
<head>
    <title>Event Reminder</title>
</head>
<body>
    <h1>Hi, {{ $customerName }}</h1>
    <p>This is a reminder that your event <strong>{{ $event->name }}</strong> is happening soon!</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Venue:</strong> {{ $event->venue->name }}</p>
    <p>We look forward to seeing you there!</p>
</body>
</html>
