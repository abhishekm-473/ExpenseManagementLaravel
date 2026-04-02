@include('partials.header')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Budget Submission</title>

    @include('partials.header')
    

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        :root {
            --primary-purple: #6a1b9a;
            --secondary-lavender: #f3e5f5;
            --accent-indigo: #4B0082;   
            --light-background: #fdfdfd; 
            --input-focus: #9e64c2;     
            

            --status-safe: #d4edda;     
            --status-warn: #fff3cd;     
            --status-danger: #f8d7da;   
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--secondary-lavender); 
            min-height: 100vh;
        }
        .main-container {
            max-width: 700px;
        }
        .text-primary-purple {
            color: var(--primary-purple) !important;
        }
        .btn-accent {
            background-color: var(--accent-indigo);
            border-color: var(--accent-indigo);
            transition: all 0.2s ease-in-out;
        }
        .btn-accent:hover {
            background-color: var(--primary-purple);
            border-color: var(--primary-purple);
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-budget {
            background-color: var(--light-background);
            border: 2px solid var(--primary-purple);
        }
        .form-control:focus {
            border-color: var(--input-focus);
            box-shadow: 0 0 0 0.25rem rgba(106, 27, 154, 0.25); 
        }
        .input-group-text {
            background-color: var(--primary-purple);
            color: white;
            border-color: var(--primary-purple);
        }

        /* Message Box Centering */
        .message-box {
            position: fixed;
            top: 50%;        
            left: 50%;       
            transform: translate(-50%, -50%); 
            z-index: 1050;
            display: none;
            min-width: 300px;
            max-width: 80%;
            text-align: center; 
        }
        
        /* Visual Indicator Classes */
        .budget-safe { background-color: var(--status-safe) !important; }
        .budget-warn { background-color: var(--status-warn) !important; }
        .budget-danger { background-color: var(--status-danger) !important; }

        .monthly-budget-card {
            border: 1px dashed var(--primary-purple);
            padding: 15px;
            margin-bottom: 30px;
            background-color: var(--secondary-lavender);
        }
    </style>
</head>

<body>
    <!-- Include your main navigation component -->
    @include ('partials.MasterNav');


    <div class="container main-container mt-5 mb-5">

        <header class="text-center mb-4">
            <h1 class="text-primary-purple fw-light">Daily Budget Submission</h1>
            <p class="lead text-muted">Set your monthly targets and log today's planned expenses.</p>
        </header>

        <div class="card card-budget shadow-lg rounded-4 p-4 p-md-5">
            <form id="budget-form" method="POST" action="{{ route('budgetsCategoriesIndexPost') }}">
            @csrf
                <div id="status-message" class="alert alert-success message-box rounded-3" role="alert">
                    <span id="message-text"></span>
                </div>

                <!-- 1. MONTHLY BUDGET TARGETS SECTION -->
                <h3 class="text-primary-purple mb-3 fs-5">🎯 Monthly Budget Targets</h3>
                <div class="monthly-budget-card rounded-3">
                    <p class="text-muted small mb-3">Set your goal limits. Daily inputs will be compared against these targets (Monthly Target / 30 days).</p>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="monthlyFood" class="form-label text-primary-purple fw-semibold small">Food (₹)</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" id="monthlyFood" name="monthly_food_budget" min="0" step="1" value="15000" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monthlyTransport" class="form-label text-primary-purple fw-semibold small">Transport (₹)</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" id="monthlyTransport" name="monthly_transport_budget" min="0" step="1" value="3000" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monthlyEntertainment" class="form-label text-primary-purple fw-semibold small">Entertainment (₹)</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" id="monthlyEntertainment" name="monthly_entertainment_budget" min="0" step="1" value="4500" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="monthlyBills" class="form-label text-primary-purple fw-semibold small">Bills/Utilities (₹)</label>
                            <div class="input-group">
                                <span class="input-group-text">₹</span>
                                <input type="number" id="monthlyBills" name="monthly_bills_budget" min="0" step="1" value="6000" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 2. DAILY EXPENSE INPUTS (with Live Indicators) -->
                <h3 class="text-primary-purple mb-4 fs-5">📅 Daily Planned Expenses</h3>

                <div class="mb-4">
                    <label for="food" class="form-label text-primary-purple fw-semibold">Food Budget (₹)</label>
                    <p class="text-muted small m-0">Daily average target: ₹<span id="daily-target-food">500.00</span></p>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" id="food" name="daily_food_budget" min="0" step="1" placeholder="e.g., 500.00" class="form-control">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="transport" class="form-label text-primary-purple fw-semibold">Transport Budget (₹)</label>
                    <p class="text-muted small m-0">Daily average target: ₹<span id="daily-target-transport">100.00</span></p>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" id="transport" name="daily_transport_budget" min="0" step="1" placeholder="e.g., 150.00" class="form-control">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="entertainment" class="form-label text-primary-purple fw-semibold">Entertainment Budget (₹)</label>
                    <p class="text-muted small m-0">Daily average target: ₹<span id="daily-target-entertainment">150.00</span></p>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" id="entertainment" name="daily_entertainment_budget" min="0" step="1" placeholder="e.g., 300.00" class="form-control">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="bills" class="form-label text-primary-purple fw-semibold">Bills/Utilities (₹)</label>
                    <p class="text-muted small m-0">Daily average target: ₹<span id="daily-target-bills">200.00</span></p>
                    <div class="input-group">
                        <span class="input-group-text">₹</span>
                        <input type="number" id="bills" name="daily_bills_budget" min="0" step="1" placeholder="e.g., 200.00" class="form-control">
                    </div>
                </div>

                <div class="d-grid mt-5">
                    <button type="submit" class="btn btn-accent btn-lg text-white shadow-md">
                        <span id="submit-text">Submit Daily Budget</span>
                        <span id="loading-spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        const form = document.getElementById('budget-form');
        const submitButton = form.querySelector('button[type="submit"]');
        const submitText = document.getElementById('submit-text');
        const loadingSpinner = document.getElementById('loading-spinner');
        const statusMessage = document.getElementById('status-message');
        const messageText = document.getElementById('message-text');

        // Configuration for all budget fields
        const budgetFields = [
            { name: 'food', dailyId: 'food', monthlyId: 'monthlyFood', targetDisplayId: 'daily-target-food' },
            { name: 'transport', dailyId: 'transport', monthlyId: 'monthlyTransport', targetDisplayId: 'daily-target-transport' },
            { name: 'entertainment', dailyId: 'entertainment', monthlyId: 'monthlyEntertainment', targetDisplayId: 'daily-target-entertainment' },
            { name: 'bills', dailyId: 'bills', monthlyId: 'monthlyBills', targetDisplayId: 'daily-target-bills' }
        ];

        // Function to update the visual indicator of an input field and the daily target display
        function updateIndicator(fieldConfig) {
            const dailyInput = document.getElementById(fieldConfig.dailyId);
            const monthlyInput = document.getElementById(fieldConfig.monthlyId);
            const targetDisplay = document.getElementById(fieldConfig.targetDisplayId);

            const dailyValue = parseFloat(dailyInput.value) || 0;
            const monthlyTarget = parseFloat(monthlyInput.value) || 0;
            const dailyTarget = monthlyTarget > 0 ? monthlyTarget / 30 : 0; 
            
            // Update the displayed daily target
            targetDisplay.textContent = dailyTarget.toFixed(2);

            // Clear previous states
            dailyInput.classList.remove('budget-safe', 'budget-warn', 'budget-danger');

            if (dailyValue === 0) {
                return; // Keep background white if input is empty/zero
            }

            if (dailyTarget === 0) {
                // If no monthly target is set, we can't judge status
                return;
            }

            if (dailyValue > dailyTarget * 1.2) { // More than 20% over target
                dailyInput.classList.add('budget-danger');
            } else if (dailyValue > dailyTarget * 0.9) { // Approaching or slightly over target (90% - 120%)
                dailyInput.classList.add('budget-warn');
            } else { // Below 90% of target
                dailyInput.classList.add('budget-safe');
            }
        }
        
        // Function to display temporary feedback message
        function showMessage(text, isSuccess = true) {
            statusMessage.classList.remove('alert-success', 'alert-danger');
            statusMessage.classList.add(isSuccess ? 'alert-success' : 'alert-danger');
            messageText.textContent = text;
            statusMessage.style.display = 'block';

            // Hide the message after 5 seconds
            setTimeout(() => {
                statusMessage.style.display = 'none';
            }, 5000);
        }
        
        // Initialize indicators and add live listeners
        budgetFields.forEach(field => {
            const dailyInput = document.getElementById(field.dailyId);
            const monthlyInput = document.getElementById(field.monthlyId);

            // Run on load to set initial daily target display
            updateIndicator(field);

            // Live update listeners
            dailyInput.addEventListener('input', () => updateIndicator(field));
            monthlyInput.addEventListener('input', () => updateIndicator(field));
        });


        // Handle form submission
        

            // 🌟 CUSTOM VALIDATION: Check if at least ONE field has a positive value
            const totalBudget = dailyData.food + dailyData.transport + dailyData.entertainment + dailyData.bills;

            if (totalBudget <= 0) {
                showMessage('Please enter a budget amount (greater than zero) for at least one category.', false);
                return; 
            }
            // 🌟 END CUSTOM VALIDATION

            // Display loading state
            submitText.textContent = 'Submitting...';
            loadingSpinner.style.display = 'inline-block';
            submitButton.disabled = true;

            // Include monthly targets in formData
            const monthlyData = {
                monthlyFood: parseFloat(document.getElementById('monthlyFood').value) || 0,
                monthlyTransport: parseFloat(document.getElementById('monthlyTransport').value) || 0,
                monthlyEntertainment: parseFloat(document.getElementById('monthlyEntertainment').value) || 0,
                monthlyBills: parseFloat(document.getElementById('monthlyBills').value) || 0,
            };

            const formData = {...dailyData, ...monthlyData};
            
            // SIMULATE POST REQUEST
            // In a real Laravel app, this would be a route like '/api/submit-budget'
            const mockApiUrl = 'https://jsonplaceholder.typicode.com/posts'; 
            
            try {
                const response = await fetch(mockApiUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        // IMPORTANT: For Laravel, you would include your CSRF token here
                        // 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    const result = await response.json();
                    console.log('Submission successful:', result);
                    showMessage(`Success! Budget data submitted (Total: ₹${totalBudget.toFixed(2)}).`);
                } else {
                    showMessage(`Error: Server responded with status ${response.status}.`, false);
                }

            } catch (error) {
                console.error('Submission failed:', error);
                showMessage('Error: Failed to connect to server.', false);
            } finally {
                // Reset button state
                submitText.textContent = 'Submit Daily Budget';
                loadingSpinner.style.display = 'none';
                submitButton.disabled = false;
            };
    </script>
</body>
</html>