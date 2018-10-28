@extends('layouts.admin-app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
                <div class="panel-heading">Add Achievement</div>
                    
                     <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('addachievement.create') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                            
                        <div class="form-group">
                            <label for="achTitle" class="col-md-4 control-label">Achievement Title</label>

                             <div class="col-md-6">
                                <input id="achTitle" type="text" class="form-control" name="achTitle" placeholder="A unique title ..." required autofocus>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="achIntro" class="col-md-4 control-label">Achievement Intro</label>

                             <div class="col-md-6">
                                <input id="achIntro" type="text" class="form-control" name="achIntro" placeholder="A unique Intro ..." required autofocus>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="achDetails" class="col-md-4 control-label">Achievement Details</label>

                             <div class="col-md-6">
                                <textarea id="achDetails" type="textarea" class="form-control" name="achDetails" placeholder="Write about this achievement ..." required autofocus></textarea>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="achPoint" class="col-md-4 control-label">Achievement Point</label>

                             <div class="col-md-6">
                                <input id="achPoint" type="number" class="form-control" name="achPoint" placeholder="Set achievement Point here ..." required autofocus>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="achNumber" class="col-md-4 control-label">Set a Unique Achievement Number</label>

                             <div class="col-md-6">
                                <input id="achNumber" type="text" class="form-control" name="achNumber" placeholder="Example : ACH123" required autofocus>
                            </div> 
                        </div>

                
                         <div class="form-group">
                            <label for="achIcon" class="col-md-4 control-label">Set a Unique Achievement Icon</label>

                            <div class="col-md-6">
                                <input id="achIcon" type="file" class="form-control" name="achIcon" required autofocus>
                            </div>
                        </div>

                    

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Achievement
                                </button>
                            </div>
                        </div>
                    
                    </form>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
