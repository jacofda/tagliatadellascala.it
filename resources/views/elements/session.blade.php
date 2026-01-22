@if ( session('message') ) 
    <div class="row alert">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 60px;">
            <div class="alert success">
                <i class="fa fa-lg fa-check-circle-o"></i> {{session('message')}}
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endif
@if ( session('error') ) 
    <div class="row alert">
        <div class="col-md-8 col-md-offset-2" style="margin-bottom: 60px;">
            <div class="alert error">
                <i class="fa fa-lg fa-times-circle"></i>
                    @if( is_array( session('error') ) )
                      {{session('error')['message']}}
                    @else
                      {{session('error')}}
                    @endif
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endif


@if( session()->has('message') || session()->has('error') )
    @section('scripts')
        <script>
            setTimeout(function(){
                $('.alert').hide('slow');
            }, 5000)
        </script>
    @stop
@endif