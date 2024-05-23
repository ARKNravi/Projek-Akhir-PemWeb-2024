<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <p>Total Orders: {{ $totalOrders }}</p>
    <p>Processing Orders: {{ $processingOrders }}</p>
    <p>Completed Orders: {{ $completedOrders }}</p>
    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
