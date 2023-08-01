<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.3.0/bootbox.min.js"></script>
<script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(document).ready(function(){

                  //for add new whole seller
                  $('#save').click(function(){
                  const name =  $('#name').val();
                  const email = $('#email').val();
                  const password = $('#password').val();
                  const user_type = $('#user_type').val();
                  
                  debugger;

                  var formData = new FormData();
                  formData.append('name',name);
                  formData.append('email',email);
                  formData.append('password',password);
                  formData.append('user_type',user_type);
                  formData.append('_token',"{{ csrf_token() }}");
                  
                  $.ajax({
                    url:"",
                    method:"POST",
                    data:formData,
                    contentType:false,
                    processData:false,
                    cache:false,
                    success:function(response){
                        debugger
                if(response == "email"){
                swal({
              title: "Email Already Exit ",
              icon: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
              })
              .then((willDelete) => {
              if (willDelete) {

              } else {
                  // swal("Your imaginary file is safe!");
              }
              });
                }
                else{
                    swal("Registered successfully!")
                    window.location.href = "{{url('/register')}}";
                }
                    },
                    error:function(xhr){
                       debugger;
                        console.log(xhr.responseText);
                        console.log(xhr.response);
                    }
                });
            
            });
            
        }); 

</script>