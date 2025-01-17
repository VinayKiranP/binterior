@extends('layout.app')
@section('title','B-Interior')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">
        <h1>Edit order</h1>
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('employee/home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('employee.order.index')}}">Order</a></li>
            <li class="breadcrumb-item active">Edit Order</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <div class="row">
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Data Order</h5>
                        <!-- Floating Labels Form -->
                        <div class="row">
                            <div class="col-6">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>: {{$order->user->name}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>: {{$order->user->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Mobile / Phone</td>
                                            <td>: {{$order->user->phone_number}}</td>
                                        </tr>
                                        <tr>
                                            <td>Location</td>
                                            <td>: {{$order->location}}</td>
                                        </tr>
                                        <tr>
                                            <td>Room Size</td>
                                            <td>: {{$order->room_size}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-6">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Needs</td>
                                            <td>: {{$order->needs_string}}</td>
                                        </tr>
                                        <tr>
                                            <td>Interior Type</td>
                                            <td>: {{$order->type_interior->name}} Interior</td>
                                        </tr>
                                        <tr>
                                            <td>Interior Style</td>
                                            <td>: {{$order->styles_interiors}}</td>
                                        </tr>
                                        <tr>
                                            <td>Budget</td>
                                            <td>: {{$order->budget}}</td>
                                        </tr>
                                        <tr>
                                            <td>Project month begins</td>
                                            <td>: {{$order->formatted_started_month}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Update Order</h5>
                        <form method="post" action="{{route('employee.order.update', $order->id)}}" class="row g-3" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="row">
                                <div class="form-group mt-3">
                                    <label for="detail" class="form-label">Detail About Interior</label>
                                    <textarea type="textarea" rows="3" name="detail" class="form-control @error('detail') is-invalid @enderror" id="detail">{{$order->detail}}</textarea>
                                    @error('detail')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if($order->status !== IS_TERKIRIM)
                                    <div class="form-group mt-3">
                                        <label for="progress" class="form-label">Progress (%)</label>
                                        <input type="number" name="progress" class="form-control @error('progress') is-invalid @enderror" value="{{ $order->progress }}" id="progress" required>
                                        @error('progress')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="results" class="form-label">Updated Design</label>
                                        <input type="file" id="results" class="dropify" data-height="300" name="results" data-default-file="{{ asset('assets/img/'.$order->results) }}" data-max-file-size="3M" data-allowed-file-extensions="jpg png jpeg" data-show-errors="true" multiple/>
                                        @error('results')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            
                                    <div class="form-group mt-3">
                                        <label for="documents" class="form-label">More Documents (Link Google Drive)</label>
                                        <input type="text" name="documents" class="form-control @error('documents') is-invalid @enderror" value="{{$order->documents}}" id="documents">
                                        @error('documents')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                @endif
                            </div>
                            <hr>
                            @if(role('admin'))
                                <div class="col-12">                           
                                    <table class="table" id="table">
                                        <h5>Nota Interior</h5>
                                        <thead style="{{($notas == null)? 'display:none' : ''}}">
                                            <tr style="color:rgb(57, 57, 57)">
                                                <th>Barang Name</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-end">Unit Price (Rp.)</th>
                                                <th class="text-end">Total (Rp)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($notas !== null)
                                                @foreach ($notas as $note)
                                                    <tr>
                                                        <td class="name">{{$note->name}}<input type="hidden" name="name[]" value="{{$note->name}}"></td>
                                                        <td class="qty text-center">{{$note->qty}}<input type="hidden" name="qty[]" value="{{$note->qty}}"></td>
                                                        <td class="price text-end">{{number_format($note->price,0)}}<input type="hidden" name="price[]" value="{{$note->price}}"></td>
                                                        <td class="total text-end">{{number_format($note->total,0)}}<input type="hidden" name="total[]" value="{{$note->total}}"></td>
                                                        <td class="hapus text-center"><i class="bi bi-trash" style="color:red; cursor:pointer;"></i></td>
                                                    </tr>
                                                @endforeach                                       
                                            @endif
                                        </tbody>

                                        <tfoot style="{{($notas == null)? 'display:none' : ''}}">
                                            <tr>
                                                <th colspan="3">Subtotal (Rp)</th>
                                                <th id="subtotal" class="text-end"></th>
                                                <input type="hidden" name="subtotal" id="subtotal_hidden" value="">
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <button type="button" class="btn btn-outline-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#rabOrderModal">
                                        <i class="bi bi-plus-circle"></i>
                                        Add Note Data
                                    </button>
                                </div>
                            @endif
                            <div class="text-center">
                                <button type="submit" id="test" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </div> 
                        </form><!-- End floating Labels Form -->
                        @include('order._modal')
                    </div>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://jeremyfagis.github.io/dropify/dist/js/dropify.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://jeremyfagis.github.io/dropify/dist/css/dropify.min.css">
<script>
    $('#test').on('click', function(){
        console.log('test')
    })
    const thead = $('#table thead');
    const tbody = $("#table tbody");
    const tfoot = $("#table tfoot");

    $("#simpan").click(function(){
        let name = $('#name_rab').val();
        let price = $('#price_rab').val();
        let qty = $('#qty_rab').val();

        let total = parseInt(price)*parseInt(qty)

        tbody.append(
            `<tr>
                <td class="name">${name}<input type="hidden" name="name[]" value="${name}"></td>
                <td class="qty text-center">${qty}<input type="hidden" name="qty[]" value="${qty}"></td>
                <td class="price text-end">${parseInt(price).toLocaleString('en')}<input type="hidden" name="price[]" value="${price}"></td>
                <td class="total text-end">${total.toLocaleString('en')}<input type="hidden" name="total[]" value="${total}"></td>
                <td class="hapus text-center"><i class="bi bi-trash" style="color:red; cursor:pointer;"></i></td>
            </tr>`
        );

        let tbody_length = $('#table').find('tbody').find('tr').length;
        if(tbody_length !== 0){
            thead.show();
            tfoot.show();
        }

        getSubtotal();
        resetForm();
        deleteItem();
    });

    function getSubtotal(){
        let sub = $('.total');
        var subtotal = 0;
        $.each(sub, function(index, value){
            subtotal += parseInt(sub.eq(index).find('input').val());
        });
        $('#subtotal').text(subtotal.toLocaleString('en'));
        $('#subtotal_hidden').val(subtotal);
    }

    function resetForm(){
        $('#name_rab').val('');
        $('#price_rab').val('');
        $('#qty_rab').val('');
    }

    function deleteItem(){
        let hapus = $("#table").find('tr').find('.hapus');
        $.each(hapus, function(i, value){
            hapus.eq(i).on('click', function(){
                $(this).parent().remove()
                let tbody_length = $('#table').find('tbody').find('tr').length;
                getSubtotal();
                if(tbody_length === 0){
                    $('#table thead').hide();
                    $('#table tfoot').hide()
                }
            });
        })
    }

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
        getSubtotal();
        deleteItem();
    });

</script>

<script>
  $('.dropify').dropify();
</script>
  @endsection