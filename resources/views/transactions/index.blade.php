<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCash Tracker - January 15, 2025</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
    <header class="header">
        <h1 class="header__title">January 15, 2025</h1>
        <p class="header__subtitle">Daily Transactions - Version B (Table Format)</p>
    </header>

    <nav class="nav">
        <a href="{{route('calendar', ['year' => now()->year, 'month' => now()->format('m')])}}" class="nav__button nav__button--secondary">← Back to Calendar</a>
        <a href="{{route('transactions.create')}}" class="nav__button nav__button--success">+ Add Transaction</a>
    </nav>

    <div class="container">
        <div class="summary">
            <div class="summary__card">
                <p class="summary__label">Total Expenses</p>
                <p class="summary__value summary__value--expense">₱0.00</p>
            </div>
            <div class="summary__card">
                <p class="summary__label">Total Profit</p>
                <p class="summary__value summary__value--profit">₱0.00</p>
            </div>
            <div class="summary__card">
                <p class="summary__label">Total Transactions</p>
                <p class="summary__value summary__value--total">0</p>
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
                    <!-- Example transaction rows - remove when converting to Laravel -->
                    <tr class="transaction-table__row">
                        <td class="transaction-table__cell">
                            <span class="transaction-table__time">Morning</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__type">Cash In</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__amount">₱500.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__profit">₱20.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-item__status transaction-item__status--claimed">Claimed</span>
                        </td>
                        <td class="transaction-table__cell">
                            <div class="transaction-table__actions">
                                <a href="edit-transaction.html" class="transaction-item__edit">Edit</a>
                                <form action="#" method="POST" style="display: inline;">
                                    <button type="submit" class="transaction-item__delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <tr class="transaction-table__row">
                        <td class="transaction-table__cell">
                            <span class="transaction-table__time">Morning</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__type">Cash Out</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__amount">₱1,000.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__profit">₱20.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-item__status transaction-item__status--claimed">Claimed</span>
                        </td>
                        <td class="transaction-table__cell">
                            <div class="transaction-table__actions">
                                <a href="edit-transaction.html" class="transaction-item__edit">Edit</a>
                                <form action="#" method="POST" style="display: inline;">
                                    <button type="submit" class="transaction-item__delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <tr class="transaction-table__row">
                        <td class="transaction-table__cell">
                            <span class="transaction-table__time">Afternoon</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__type">Cash In</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__amount">₱1,500.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__profit">₱30.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-item__status transaction-item__status--unclaimed">Unclaimed</span>
                        </td>
                        <td class="transaction-table__cell">
                            <div class="transaction-table__actions">
                                <a href="edit-transaction.html" class="transaction-item__edit">Edit</a>
                                <form action="#" method="POST" style="display: inline;">
                                    <button type="submit" class="transaction-item__delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <tr class="transaction-table__row">
                        <td class="transaction-table__cell">
                            <span class="transaction-table__time">Afternoon</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__type">Cash Out</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__amount">₱2,500.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__profit">₱50.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-item__status transaction-item__status--claimed">Claimed</span>
                        </td>
                        <td class="transaction-table__cell">
                            <div class="transaction-table__actions">
                                <a href="edit-transaction.html" class="transaction-item__edit">Edit</a>
                                <form action="#" method="POST" style="display: inline;">
                                    <button type="submit" class="transaction-item__delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>

                    <tr class="transaction-table__row">
                        <td class="transaction-table__cell">
                            <span class="transaction-table__time">Evening</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__type">Cash In</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__amount">₱800.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-table__profit">₱20.00</span>
                        </td>
                        <td class="transaction-table__cell">
                            <span class="transaction-item__status transaction-item__status--unclaimed">Unclaimed</span>
                        </td>
                        <td class="transaction-table__cell">
                            <div class="transaction-table__actions">
                                <a href="edit-transaction.html" class="transaction-item__edit">Edit</a>
                                <form action="#" method="POST" style="display: inline;">
                                    <button type="submit" class="transaction-item__delete">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Empty state - show when no transactions -->
            <!-- <div class="empty-state">
                <p class="empty-state__text">No transactions recorded for this day</p>
                <a href="add-transaction.html" class="nav__button nav__button--success">+ Add First Transaction</a>
            </div> -->
        </div>
    </div>
</body>
</html>