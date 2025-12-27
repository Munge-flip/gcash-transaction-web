<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Tracker - Edit Transaction</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header class="header">
        <h1 class="header__title">Edit Transaction</h1>
    </header>

    <nav class="nav">
        <a href="{{ route('transactions.index', ['date' => $transaction->date]) }}" class="nav__button nav__button--secondary">← Back to Daily View</a>
    </nav>

    <div class="container">
        <form action="{{route('transactions.update', $transaction->id)}}" method="POST" class="form">
            @csrf
            @method('PUT')

            <h2 class="form__title">Update Transaction Details</h2>

            <div class="form__group">
                <label for="date" class="form__label">Date</label>
                <input type="date" id="date" name="date" class="form__input" required value="{{ old('date', $transaction->date) }}">
            </div>

            <div class="form__group">
                <label for="time_period" class="form__label">Time Period</label>
                <select id="time_period" name="time_period" class="form__select" required>
                    <option value="">Select Time Period</option>
                    <option value="morning" {{ old('time_period', $transaction->time_period) == 'morning' ? 'selected' : '' }}>Morning</option>
                    <option value="afternoon" {{ old('time_period', $transaction->time_period) == 'afternoon' ? 'selected' : '' }}>Afternoon</option>
                    <option value="evening" {{ old('time_period', $transaction->time_period) == 'evening' ? 'selected' : '' }}>Evening</option>
                </select>
            </div>

            <div class="form__group">
                <label for="type" class="form__label">Transaction Type</label>
                <select id="type" name="type" class="form__select" required>
                    <option value="">Select Type</option>
                    <option value="cash_in" {{ old('type', $transaction->type) == 'cash_in' ? 'selected' : '' }}>Cash In</option>
                    <option value="cash_out" {{ old('type', $transaction->type) == 'cash_out' ? 'selected' : '' }}>Cash Out</option>
                </select>
            </div>

            <div class="form__group">
                <label for="amount" class="form__label">Amount (₱)</label>
                <input type="number" id="amount" name="amount" class="form__input" placeholder="0.00" step="0.01" min="0" required value="{{ old('amount', $transaction->amount) }}">
                <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">
                    Profit will be recalculated automatically based on amount
                </small>
            </div>

            <div class="form__group">
                <label class="form__label">Status</label>
                <div class="form__radio-group">
                    <label class="form__radio-label">
                        <input type="radio" name="status" value="claimed" class="form__radio" {{ old('status', $transaction->status) == 'claimed' ? 'checked' : '' }}>
                        <span>Claimed</span>
                    </label>
                    <label class="form__radio-label">
                        <input type="radio" name="status" value="unclaimed" class="form__radio" {{ old('status', $transaction->status) == 'unclaimed' ? 'checked' : '' }}>
                        <span>Unclaimed</span>
                    </label>
                </div>
            </div>

            <div class="form__actions">
                <button type="submit" class="form__submit">Update Transaction</button>
                <a href="{{ route('transactions.index', ['date' => $transaction->date]) }}" class="form__cancel">Cancel</a>
            </div>
        </form>

        <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="margin-top: 30px; text-align: center;" onsubmit="return confirm('Are you sure? This cannot be undone.');">
            @csrf
            @method('DELETE')
            <button type="submit" class="nav__button nav__button--danger">Delete Transaction</button>
        </form>
    </div>
</body>
</html>
