@extends('components.admin.main')
@section('main-container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h3>Bank Details</h3>
        <table>
            @foreach ($data as $item)
            <tr>
                <th>Bank Name</th>
                <td>{{ $item->bank_name }}</td>
            </tr>
            <tr>
                <th>Account Holder</th>
                <td>{{ $item->name }}</td>
            </tr>
            <tr>
                <th>Account Number</th>
                <td>{{ $item->account }}</td>
            </tr>
            <tr>
                <th>Mobile Number</th>
                <td>{{ $item->mobile }}</td>
            </tr>
            <tr>
                <th>Bank Branch Name</th>
                <td>{{ $item->branch}}</td>

            </tr>
            <tr>
                <th>IFSC</th>
                <td>{{ $item->ifsc }}</td>
            </tr>
            {{-- <tr>
                <th>Routing Number</th>
                <td>{{ $item->mobile }}</td>
            </tr> --}}

            @endforeach
        </table>
    </div>
</body>
</html>

@endsection()
