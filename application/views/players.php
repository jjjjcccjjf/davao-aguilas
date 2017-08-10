
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Players
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
              <label class="col-sm-2 control-label col-sm-2">Player first name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fname" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Player last name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="lname" required></input>
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
              <label class="col-sm-2 control-label col-sm-2">Height</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="height" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Weight</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="weight" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Birth date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="birth_date" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Birth place</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="birth_place" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Nationality</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nationality" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Jersey number</label>
              <div class="col-sm-10">
                <input type="number" min="0" max="99" class="form-control" name="jersey_num" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Position</label>
              <div class="col-sm-10">
                <select class="form-control" name="position" required>
                  <?php foreach(PLAYER_POSITIONS as $option): # Find this in `application/config/constants.php` ?>
                    <option><?= $option ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Player photo</label>
              <div class="controls col-md-10">
                <input type="file" name="image_url" required/>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Full body photo</label>
              <div class="controls col-md-10">
                <input type="file" name="full_body_image_url" required/>
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
              <label class="col-sm-2 control-label col-sm-2">Player first name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="fname" id="_fname" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Player last name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="lname" id="_lname" required></input>
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
              <label class="col-sm-2 control-label col-sm-2">Height</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="height" id="_height" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Weight</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="weight" id="_weight" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Birth date</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="birth_date" id="_birth_date" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Birth place</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="birth_place" id="_birth_place" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Nationality</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nationality" id="_nationality" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label col-sm-2">Jersey number</label>
              <div class="col-sm-10">
                <input type="number" min="0" max="99" class="form-control" name="jersey_num" id="_jersey_num" required></input>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Position</label>
              <div class="col-sm-10">
                <select class="form-control" name="position" id="_position" required>
                  <?php foreach(PLAYER_POSITIONS as $option): # Find this in `application/config/constants.php` ?>
                    <option><?= $option ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Player photo</label>
              <div class="controls col-md-10">
                <input type="file" name="image_url" id="_image_url" />
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-2">Full body photo</label>
              <div class="controls col-md-10">
                <input type="file" name="full_body_image_url" id="_full_body_image_url" />
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
    var api_segment = 'api/players/';
    var api_url = base_url + api_segment;

    var table_headers = ['Player name', 'Team', 'Position', 'Player photo', 'Fully body photo'];

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
        $('#_lname').val(result[0].lname);
        $('#_height').val(result[0].height);
        $('#_weight').val(result[0].weight);
        $('#_jersey_num').val(result[0].jersey_num);
        $('#_birth_date').val(result[0].birth_date);
        $('#_birth_place').val(result[0].birth_place);
        $('#_nationality').val(result[0].nationality);
        $('#_position').find('option:contains("'+ result[0].position +'")').prop('selected', true);
        $('#_team_id').find('option[value="' + result[0].team_id + '"]').prop('selected', true);
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
          table += '<td>' + result[x].lname + ", " + result[x].fname +'</td>';
          table += '<td>' + result[x].team_name +'</td>';
          table += '<td>' + result[x].position +'</td>';
          table += '<td><a href="' + result[x].image_url + '" target="_blank">' + (result[x].image_url.split("/")).pop() +'</a></td>'; // get only file  name
          table += '<td><a href="' + result[x].full_body_image_url + '" target="_blank">' + (result[x].full_body_image_url.split("/")).pop() +'</a></td>'; // get only file  name
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


/*
                                                 ,  ,
                                               / \/ \
                                              (/ //_ \_
     .-._                                      \||  .  \
      \  '-._                            _,:__.-"/---\_ \
 ______/___  '.    .--------------------'~-'--.)__( , )\ \
`'--.___  _\  /    |             Here        ,'    \)|\ `\|
     /_.-' _\ \ _:,_          Be Dragons           " ||   (
   .'__ _.' \'-/,`-~`                                |/
       '. ___.> /=,|  Abandon hope all ye who enter  |
        / .-'/_ )  '---------------------------------'
        )'  ( /(/
             \\ "
              '=='

*/


  }); // End document ready
  </script>
