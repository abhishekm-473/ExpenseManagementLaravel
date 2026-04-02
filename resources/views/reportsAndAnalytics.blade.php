@include('partials.header')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reports & Analytics</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-purple: #6a1b9a;
            --secondary-lavender: #f3e5f5;
            --accent-indigo: #4B0082;
            --card-bg: #ffffff;
        }

        body {
            background-color: var(--secondary-lavender);
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }

        .text-primary-purple {
            color: var(--primary-purple) !important;
        }

        .card-custom {
            border: 2px solid var(--primary-purple);
            background: var(--card-bg);
            border-radius: 12px;
        }

        .btn-accent {
            background-color: var(--accent-indigo);
            border-color: var(--accent-indigo);
        }

        .btn-accent:hover {
            background-color: var(--primary-purple);
            border-color: var(--primary-purple);
        }
    </style>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    @include('partials.MasterNav')

    <div class="container mt-5 mb-5">
        <header class="text-center mb-4">
            <h1 class="text-primary-purple fw-light">📊 Reports & Analytics</h1>
            <p class="lead text-muted">View your monthly totals, category insights, and spending habits.</p>
        </header>

        <!-- SUMMARY CARDS (DYNAMIC) -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card card-custom p-4 shadow-sm">
                    <h6 class="text-muted">Total Expenses</h6>
                    <h2 class="text-primary-purple">₹{{ number_format($monthly_total_expense ?? 0, 2) }}</h2>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card card-custom p-4 shadow-sm">
                    <h6 class="text-muted">Total Income</h6>
                    <h2 class="text-primary-purple">₹{{ number_format($monthly_total_income ?? 0, 2) }}</h2>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="card card-custom p-4 shadow-sm">
                    <h6 class="text-muted">Net Balance</h6>
                    <h2 class="text-success">₹{{ number_format( ($monthly_total_income ?? 0) - ($monthly_total_expense ?? 0), 2) }}</h2>
                </div>
            </div>
        </div>

        <!-- EXPORT BUTTONS -->
        <div class="d-flex justify-content-end mb-4">
            <a href="/reports/export-csv" class="btn btn-outline-primary me-2">⬇ Export CSV</a>
        </div>

        <!-- CHART ROW -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card card-custom p-4 shadow-sm">
                    <h5 class="text-primary-purple mb-3">📌 Expense Breakdown (Category)</h5>
                    <canvas id="categoryChart" height="250"></canvas>
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <div class="card card-custom p-4 shadow-sm">
                    <h5 class="text-primary-purple mb-3">📈 Income vs Expenses</h5>
                    <canvas id="compareChart" height="250"></canvas>
                </div>
            </div>
        </div>

    <!-- CHART JS SCRIPT -->
    <script>
        const rawCategory = @json($category_breakdown);
        const categoryLabels = rawCategory.map(c => c.category ?? c.Category ?? '');
        const categoryValues = rawCategory.map(c => (c.total ?? c.Total ?? 0) + 0);

        new Chart(document.getElementById('categoryChart'), {
            type: 'pie',
            data: {
                labels: categoryLabels,
                datasets: [{
                    data: categoryValues
                }]
            }
        });

        const monthlyIncome = Number(@json($monthly_total_income ?? 0));
        const monthlyExpenses = Number(@json($monthly_total_expense ?? 0));

        new Chart(document.getElementById('compareChart'), {
            type: 'bar',
            data: {
                labels: ['Income', 'Expenses'],
                datasets: [{
                    label: 'Amount',
                    data: [monthlyIncome, monthlyExpenses]
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>
