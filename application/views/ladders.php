
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Ladders
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
              <label class="col-sm-2 control-label col-sm-2">Team</label>
              <div class="col-sm-10">
                <select class="form-control" name="team_id" required>
                  <?php foreach($teams as $team): # Find this in the controller ?>
                    <option value="<?= $team->id ?>"><?= $team->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Court Type</label>
              <div class="col-sm-10">
                <select class="form-control" name="court_type" required>
                  <?php foreach(COURT_TYPES as $option): # Find this in `application/config/constants.php` ?>
                    <option><?= $option ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Wins</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="wins" required></input>
              </div>

              <label class="col-sm-2 control-label col-sm-2">Losses</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="losses" required></input>
              </div>

              <label class="col-sm-2 control-label col-sm-2">Draws</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="draws" required></input>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Matches played</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="matches_played" required></input>
              </div>

              <label class="col-sm-2 control-label col-sm-2">Goal difference</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="goal_difference" required></input>
              </div>

              <label class="col-sm-2 control-label col-sm-2">Points</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="points" required></input>
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
              <label class="col-sm-2 control-label col-sm-2">Team</label>
              <div class="col-sm-10">
                <select class="form-control" name="team_id" id="_team_id" required>
                  <?php foreach($teams as $team): # Find this in the controller ?>
                    <option value="<?= $team->id ?>"><?= $team->name ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Court Type</label>
              <div class="col-sm-10">
                <select class="form-control" name="court_type" id="_court_type" required>
                  <?php foreach(COURT_TYPES as $option): # Find this in `application/config/constants.php` ?>
                    <option><?= $option ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Wins</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="wins" id="_wins" required></input>
              </div>

              <label class="col-sm-2 control-label col-sm-2">Losses</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="losses" id="_losses" required></input>
              </div>

              <label class="col-sm-2 control-label col-sm-2">Draws</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="draws" id="_draws" required></input>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Matches played</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="matches_played" id="_matches_played" required></input>
              </div>

              <label class="col-sm-2 control-label col-sm-2">Goal difference</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="goal_difference" id="_goal_difference" required></input>
              </div>

              <label class="col-sm-2 control-label col-sm-2">Points</label>
              <div class="col-sm-2">
                <input type="number" min="0" max="999" class="form-control" name="points" id="_points" required></input>
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
    var api_segment = 'api/ladders/';
    var api_url = base_url + api_segment;

    var table_headers = ['League', 'Team', 'Court type', 'Wins', 'Losses', 'Draws', 'Matches played', 'Goal difference', 'Points'];

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
        $('#_court_type').find('option:contains("'+ result[0].court_type +'")').prop('selected', true);
        $('#_team_id').find('option[value="' + result[0].team_id + '"]').prop('selected', true);
        $('#_league_id').find('option[value="' + result[0].league_id + '"]').prop('selected', true);

        $('#_wins').val(result[0].wins);
        $('#_losses').val(result[0].losses);
        $('#_draws').val(result[0].draws);

        $('#_matches_played').val(result[0].matches_played);
        $('#_goal_difference').val(result[0].goal_difference);
        $('#_points').val(result[0].points);
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
          table += '<td>' + result[x].league_name +'</td>';
          table += '<td>' + result[x].team_name +'</td>';
          table += '<td>' + result[x].court_type +'</td>';
          table += '<td>' + result[x].wins +'</td>';
          table += '<td>' + result[x].losses +'</td>';
          table += '<td>' + result[x].draws +'</td>';
          table += '<td>' + result[x].matches_played +'</td>';
          table += '<td>' + result[x].goal_difference +'</td>';
          table += '<td>' + result[x].points +'</td>';
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
