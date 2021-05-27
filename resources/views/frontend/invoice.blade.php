@extends('frontend.layouts.inv')
@section('content')
<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->


                <div class="page-content">
                    <div class="container">



                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                    <h4 class="float-end font-size-16"><strong>Order # 12345</strong></h4>

                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <address>
                                                                <strong>Billed To:</strong><br>
                                                                John Smith<br>
                                                                1234 Main<br>
                                                                Apt. 4B<br>
                                                                Springfield, ST 54321
                                                            </address>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <address>
                                                                <strong>Shipped To:</strong><br>
                                                                Kenny Rigdon<br>
                                                                1234 Main<br>
                                                                Apt. 4B<br>
                                                                Springfield, ST 54321
                                                            </address>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 mt-4">
                                                        <address>
                                                                <strong>Payment Method:</strong><br>
                                                                Visa ending **** 4242<br>
                                                                jsmith@email.com
                                                            </address>
                                                    </div>
                                                    <div class="col-6 mt-4 text-end">
                                                        <address>
                                                                <strong>Order Date:</strong><br>
                                                                October 7, 2016<br><br>
                                                            </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Order summary</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <td><strong>Item</strong></td>
                                                                        <td class="text-center"><strong>Price</strong></td>
                                                                        <td class="text-center"><strong>Quantity</strong>
                                                                        </td>
                                                                        <td class="text-end"><strong>Totals</strong></td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                    <tr>
                                                                        <td>BS-200</td>
                                                                        <td class="text-center">$10.99</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-end">$10.99</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>BS-400</td>
                                                                        <td class="text-center">$20.00</td>
                                                                        <td class="text-center">3</td>
                                                                        <td class="text-end">$60.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>BS-1000</td>
                                                                        <td class="text-center">$600.00</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-end">$600.00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line text-center">
                                                                            <strong>Subtotal</strong></td>
                                                                        <td class="thick-line text-end">$670.99</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center">
                                                                            <strong>Shipping</strong></td>
                                                                        <td class="no-line text-end">$15</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center">
                                                                            <strong>Total</strong></td>
                                                                        <td class="no-line text-end">
                                                                            <h4 class="m-0">$685.99</h4></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>

                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                <a href="#" class="btn btn-primary waves-effect waves-light">Send</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!-- end row -->

                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



            <!-- end main content-->

@endsection


@push('scripts')
<!-- JS
============================================ -->

<!-- jQuery JS -->
<script src="{{asset('frontendassets/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Popper JS -->
<script src="{{asset('frontendassets/js/popper.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{asset('frontendassets/js/bootstrap.min.js')}}"></script>
<!-- Plugins JS -->
<script src="{{asset('frontendassets/js/plugins.js')}}"></script>
<!-- Ajax Mail -->
<script src="{{asset('frontendassets/js/ajax-mail.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('frontendassets/js/main.js')}}"></script>


@endpush
