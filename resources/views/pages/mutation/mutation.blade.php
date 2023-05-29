<!DOCTYPE html>
<html>
<head>
    <style>
        .header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .table {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .column {
            flex-basis: 33.33%;
            margin-right: 10px;
        }

        .label {
            font-weight: bold;
        }

        hr {
            border: none;
            border-top: 1px solid black;
            margin: 20px 0;
        }
    </style>
</head>
<body>
<div class="header">Mutation Details</div>
@php
    $itemCount = count($data);
    $rows = ceil($itemCount / 3); // Calculate number of rows needed
    $currentIndex = 0;
@endphp

@for ($i = 0; $i < $rows; $i++)
    <div class="table">
        @for ($j = 0; $j < 3; $j++)
            @if ($currentIndex < $itemCount)
                @php $item = $data[$currentIndex]; @endphp
                <div class="column">
                    <div class="content">
                        <p class="label">Account Number:</p>
                        <p class="value">{{ $item['account_number'] }}</p>
                    </div>
                    <div class="content">
                        <p class="label">Username:</p>
                        <p class="value">{{ $item['bank']['username'] }}</p>
                    </div>
                    <div class="content">
                        <p class="label">Name Holder:</p>
                        <p class="value">{{ $item['bank']['atas_nama'] }}</p>
                    </div>
                    <div class="content">
                        <p class="label">Amount:</p>
                        <p class="value">{{ $item['amount'] }}</p>
                    </div>
                    <div class="content">
                        <p class="label">Type:</p>
                        <p class="value">{{ $item['type'] }}</p>
                    </div>
                    <div class="content">
                        <p class="label">Note:</p>
                        <p class="value">{{ $item['note'] }}</p>
                    </div>
                    <div class="content">
                        <p class="label">Balance:</p>
                        <p class="value">{{ $item['balance'] }}</p>
                    </div>
                    <div class="content">
                        <p class="label">Bank:</p>
                        <p class="value">{{ $item['bank']['label'] }}</p>
                    </div>
                </div>
                @php $currentIndex++; @endphp
            @endif
        @endfor
    </div>
    <hr>
@endfor
</body>
</html>
