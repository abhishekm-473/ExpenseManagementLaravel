{{-- resources/views/incomeTracking.blade.php --}}
@include('partials.header')
@include('partials.MasterNav')
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>OPEN Tracker — Demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" crossorigin="anonymous" />
  <style>
    :root{
      --primary-purple: #6a1b9a;
      --indigo: #4B0082;
      --secondary-purple: #e8d9f5;
      --panel-bg: #f3e5f5;
      --muted: #5c5b5bff;
    }
    body{
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      background-color: var(--secondary-purple);
      padding-bottom: 110px;
    }
    .blog-container{ max-width: 1000px; margin: 2rem auto; }
    .transactions-table thead th{ background: linear-gradient(90deg,#fff,#f8f0ff); color: var(--indigo); }
    .fab{ position: fixed; right: 24px; bottom: 24px; width: 64px; height: 64px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 28px; background: linear-gradient(135deg,var(--primary-purple),var(--indigo)); color: #fff; box-shadow: 0 6px 18px rgba(106,27,154,0.25); border: none; z-index: 2000; transition: transform .15s ease; }
    .fab:active{ transform: scale(.96); }
    .form-row-hidden{ display: none; }
    .form-row-visible{ display: table-row; animation: slideDown .22s ease; }
    @keyframes slideDown{ from { opacity: 0; transform: translateY(-6px);} to { opacity: 1; transform: translateY(0);} }
    .small-note{ font-size: .9rem; color: #666; }
  </style>
</head>
<body>

  <div class="blog-container bg-white p-4 rounded shadow-sm">

    <section class="mb-4">
      <h2 style="color:var(--primary-purple)"><i class="fas fa-users-cog me-2"></i> Track your income</h2>

      <div class="mb-2 d-flex align-items-center gap-2">
        <div class="form-check form-check-inline">
          <input class="form-check-input toggle-col" type="checkbox" id="col-note" data-col="note" checked>
          <label class="form-check-label small-note" for="col-note">Note</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input toggle-col" type="checkbox" id="col-desc" data-col="desc" checked>
          <label class="form-check-label small-note" for="col-desc">Description</label>
        </div>
        <small class="text-muted ms-auto">Click the <strong>+</strong> button to add a new row.</small>
      </div>

      <div class="table-responsive">

        @php
          // defensive default so blade never errors if controller forgot to pass $incomes
          $incomes = $incomes ?? collect();
        @endphp

        @if (session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        <table class="table table-striped transactions-table align-middle">
          <thead>
            <tr>
              <th style="width:130px">Date</th>
              <th style="width:120px">Amount</th>
              <th style="width:150px">Type</th>
              <th class="col-note">Note</th>
              <th class="col-desc">Description</th>
              <th style="width:110px">Actions</th>
            </tr>
          </thead>

          <tbody id="transactions-body">

            <!-- Hidden add-row: this row contains its own POST form (no outer form) -->
            <tr id="form-row" class="form-row-hidden">
              <td colspan="6">
                <form method="POST" action="{{ route('incomeTrackingPost') }}">
                  @csrf
                  <div class="p-3 rounded" style="background:#fff8fe; border:1px solid #f0e6fb">
                    <div class="row g-2 align-items-center">
                      <div class="col-md-2">
                        <label class="form-label small-note">Date</label>
                        <input type="date" id="inp-date" name="income_date" class="form-control form-control-sm" />
                      </div>

                      <div class="col-md-2">
                        <label class="form-label small-note">Amount</label>
                        <input type="number" id="inp-amount" name="amount" class="form-control form-control-sm" placeholder="0.00" step="0.01" />
                      </div>

                      <div class="col-md-3">
                        <label class="form-label small-note">Type</label>
                        <input type="text" id="inp-account" name="type" class="form-control form-control-sm" placeholder="cash, account etc." />
                      </div>

                      <div class="col-md-2 col-note">
                        <label class="form-label small-note">Note</label>
                        <input id="inp-note" name="note" class="form-control form-control-sm" placeholder="Short note" />
                      </div>

                      <div class="col-md-3 col-desc">
                        <label class="form-label small-note">Description</label>
                        <input id="inp-desc" name="description" class="form-control form-control-sm" placeholder="Detailed description" />
                      </div>
                    </div>

                    <div class="mt-2 d-flex gap-2 justify-content-end">
                      <button id="btn-save" class="btn btn-sm btn-success" type="submit">Add</button>
                      <button id="btn-cancel" class="btn btn-sm btn-outline-secondary" type="button">Cancel</button>
                    </div>
                  </div>
                </form>
              </td>
            </tr>

            {{-- Render stored incomes: each row has its own Delete form in Actions column --}}
            @if($incomes->count())
              @foreach($incomes as $income)
                <tr>
                  <td>{{ \Carbon\Carbon::parse($income->income_date)->format('Y-m-d') }}</td>
                  <td>{{ number_format($income->amount, 2) }}</td>
                  <td>{{ $income->type }}</td>
                  <td class="col-note">{{ $income->note }}</td>
                  <td class="col-desc">{{ $income->description }}</td>
                  <td>
                    <form method="POST" action="{{ route('income.destroy', $income->id) }}" onsubmit="return confirm('Delete this entry?');" style="display:inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="6" class="text-center small-note">No incomes found. Add one using the + button.</td>
              </tr>
            @endif

          </tbody>
        </table>
      </div>

        {{-- SECOND: last saved entry display --}}
        <div class="mt-3">
          <h5 style="color:var(--primary-purple)">Last saved entry</h5>

          @php
            $last = $lastIncome ?? session('last_income') ?? ($incomes->count() ? $incomes->first() : null);
          @endphp

          @if($last)
            <form class="p-3 rounded" style="background:#fff8fe; border:1px solid #f0e6fb">
              <div class="row g-2 align-items-center">
                <div class="col-md-2">
                  <label class="form-label small-note">Date</label>
                  <input type="date" class="form-control form-control-sm" value="{{ \Carbon\Carbon::parse($last->income_date)->format('Y-m-d') }}" disabled>
                </div>
                <div class="col-md-2">
                  <label class="form-label small-note">Amount</label>
                  <input type="text" class="form-control form-control-sm" value="{{ number_format($last->amount,2) }}" disabled>
                </div>
                <div class="col-md-3">
                  <label class="form-label small-note">Type</label>
                  <input type="text" class="form-control form-control-sm" value="{{ $last->type }}" disabled>
                </div>
                <div class="col-md-2 col-note">
                  <label class="form-label small-note">Note</label>
                  <input type="text" class="form-control form-control-sm" value="{{ $last->note }}" disabled>
                </div>
                <div class="col-md-3 col-desc">
                  <label class="form-label small-note">Description</label>
                  <input type="text" class="form-control form-control-sm" value="{{ $last->description }}" disabled>
                </div>
              </div>
            </form>
          @else
            <div class="alert alert-info small-note mt-2">No saved entry found yet. Add one using the + button.</div>
          @endif

        </div>

    </section>

    <section class="cta-section mt-4 p-3 rounded" style="background:#fff8fe; border:1px solid #f0e6fb">
      <h4 style="color:var(--muted)"><i class="fas fa-chart-line me-2"></i> Committed to Your Growth</h4>
      <p class="small-note">We're not just providing a service; we're investing in your financial future. Keep adding transactions using the + button at the bottom-right.</p>
    </section>

  </div>

  <!-- Floating Add Button -->
  <button id="fab" class="fab" title="Add transaction"><i class="fas fa-plus"></i></button>

  <script>
    const fab = document.getElementById('fab');
    const formRow = document.getElementById('form-row');
    const btnCancel = document.getElementById('btn-cancel');

    function showFormRow(){
      formRow.classList.remove('form-row-hidden');
      formRow.classList.add('form-row-visible');
      const dateInp = document.getElementById('inp-date');
      if (dateInp) dateInp.focus();
    }
    function hideFormRow(){
      formRow.classList.remove('form-row-visible');
      formRow.classList.add('form-row-hidden');
      const setEmpty = (id) => { const el = document.getElementById(id); if(el) el.value = ''; };
      setEmpty('inp-date'); setEmpty('inp-amount'); setEmpty('inp-account'); setEmpty('inp-note'); setEmpty('inp-desc');
    }

    fab.addEventListener('click', () => {
      if (formRow.classList.contains('form-row-hidden')) showFormRow();
    });

    btnCancel.addEventListener('click', (e)=>{ e.preventDefault(); hideFormRow(); });

    document.getElementById('form-row').addEventListener('keydown', (e)=>{
      // prevent accidental form submit when pressing Enter inside the hidden add-row (optional)
      if(e.key === 'Enter' && e.target && (e.target.tagName === 'INPUT')) {
        e.preventDefault();
      }
    });

    // Column toggles
    document.querySelectorAll('.toggle-col').forEach(cb => {
      cb.addEventListener('change', (ev)=>{
        const col = ev.target.dataset.col;
        const checked = ev.target.checked;
        document.querySelectorAll('.col-' + col).forEach(el => {
          el.style.display = checked ? '' : 'none';
        });
      });
    });
    document.querySelectorAll('.toggle-col').forEach(cb => cb.dispatchEvent(new Event('change')));
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
