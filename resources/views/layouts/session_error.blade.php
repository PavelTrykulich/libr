@if(\Illuminate\Support\Facades\Session::has('error'))
    <div class="alert alert-danger text-center">
        {{\Illuminate\Support\Facades\Session::get('error')}}
    </div>
@endif