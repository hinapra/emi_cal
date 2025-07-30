@extends('admin.partials.app')
@section('content')

<div class="container">
    <h2>EMI Rules List</h2>
    <a href="{{ route('emis.create') }}" class="btn btn-success mb-3">Add New EMI Rule</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Min Amount</th>
                <th>Max Amount</th>
                <th>Months</th>
                <th>Interest Rate (%)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emis as $emi)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $emi->min_amount }}</td>
                    <td>{{ $emi->max_amount }}</td>
<td>{{ $emi->month?->months ?? 'N/A' }}</td>
                    <td>{{ $emi->interest_rate }}</td>
                    <td>
                        <a href="{{ route('emis.edit', $emi->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('emis.destroy', $emi->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection