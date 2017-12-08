<div class="alert alert-{{ Session::get('alert-class') }} a fade show" role="alert">
  <strong>{{ Session::get('alert-msg') }}</strong>
  <a class="close" href="#" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">{{ Session::get('alert-btn') }}</span>
  </a>
</div>