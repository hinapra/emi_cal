@extends('admin.partials.app')
@section('content')
<div class="container">
    <div class="page-inner">

    <h2>Create EMI Rule</h2>
    <form action="{{ route('emis.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label>Min Amount</label>
                    <input type="number" name="min_amount" class="form-control" required />
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label>Max Amount</label>
                    <input type="number" name="max_amount" class="form-control" required />
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label>Months</label>
                    <select name="months_id" class="form-control" required>
                        <option value="">Select Option</option>
                        @foreach($months as $month)
                            <option value="{{ $month->id }}">{{ $month->months }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label>Interest Rate (%)</label>
                    <input type="number" step="0.01" name="interest_rate" class="form-control" required />
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</div>
@endsection
