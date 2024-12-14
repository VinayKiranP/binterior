@extends('layout.user.app')

@section('content')

  @include('layout.user.header')

  <main id="main">
    <section id="contact" class="contact">
        <div class="container">
          <div class="row d-flex justify-content-center" data-aos="fade-up">
            <div class="col-lg-10">
                <form method="POST" action="{{ route('orderUser.store') }}" role="form" class="php-email-form">
                @csrf
                <div class="row">
                    <h2 class="text-center">Estimation Form</h2>
                    <input type="hidden" value="{{$company->telp}}" id="company_telp">
                    <div class="form-group mt-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" name="location" class="form-control @error('location') is-invalid @enderror" value="{{ old('location') }}" id="location" required>
                        @error('location')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="needs" class="form-label">What Are Your Needs?</label>
                        <select class="form-select form-select-lg" aria-label="Default select example" name="needs">
                            <option value="design_build">Design Build</option>
                            <option value="design_only">Design Only</option>
                            <option value="build_only">Build Only</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="isRenovation" class="form-label">Category of Your Needs</label>
                        <select class="form-select form-select-lg" aria-label="Default select example" name="isRenovation">
                            <option value="false">New Building</option>
                            <option value="true">Renovation</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="type_interior_id" class="form-label">Interior Type</label>
                        <select class="form-select form-select-lg" aria-label="Default select example" name="type_interior_id">
                            @foreach ($type_interiors as $type_interior)
                                <option value="{{$type_interior->id}}">{{$type_interior->name}} Interior</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="room_size" class="form-label">Room Size (Optional)</label>
                        <input type="text" name="room_size" class="form-control @error('room_size') is-invalid @enderror" value="{{ old('room_size') }}" id="room_size">
                        @error('room_size')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="type" class="form-label col-12">The Interior Style You Want</label>

                        <div class="row portfolio portfolio-container" data-aos="fade-up" data-aos-delay="150">
                            @foreach ($styles as $style)
                                <div class="col-lg-6 col-md-6 portfolio-item filter-app">
                                    <label class="image-checkbox">
                                        <img src="{{ asset('storage/'.$style->image) }}" class="img-fluid" alt="">
                                        <input type="checkbox" name="style_interior[]" value="{{$style->name}}" />
                                        <i class="fa fa-check" style="display:none;"></i>
                                        <div class="portfolio-info">
                                            <h4>{{$style->name}}</h4>
                                            <p>{{$style->description}}</p>
                                            <a href="{{ asset('storage/'.$style->image) }}" data-gallery="portfolioGallery" class="portfolio-lightbox preview-link" title="{{$style->name}}"><i class="bx bx-plus"></i></a>
                                            <a href="portfolio-details.html" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                                        </div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                       
                       
                    </div>
                    <div class="form-group mt-3">
                        <label for="budget" class="form-label">Budget range</label>
                        <select class="form-select form-select-lg" aria-label="Default select example" name="budget">
                            <option value="">Don't know yet</option>
                            <option value="10-25 Lakhs (max 2x revision)">10-25 Lakhs (max 2x revision)</option>
                            <option value="25-50 Lakhs (max 3x revision)">25-50 Lakhs (max 3x revision)</option>
                            <option value="50-75 Lakhs (max 4x revision)">50-75 Lakhs (max 4x revision)</option>
                            <option value="10-20 Lakhs (max 5x revision)">75-100 Lakhs (max 5x revision)</option>
                            <option value="100-500 Lakhs (unlimited revision)">100-500 Lakhs (unlimited revision)</option>
                            <option value="500 Lakhs - 1 Miliar (unlimited revision)">500 Lakhs - 1 Miliar (unlimited revision)</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="started_month" class="form-label">Estimated Project Started</label>
                        <input type="month" name="started_month" class="form-control @error('started_month') is-invalid @enderror" value="{{ old('started_month') }}" id="started_month">
                        @error('started_month')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <label for="detail" class="form-label">Interior Details (Optional)</label>
                        <textarea type="textarea" rows="3" name="detail" class="form-control @error('detail') is-invalid @enderror" value="{{ old('detail') }}" id="detail"></textarea>
                        @error('detail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3 my-5">
                    <button class="btn btn-primary w-100" onclick="sendMessage()" type="submit">Send</button>
                </div>
               
              </form>
            </div>
  
          </div>
  
        </div>
      </section>

      @include('layout.user.footer')
      @if(session()->has('status'))
      @include('layout.alert')
    @endif
  </main>
  
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>

<script>
    function sendMessage(){
        var message = 'Hello, I have sent the interior design order form on the web. Link: '
        var str = $('#company_telp').val()
        var phone = str.slice(1);
        window.open('https://wa.me/'+phone+'/?text='+message , "_blank");
    }

    $(".image-checkbox").each(function () {
        if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
            $(this).addClass('image-checkbox-checked');
            $(this).find('.fa').show();
        }
        else {
            $(this).removeClass('image-checkbox-checked');
            $(this).find('.fa').hide();
        }
    });

    // sync the state to the input
    $(".image-checkbox").on("click", function (e) {
        $(this).toggleClass('image-checkbox-checked');
        var $checkbox = $(this).find('input[type="checkbox"]');
        $checkbox.prop("checked",!$checkbox.prop("checked"))

        e.preventDefault();
    });
</script>

@endsection
    
