<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_fixtures_and_related extends CI_Migration {

  /**
  * `icons` table for reusability and consistency of image links
  */
  public function create_icons()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'name' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'image_url' => array(
        'type' => 'TEXT',
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('icons');
  }
  public function create_actions()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      /**
      * Possible values       substitute_in, substitute_out, goal, red_card, yellow_card
      */
      'action_type' => array(
        'type' => 'VARCHAR',
        'constraint' => '200',
      ),
      'player_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'icon_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('actions');
  }
  public function create_match_stats()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'fixture_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      /**
       * Example values      Attacks, Corners, Dangerous Attacks
       */
      'stat_name' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
      'home_score' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'away_score' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('match_stats');
  }
  public function create_lineups()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'fixture_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'player_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'is_substitute' => array(
        'type' => 'TINYINT', /** mysql bool */
        'constraint' => '1',
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('lineups');
  }
  public function create_fixtures()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'home_team_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'away_team_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'league_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'home_score' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'away_score' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'hash_tag' => array(
        'type' => 'VARCHAR', /** mysql bool */
        'constraint' => '100',
      ),
      'match_date' => array(
        'type' => 'DATETIME',
      ),
      'location' => array(
        'type' => 'TEXT',
      ),
      /**
       *  Possible values     completed, final, ongoing, etc
       */
      'match_progress' => array(
        'type' => 'VARCHAR',
        'constraint' => '150',
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('fixtures');
  }
  public function create_commentary()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      'fixture_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'full_time' => array(
        'type' => 'TEXT',
      ),
      'half_time' => array(
        'type' => 'TEXT',
      ),
      'intro' => array(
        'type' => 'TEXT',
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('commentary');
  }
  public function create_cpm()
  {
    $this->dbforge->add_field('id');
    $this->dbforge->add_field(array(
      /**
      * Possible values       9', 90'+2'
      */
      'minute_mark' => array(
        'type' => 'VARCHAR',
        'constraint' => '50',
      ),
      'commentary_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'icon_id' => array(
        'type' => 'INTEGER',
        'constraint' => '9',
      ),
      'body' => array(
        'type' => 'TEXT',
      ),
      /**
       * Possible values           first_half, second_half
       */
      'coverage_type' => array(
        'type' => 'VARCHAR',
        'constraint' => '100',
      ),
    ));
    $this->dbforge->add_field("`created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP");
    $this->dbforge->add_field("`updated_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP");
    $this->dbforge->create_table('cpm'); /** means comment per minute */
  }
  public function up()
  {
    $this->create_cpm();
    $this->create_commentary();
    $this->create_fixtures();
    $this->create_lineups();
    $this->create_match_stats();
    $this->create_actions();
    $this->create_icons();
  }

  public function down()
  {
    $this->dbforge->drop_table('cpm', true);
    $this->dbforge->drop_table('commentary', true);
    $this->dbforge->drop_table('fixtures', true);
    $this->dbforge->drop_table('lineups', true);
    $this->dbforge->drop_table('match_stats', true);
    $this->dbforge->drop_table('actions', true);
    $this->dbforge->drop_table('icons', true);
  }
}
