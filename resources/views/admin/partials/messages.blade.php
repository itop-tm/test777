@if ($errors->any())
<div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
        <button 
            type="button" 
            class="btn-close" 
            data-bs-dismiss="alert" 
            aria-label="Close"
        ></button>
</div>
@endif
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <h6>{{ session('success') }}</h6>
    <button 
        type="button" 
        class="btn-close" 
        data-bs-dismiss="alert" 
        aria-label="Close"
    ></button>
</div>
@endif