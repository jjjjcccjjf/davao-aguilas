
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Members / Mobile App Subscribers
        <!-- <a href="#add_modal" data-toggle="modal" class="btn btn-xs btn-info pull-right"> + Add New </a> -->
        <br>
        <div><sub style="color:green;" id="custom_message"></sub></div>
      </header>

      <div class="panel-body">
        <div class="table-responsive" id="table_div">
          <!-- table appended via ajax -->
        </div>
      </section>
    </div>
  </div>

  <!-- Add Modal -->
  <div aria-hidden="true" aria-labelledby="add_modal_label" role="dialog" tabindex="-1" id="add_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Add</h4>
        </div>
        <div class="modal-body">

          <form action="#" class="form-horizontal" id="add_form">  <!-- form -->

            <div class="form-group">
              <label class="control-label col-md-2"></label>
              <div class="controls col-md-10">
                <button type="submit" class="btn btn-white">Submit</button>
              </div>
            </div>
          </form> <!-- / form -->
        </div>
      </div>
    </div>
  </div>
  <!-- Add Modal end -->

  <!-- Edit Modal -->
  <div aria-hidden="true" aria-labelledby="add_modal_label" role="dialog" tabindex="-1" id="edit_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Edit item #<span id="edit_id"></span></h4>
        </div>
        <div class="modal-body">

          <form action="#" class="form-horizontal" id="edit_form">  <!-- form -->


            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">First name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fname" id="_fname" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Middle name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="mname" id="_mname" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Last name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="lname" id="_lname" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Birth date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="birth_date" id="_birth_date" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="_email" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Address</label>
              <div class="col-sm-10">
                <textarea class="form-control" name="address" rows="6" id="_address" required></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Mobile</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="mobile" id="_mobile" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Facebook link</label>
              <div class="col-sm-10">
                <input type="url" class="form-control" name="facebook_link" id="_facebook_link" required></input>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Twitter link</label>
              <div class="col-sm-10">
                <input type="url" class="form-control" name="twitter_link" id="_twitter_link" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2"></label>
              <div class="controls col-md-10">
                <button type="submit" class="btn btn-white">Submit</button>
              </div>
            </div>
          </form> <!-- / form -->
        </div>
      </div>
    </div>
  </div>
  <!-- Edit Modal end -->

  <script>
  $(document).ready(function(){
    var table;

    var base_url = "<?php echo base_url(); ?>";
    var api_segment = 'api/members/';
    var api_url = base_url + api_segment;

    var table_headers = ['Name', 'Birth date', 'Email', 'Address', 'Mobile', 'Facebook Link', 'Twitter Link'];

    /**---------------------------------------------
    -------------------POST add---------------------
    ---------------------------------------------**/
    $("#add_form").submit(function(e){
      var form_data = new FormData($(this)[0]);

      $.ajax({
        url: api_url,
        type: 'POST',
        data: form_data,
        async: false,
        success: function (data, textStatus, xhr) {
          if(xhr.status == 201){
            initializeTable('#table_div', table_headers);
            $('#add_modal').modal('toggle');
            clearAllForms();
            customMessage('#custom_message', 'Item added successfully');
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });

      e.preventDefault();
    });
    /**---------------------------------------------
    -------------------POST edit---------------------
    ---------------------------------------------**/
    $("#edit_form").submit(function(e){
      var form_data = new FormData($(this)[0]);

      $.ajax({
        url: api_url + $('#edit_id').html(),
        type: 'POST',
        data: form_data,
        async: false,
        success: function (data, textStatus, xhr) {
          if(xhr.status == 200){
            initializeTable('#table_div', table_headers);
            clearAllForms();
            $('#edit_modal').modal('toggle');
            customMessage('#custom_message', 'Changes saved successfully');
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });

      e.preventDefault();
    });

    /**---------------------------------------------
    -------------------DELETE-----------------------
    ---------------------------------------------**/
    /**
    * delete an item by id using api
    * @var int    id
    */
    deleteItem = function(id){

      if(confirm('Are you sure you want to do this?')){
        $.ajax({
          url: api_url + id,
          type: 'DELETE',
          success: function (data, textStatus, xhr) {
            if(xhr.status == 204){
              initializeTable('#table_div', table_headers);
              customMessage('#custom_message', 'Item deleted successfully');
            }
          }
        });
      }

    }

    /**
    * function for populating the edit modal
    * @var int   id
    */
    editItem = function(id) {
      $.getJSON(api_url + id, function(result){
        $('#_fname').val(result[0].fname);
        $('#_mname').val(result[0].mname);
        $('#_lname').val(result[0].lname);
        $('#_birth_date').val(result[0].birth_date);
        $('#_email').val(result[0].email);
        $('#_address').val(result[0].address);
        $('#_mobile').val(result[0].mobile);
        $('#_facebook_link').val(result[0].facebook_link);
        $('#_twitter_link').val(result[0].twitter_link);
      });
      $('#edit_id').html('');
      $('#edit_id').html(id);
      $('#edit_modal').modal('toggle');
    }

    /**---------------------------------------------
    --------------------GET all--------------------
    ---------------------------------------------**/
    /**
    * initialize a table using an api endpoint
    * @var selector           string      element to append our table ex. '#some_id'
    * @var table_headers      array       headers to use excluding the number counter header ex. ['Some header', 'Another one', 'And another one']
    */
    initializeTable = function(selector, table_headers){
      $(selector).empty();

      $.getJSON(api_url, function(result){
        table = `
        <table class="table table-bordered">
        <thead><tr>
        <th>#</th>`;

        for(var x in table_headers){
          table += '<th>' + table_headers[x] + '</th>';
        }

        table += `<th>Options</th></tr></thead><tbody>`;

        for(var x in result){
          id = parseInt(x) + 1;

          table += '<tr>';

          table += '<td>' + id +'</td>'; // id
          table += '<td>' + result[x].fname + " " + result[x].mname + " " + result[x].lname +'</td>';
          table += '<td>' + handleNull(result[x].birth_date_f) +'</td>';
          table += '<td>' + handleNull(result[x].email) +'</td>';
          table += '<td>' + handleNull(result[x].address) +'</td>';
          table += '<td>' + handleNull(result[x].mobile) +'</td>';
          table += '<td>' + handleNull(result[x].facebook_link) +'</td>';
          table += '<td>' + handleNull(result[x].twitter_link) +'</td>';
          table +=
          `<td>
          <button onclick='editItem(`+ result[x].id +`)' class='btn btn-xs' title='Edit'><i class='fa fa-pencil'></i></button>
          <button onclick='deleteItem(`+ result[x].id +`)' class='btn btn-xs btn-danger' title="Delete"><i class='fa fa-times'></i></button>
          </td>`;

          table += '</tr>';
        }

        table += '</tbody></table>';

        $(selector).append(table);
      });

    }

    handleNull = function(value){

      if(value != null && value != '' && value.length > 0){
        return value;
      }else{
        return 'N\/A';
      }
    }

    initializeTable('#table_div', table_headers);

  }); // End document ready
  </script>
