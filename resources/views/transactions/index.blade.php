<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Tracker - {{ $date ? date('F j, Y', strtotime($date)) : 'All Transactions' }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <header class="header">
        <h1 class="header__title">{{ $date ? date('F j, Y', strtotime($date)) : 'All Transactions' }}</h1>
        <p class="header__subtitle">Daily Transactions</p>
    </header>

    <nav class="nav">
        <a href="{{ route('calendar', ['year' => $date ? date('Y', strtotime($date)) : now()->year, 'month' => $date ? date('m', strtotime($date)) : now()->format('m')]) }}" class="nav__button nav__button--secondary">
            ← Back to Calendar
        </a>
        <a href="{{ route('transactions.create') }}" class="nav__button nav__button--success">
            + Add Transaction
        </a>
    </nav>

    <div class="container">
        <div class="summary">
            <div class="summary__card">
                <p class="summary__label">Total Volume</p>
                <p class="summary__value summary__value--expense">
                    ₱{{ number_format($transactions->sum('amount'), 2) }}
                </p>
            </div>
            <div class="summary__card">
                <p class="summary__label">Total Profit</p>
                <p class="summary__value summary__value--profit">
                    ₱{{ number_format($transactions->sum('fee'), 2) }}
                </p>
            </div>
            <div class="summary__card">
                <p class="summary__label">Total Transactions</p>
                <p class="summary__value summary__value--total">
                    {{ $transactions->count() }}
                </p>
            </div>
        </div>

        <div class="daily-view">
            <table class="transaction-table">
                <thead class="transaction-table__header">
                    <tr>
                        <th class="transaction-table__header-cell">Time Period</th>
                        <th class="transaction-table__header-cell">Type</th>
                        <th class="transaction-table__header-cell">Amount</th>
                        <th class="transaction-table__header-cell">Profit</th>
                        <th class="transaction-table__header-cell">Status</th>
                        <th class="transaction-table__header-cell">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($transactions as $transaction)
                    <tr class="transaction-table__row">
                        <td class="transaction-table__cell">
                            <span class="transaction-table__time">{{ ucfirst($transaction->time_period) }}</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__type">{{ $transaction->type }}</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__amount">₱{{ number_format($transaction->amount, 2) }}</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__profit">₱{{ number_format($transaction->fee, 2) }}</span>
                        </td>

                        <td class="transaction-table__cell">
                            @php
                            $statusClass = $transaction->status === 'claimed' ? 'transaction-item__status--claimed' : 'transaction-item__status--unclaimed';
                            @endphp
                            <span class="transaction-item__status {{ $statusClass }}">
                                {{ ucfirst($transaction->status) }}
                            </span>
                        </td>

                        <td class="transaction-table__cell transaction-table__actions">
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="transaction-item__edit">
                                Edit
                            </a>

                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="transaction-item__delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 20px; color: gray;">
                            No transactions found for this day.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
