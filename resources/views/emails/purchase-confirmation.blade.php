<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Confirmation</title>
</head>
<body>
    <h1>Dear {{ $userName }},</h1>

<p>Thank you for your purchase! Here are the details of your order:</p>

<ul>
    @foreach ($purchasedItems as $item)
        <li>{{ $item['name'] }} - Quantity: {{ $item['quantity'] }} - Price: ${{ number_format($item['price'], 2) }}</li>
    @endforeach
</ul>

    <p>Total Amount: ${{ number_format($totalAmount, 2) }}</p>

<p>Thank you for shopping with us!</p>
</body>
</html>
