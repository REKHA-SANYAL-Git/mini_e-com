<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333; margin: 0; padding: 0; box-sizing: border-box;">
    <div style="width: 90%; max-width: 1200px; margin: 2rem auto; padding: 1rem; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <h1 style="margin-bottom: 1rem; color: #007bff; font-size: 2rem; border-bottom: 2px solid #007bff; padding-bottom: 0.5rem;">Orders</h1>

        <!-- Check if there are orders -->
        @if ($orders->isEmpty())
            <p style="font-size: 1.125rem; color: #666;">No orders found.</p>
        @else
            <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
                <thead style="background-color: #007bff; color: #fff;">
                    <tr>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: left;">ID</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: left;">Customer Name</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: left;">Product</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: left;">Quantity</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: left;">Total Price</th>
                        <th style="padding: 0.75rem; border: 1px solid #ddd; text-align: left;">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr style="background-color: #fff;">
                            <td style="padding: 0.75rem; border: 1px solid #ddd;">{{ $order->id }}</td>
                            <td style="padding: 0.75rem; border: 1px solid #ddd;">{{ $order->customer->username }}</td> <!-- Or any other customer field -->
                            <td style="padding: 0.75rem; border: 1px solid #ddd;">{{ $order->product->name }}</td> <!-- Or any other product field -->
                            <td style="padding: 0.75rem; border: 1px solid #ddd;">{{ $order->quantity }}</td>
                            <td style="padding: 0.75rem; border: 1px solid #ddd;">${{ number_format($order->total_price, 2) }}</td>
                            <td style="padding: 0.75rem; border: 1px solid #ddd;">{{ $order->created_at->format('d-m-Y H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</body>
</html>
