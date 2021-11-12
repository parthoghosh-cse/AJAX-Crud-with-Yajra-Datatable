(function($){
    $(document).ready(function(){

        //validate function
        function validate(msg,type='danger'){
            return `<p class="alert alert-${type}"> ${msg} !<button class="close" data-dismiss="alert">&times;</button> </p>`;
        }
        //check email regular expression
        function validateEmail(email) {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }


        //staff table to convert data table
        $('#staff-table').DataTable({
          processing:true,
          serverSide:true,
          ajax:{
            url:'staff'
          },
          columns :[
            { 
               data : 'id',
               name : 'id'
            },
            {
              data :'name',
              name :'name'
             },
             {
               data :'email',
               name : 'email'
             },
             {
              data :'cell',
              name :'cell'
             },
             {
               data :'username',
               name :'username'
             },
             {
               data : 'photo',
               name : 'photo',
               render :function(data){
                return `<img src="storage/staff/${data}">`;
               },
              
             },
             {
              data:'action',
              name :'action'
             },


          ]


        });

        //staff modal show

        $('#staff_add_btn').click(function(e){
         e.preventDefault();
            $('#staff_add_modal').modal('show');

        });

        //staff add form manage
        $('#staff_add_form').submit(function(e){
            e.preventDefault();

            let name = $('#staff_add_form input[name="name"]').val();
            let email = $('#staff_add_form input[name="email"]').val();
            let cell = $('#staff_add_form input[name="cell"]').val();
            let username = $('#staff_add_form input[name="username"]').val();
       
          if(name =='' || email ==''|| cell =='' || username ==''){
            $('.msg').html(validate('All fields are required'));
          }else if(validateEmail(email)==false){
            $('.msg').html(validate('Invalid Email Address','warning')); 

          }else{
              $.ajax({
                  url:'staff',
                  method:'POST',
                  data: new FormData(this),
                  processData:false,
                  contentType:false,
                  success:function(data){
                   $('#staff_add_modal').modal('hide');
                   $('#staff_add_form')[0].reset();

                  }

              });
          }


        });

    });

})(jQuery)