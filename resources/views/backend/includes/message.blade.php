<div class="row">
    <div class="col-6 mx-auto text-center">
        @if(session()->has('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @elseif(session()->has('error'))
            <div class="alert alert-danger">{{session()->get('error')}}</div>
        @endif
    </div>
</div>