
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Matches / Fixtures
        <a href="#add_modal" data-toggle="modal" class="btn btn-xs btn-info pull-right"> + Add New </a>
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
              <label class="col-sm-2 control-label col-sm-2">Home Team</label>
              <div class="col-sm-10">
                <select class="form-control" name="home_team_id" required>
                  <?php foreach($teams as $team): # Find this in the controller ?>
                    <option value="<?= $team->id ?>"><?= $team->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Away Team</label>
              <div class="col-sm-10">
                <select class="form-control" name="away_team_id" required>
                  <?php foreach($teams as $team): # Find this in the controller ?>
                    <option value="<?= $team->id ?>"><?= $team->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">League</label>
              <div class="col-sm-10">
                <select class="form-control" name="league_id" required>
                  <?php foreach($leagues as $league): # Find this in the controller ?>
                    <option value="<?= $league->id ?>"><?= $league->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Hash Tag</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="hash_tag" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Round Number</label>
              <div class="col-sm-10">
                <input type="number" min="0" max="99" class="form-control" name="round_num" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Home score</label>
              <div class="col-sm-10">
                <input type="number" min="0" max="99" class="form-control" name="home_score" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Away score</label>
              <div class="col-sm-10">
                <input type="number" min="0" max="99" class="form-control" name="away_score" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Match schedule</label>
              <div class="col-sm-10">
                <input type="datetime-local" class="form-control" name="match_schedule" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Location</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="location" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Match Progress</label>
              <div class="col-sm-10">
                <select class="form-control" name="match_progress" required>
                  <?php foreach(MATCH_PROGRESS_TYPES as $option): # Find this in `application/config/constants.php` ?>
                    <option><?= $option ?></option>
                  <?php endforeach; ?>
                </select>
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
  <div aria-hidden="true" aria-labelledby="edit_modal_label" role="dialog" tabindex="-1" id="edit_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Edit item #<span id="edit_id"></span></h4>
        </div>
        <div class="modal-body">

          <form action="#" class="form-horizontal" id="edit_form">  <!-- form -->


            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Home Team</label>
              <div class="col-sm-10">
                <select class="form-control" name="home_team_id" id="_home_team_id" required>
                  <?php foreach($teams as $team): # Find this in the controller ?>
                    <option value="<?= $team->id ?>"><?= $team->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Away Team</label>
              <div class="col-sm-10">
                <select class="form-control" name="away_team_id" id="_away_team_id" required>
                  <?php foreach($teams as $team): # Find this in the controller ?>
                    <option value="<?= $team->id ?>"><?= $team->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">League</label>
              <div class="col-sm-10">
                <select class="form-control" name="league_id" id="_league_id" required>
                  <?php foreach($leagues as $league): # Find this in the controller ?>
                    <option value="<?= $league->id ?>"><?= $league->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Hash Tag</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="hash_tag" id="_hash_tag" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Round Number</label>
              <div class="col-sm-10">
                <input type="number" min="0" max="99" class="form-control" name="round_num" id="_round_num" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Home score</label>
              <div class="col-sm-10">
                <input type="number" min="0" max="99" class="form-control" name="home_score" id="_home_score" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Away score</label>
              <div class="col-sm-10">
                <input type="number" min="0" max="99" class="form-control" name="away_score" id="_away_score" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Match schedule</label>
              <div class="col-sm-10">
                <input type="datetime-local" class="form-control" name="match_schedule" id="_match_schedule" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Location</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="location" id="_location" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Match Progress</label>
              <div class="col-sm-10">
                <select class="form-control" name="match_progress" id="_match_progress" required>
                  <?php foreach(MATCH_PROGRESS_TYPES as $option): # Find this in `application/config/constants.php` ?>
                    <option><?= $option ?></option>
                  <?php endforeach; ?>
                </select>
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



  <!-- Match stats Modal -->
  <div aria-hidden="true" aria-labelledby="match_stats_modal_label" role="dialog" tabindex="-1" id="match_stats_modal" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Match statistics of fixture #<span id="match_stats_id"></span></h4>
        </div>
        <div class="modal-body">

          <form action="#" class="form-horizontal" id="match_stats_form">  <!-- form -->

            <div class="form-group">
              <div class="col-sm-2">
              </div>
              <div class="col-sm-6 text-center">
                <h4>Match Statistics</h4>
              </div>
              <div class="col-sm-2">
              </div>
              <div class="col-sm-2">
                <button class="btn btn-success btn-xs" title="Add new"><i class="fa fa-plus"></i> Add new</button>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-2">
                <input type="text" class="form-control" name="location" id="_location" required></input>
              </div>
              <div class="col-sm-6">
                <input type="text" class="form-control" name="location" id="_location" required></input>
              </div>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="location" id="_location" required></input>
              </div>
              <div class="col-sm-2" style="vertical-align">
                <button class="btn btn-info btn-xs" title="Save"><i class="fa fa-check"></i></button>
                <button class="btn btn-danger btn-xs" title="Remove"><i class="fa fa-times"></i></button>
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
  <!-- Match stats Modal end -->

  <script>
  $(document).ready(function(){
    var table;

    var base_url = "<?php echo base_url(); ?>";
    var api_segment = 'api/fixtures/';
    var api_url = base_url + api_segment;

    var table_headers = ['League', 'Home Team', 'Away Team', 'Hash Tag', 'Round number', 'Home Score', 'Away Score', 'Match schedule', 'Location', 'Match Progress'];

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
        $('#_league_id').find('option[value="' + result[0].league_id + '"]').prop('selected', true);
        $('#_home_team_id').find('option[value="' + result[0].home_team_id + '"]').prop('selected', true);
        $('#_away_team_id').find('option[value="' + result[0].away_team_id + '"]').prop('selected', true);
        $('#_hash_tag').val(result[0].hash_tag);
        $('#_round_num').val(result[0].round_num);
        $('#_home_score').val(result[0].home_score);
        $('#_away_score').val(result[0].away_score);

        /* Very long code just to set default datetime-local in javascript */
        Date.prototype.addHours= function(h){
          this.setHours(this.getHours()+h);
          return this;
        }

        $('#_match_schedule').val(((new Date(result[0].match_schedule.replace(/-/g,"/"))).addHours(8)).toISOString().substring(0,19));
        $('#_location').val(result[0].location);
        $('#_match_progress').val(result[0].match_progress);
      });
      $('#edit_id').html('');
      $('#edit_id').html(id);
      $('#edit_modal').modal('toggle');
    }

    /**
    * function for populating the match_stats modal
    * @var int   id
    */
    showStats = function(id) {
      $.getJSON(api_url + id, function(result){

        //
      });
      $('#match_stats_id').html('');
      $('#match_stats_id').html(id);
      $('#match_stats_modal').modal('toggle');
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
          table += '<td>' + result[x].league_name +'</td>';
          table += '<td>' + result[x].home_team_name +'</td>';
          table += '<td>' + result[x].away_team_name +'</td>';
          table += '<td>' + result[x].hash_tag +'</td>';
          table += '<td>' + result[x].round_num +'</td>';
          table += '<td>' + result[x].home_score +'</td>';
          table += '<td>' + result[x].away_score +'</td>';
          table += '<td>' + result[x].match_schedule +'</td>';
          table += '<td>' + result[x].location +'</td>';
          table += '<td>' + result[x].match_progress +'</td>';
          table +=
          `<td>
          <button onclick='showStats(`+ result[x].id +`)' class='btn btn-xs' title='Match Statistics'><i class='fa fa-tasks'></i></button>
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
