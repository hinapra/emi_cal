<!DOCTYPE html>
<html>
<head>
    <title>EMI Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 style="color: green">EMI Calculator(Update)</h1>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('emi.calculate') }}">
        @csrf

        <div class="mb-3">
            <label>Loan Amount</label>
            <input type="number" name="amount" value="{{ old('amount') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Select Tenure (Months)</label>
            <select name="months_id" class="form-control" required>
                <option value="">-- Select --</option>
                @foreach($months as $month)
                    <option value="{{ $month->id }}" {{ old('months_id') == $month->id ? 'selected' : '' }}>
                        {{ $month->months }} months
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Calculate EMI</button>
    </form>
</div>
</body>
</html>
