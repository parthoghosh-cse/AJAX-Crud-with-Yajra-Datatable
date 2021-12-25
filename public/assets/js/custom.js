(function($){
    $(document).ready(function(){

      //phone number valodation useing regular expretion 
      function bdCellCheck(phone){

        let pattern = /^(01|8801|\+8801)[0-9]{9}$/;
        
        if(pattern.test(phone)){

          return true;

        }else{
          return false;
        }



      }

      //user name check

      function usernameCheck(username){
        let pattern =/^[a-z0-9_]{3,10}$/;

        if(pattern.test(username)){
          return true;
        }else{
          return false;
        }

      }



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
              data : 'edu',
              name : 'edu'
             },
             { 
              data : 'gender',
              name : 'gender'
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
       
          if(usernameCheck(username)==false){
             $('p.username-msg').html(`
              <ul style="color:red;">
                <li>Username should be lowercase</li>  
                <li>You can use any number </li>  
                <li>Only _ allows</li>  
                <li>You can use Max number 10 min number 3 </li>  
              </ul>

             `);
          }else{
            $('p.username-msg').html('');
          }



          if(name =='' || email ==''|| cell =='' || username ==''){
            $('.msg').html(validate('All fields are required'));
          }else if(validateEmail(email)==false){
            $('.msg').html(validate('Invalid Email Address','warning')); 

          }else if(bdCellCheck(cell)==false){
            $('.msg').html(validate('Invalid Mobile Number','warning'));

          }else if(usernameCheck(username)==false){
            $('.msg').html(validate('Invalid Username','warning'));
            

          } else{
              $.ajax({
                  url:'staff',
                  method:'POST',
                  data: new FormData(this), 
                  processData:false,
                  contentType:false,
                  success:function(data){
                   $('#staff_add_modal').modal('hide');
                   $('#staff_add_form')[0].reset();
                   $('#staff-table').DataTable().ajax.reload();

                  }

              });
          }


        });


        //staff data delete

        $(document).on('click','a.data-delete',function(e){
          e.preventDefault();

          let del_id=$(this).attr('delete_id');

          let conf= confirm('Are you sure ?');

          if(conf){
            $.ajax({
              url:'staff-delete/'+ del_id,
              success:function(data){

                alert('Data Deleted Successful')
                
                $('#staff-table').DataTable().ajax.reload();
  
              }
  
            });

          }else{

          }
         
      


        });


        //staff data edit show modal

        $(document).on('click','a.data-edit',function(e){
          e.preventDefault();

          let edit_id = $(this).attr('edit_id');

           $.ajax({
            url:'staff/' + edit_id,
            success:function(data){
              $('#staff_edit_form input[name="name"]').val(data.name);
              $('#staff_edit_form input[name="email"]').val(data.email);
              $('#staff_edit_form input[name="cell"]').val(data.cell);
              $('#staff_edit_form input[name="username"]').val(data.username);
              $('#staff_edit_form input[name="update_id"]').val(data.id);
              $('.staff-gender').html(data.gender);
              $('.staff-edu').html(data.edu);

              $('#staff_edit_modal').modal('show');
              
            }
           });


           /**
            * Staff data update
            */

           $('#staff_edit_form').submit(function(e){
             e.preventDefault();

           $.ajax({
            url : 'staff-update',
            method: 'POST',
            data : new FormData(this),
            contentType :false,
            processData :false,
            success :function(data){
              $('#staff-table').DataTable().ajax.reload();
              $('#staff_edit_modal').modal('hide');

            }

           });


           });
          



        });




    });

})(jQuery)