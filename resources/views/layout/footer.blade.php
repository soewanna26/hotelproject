<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class=" col-md-4">
                    <h3>Contact US</h3>
                    <ul class="conta">
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i> Address</li>
                        <li><i class="fa fa-mobile" aria-hidden="true"></i> +01 1234569540</li>
                        <li> <i class="fa fa-envelope" aria-hidden="true"></i><a href="#"> demo@gmail.com</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>Menu Link</h3>
                    <ul class="link_menu">
                        <li class="{{ Request::routeIs('account.dashboard') ? 'active' : '' }}"><a
                                href="{{ Auth::check() ? route('account.dashboard') : route('home') }}">Home</a></li>
                   {{-- <li><a href="about.html"> about</a></li> --}}
                   <li {{ Request::routeIs('ourRooms') ? 'active' : '' }}><a href="{{ route('ourRooms') }}">Our
                                Room</a></li>
                        <li {{ Request::routeIs('ourGallaries') ? 'active' : '' }}><a href="{{ route('ourGallaries') }}">Gallery</a>
                        </li>
                        <li {{ Request::routeIs('ourContacts') ? 'active' : '' }}><a href="{{ route('ourContacts') }}">Contact Us</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3>News letter</h3>
                    {{-- <form class="bottom_form">
                        <input class="enter" placeholder="Enter your email" type="text" name="Enter your email">
                        <button class="sub_btn">subscribe</button>
                    </form> --}}
                    <ul class="social_icon">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">

                        <p>
                            © 2024 All Rights Reserved. Design by <a href="https://html.design/"> Free Html
                                Templates</a>
                            <br><br>
                            {{-- Distributed by <a href="https://themewagon.com/" target="_blank">ThemeWagon</a> --}}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
