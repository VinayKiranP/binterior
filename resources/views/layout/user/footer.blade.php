
<footer id="footer">
    <div class="footer-top">
        <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-6">
            <div class="footer-info">
                <h3>{{$company->name}}</h3>
                <p>
                {{$company->address}} <br>
                <strong>Phone:</strong> {{$company->telp}}<br>
                <strong>Email:</strong> {{{$company->email}}}<br>
                </p>
                <div class="social-links mt-3">
                <a target="_blank" href="https://api.whatsapp.com/send/?phone=918217258093&text&app_absent=0" class="wthatsapp"><i class="bi bi-whatsapp"></i></a>
                <a target="_blank" href="https://www.facebook.com/profile.php?id=61567168560272" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a target="_blank" href="https://www.instagram.com/binterio.r/" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a target="_blank" href="https://x.com/Binterior001" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a target="_blank" href="https://www.youtube.com/channel/UCdGrAhf6hI6vDRIqv9BvYUQ3" class="youtube"><i class="bx bxl-youtube"></i></a>
                </div>
            </div>
            </div>

            <div class="col-lg-4 ps-5 col-md-6 footer-links">
            <h4>Other Links</h4>
            <ul>
                <li><i class="bx bx-chevron-right"></i> <a href="{{url('/')}}">Home</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('orderUser.create')}}">Order</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('login')}}">Login</a></li>
                <li><i class="bx bx-chevron-right"></i> <a href="{{route('register')}}">Registration</a></li>
            </ul>
            </div>

            <div class="col-lg-4 col-md-6 footer-links">
                <h4>Our Service</h4>
                <ul>
                    @foreach ($type_interiors as $type_interior)
                        <li><i class="bx bx-chevron-right"></i> <a href="#">{{$type_interior->name}}</a></li>
                    @endforeach      
                </ul>
            </div>

        </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>{{$company->name}}</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/day-multipurpose-html-template-for-free/ -->
            Designed by <a href="https://bootstrapmade.com/">BuzQb</a>
        </div>
    </div>
</footer>