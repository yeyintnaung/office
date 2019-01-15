@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @if (\Illuminate\Support\Facades\Session::has('created'))
            <li>{{ \Illuminate\Contracts\Session\Session::get('created') }}</li>
        @endif
    </ul>
</div>
@endif