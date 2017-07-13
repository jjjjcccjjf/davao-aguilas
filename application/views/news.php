
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        News
        <a href="#add_modal" data-toggle="modal" class="btn btn-xs btn-info pull-right"> + Add New </a>
        <br>
        <div><sub style="color:green;" id="custom_message"></sub></div>
      </header>

      <div class="panel-body">
        <div id="table_div"></div>
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
            <label class="col-sm-2 control-label col-sm-2">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title" required></input>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label col-sm-2">Body</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="body" rows="6" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2">Banner</label>
            <div class="controls col-md-10">
              <input type="file" name="image_url" required/>
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
            <label class="col-sm-2 control-label col-sm-2">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title" id="_title" required></input>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label col-sm-2">Body</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="body" rows="6" id="_body" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2">Banner</label>
            <div class="controls col-md-10">
              <input type="file" name="image_url"/>
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
  var api_segment = 'api/news/';
  var api_url = base_url + api_segment;

  var table_headers = ['Title', 'Body', 'Image URL'];

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
          customMessage('Item added successfully');
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
          customMessage('Changes saved successfully');
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
            customMessage('Item deleted successfully');
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
      $('#_title').val(result[0].title);
      $('#_body').val(result[0].body);
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
        table += '<td>' + result[x].title +'</td>';
        table += '<td>' + (((result[x].body).length > 140) ? (result[x].body).substr(0,140) + '...' : result[x].body) +'</td>'; // chop off string and add ellipses when exceeding 140 characters
        table += '<td><a href="' + result[x].image_url + '" target="_blank">' + (result[x].image_url.split("/")).pop() +'</a></td>';
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

  initializeTable('#table_div', table_headers);

}); // End document ready
</script>
