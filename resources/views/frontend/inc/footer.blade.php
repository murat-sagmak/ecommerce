<footer class="site-footer py-5">
  <div class="container">
      <div class="row border-top pt-5">
          <div class="col-lg-4 mb-4 mb-lg-0">
              <h3 class="footer-heading mb-4">Navigations</h3>
              <ul class="list-unstyled">
                  <li><a href="{{ route('home') }}">Home</a></li>
                  <li><a href="{{ route('about') }}">About</a></li>
                  <li><a href="{{ route('products') }}">Products</a></li>
                  <li><a href="{{ route('contact') }}">Contact</a></li>
              </ul>
          </div>
          
          <div class="col-lg-4 mb-4 mb-lg-0">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                @if(isset($settings['location']))
                    <li class="address">{{ $settings['location'] }}</li>
                @endif
                
                @if(isset($settings['phone']))
                    <li class="phone"><a href="tel://{{ str_replace(' ', '', $settings['phone']) }}">{{ $settings['phone'] }}</a></li>
                @endif
                
                @if(isset($settings['email']))
                    <li class="email">{{ $settings['email'] }}</li>
                @endif
            </ul>
          </div>
          <div class="col-md-4 mb-4 mb-md-0">
            <div class="text-center">
                <h3 class="footer-heading mb-2">Follow Us</h3>
                <div class="mb-2">
                    <a href="#" class="icon-facebook icon-lg"><span class="sr-only">Facebook</span></a>
                </div>
                <div class="mb-2">
                    <a href="#" class="icon-twitter icon-lg"><span class="sr-only">Twitter</span></a>
                </div>
                <div class="mb-2">
                    <a href="#" class="icon-instagram icon-lg"><span class="sr-only">Instagram</span></a>
                </div>
                <div class="mb-2">
                    <a href="#" class="icon-linkedin icon-lg"><span class="sr-only">LinkedIn</span></a>
                </div>
            </div>
        </div>
        
        
        
        
      </div>
      <div class="row pt-4 mt-4">
          <div class="col-md-12 text-center">
              <p class="text-black">© {{ date('Y') }} All rights reserved</p>
          </div>
      </div>
  </div>
</footer>
