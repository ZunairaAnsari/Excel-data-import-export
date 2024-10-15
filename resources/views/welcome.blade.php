@extends('layouts.layout')

@section('content')

<div class="container mt-5">
    <h2 class="text-center mb-4">Users List</h2>
   
    <a href="{{ route('users.export') }}" class="btn btn-sm btn-lavender export-btn">
        <i class="fas fa-download"></i> Export User List to Excel Sheet
    </a>
                   
    <table class="table custom-table">
        <thead class="thead-custom">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-lavender edit-btn">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-lavender delete-btn" onclick="return confirm('Are you sure you want to delete this user?');">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- <div class="d-flex justify-content-center">
        {{ $users->links() }} <!-- This will render the pagination links -->
    </div> --}}

    <div class="container mt-4">
        <div class="d-flex justify-content-center">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>
    </div>


    <style>

        /* Custom pagination styles */
    .page-link {
        color: rgb(0, 0, 0); /* Default link color */
        border: 1px solid rgb(200, 200, 245); /* Lavender border for each page link */
        background-color: transparent; /* Transparent background */
        transition: all 0.3s ease; /* Smooth transition for hover effects */
    }
    
    .page-item.active .page-link {
        background-color: rgb(200, 200, 245); /* Lavender background for active page */
        color: rgb(0, 0, 0); /* White text for active page */
        border-color: lavender; /* Lavender border for active page */
    }
    
    .page-link:hover {
        background-color: #e6e6fa; /* Light lavender on hover */
        color: black; /* Black text on hover */
    }
    
    .page-item.disabled .page-link {
        color: #ccc; /* Gray for disabled page items */
        background-color: transparent; /* Transparent background */
    }

.pagination {
    font-family: 'Arial', sans-serif; /* Set custom font */
    font-size: 16px; /* Set font size */
}

        /* Ensures borders collapse between table cells */
        .custom-table {
            border-collapse: collapse !important; /* Important to override Bootstrap */
            width: 100%; /* Full width of table */
        }

        /* Custom styles for table headings */
        .thead-custom {
            background-color: lavender; /* Lavender background for headings */
            color: black; /* Text color for headings */
            border-top-left-radius: 20px !important; /* Rounded corners */
            border-top-right-radius: 20px !important; /* Rounded corners */
        }

        /* Custom styles for table rows */
        tbody tr {
            background-color: white; /* White background for rows */
        }

        /* Hover effect for table rows */
        tbody tr:hover {
            background-color: lavender; /* Enhanced hover color */
        }

        /* Custom styles for buttons */
        .btn-lavender {
            background-color: lavender;
            color: black; 
            border: none; 
            transition: color 0.3s; 
        }

        .btn-lavender:hover {
            background-color: #e6e6fa; 
        }

        .export-btn{
            background-color: lavender;
            color: black; 
            border: none; 
            transition: color 0.3s;
            margin: 10px;
           
        }

        /* Change button color to white on row hover */
        tbody tr:hover .edit-btn,
        tbody tr:hover .delete-btn,
        tbody tr:hover .export-btn{
            background-color: white; 
            color: black; 
        }


        .table th, .table td {
            vertical-align: middle; /* Center-align content vertically */
            text-align: center; /* Center-align text */
            font-family: 'Arial', sans-serif; /* Change font style */
            font-size: 16px; /* Change font size */
        }
    </style>
        <!-- Include Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</div>

@endsection
