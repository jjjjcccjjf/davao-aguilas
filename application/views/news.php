<!-- Featured item -->
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Featured News
        <br>
        <div><sub style="color:green;" id="custom_message_featured"></sub></div>
        <select class="form-control" style="margin-top:12px" id="featured_news" >
          <!-- options set by javascript -->
        </select>
      </header>
    </section>
  </div>
</div>

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
        <div class="table-responsive" id="table_div">
          <!-- table appended via ajax -->
        </div>
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
            <label class="col-sm-2 control-label col-sm-2">Wordpress button label</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="button_label" required></input>
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
            <label class="col-sm-2 control-label col-sm-2">Wordpress button label</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="button_label" id="_button_label" required></input>
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
  var $featured_news = $("#featured_news");

  var base_url = "<?php echo base_url(); ?>";
  var api_segment = 'api/news/';
  var api_url = base_url + api_segment;

  var table_headers = ['Title', 'Body', 'Wordpress button label', 'Image URL'];

  /**---------------------------------------------
  -------------------POST add---------------------
  ---------------------------------------------**/
  $("#add_form").submit(function(e){
    var form_data = new FormData($(this)[0]);

    showLoader();

    setTimeout(function () {
      $.ajax({
        url: api_url,
        type: 'POST',
        data: form_data,
        async: false,
        success: function (data, textStatus, xhr) {
          if(xhr.status == 201){
            hideLoader();
            initializeTable('#table_div', table_headers, initializeFeatured);
            $('#add_modal').modal('toggle');
            clearAllForms();
            customMessage('#custom_message', 'Item added successfully');
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    }, 200);



    e.preventDefault();
  });
  /**---------------------------------------------
  -------------------POST edit---------------------
  ---------------------------------------------**/
  $("#edit_form").submit(function(e){
    var form_data = new FormData($(this)[0]);

    showLoader();

    setTimeout(function () {
      $.ajax({
        url: api_url + $('#edit_id').html(),
        type: 'POST',
        data: form_data,
        async: false,
        success: function (data, textStatus, xhr) {
          if(xhr.status == 200){
            hideLoader();
            initializeTable('#table_div', table_headers, initializeFeatured);
            clearAllForms();
            $('#edit_modal').modal('toggle');
            customMessage('#custom_message', 'Changes saved successfully');
          }
        },
        cache: false,
        contentType: false,
        processData: false
      });
    }, 200);
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
            initializeTable('#table_div', table_headers, initializeFeatured);
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
      $('#_title').val(result[0].title);
      $('#_body').val(result[0].body);
      $('#_button_label').val(result[0].button_label);
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
  initializeTable = function(selector, table_headers, callBack){
    $(selector).empty();

    $.getJSON(api_url + "?order_by=desc", function(result){
      result = result['news'];
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
        table += '<td>' + result[x].button_label +'</td>';
        table += '<td><a href="' + result[x].image_url + '" target="_blank">' + '<button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>' +'</a></td>';
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
    callBack();
  }

  initializeFeatured = function(){
    var options = "<option disabled selected>-- Choose item --</option>";
    $.getJSON(api_url, function(result){
      result = result['news'];

      for(var x in result){
        options += '<option value="'+ result[x].id +'">'+ result[x].title +'</option>';
      }
      $featured_news.html(options);

      (function(){
        $.getJSON(api_url + "featured", function(result){
          $featured_news.find('option[value="' + result[0].id + '"]').prop('selected', true);
        });
      })();

    });
  }


  $featured_news.on('change', function(){
    $.ajax({
      url: api_url + 'featured/' + $(this).val(),
      type: 'POST',
      success: function (data, textStatus, xhr) {
        if(xhr.status == 200){
          customMessage('#custom_message_featured', 'Changes saved');
        }
      }
    });
  });

  initializeTable('#table_div', table_headers, initializeFeatured);

}); // End document ready
</script>
