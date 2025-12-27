<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Tracker - Home</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header class="header">
        <h1 class="header__title">Home</h1>
        <p class="header__subtitle">Year: 2025</p>
    </header>

    <div class="container">
        <div class="month-grid">
            @foreach($months as $month)
            <a href="{{ route('calendar', ['year' => 2025, 'month' => $month['number']]) }}" class="month-card">
                <h2 class="month-card__name"> {{$month['name']}} </h2>
                <div class="month-card__info">
                    <div>
                        <p class="month-card__label">Expenses:</p>
                        <p class="month-card__expenses">₱0.00</p>
                    </div>
                    <div>
                        <p class="month-card__label">Profit:</p>
                        <p class="month-card__profit">₱0.00</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</body>
</html>
