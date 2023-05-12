<div style="background-color: #040012" class="container-fluid footer">
    <footer style="color: #6c757d" class="py-5">
      <div class="row">
        <div class="col-6 col-md-3 mb-3">
          <h5 style="color: white">Links</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="#" style="color: #6c757d" class="nav-link p-0 same" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#6c757d'">Movies</a></li>
            <li class="nav-item mb-2"><a href="#" style="color: #6c757d" class="nav-link p-0 same" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#6c757d'">Blogs</a></li>
            @guest
            <li class="nav-item mb-2">
              <a style="color: #6c757d" class="nav-link p-0 same" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#6c757d'" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item mb-2">
              <a style="color: #6c757d" class="nav-link p-0 same" onmouseover="this.style.color='#ffffff'" onmouseout="this.style.color='#6c757d'" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            @endguest
          </ul>
        </div>

        <div class="col-6 col-md-3 mb-3 address">
            <h5 style="color: white">Our Address</h5>
            <address>
              99, The Big Men Crib<br />
              DKIT, Dundalk<br />
              County Louth<br />
              <span class="fa fa-phone"></span>: +353 85 2155 782<br />
              <span class="fa fa-fax"></span>: +353 85 2155 782<br />
            </address>
          </div>
  
          <div class="col-md-5 offset-md-1 mb-3">
            <form>
              <h5 style="color: white">Subscribe to our newsletter</h5>
              <p>Monthly digest of what's new and exciting from us.</p>
              <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                <label for="newsletter1" class="visually-hidden">Email address</label>
                <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                <button class="btn bg-info" type="button">Subscribe</button>
              </div>
            </form>
          </div>
      </div>

      <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p class="text-muted" style="color: white;">© 2023 Robert Nugent & Patrick Orjieh, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
          <li class="me-2"><a class="text-muted" href="#"><i class="fa fa-facebook af"></i></a></li>
          <li class="me-2"><a class="text-muted" href="#"><i class="fa fa-twitter af"></i></a></li>
          <li class="me-2"><a class="text-muted" href="#"><i class="fa fa-instagram af"></i></a></li>
          <li class="me-2"><a class="text-muted" href="#"><i class="fa fa-linkedin af"></i></a></li>
        </ul>
      </div>
    </footer>
</div>
