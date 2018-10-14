


<div class="no-print col-6">
    <h2>You can print this voucher, don't worry if you lose it, Andy's will have a copy!</h2>
    <button onClick="window.print();">PRINT</button>
</div>

<body>
        <div class="col-6 h-100 gift-card">
            <div class="card h-50  justify-content-center ">
                <div>
                    <div class="card-body">
                    <h1 style="font-family: 'Lobster', cursive;">Andy's Bar & Restaurant Monaghan</h1>
                        <h3 class="card-title">&euro;{{ $voucher->amount }} Gift Voucher</h3>
                        <p class="card-text">From: {{ $voucher->name }}</p>
                        <p class="card-text">To: {{ $voucher->recipient_name }}</p>
                        <p class="card-text">Ref: {{ $voucher->id }}</p>
                        <span>+353 47 82277</span> <br><span style="float-right">AndysMonaghan.com</span> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


<link href="{{ asset('css/giftvoucher.css') }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oleo+Script" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">