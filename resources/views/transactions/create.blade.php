<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Tracker - Add Transaction</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header class="header">
        <h1 class="header__title">Add New Transaction</h1>
    </header>

    <nav class="nav">
        <a href="daily-view-a.html" class="nav__button nav__button--secondary">← Back to Daily View</a>
    </nav>

    <div class="container">
        <form action="{{route('transactions.store')}}" method="POST" class="form">
            @csrf
            <h2 class="form__title">Transaction Details</h2>

            <div class="form__group">
                <label for="date" class="form__label">Date</label>
                <input type="date" id="date" name="date" class="form__input" required value="2025-01-15">
            </div>

            <div class="form__group">
                <label for="time_period" class="form__label">Time Period</label>
                <select id="time_period" name="time_period" class="form__select" required>
                    <option value="">Select Time Period</option>
                    <option value="morning">Morning</option>
                    <option value="afternoon">Afternoon</option>
                    <option value="evening">Evening</option>
                </select>
            </div>

            <div class="form__group">
                <label for="type" class="form__label">Transaction Type</label>
                <select id="type" name="type" class="form__select" required>
                    <option value="">Select Type</option>
                    <option value="cash_in">Cash In</option>
                    <option value="cash_out">Cash Out</option>
                </select>
            </div>

            <div class="form__group">
                <label for="amount" class="form__label">Amount (₱)</label>
                <input type="number" id="amount" name="amount" class="form__input" placeholder="0.00" step="0.01" min="0" required>
                <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">
                    Profit will be calculated automatically based on amount
                </small>
            </div>

            <div class="form__group">
                <label class="form__label">Status</label>
                <div class="form__radio-group">
                    <label class="form__radio-label">
                        <input type="radio" name="status" value="claimed" class="form__radio" checked>
                        <span>Claimed</span>
                    </label>
                    <label class="form__radio-label">
                        <input type="radio" name="status" value="unclaimed" class="form__radio">
                        <span>Unclaimed</span>
                    </label>
                </div>
            </div>

            <div class="form__actions">
                <button type="submit" class="form__submit">Add Transaction</button>
                <a href="daily-view-a.html" class="form__cancel">Cancel</a>
            </div>
        </form>
    </div>
</body>
</html>
