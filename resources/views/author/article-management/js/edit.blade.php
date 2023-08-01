<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js"></script>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
<script>
        $(document).ready(function(){
                //for add new article class
                $('#save').click(function(){
                   debugger;
                  const id =  $('#id').val(); 
                  const title =  $('#title').val(); 
                  const content =  $('#content').summernote('code');
                       
                  var formData = new FormData(); 
                  debugger;
                  formData.append('id',id);
                  formData.append('title',title);
                  formData.append('content',content); 
                  formData.append('_token',"{{ csrf_token() }}");
                  
                  $.ajax({
                    url:"{{route('author.update.article')}}",
                    method:"POST",
                    data:formData,
                    contentType:false,
                    processData:false,
                    cache:false,       
                    success:function(response){
                       debugger;
                        swal('success',"Update Successfull");
                        window.location.href = "{{route('author.articles')}}";
                        
                    },
                    error:function(xhr){
                        swal('error',"Try Again");
                        console.log(xhr.responseText);
                    }
                });
            });
});

$(document).ready(function() {
  $('.summernote').summernote();
});
   
</script>