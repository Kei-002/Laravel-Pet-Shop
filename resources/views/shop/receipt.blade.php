@extends('layouts.base')
@section('body')
@section('assets')
<link href="{{ asset('css/receipt.css') }}" rel="stylesheet">
@endsection

<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks you for your purchase!</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            
                                            <tbody><tr>
                                                <td><strong> {{$customer -> fname }} {{$customer -> lname }}</strong><br><br>Date: {{$order -> transacation_date }}</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                              <th>Pet Name: </th>
                                                              <th>Total</th>
                                                            </tr>
                                                          </thead>
                                                        <tbody>
                                                           @foreach($purchases as $purchase) 
                                                                <tr>
                                                                    <td>{{$purchase -> pet_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$purchase -> groom_name}}</td>
                                                                    
                                                                    <td class="alignright">{{$purchase -> price * $purchase -> quantity}}</td>
                                                                </tr>
                                                            @endforeach
                                                                <tr class="total">
                                                                    <td class="alignright" width="80%">Total</td>
                                                                    <td class="alignright">{{$totalPurchase}}</td>
                                                                </tr> 
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <a href="{{route('item.index')}}">Back to services</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Company Inc. 123 Van Ness, San Francisco 94102
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Questions? Email <a href="mailto:">support@company.inc</a></td>
                        </tr>
                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>



@endsection