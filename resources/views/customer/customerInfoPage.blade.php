<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Status</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 600px;
        margin: 100px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        color: #333;
        text-align: center;
        font-size: 40px;
    }
    .status-container {
        margin-top: 20px;
    }
    .status {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
        text-align: center;
    }
    .status .info {
        flex: 1;
    }
    .status .info h3 {
        margin: 0;
        color: #333;
        font-size: 24px;
    }
    .status .info p {
        margin: 5px 0 0;
        color: #666;
        font-size: 18px;
    }
    .status .badge {
        padding: 10px 20px;
        border-radius: 10px;
        color: #fff;
        font-size: 20px;
        font-weight: bold;
    }
    .status .badge.pending {
        font-size: 50px;
        background-color: #4c14e7a7;
    }
    .status .badge.completed {
        font-size: 50px;
        background-color: #28a745;
    }
    .status .badge.failed {
        font-size: 50px;
        background-color: #dc3545;
    }
</style>
</head>
<body>

<div class="container">
    <h1>Customer Status For {{ $user->name }}</h1>
    <div class="status-container">
        <div class="status">
            <div class="info">
                @if ($user->status == 'call')
                    <div class="badge completed">{{ $user->status }}</div>
                @elseif ($user->status == 'visit')
                    <div class="badge pending">{{ $user->status }}</div>
                @else
                    <div class="badge failed">{{ $user->status }}</div>
                @endif
            </div>           
        </div>
    </div>
</div>

</body>
</html>
