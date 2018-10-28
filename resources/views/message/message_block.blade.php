 @if (session('status'))
     <div class="alert alert-success">
        {{ session('status') }}
     </div>
 @endif

@if(Session::has('success'))
      <div class="alert alert-success" role="alert" style="text-align: center; color: Green">
           <b>{{Session::get('success')}}</b>
      </div>
@endif

@if(Session::has('update'))
      <div class="alert alert-success" role="alert" style="text-align: center; color: Yellow">
           <b>{{Session::get('update')}}</b>
      </div>
@endif

@if(Session::has('pdfcondition'))
      <div class="alert alert-success" role="alert" style="text-align: center; color: Red">
           <b>{{Session::get('pdfcondition')}}</b>
      </div>
@endif

@if(Session::has('error'))
      <div class="alert alert-danger" role="alert" style="text-align: center;">
          <b>{{Session::get('error')}}</b>
      </div>
@endif