<!DOCTYPE html>
<html>
<head>
    <title>EMI Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>EMI Calculation Result</h2>

    <p><strong>Loan Amount:</strong> ₹{{ number_format($amount, 2) }}</p>
    <p><strong>Tenure:</strong> {{ $n }} months</p>
    <p><strong>Interest Rate:</strong> {{ $emiRule->interest_rate }}%</p>
    <hr>
    <p><strong>Monthly EMI:</strong> ₹{{ number_format($emi, 2) }}</p>
    <p><strong>Total Payable Amount:</strong> ₹{{ number_format($total, 2) }}</p>

    <a href="{{ route('emi.calculator') }}" class="btn btn-secondary mt-3">Try Again</a>
</div>
</body>
</html>
