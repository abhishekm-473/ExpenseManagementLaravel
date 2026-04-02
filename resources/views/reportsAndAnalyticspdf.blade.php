<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Report {{ $month }}-{{ $year }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size:12px; }
        table { width:100%; border-collapse: collapse; margin-bottom: 15px;}
        th, td { border:1px solid #ddd; padding:6px; text-align:left; vertical-align: top; }
        th { background:#f2f2f2; }
        .summary { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Monthly Report — {{ \Carbon\Carbon::createFromDate($year, $month, 1)->format('F Y') }}</h2>

    <div class="summary">
        <strong>Total Income:</strong> {{ number_format($monthly_total_income ?? 0, 2) }} &nbsp;&nbsp;
        <strong>Total Expense:</strong> {{ number_format($monthly_total_expenses ?? 0, 2) }} &nbsp;&nbsp;
        <strong>Net:</strong> {{ number_format( ($monthly_total_income ?? 0) - ($monthly_total_expenses ?? 0), 2) }}
    </div>

    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Account</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($expenses as $e)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($e->expense_date)->format('Y-m-d') }}</td>
                    <td>{{ $e->account ?? '-' }}</td>
                    <td>{{ $e->category ?? '-' }}</td>
                    <td style="text-align:right;">{{ number_format($e->amount ?? 0, 2) }}</td>
                    <td>{{ $e->note ?? '' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div>Generated: {{ now()->toDateTimeString() }}</div>
</body>
</html>
