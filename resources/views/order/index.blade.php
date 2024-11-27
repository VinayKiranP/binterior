@extends('layout.app')
@section('title','Semara Interior')

@section('container')
@include('layout.header')
@include('layout.sidebar')

<main id="main" class="main">
    <div class="pagetitle">  
      @if(request()->status == 0)
        <h1>Project Masuk</h1>
        @elseif(request()->status == 1)
        <h1>Project On Going</h1>
        @elseif(request()->status == 2)
        <h1>Project Selesai</h1>
      @endif
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <div class="row">
            <!-- Recent Sales -->
            <div class="col-12">
              @if(session()->has('status'))
              <div class="alert alert-{{(session()->get('status') == 'success')? 'success' : 'danger'}} alert-dismissible fade show" role="alert">
                {{session()->get('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <div class="d-flex justify-content-between">
                    <h5 class="card-title">Order <span>| {{request('filter') == 'today'? 'Hari Ini' : ' Per 2023'}}</span></h5>
                  </div>
                 @include('order._table')
                </div>

              </div>
            </div><!-- End Recent Sales -->
        </div>
      
    </section>
    @if(session()->has('status'))
      @include('layout.alert')
    @endif
  </main><!-- End #main -->
  @endsection