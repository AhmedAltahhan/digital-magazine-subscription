<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subscription Report</title>
</head>
<body>
    <h2>Subscription:</h2>
    <table>
        <tr>
            <th>#</th>
            <th>user</th>
            <th>magazine</th>
            <th>start date</th>
            <th>end date</th>
        </tr>
        @foreach ($active_subscriptions as $active_subscription)
            <tr>
                <td>{{$active_subscription->id}}</td>
                <td>{{$active_subscription->user->name}}</td>
                <td>{{$active_subscription->magazine->name}}</td>
                <td>{{$active_subscription->start_date}}</td>
                <td>{{$active_subscription->end_date}}</td>
            </tr>
        @endforeach
    </table>
    <h2> Payment: </h2>
    <table>
        <tr>
            <th>#</th>
            <th>user</th>
            <th>subscription id</th>
            <th>Amount</th>
            <th>payment method</th>
            <th>date</th>
        </tr>
        @foreach ($payments as $payment)
            <tr>
                <td>{{$payment->id}}</td>
                <td>{{$payment->user->name}}</td>
                <td>{{$payment->subscription_id}}</td>
                <td>{{$payment->amount_paid}}</td>
                <td>{{$payment->payment_method}}</td>
                <td>{{$payment->date}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
