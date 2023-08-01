<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

    $(document).ready(function(){


          //Change status here
         $('body').delegate('#change_article_status','click',function(){
            const id = $(this).parent().find('input[name="id"]').val();
            const option = $(this);
            debugger;
              swal({
              title: "Want to change status",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
              if (willDelete) {

                $.ajax({
                  url:"{{route('author.change.article.status')}}",
                  method:"POST",
                  data : {"_token":"{{ csrf_token() }}",id},
                  success:function(res){
                      debugger;
                    if(res == 0){
                        option.attr('class','material-icons text-success');
                        option.html("check_box");
                    }else{
                        option.attr('class','material-icons text-danger');
                        option.html("check_box_outline_blank");
                    }

                    window.location.reload(true);
                  },error:function(xhr){

                      console.log(xhr.responseText);
                  }
              });

              } else {
                  // swal("Your imaginary file is safe!");
              }
              });

              });


       

        });
</script>
