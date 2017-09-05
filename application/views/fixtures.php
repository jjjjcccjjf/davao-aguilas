<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        Matches / Fixtures
        <a href="#add_modal" data-toggle="modal" class="btn btn-xs btn-info pull-right"> + Add New </a>
        <br>
        <div><sub style="color:mediumseagreen;" id="custom_message"></sub></div>
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
  <!-- Match reports -->
  <div aria-hidden="true" aria-labelledby="match_reports_label" role="dialog" tabindex="-1" id="match_reports_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Match report of fixture #<span id="match_reports_id"></span></h4>
        </div>
        <div class="modal-body">

          <form action="#" class="form-horizontal" id="match_reports_form">  <!-- form -->

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
  <!-- Match reports end -->

  <!-- Match stats Modal -->
  <div aria-hidden="true" aria-labelledby="match_stats_modal_label" role="dialog" tabindex="-1" id="match_stats_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Match statistics of fixture #<span id="match_stats_id"></span></h4>
        </div>
        <div class="modal-body">

          <div class="form-horizontal">


            <div class="form-group">
              <div class="col-sm-2 text-center">
                <h4>Home Score</h4>
              </div>
              <div class="col-sm-6 text-center">
                <h4>Match Statistics</h4>
              </div>
              <div class="col-sm-2 text-center">
                <h4>Away Score</h4>
              </div>
              <div class="col-sm-2">
                <button class="btn btn-success btn-xs" id="add_match_btn" title="Add new"><i class="fa fa-plus"></i> Add new</button>
              </div>
            </div>

            <div id="match_stats_forms">  <!-- forms -->

            </div> <!-- / forms -->

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Match stats Modal end -->

  <!-- Lineups Modal -->
  <div aria-hidden="true" aria-labelledby="lineups_modal_label" role="dialog" tabindex="-1" id="lineups_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Lineup of fixture #<span id="lineups_id"></span></h4>
        </div>
        <div class="modal-body">

          <div class="form-horizontal">


            <div class="form-group">
              <div class="col-sm-2 text-center">
                <h4>Player</h4>
              </div>
              <div class="col-sm-6 text-center">
                <h4>Team</h4>
              </div>
              <div class="col-sm-2 text-center">
                <h4>Position</h4>
              </div>
              <div class="col-sm-2">
                <button class="btn btn-success btn-xs" id="add_lineups_btn" title="Add new"><i class="fa fa-plus"></i> Add new</button>
              </div>
            </div>

            <div id="lineups_forms">  <!-- forms -->

            </div> <!-- / forms -->

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Lineups Modal end -->

  <!-- Commentary Modal -->
  <div aria-hidden="true" aria-labelledby="commentary_modal_label" role="dialog" tabindex="-1" id="commentary_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Commentary of fixture #<span id="commentary_id"></span></h4>
        </div>
        <div class="modal-body">

          <div class="form-horizontal">

            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <form action="#" class="form-horizontal" id="commentary_form">  <!-- form -->

                    <div class="col-sm-12 text-center">
                      <div class="col-sm-12">
                        <h4>Commentaries</h4>
                      </div>
                    </div>
                    <div class="col-sm-12"> <!-- col sm 12 -->
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Full time commentary</label>
                        <div class="col-sm-12">
                          <textarea class="form-control v-resize-only" name="full_time" id="_full_time" required></textarea>
                        </div>
                      </div>
                    </div>   <!-- end col sm 12 -->

                    <div class="col-sm-12"> <!-- col sm 12 -->
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Half time commentary</label>
                        <div class="col-sm-12">
                          <textarea class="form-control v-resize-only" name="half_time" id="_half_time" required></textarea>
                        </div>
                      </div>
                    </div>   <!-- end col sm 12 -->

                    <div class="col-sm-12"> <!-- col sm 12 -->
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Introduction commentary</label>
                        <div class="col-sm-12">
                          <textarea class="form-control v-resize-only" name="intro" id="_intro" required></textarea>
                        </div>
                      </div>
                    </div>   <!-- end col sm 12 -->

                    <div class="form-group">
                      <div class="controls col-md-10" style="margin-left:15px">
                        <button type="submit" class="btn btn-white">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>

              </div>

              <div class="col-sm-8">

                <div class="col-sm-12 text-center">
                  <div class="col-sm-12">
                    <h4>First half Commentaries</h4>
                  </div>
                </div>

                <div class="col-sm-12 text-center">
                  <div class="col-sm-2">
                    <h5>Minute mark</h5>
                  </div>
                  <div class="col-sm-2">
                    <h5>Action</h5>
                  </div>
                  <div class="col-sm-5 text-center">
                    <h5>Text body</h5>
                  </div>
                  <div class="col-sm-2">
                    <button class="btn btn-success btn-xs" id="add_first_half_btn" title="Add new"><i class="fa fa-plus"></i> Add new</button>
                  </div>
                </div>

                <div id="first_half_forms">  <!-- forms -->
                </div> <!-- / forms -->

                <!-- ############################### -->


                <div class="col-sm-12 text-center">
                  <div class="col-sm-12">
                    <h4>Second half Commentaries</h4>
                  </div>
                </div>

                <div class="col-sm-12 text-center">
                  <div class="col-sm-2">
                    <h5>Minute mark</h5>
                  </div>
                  <div class="col-sm-2">
                    <h5>Action</h5>
                  </div>
                  <div class="col-sm-5 text-center">
                    <h5>Text body</h5>
                  </div>
                  <div class="col-sm-2">
                    <button class="btn btn-success btn-xs" id="add_second_half_btn" title="Add new"><i class="fa fa-plus"></i> Add new</button>
                  </div>
                </div>

                <div id="second_half_forms">  <!-- forms -->
                </div> <!-- / forms -->


              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Commentary Modal end -->



  <!-- Notifications -->
  <div aria-hidden="true" aria-labelledby="notifs_label" role="dialog" tabindex="-1" id="notifs_modal" class="modal fade">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
          <h4 class="modal-title">Notification Menu of Ongoing Match #<span id="notifs_id"></span></h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-6">

              <form method="POST" class="form-horizontal" id="notifs_form">  <!-- form -->
                <div class="col-sm-12">
                  <p class="hidden" id="_loading" style="color:cadetblue;font-weight:bold">Processing...</p>
                  <p class="" id="custom_notif" style="color:mediumseagreen;font-weight:bold"></p>
                  <p class="" id="custom_notif_f" style="color:red;font-weight:bold"></p>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label col-sm-2">Title</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" id="n_title"  required></input>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label col-sm-2">Body</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="body" rows="6"  id="n_body" required></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label col-sm-2">Notif type</label>
                  <div class="col-sm-10">
                    <select name="notif_type" class="form-control" id="n_notif_type">
                      `<?php foreach(NOTIF_CONSTANTS as $key => $val ):?>
                        <option value="<?php echo $key ?>"><?php echo $val ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-2"></label>
                  <div class="controls col-md-10">
                    <button type="submit" class="btn btn-info">Notify</button>
                  </div>
                </div>
              </form> <!-- / form -->
            </div>


            <div class="col-lg-6">
              <div class="form-group">
                <div class="col-lg-12 text-center">
                  <h2>Real-time Score</h2>
                  <p class="" id="live_score_notif" style="color:mediumseagreen;font-weight:bold"></p>
                  <p class="hidden" id="live_score_p" style="color:sandybrown;font-weight:bold">Processing...</p>
                  <div class="alert alert-warning fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                      <i class="fa fa-times"></i>
                    </button>
                    <strong>Notice:</strong> Changes to the scores will be pushed immediately <strong>after 4 seconds</strong>
                  </div>
                </div>
                <div class="col-sm-5  ">
                  <h4 id="n_team_name_home">Team 1 Name</h4>
                  <h5>Home Score</h5>

                  <input type="number" id="n_home_score" class="form-control live_score" style="height:50px;width:70px" min="0" max="99" step="1" >
                </div>
                <div class="col-sm-2 " style='text-align:left'>
                  <h4>vs</h4>
                </div>
                <div class="col-sm-5  ">
                  <h4 id="n_team_name_away">Team 2 name</h4>
                  <h5>Away Score</h5>
                  <input type="number" id="n_away_score" class="form-control live_score" style="height:50px;width:70px" min="0" max="99" step="1"  >
                </div>
              </div>
            </div> <!-- end modal body -->

          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- Notifications end -->

  <script>

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

$(document).ready(function(){
  // Declarations
  var table;

  ok_update_score = 0;
  var countdownTimer;
  var base_url = "<?php echo base_url(); ?>";
  var api_url = base_url + 'api/fixtures/';
  match_stat_api_url = base_url + 'api/match_stats/';
  match_reports_api_url = base_url + 'api/match_reports/';
  cpm_api_url = base_url + 'api/cpm/';
  notifs_api_url = base_url + 'notifications/new/';
  lineups_api_url = base_url + 'api/lineups/';
  var table_headers = ['League', 'Home Team', 'Away Team', 'Hash Tag', 'Round number', 'Home Score', 'Away Score', 'Match schedule', 'Location', 'Match Progress'];

  /**
  * function for populating the match_stats modal
  * @var int   id
  */
  showMatchStats = function(id) {
    initializeMatchStats(id);
    $('#match_stats_id').html('');
    $('#match_stats_id').html(id);
    $('#match_stats_modal').modal('toggle');
  }

  showNotifMenu = function(id) {
    initializeNotifs(id);
    $('#notifs_id').html('');
    $('#notifs_id').html(id);
    $('#notifs_modal').modal('toggle');
  }

  showLineups = function(id) {
    initializeLineups(id);
    $('#lineups_id').html('');
    $('#lineups_id').html(id);
    $('#lineups_modal').modal('toggle');
  }

  newMatchStat = function(id){
    $.ajax({
      url: match_stat_api_url,
      type: 'POST',
      data: { fixture_id : id },
      success: function (data, textStatus, xhr) {
        if(xhr.status == 201){
          initializeMatchStats(id);
        }
      }
    });
  }

  newCpm = function(id, type){
    $.ajax({
      url: cpm_api_url,
      type: 'POST',
      data: { fixture_id : id, coverage_type: type },
      success: function (data, textStatus, xhr) {
        if(xhr.status == 201){
          initializeCpm(id);
        }
      }
    });
  }

  newLineup = function(id, team_id){
    $.ajax({
      url: lineups_api_url,
      type: 'POST',
      data: { fixture_id : id , team_id: team_id},
      success: function (data, textStatus, xhr) {
        if(xhr.status == 201){
          initializeLineups(id);
        }
      }
    });
  }



  initializeNotifs = function(id){
    var $notifs_forms = $("#notifs_forms");

    // Initialize
    $("#n_home_score").val('');
    $("#n_away_score").val('');
    $notifs_forms.empty();

    $.getJSON(api_url + id, function(result){

      $("#n_team_name_home").html(result[0].home_team_name);
      $("#n_home_score").val(result[0].home_score);
      $("#n_team_name_away").html(result[0].away_team_name);
      $("#n_away_score").val(result[0].away_score);

    });

  }

  initializeMatchStats = function(id){
    var $match_stat_forms = $("#match_stats_forms");
    var $add_btn = $('#add_match_btn');

    $match_stat_forms.empty();

    $add_btn.removeAttr('onclick');
    $add_btn.attr('onClick', 'newMatchStat('+ id +');');

    stat_names = '<select name="stat_name" class="form-control">';
    stat_names +=
    `<?php foreach(MATCH_STAT_NAMES as $option):?>
    <option><?= $option ?></option>
    <?php endforeach; ?>
    `;
    stat_names += '</select>';

    $.getJSON(match_stat_api_url + 'fixtures/' + id, function(result){

      /* ------------------------------------------------- */
      /* -------------MAIN CONTENT WILL GO HERE----------- */
      /* ------------------------------------------------- */
      for(var x in result){
        $match_stat_forms.append(`
          <div class="form-group" id="match_stat_row_`+ result[x].id +`" data-from_match="`+id+`">
          <div class="col-sm-2">
          <input type="number" min="0" class="form-control" name="home_score" id="home_score-`+ result[x].id +`" placeholder="Home score" value="` + result[x].home_score + `" required></input>
          </div>
          <div class="col-sm-6">` +
          stat_names
          + `</div>
          <div class="col-sm-2">
          <input type="number" min="0" class="form-control" name="away_score"  id="away_score-`+ result[x].id +`" placeholder="Away score" value="` + result[x].away_score + `" required></input>
          </div>
          <div class="col-sm-2" style="vertical-align">
          <button type="button" class="btn btn-info btn-xs save-btn" data-mstat_id="`+ result[x].id +`" id="save_btn-` + result[x].id + `" title="Save" ><i class="fa fa-check"></i></button>
          <button type="button" class="btn btn-danger btn-xs" onclick="deleteMatchStat(` + result[x].id + `, `+ id +`)" title="Remove"><i class="fa fa-times"></i></button>
          </div>
          </div>`);

          // setting the DROPDOWN id here
          // and also setting default values
          $("#match_stat_row_" + result[x].id).find('select option:contains("' + result[x].stat_name + '")').prop('selected', true);
          $("#match_stat_row_" + result[x].id).find('select').attr('id', 'stat_name-' + result[x].id);
        }


        /* ------------------------------------------------- */
        /* ----------- /MAIN CONTENT WILL GO HERE----------- */
        /* ------------------------------------------------- */
      });
    }


    initializeLineups = function(id){
      var $lineup_forms = $("#lineups_forms");
      var $add_btn = $('#add_lineups_btn');
      var team_id = "<?php echo $default_team_id; ?>";
      $lineup_forms.empty();

      $add_btn.removeAttr('onclick');
      $add_btn.attr('onClick', 'newLineup('+ id +', '+ team_id +');');

      players = '<select name="player_id" class="form-control">';
      players += '<option value="0">--Choose Player--</option>';
      players +=
      `<?php foreach($players as $player):?>
      <option value="<?php echo $player->id ?>"><?php echo $player->fname . " " . $player->lname?></option>
      <?php endforeach; ?>
      `;
      players += '</select>';

      positions = '<select name="position" class="form-control">';
      positions += '<option value="">--Choose Position--</option>';
      positions +=
      `<?php foreach(PLAYER_POSITIONS as $option):?>
      <option value="<?php echo $option ?>"><?php echo $option ?></option>
      <?php endforeach; ?>
      `;
      positions += '</select>';

      teams = '<select name="team_id" class="form-control" readonly>';
      teams +=
      `<?php foreach($teams as $team):?>
      <?php if($team->name == 'Davao Aguilas'): ?>
      <option value="<?php echo $team->id ?>" selected><?php echo $team->name ?></option>
      <?php #else: ?>
      <!--  <option value="<?php # echo $team->id ?>"><?php #echo $team->name ?></option> -->
      <?php endif; ?>
      <?php endforeach; ?>
      `;
      teams += '</select>';

      $.getJSON(api_url + id + '/lineups', function(result){

        /* ------------------------------------------------- */
        /* -------------MAIN CONTENT WILL GO HERE----------- */
        /* ------------------------------------------------- */
        console.log(result);
        for(var x in result){
          $lineup_forms.append(`
            <div class="form-group" id="lineups_row_`+ result[x].id +`" data-from_match="`+id+`">
            <div class="col-sm-3">` +
            players
            + `</div>
            <div class="col-sm-4">` +
            teams
            + `</div>
            <div class="col-sm-3">` +
            positions
            + `</div>
            <div class="col-sm-2" style="vertical-align">
            <button type="button" class="btn btn-info btn-xs save-btn-lineups" data-lineups_id="`+ result[x].id +`" id="save_lineup_btn-` + result[x].id + `" title="Save" ><i class="fa fa-check"></i></button>
            <button type="button" class="btn btn-danger btn-xs" onclick="deleteLineup(` + result[x].id + `, `+ id +`)" title="Remove"><i class="fa fa-times"></i></button>
            </div>
            </div>`);

            // setting the DROPDOWN id here
            // and also setting default values
            $("#lineups_row_" + result[x].id).find('option[value="' + result[x].team_id + '"]').prop('selected', true);
            $("#lineups_row_" + result[x].id).find('select[name="team_id"]').attr('id', 'l_team_id-' + result[x].id);

            $("#lineups_row_" + result[x].id).find('option[value="' + result[x].player_id + '"]').prop('selected', true);
            $("#lineups_row_" + result[x].id).find('select[name="player_id"]').attr('id', 'l_player_id-' + result[x].id);

            $("#lineups_row_" + result[x].id).find('option[value="' + result[x].position + '"]').prop('selected', true);
            $("#lineups_row_" + result[x].id).find('select[name="position"]').attr('id', 'l_position-' + result[x].id);

          }


          /* ------------------------------------------------- */
          /* ----------- /MAIN CONTENT WILL GO HERE----------- */
          /* ------------------------------------------------- */
        });
      }


      initializeCpm = function(id){
        var $first_half_forms = $("#first_half_forms");
        var $second_half_forms = $("#second_half_forms");

        var $add_btn_1st = $('#add_first_half_btn');
        var $add_btn_2nd = $('#add_second_half_btn');

        $first_half_forms.empty();
        $second_half_forms.empty();

        $add_btn_1st.removeAttr('onclick');
        $add_btn_1st.attr('onClick', 'newCpm('+ id +', "first_half");');

        $add_btn_2nd.removeAttr('onclick');
        $add_btn_2nd.attr('onClick', 'newCpm('+ id +', "second_half");');

        icon_types = '<select name="icon_type" class="form-control">';
        icon_types +=
        `<?php foreach(ICON_TYPES as $option):?>
        <option><?= $option ?></option>
        <?php endforeach; ?>
        `;
        icon_types += '</select>';

        $.getJSON(api_url + id + '/commentary', function(result){

          /* ------------------------------------------------- */
          /* -------------MAIN CONTENT WILL GO HERE----------- */
          /* ------------------------------------------------- */

          first_half = result.first_half;
          second_half = result.second_half;

          // var first_half = result[x].first_half;
          // var second_half = result[x].second_half;

          for(var x in first_half){
            $first_half_forms.append(`<div class="form-group" id="cpm_row_`+ first_half[x].id +`" data-from_match="`+id+`">
            <div class="col-sm-2">
            <input type="text" class="form-control" name="minute_mark" id="minute_mark-`+ first_half[x].id +`" placeholder="Minute mark" value="` + first_half[x].minute_mark + `" required></input>
            </div>
            <div class="col-sm-3">` +
            icon_types
            + `</div>
            <div class="col-sm-4">
            <textarea class="form-control v-resize-only" name="body" id="body-`+ first_half[x].id +`" placeholder="Text body" required>` + first_half[x].body + `</textarea>
            </div>
            <div class="col-sm-3" style="vertical-align">
            <button type="button" class="btn btn-info btn-xs save-btn-cpm" data-cpm_id="`+ first_half[x].id +`" id="save_btn-` + first_half[x].id + `" title="Save" ><i class="fa fa-check"></i></button>
            <button type="button" class="btn btn-danger btn-xs" onclick="deleteCpm(` + first_half[x].id + `, `+ id +`)" title="Remove"><i class="fa fa-times"></i></button>
            </div>
            </div>`);

            // setting the DROPDOWN id here
            // and also setting default values
            $("#cpm_row_" + first_half[x].id).find('select option:contains("' + first_half[x].icon_type + '")').prop('selected', true);
            $("#cpm_row_" + first_half[x].id).find('select').attr('id', 'icon_type-' + first_half[x].id);
          }

          for(var x in second_half){
            $second_half_forms.append(`<div class="form-group" id="cpm_row_`+ second_half[x].id +`" data-from_match="`+id+`">
            <div class="col-sm-2">
            <input type="text" class="form-control" name="minute_mark" id="minute_mark-`+ second_half[x].id +`" placeholder="Minute mark" value="` + second_half[x].minute_mark + `" required></input>
            </div>
            <div class="col-sm-3">` +
            icon_types
            + `</div>
            <div class="col-sm-4">
            <textarea class="form-control v-resize-only" name="body" id="body-`+ second_half[x].id +`" placeholder="Text body" required>` + second_half[x].body + `</textarea>
            </div>
            <div class="col-sm-3" style="vertical-align">
            <button type="button" class="btn btn-info btn-xs save-btn-cpm" data-cpm_id="`+ second_half[x].id +`" id="save_btn-` + second_half[x].id + `" title="Save" ><i class="fa fa-check"></i></button>
            <button type="button" class="btn btn-danger btn-xs" onclick="deleteCpm(` + second_half[x].id + `, `+ id +`)" title="Remove"><i class="fa fa-times"></i></button>
            </div>
            </div>`);

            // setting the DROPDOWN id here
            // and also setting default values
            $("#cpm_row_" + second_half[x].id).find('select option:contains("' + second_half[x].icon_type + '")').prop('selected', true);
            $("#cpm_row_" + second_half[x].id).find('select').attr('id', 'icon_type-' + second_half[x].id);
          }



        });
      }

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
      -------------------NOTIFS submit---------------
      ---------------------------------------------**/
      $("#notifs_form").submit(function(e){
        e.preventDefault();

        var form_data = new FormData($(this)[0]);
        form_data.append('fixture_id', $("#notifs_id").html());

        $("#_loading").removeClass('hidden');
        $.ajax({
          url: notifs_api_url + $("#n_notif_type").val(),
          type: 'POST',
          data: form_data,
          success: function (data, textStatus, xhr) {
            if(xhr.status == 200){
              $("#_loading").addClass('hidden');
              if(data == 1){
                clearAllForms();
                customMessage('#custom_notif', 'Notification sent');
              }else{
                customMessage('#custom_notif_f', 'Failed to send notification');
              }
            }
          },
          error: function(e){
            console.log(e);
          },
          cache: false,
          contentType: false,
          processData: false
        });


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
      * function for populating the edit modal
      * @var int   id
      */
      editReport = function(id) {
        $.getJSON(api_url + id + '/match_reports', function(result){
          $('#_title').val(result[0].title);
          $('#_body').val(result[0].body);
        });
        $('#match_reports_id').html('');
        $('#match_reports_id').html(id);
        $('#match_reports_modal').modal('toggle');
      }

      /**
      * function for populating the edit modal
      * @var int   id
      */
      editCommentary = function(id) {
        initializeCpm(id);

        $('#_full_time').val('');
        $('#_half_time').val('');
        $('#_intro').val('');

        $.getJSON(api_url + id + '/commentary', function(result){
          $('#_full_time').val(result.commentary[0].full_time);
          $('#_half_time').val(result.commentary[0].half_time);
          $('#_intro').val(result.commentary[0].intro);
        });
        $('#commentary_id').html('');
        $('#commentary_id').html(id);
        $('#commentary_modal').modal('toggle');
      }

      /**---------------------------------------------
      ---------------Match report edit----------------
      ---------------------------------------------**/
      $("#match_reports_form").submit(function(e){
        var form_data = new FormData($(this)[0]);

        $.ajax({
          url: api_url + $('#match_reports_id').html() + '/match_reports',
          type: 'POST',
          data: form_data,
          async: false,
          success: function (data, textStatus, xhr) {
            if(xhr.status == 200){
              initializeTable('#table_div', table_headers);
              clearAllForms();
              $('#match_reports_modal').modal('toggle');
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
      ---------------Commentary edit----------------
      ---------------------------------------------**/
      $("#commentary_form").submit(function(e){
        var form_data = new FormData($(this)[0]);

        $.ajax({
          url: api_url + $('#commentary_id').html() + '/commentary',
          type: 'POST',
          data: form_data,
          async: false,
          success: function (data, textStatus, xhr) {
            if(xhr.status == 200){
              initializeTable('#table_div', table_headers);
              clearAllForms();
              $('#commentary_modal').modal('toggle');
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
            table += '<td style="text-align:center;">' + result[x].match_progress;
            if(result[x].match_progress == 'Ongoing'){
              table += `<hr><button onclick='showNotifMenu(`+ result[x].id +`)' class='btn btn-m btn-info' title='Notifications'>Live notif <i class='fa fa-comment-o'></i></button>`;
            }

            table += '</td>';
            table +=
            `<td>
            <button onclick='editItem(`+ result[x].id +`)' class='btn btn-xs' title='Edit'><i class='fa fa-pencil'></i></button>
            <button onclick='deleteItem(`+ result[x].id +`)' class='btn btn-xs btn-danger' title="Delete"><i class='fa fa-times'></i></button>
            <button onclick='showMatchStats(`+ result[x].id +`)' class='btn btn-xs btn-info' title='Match Statistics'><i class='fa fa-tasks'></i></button>
            <button onclick='editReport(`+ result[x].id +`)' class='btn btn-xs btn-success' title='Edit report'><i class='fa fa-book'></i></button>
            <button onclick='editCommentary(`+ result[x].id +`)' class='btn btn-xs btn-warning' title='Edit commentary'><i class='fa fa-keyboard-o'></i></button>
            <button onclick='showLineups(`+ result[x].id +`)' class='btn btn-xs btn-default' title='Edit Lineup'><i class='fa fa-users'></i></button>
            </td>`;

            table += '</tr>';
          }

          table += '</tbody></table>';

          $(selector).append(table);
        });

      }

      initializeTable('#table_div', table_headers);

      $('body').on('click', '.save-btn', function(){
        var elem_id = $(this).attr('id');
        var match_stat_id = $("#" + elem_id).data('mstat_id'); // fixture id
        var home_score = $("#home_score-" + match_stat_id).val();
        var away_score = $("#away_score-" + match_stat_id).val();
        var stat_name = $("#stat_name-" + match_stat_id).val();

        $.ajax({
          url: match_stat_api_url + match_stat_id,
          type: 'POST',
          data: { home_score : home_score, away_score: away_score, stat_name: stat_name  },
          success: function (data, textStatus, xhr) {
            if(xhr.status == 200){
              initializeMatchStats($("#match_stat_row_" + match_stat_id).data('from_match'));
              // customMessage('#custom_message', 'Item deleted successfully'); FIXME
            }
          }
        });

      });

      $('body').on('click', '.save-btn-cpm', function(){
        var elem_id = $(this).attr('id');
        var cpm_id = $("#" + elem_id).data('cpm_id'); // fixture id
        var minute_mark = $("#minute_mark-" + cpm_id).val();
        var icon_type = $("#icon_type-" + cpm_id).val();
        var body = $("#body-" + cpm_id).val();

        $.ajax({
          url: cpm_api_url + cpm_id,
          type: 'POST',
          data: { minute_mark : minute_mark, body: body, icon_type, icon_type },
          success: function (data, textStatus, xhr) {
            if(xhr.status == 200){
              initializeCpm($("#cpm_row_" + cpm_id).data('from_match'));
              // customMessage('#custom_message', 'Item deleted successfully'); FIXME
            }
          }
        });

      });

      $('body').on('click', '.save-btn-lineups', function(){
        var elem_id = $(this).attr('id');
        var lineups_id = $("#" + elem_id).data('lineups_id'); // fixture id
        var l_team_id = $("#l_team_id-" + lineups_id).val();
        var l_player_id = $("#l_player_id-" + lineups_id).val();
        var l_position = $("#l_position-" + lineups_id).val();

        $.ajax({
          url: lineups_api_url + lineups_id,
          type: 'POST',
          data: { team_id : l_team_id, player_id: l_player_id, position: l_position },
          success: function (data, textStatus, xhr) {
            if(xhr.status == 200){
              initializeLineups($("#lineups_row_" + lineups_id).data('from_match'));
              // customMessage('#custom_message', 'Item deleted successfully'); FIXME
            }
          }
        });

      });

      $(".live_score").on('change', function functionName() {
        ok_update_score = 0; // Reset flag for updating the score
        clearTimeout(countdownTimer); // built-in function fo r clearing time out

        makeUpdateOK = function(callback){
          ok_update_score = 1; // Set update ok to true
          // Call our callback functin which checks if it's ok to update the score
          // If yes, then update the score. Otherwise, do nothing
          callback(ok_update_score);
        };

        countdownTimer = setTimeout(function() {
          makeUpdateOK(updateScore);
        }, 4000);

      });

      function updateScore(){
        // Update the score
        if(ok_update_score){

          $('#live_score_p').removeClass('hidden');
          var form_data = new FormData();
          form_data.append('home_score', $("#n_home_score").val());
          form_data.append('away_score', $("#n_away_score").val());

          $.ajax({
            url: api_url + $('#notifs_id').html(),
            type: 'POST',
            data: form_data,
            success: function (data, textStatus, xhr) {
              if(xhr.status == 200){
                notifyRealTime(); // Notif firebase
              }
            },
            cache: false,
            contentType: false,
            processData: false
          });


        }


        var notifyRealTime = function(){

          var fd = new FormData();
          fd.append('fixture_id', $("#notifs_id").html());

          $.ajax({
            url: notifs_api_url + 'goal_scored',
            type: 'POST',
            data: fd,
            success: function (data, textStatus, xhr) {
              if(xhr.status == 200){
                if(data == 1){
                  $('#live_score_p').addClass('hidden');
                  customMessage('#live_score_notif', 'Score updated');
                }else{
                  $('#live_score_p').addClass('hidden');
                  
                  customMessage('#live_score_notif', 'Failed to send notification');
                }
              }
            },
            error: function(e){
              console.log(e);
            },
            cache: false,
            contentType: false,
            processData: false
          });
        };

      }

    }); // End document ready

    function deleteMatchStat(match_stat_id, fixture_id){
      if(confirm('Are you sure you want to do this?')){
        $.ajax({
          url: match_stat_api_url + match_stat_id,
          type: 'DELETE',
          success: function (data, textStatus, xhr) {
            if(xhr.status == 204){
              initializeMatchStats(fixture_id);
              // customMessage('#custom_message', 'Item deleted successfully'); FIXME
            }
          }
        });
      }
    }

    function deleteCpm(cpm_id, fixture_id){
      if(confirm('Are you sure you want to do this?')){
        $.ajax({
          url: cpm_api_url + cpm_id,
          type: 'DELETE',
          success: function (data, textStatus, xhr) {
            if(xhr.status == 204){
              initializeCpm(fixture_id);
              // customMessage('#custom_message', 'Item deleted successfully'); FIXME
            }
          }
        });
      }
    }

    function deleteLineup(lineups_id, fixture_id){
      if(confirm('Are you sure you want to do this?')){
        $.ajax({
          url: lineups_api_url + lineups_id,
          type: 'DELETE',
          success: function (data, textStatus, xhr) {
            if(xhr.status == 204){
              initializeLineups(fixture_id);
              // customMessage('#custom_message', 'Item deleted successfully'); FIXME
            }
          }
        });
      }
    }

    </script>
