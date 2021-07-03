
<div><strong>Firstname: </strong>{{$member->firstname}}</div>
<div><strong>Surname: </strong>{{$member->surname}}</div>
<div><strong>Other Name: </strong>{{$member->othername}}</div>
<div><strong>Registraion Number: </strong>{{ $member->reg_no}}</div>
<div><strong>Phone Name: </strong>{{$member->phonenumber}}</div>
<div><strong>Email: </strong>{{$member->email}}</div>
<div><strong>Marital Status: </strong>{{$member->marital_status}}</div>
<div><strong>Gender: </strong>{{$member->gender}}</div>
<div><strong>Centre: </strong>{{$member->centre}}</>
<div><strong>Initial Selected Amount: </strong>{{ number_format($member->payment/100)}}</div>
<div><strong>Region: </strong>{{$member->region}}</div>
<div><strong>Payment Type: </strong>{{$member->paymenttype}}</div>
<div><strong>Total Payments: </strong>{{ number_format($member->total_payments /100) }}</div>
