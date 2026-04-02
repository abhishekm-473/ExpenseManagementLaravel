<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Approval</title>

    <style>
        body { font-family: Arial; margin: 40px; }
        textarea { width: 100%; height: 120px; }
        .status { margin-bottom: 15px; font-weight: bold; }
        .approved { color: green; }
        .rejected { color: red; }
        .pending { color: orange; }
    </style>
</head>
<body>

<h2>Query Approval</h2>

<div>
    <strong>Target Table:</strong> {{ $query->target_table }}<br>
    <strong>Operation:</strong> {{ $query->operation }}<br>
    <strong>Description:</strong> {{ $query->description }}<br>
</div>

<hr>

<h3>Approval Status</h3>

@foreach($allApprovals as $a)
    <div class="status">
        {{ ucfirst($a->approval_stage) }} :
        @if($a->action === 'approved')
            <span class="approved">Approved</span>
        @elseif($a->action === 'rejected')
            <span class="rejected">Rejected</span>
        @else
            <span class="pending">Pending</span>
        @endif
    </div>
@endforeach

<hr>

@if(session('status'))
    <p class="approved">{{ session('status') }}</p>
@endif

@if($approval->action === null)
<form method="POST">
    @csrf

    <label>
        <input type="radio" name="action" value="approved" required>
        {{ $approval->approval_stage === 'checker' ? 'Verify' : 'Approve' }}
    </label>

    <br><br>

    <label>
        <input type="radio" name="action" value="rejected" required>
        Reject
    </label>

    <br><br>

    <textarea name="reason" placeholder="Rejection reason (required if rejecting)"></textarea>

    <br><br>

    <button type="submit">Submit</button>
</form>
@else
    <p>This approval link has already been used.</p>
@endif

</body>
</html>
