<!-- resources/views/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Dashboard</title>
</head>
<body>
    <h1>Welcome to the Car Dashboard</h1>

    <h2>Cars:</h2>
    <ul>
        @foreach ($cars as $car)
            <li>{{ $car->name }} - {{ $car->model }} - {{ $car->year }}</li>
        @endforeach
    </ul>

    <!-- Add additional car management options here, like creating, editing, or deleting cars -->
</body>
</html>
