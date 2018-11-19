@if (session('status'))
    <div class="alert alert-success" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Well done!</strong> {{ session('status') }}
    </div>  
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
  
@endif

@if (session('error'))
    <div class="alert alert-warning" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <strong>Oh snap!</strong> {{ session('error') }}
    </div>  
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>
  
@endif

@if (count($errors) > 0)
    
       
            @foreach ($errors->all() as $error)
               
                    <div class="alert alert-warning" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <strong>Oh snap!</strong> {{ $error }}
                    </div>
            @endforeach
    <script type="text/javascript">
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 4000);
    </script>

@endif


