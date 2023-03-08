<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Nsca extends Migration
{
     public function up(): void
    {

        // ----------------------------------------- AUTH ------------------------------------------------------------- //


        // Users Table
        $this->forge->addField([
            'id'             => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'email'          => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'first_name'     => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'last_name'      => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'phone'          => ['type' => 'int', 'constraint' => 30, 'null' => true],
            'street'         => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'city'           => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'country'        => ['type' => 'varchar', 'constraint' => 30, 'null' => true],
            'postal'         => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
            'status'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'status_message' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'active'         => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'last_active'    => ['type' => 'datetime', 'null' => true],
            'created_at'     => ['type' => 'datetime', 'null' => true],
            'updated_at'     => ['type' => 'datetime', 'null' => true],
            'deleted_at'     => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('email');
        $this->forge->createTable('nsca_users');

        /*
         * Auth Identities Table
         * Used for storage of passwords, access tokens, social login identities, etc.
         */
        $this->forge->addField([
            'id'           => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'      => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'type'         => ['type' => 'varchar', 'constraint' => 255],
            'name'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'secret'       => ['type' => 'varchar', 'constraint' => 255],
            'secret2'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'expires'      => ['type' => 'datetime', 'null' => true],
            'extra'        => ['type' => 'text', 'null' => true],
            'force_reset'  => ['type' => 'tinyint', 'constraint' => 1, 'default' => 0],
            'last_used_at' => ['type' => 'datetime', 'null' => true],
            'created_at'   => ['type' => 'datetime', 'null' => true],
            'updated_at'   => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey(['type', 'secret']);
        $this->forge->addKey('user_id');
        $this->forge->addForeignKey('user_id', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('auth_identities');

        /**
         * Auth Login Attempts Table
         * Records login attempts. A login means users think it is a login.
         * To login, users do action(s) like posting a form.
         */
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'ip_address' => ['type' => 'varchar', 'constraint' => 255],
            'user_agent' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_type'    => ['type' => 'varchar', 'constraint' => 255],
            'identifier' => ['type' => 'varchar', 'constraint' => 255],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true], // Only for successful logins
            'date'       => ['type' => 'datetime'],
            'success'    => ['type' => 'tinyint', 'constraint' => 1],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['id_type', 'identifier']);
        $this->forge->addKey('user_id');
        // NOTE: Do NOT delete the user_id or identifier when the user is deleted for security audits
        $this->forge->createTable('auth_logins');

        /*
         * Auth Token Login Attempts Table
         * Records Bearer Token type login attempts.
         */
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'ip_address' => ['type' => 'varchar', 'constraint' => 255],
            'user_agent' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'id_type'    => ['type' => 'varchar', 'constraint' => 255],
            'identifier' => ['type' => 'varchar', 'constraint' => 255],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true], // Only for successful logins
            'date'       => ['type' => 'datetime'],
            'success'    => ['type' => 'tinyint', 'constraint' => 1],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['id_type', 'identifier']);
        $this->forge->addKey('user_id');
        // NOTE: Do NOT delete the user_id or identifier when the user is deleted for security audits
        $this->forge->createTable('auth_token_logins');

        /*
         * Auth Remember Tokens (remember-me) Table
         * @see https://paragonie.com/blog/2015/04/secure-authentication-php-with-long-term-persistence
         */
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'selector'        => ['type' => 'varchar', 'constraint' => 255],
            'hashedValidator' => ['type' => 'varchar', 'constraint' => 255],
            'user_id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'expires'         => ['type' => 'datetime'],
            'created_at'      => ['type' => 'datetime', 'null' => false],
            'updated_at'      => ['type' => 'datetime', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addUniqueKey('selector');
        $this->forge->addForeignKey('user_id', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('auth_remember_tokens');

        // Groups Users Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'group'      => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'created_at' => ['type' => 'datetime', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('auth_groups_users');

        // Users Permissions Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'permission' => ['type' => 'varchar', 'constraint' => 255, 'null' => false],
            'created_at' => ['type' => 'datetime', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('user_id', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('auth_permissions_users');

        // ----------------------------------------- NSCA ------------------------------------------------------------- //

        // Alerts Table
        $this->forge->addField([
            'id'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title'      => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'content'    => ['type' => 'text'],
            'status'     => ['type' => 'varchar', 'constraint' => 10, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_alerts');

        // Clubs Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'abbreviation'  => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'website'       => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'description'   => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'email'         => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'phone'         => ['type' => 'varchar', 'constraint' => 12, 'null' => true],
            'facebook'      => ['type' => 'varchar', 'constraint' => 256, 'null' => true],
            'image'         => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_clubs');

        // Clubs User Table
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userID'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'clubID'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'isManager'       => ['type' => 'tinyint', 'constraint' => 1, 'null' => true, 'default' => 0]
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['clubID', 'userID']);
        $this->forge->addForeignKey('clubID', 'nsca_clubs', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_club_user');

        // Competition Type Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description'   => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_competition_type');


        // Competition Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description'   => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'compTypeID'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'yearRunning'   => ['type' => 'int', 'constraint' => 11, 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('compTypeID');
        $this->forge->addForeignKey('compTypeID', 'nsca_competition_type', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_competition');

        // Development Programs Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'duration'      => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description'   => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'time'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'charges'       => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'type'          => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'daysRun'       => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'image'         => ['type' => 'varchar', 'constraint' => 120, 'null' => false, 'default' => '/assets/images/DevProgs/contents/default.jpg'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_dev');
        
        // Development User Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'devID'         => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'userID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'isLead'        => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['devID', 'userID']);
        $this->forge->addForeignKey('devID', 'nsca_dev', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_dev_user');

        // Location Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'address'       => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description'   => ['type' => 'varchar', 'constraint' => 512, 'null' => 0, 'default' => 0],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_location');

        // Location User Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'locationID'    => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'userID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['locationID', 'userID']);
        $this->forge->addForeignKey('locationID', 'nsca_location', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_location_user');
        
        // News Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'title'         => ['type' => 'varchar', 'constraint' => 128, 'null' => true],
            'content'       => ['type' => 'text'],
            'created_at'    => ['type' => 'datetime', 'null' => true],
            'updated_at'    => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('userID');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_news');

        // News Comments Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'newsID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'userID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'comment'       => ['type' => 'text', 'null' => false],
            'created_at'    => ['type' => 'datetime', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['newsID', 'userID']);
        $this->forge->addForeignKey('newsID', 'nsca_news', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_news_comments');

        // Committees Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description'   => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'years'         => ['type' => 'varchar', 'constraint' => 32, 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('nsca_committees');

        // Committees User Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'committeeID'   => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'userID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'isLead'        => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['committeeID', 'userID']);
        $this->forge->addForeignKey('committeeID', 'nsca_committees', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_committees_user');

        // Team Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'clubID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'name'          => ['type' => 'varchar', 'constraint' => 64, 'null' => true],
            'description'   => ['type' => 'varchar', 'constraint' => 512, 'null' => true],
            'image'         => ['type' => 'varchar', 'constraint' => 128, 'null' => false, 'default' => '/assets/images/Teams/logos/default.png'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey('clubID');
        $this->forge->addForeignKey('clubID', 'nsca_clubs', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_team');

        // Team Joinlist Table
        $this->forge->addField([
            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'teamID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['teamID', 'userID']);
        $this->forge->addForeignKey('teamID', 'nsca_team', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_team_joinlist');

        // Teams Table
//        $this->forge->addField([
//            'id'            => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
//            'teamID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
//            'clubID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
//            'compID'        => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
//        ]);
//        $this->forge->addPrimaryKey('id');
//        $this->forge->addKey(['teamID', 'clubID', 'compID']);
//        $this->forge->addForeignKey('teamID', 'nsca_team', 'id', '', 'CASCADE');
//        $this->forge->addForeignKey('clubID', 'nsca_clubs', 'id', '', 'CASCADE');
//        $this->forge->addForeignKey('compID', 'nsca_competition', 'id', '', 'CASCADE');
//        $this->forge->createTable('nsca_teams');

        // Team User Table
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'userID'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'teamID'          => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'isTeamCaptain'   => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'isViceCaptain'   => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addKey(['userID', 'teamID']);
        $this->forge->addForeignKey('userID', 'nsca_users', 'id', '', 'CASCADE');
        $this->forge->addForeignKey('teamID', 'nsca_team', 'id', '', 'CASCADE');
        $this->forge->createTable('nsca_team_user');

        // Settings Table
        $this->forge->addField([
            'id'              => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'class'           => ['type' => 'varchar', 'constraint' => 255],
            'key'             => ['type' => 'varchar', 'constraint' => 255],
            'value'           => ['type' => 'text', 'null' => true, 'default' => null],
            'type'            => ['type' => 'varchar', 'constraint' => 31, 'default' => 'string'],
            'context'         => ['type' => 'varchar', 'constraint' => 255, 'null' => true, 'default' => null],
            'created_at'      => ['type' => 'datetime'],
            'updated_at'      => ['type' => 'datetime'],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('settings');


    }

    // --------------------------------------------------------------------

    public function down(): void
    {
        $this->db->disableForeignKeyChecks();

        $this->forge->dropTable('auth_logins', true);
        $this->forge->dropTable('auth_token_logins', true);
        $this->forge->dropTable('auth_remember_tokens', true);
        $this->forge->dropTable('auth_identities', true);
        $this->forge->dropTable('auth_groups_users', true);
        $this->forge->dropTable('auth_permissions_users', true);
        $this->forge->dropTable('nsca_users', true);
        $this->forge->dropTable('nsca_team_user', true);
        $this->forge->dropTable('nsca_team', true);
        $this->forge->dropTable('nsca_teams', true);
        $this->forge->dropTable('nsca_clubs', true);
        $this->forge->dropTable('nsca_team_joinlist', true);
        $this->forge->dropTable('nsca_committees', true);
        $this->forge->dropTable('nsca_committees_user', true);
        $this->forge->dropTable('nsca_news', true);
        $this->forge->dropTable('nsca_news_comments', true);
        $this->forge->dropTable('nsca_dev', true);
        $this->forge->dropTable('nsca_dev_user', true);
        $this->forge->dropTable('nsca_location', true);
        $this->forge->dropTable('nsca_location_user', true);
        $this->forge->dropTable('nsca_competition', true);
        $this->forge->dropTable('nsca_competition_type', true);
        $this->forge->dropTable('nsca_alerts', true);
        $this->forge->dropTable('settings', true);
        
        $this->db->enableForeignKeyChecks();
    }
}
