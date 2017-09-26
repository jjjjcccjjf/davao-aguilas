
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Teams
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
            <label class="col-sm-2 control-label col-sm-2">Team name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" required></input>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2">Team image</label>
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
            <label class="col-sm-2 control-label col-sm-2">Team name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="_name" required></input>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-md-2">Team image</label>
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

<!-- Team stats Modal -->
<div aria-hidden="true" aria-labelledby="team_stats_modal_label" role="dialog" tabindex="-1" id="team_stats_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
        <h4 class="modal-title">Team statistics of team #<span id="team_stats_id"></span></h4>
      </div>
      <div class="modal-body">

        <div class="form-horizontal">

          <div class="form-group">
            <div class="col-sm-2 text-center">
            </div>
            <div class="col-sm-6 text-center">
              <h4>Team Statistics</h4>
            </div>
            <div class="col-sm-2 text-center">
            </div>
            <div class="col-sm-2">
              <button class="btn btn-success btn-xs" id="add_match_btn" title="Add new"><i class="fa fa-plus"></i> Add new</button>
            </div>
            <div class="col-sm-12">
              <div class="alert alert-info fade in">
                <button data-dismiss="alert" class="close close-sm" type="button">
                  <i class="fa fa-times"></i>
                </button>
                <strong>Psst!</strong> Don't forget to <strong>save your changes</strong> before adding or editing another item!
              </div>
            </div>
          </div>

          <div id="team_stats_forms">  <!-- forms -->

          </div> <!-- / forms -->

        </div>
      </div>
    </div>
  </div>
</div>
<!-- Match stats Modal end -->

<script>
$(document).ready(function(){
  var table;

  var base_url = "<?php echo base_url(); ?>";
  var api_segment = 'api/teams/';
  team_stats_api_url = base_url + 'api/team_stats/';
  var api_url = base_url + api_segment;

  var table_headers = ['Team name', 'Image URL'];

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
      $('#_name').val(result[0].name);
      $('#_image_url').val(result[0].image_url);
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
        table += '<td>' + result[x].name +'</td>';
        table += '<td><a href="' + result[x].image_url + '" target="_blank">' + '<button class="btn btn-xs btn-info"><i class="fa fa-eye"></i></button>' +'</a></td>';
        table +=
        `<td>
        <button onclick='editItem(`+ result[x].id +`)' class='btn btn-xs' title='Edit'><i class='fa fa-pencil'></i></button>
        <button onclick='deleteItem(`+ result[x].id +`)' class='btn btn-xs btn-danger' title="Delete"><i class='fa fa-times'></i></button>
        <button onclick='showTeamStats(`+ result[x].id +`)' class='btn btn-xs btn-success' title='Team statistics'><i class='fa fa-book'></i></button>
        </td>`;

        table += '</tr>';
      }

      table += '</tbody></table>';

      $(selector).append(table);
    });

  }

  initializeTable('#table_div', table_headers);

  initializeTeamStats = function(id){
    var $team_stats_forms = $("#team_stats_forms");
    var $add_btn = $('#add_match_btn');

    $team_stats_forms.empty();

    $add_btn.removeAttr('onclick');
    $add_btn.attr('onClick', 'newTeamStat('+ id +');');

    stat_names = '<select name="stat_key" class="form-control">';
    stat_names +=
    `<?php foreach(TEAM_STAT_NAMES as $option):?>
    <option><?= $option ?></option>
    <?php endforeach; ?>
    `;
    stat_names += '</select>';

    $.getJSON(team_stats_api_url + 'team/' + id, function(result){

      /* ------------------------------------------------- */
      /* -------------MAIN CONTENT WILL GO HERE----------- */
      /* ------------------------------------------------- */
      for(var x in result){
        $team_stats_forms.append(`
          <div class="form-group" id="team_stats_row_`+ result[x].id +`" data-from_match="`+id+`">
          <div class="col-sm-6">` +
          stat_names
          + `</div>
          <div class="col-sm-4">
          <input type="number" min="0" class="form-control" name="stat_value"  id="stat_value-`+ result[x].id +`" placeholder="Stat value" value="` + result[x].stat_value + `" required></input>
          </div>
          <div class="col-sm-2" style="vertical-align">
          <button type="button" class="btn btn-info btn-xs save-btn" data-tstat_id="`+ result[x].id +`" id="save_btn-` + result[x].id + `" title="Save" ><i class="fa fa-check"></i></button>
          <button type="button" class="btn btn-danger btn-xs" onclick="deleteTeamStat(` + result[x].id + `, `+ id +`)" title="Remove"><i class="fa fa-times"></i></button>
          </div>
          </div>`);

          // setting the DROPDOWN id here
          // and also setting default values
          $("#team_stats_row_" + result[x].id).find('select option').each(function() {
            this.selected = $(this).text() == result[x]. stat_key;
          });

          $("#team_stats_row_" + result[x].id).find('select').attr('id', 'stat_key-' + result[x].id);
        }
      });
    }

    /**
    * function for populating the team_stats modal
    * @var int   id
    */
    showTeamStats = function(id) {
      initializeTeamStats(id);
      $('#team_stats_id').html('');
      $('#team_stats_id').html(id);
      $('#team_stats_modal').modal('toggle');
    }

    newTeamStat = function(id){
      $.ajax({
        url: team_stats_api_url,
        type: 'POST',
        data: { team_id : id },
        success: function (data, textStatus, xhr) {
          if(xhr.status == 201){
            initializeTeamStats(id);
          }
        },
        error: function(e){
          console.log(e);
        }
      });
    }


    $('body').on('click', '.save-btn', function(){
      var elem_id = $(this).attr('id');
      var team_stats_id = $("#" + elem_id).data('tstat_id'); // fixture id
      var stat_key = $("#stat_key-" + team_stats_id).val();
      var stat_value = $("#stat_value-" + team_stats_id).val();
      var team_id = $("#team_stats_row_" + team_stats_id).data('from_match');


      $.ajax({
        url: team_stats_api_url + team_stats_id,
        type: 'POST',
        data: { stat_key : stat_key, stat_value: stat_value, team_id: team_id },
        success: function (data, textStatus, xhr) {
          if(xhr.status == 200){
            initializeTeamStats(team_id);
            // customMessage('#custom_message', 'Item deleted successfully'); FIXME
          }
        }
      });

    });

  }); // End document ready

  function deleteTeamStat(team_stats_id, team_id){
    if(confirm('Are you sure you want to do this?')){
      $.ajax({
        url: team_stats_api_url + team_stats_id,
        type: 'DELETE',
        success: function (data, textStatus, xhr) {
          if(xhr.status == 204){
            initializeTeamStats(team_id);
            // customMessage('#custom_message', 'Item deleted successfully'); FIXME
          }
        }
      });
    }
  }
  </script>
