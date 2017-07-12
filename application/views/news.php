
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        News
        <a href="#add_modal" data-toggle="modal" class="btn btn-xs btn-info pull-right"> + Add New </a>
      </header>

      <div class="panel-body">
        <div id="asd"></div>
      </div>
    </section>
  </div>
</div>

<!-- Modal -->
<div aria-hidden="true" aria-labelledby="add_modal_label" role="dialog" tabindex="-1" id="add_modal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Add</h4>
      </div>
      <div class="modal-body">

        <form action="#" class="form-horizontal">  <!-- form -->

          <div class="form-group">
            <label class="col-sm-2 control-label col-sm-2">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title"></input>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label col-sm-2">Body</label>
            <div class="col-sm-10">
              <textarea class="form-control" name="body" rows="6"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2">Banner</label>
            <div class="controls col-md-10">
              <div class="fileupload fileupload-new" data-provides="fileupload">
                <span class="btn btn-white btn-file">
                  <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                  <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                  <input type="file" class="default" name="image_url"/>
                </span>
                <span class="fileupload-preview" style="margin-left:5px;"></span>
                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
              </div>
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
<!-- Modal end -->

<script>
$(document).ready(function(){
  var table;

  $("form").submit(function(e){
    var formData = new FormData($(this)[0]);

    $.ajax({
      url: '<?php echo base_url('api/news')?>',
      type: 'POST',
      data: formData,
      async: false,
      success: function (data, textStatus, xhr) {
        if(xhr.status == 201){
          initializeTable('api/news', '#asd', ['Title', 'Body', 'Image URL']);
          $('form')[0].reset(); // TODO: remove file every submit
          $('#add_modal').modal('toggle');
        }
      },
      cache: false,
      contentType: false,
      processData: false
    });

    e.preventDefault();
  });

  deleteItem = function(id){

    if(confirm('Are you sure you want to do this?')){
      $.ajax({
        url: '<?php echo base_url('api/news')?>/' + id,
        type: 'DELETE',
        success: function (data, textStatus, xhr) {
          if(xhr.status == 204){
            initializeTable('api/news', '#asd', ['Title', 'Body', 'Image URL']);
          }
        }
      });
    }

  }

  /**
  * initialize a table using an api
  * @var url                string      url to use GET request
  * @var selector           string      element to append our table ex. '#some_id'
  * @var table_headers      array       headers to use excluding the number counter header ex. ['Some header', 'Another one', 'And another one']
  */
  initializeTable = function(url, selector, table_headers){
    $(selector).empty();

    $.getJSON('<?php echo base_url(); ?>' + url, function(result){
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
        table += '<td>' + result[x].body +'</td>';
        table += '<td><a href="../uploads/news/'+ result[x].image_url + '">' + result[x].image_url +'</a></td>';
        table +=
        `<td>
        <button class='btn btn-xs' title='Edit'><i class='fa fa-pencil'></i></button>
        <button onClick='deleteItem(`+ result[x].id +`)' class='btn btn-xs btn-danger' title="Delete"><i class='fa fa-times'></i></button>
        </td>`;

        table += '</tr>';
      }

      table += '</tbody></table>';

      $(selector).append(table);
    });

  }

  initializeTable('api/news', '#asd', ['Title', 'Body', 'Image URL']);

}); // End document ready
</script>
