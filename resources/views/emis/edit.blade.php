@extends('admin.partials.app')
@section('content')
<div class="container">
    <h2>Edit EMI Rule</h2>
    <form action="{{ route('emis.update', $emi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label>Min Amount</label>
                    <input type="number" name="min_amount" value="{{ $emi->min_amount }}" class="form-control" required />
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label>Max Amount</label>
                    <input type="number" name="max_amount" value="{{ $emi->max_amount }}" class="form-control" required />
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label>Months</label>
                    <select name="months_id" class="form-control" required>
                        @foreach($months as $month)
                            <option value="{{ $month->id }}" {{ $month->id == $emi->months_id ? 'selected' : '' }}>{{ $month->months }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label>Interest Rate (%)</label>
                    <input type="number" step="0.01" name="interest_rate" value="{{ $emi->interest_rate }}" class="form-control" required />
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
