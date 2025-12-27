<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Tracker - {{ date('F Y', mktime(0, 0, 0, $month, 1, $year)) }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="header__title">{{ date('F Y', mktime(0, 0, 0, $month, 1, $year)) }}</h1>
    </header>

    <nav class="nav">
        <a href="{{ route('dashboard') }}" class="nav__button nav__button--secondary">← Back to Home</a>
    </nav>

    <div class="container">
        <div class="calendar">
            <div class="calendar__grid">

                @foreach($days as $day)
                <a href="{{ route('transactions.index', ['date' => $day['date']]) }}" class="calendar__day">

                    <span class="calendar__day-number">{{ $day['number'] }}</span>

                    <div class="calendar__day-info">
                        <p class="calendar__day-expenses">Expenses: ₱{{ number_format($day['expenses'], 2) }}</p>
                        <p class="calendar__day-profit">Profit: ₱{{ number_format($day['profit'], 2) }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
