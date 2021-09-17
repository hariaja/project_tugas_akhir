@if (session('success'))
<div class="alert alert-dismissible fade show alert-success" role="alert">
  <i class="mdi mdi-check"></i>
  <strong>{{ session('success') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif

@if (session('error'))
<div class="alert alert-dismissible fade show alert-danger" role="alert">
  <i class="mdi mdi-check"></i>
  <strong>{{ session('error') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>
@endif