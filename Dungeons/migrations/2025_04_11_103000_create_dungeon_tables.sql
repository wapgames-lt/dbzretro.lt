CREATE TABLE dungeons (
          id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          name VARCHAR(255) NOT NULL,
          description TEXT,
          img_url VARCHAR(255),
          entry_level_min INT UNSIGNED,
          entry_level_max INT UNSIGNED,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE dungeon_sections (
          id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          dungeon_id INT UNSIGNED,
          priority INT UNSIGNED NOT NULL,
          name VARCHAR(255),
          img_url VARCHAR(255),
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          FOREIGN KEY (dungeon_id) REFERENCES dungeons(id)
);

CREATE TABLE dungeon_section_monsters (
          id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          dungeon_section_id INT UNSIGNED,
          name VARCHAR(255) NOT NULL,
          damage INT UNSIGNED DEFAULT 10,
          damage_type ENUM('physical', 'fire', 'ice', 'poison', 'magic') NOT NULL,
          health BIGINT UNSIGNED NOT NULL,
          defence BIGINT UNSIGNED DEFAULT 10,
          img_url VARCHAR(255),
          is_boss TINYINT(1) DEFAULT 0,
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          FOREIGN KEY (dungeon_section_id) REFERENCES dungeon_sections(id)
);

CREATE TABLE dungeon_runs (
          id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          party_id INT,
          dungeon_id INT UNSIGNED,
          start_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          end_time TIMESTAMP NULL,
          status ENUM('in_progress', 'completed', 'failed') DEFAULT 'in_progress',
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
          FOREIGN KEY (party_id) REFERENCES parties(id),
          FOREIGN KEY (dungeon_id) REFERENCES dungeons(id)
);

CREATE TABLE dungeon_monster_assignments (
         id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
         dungeon_run_id  INT UNSIGNED,
         player_id INT UNSIGNED,
         monster_id INT UNSIGNED,
         monster_health INT UNSIGNED NOT NULL,
         status ENUM('assigned', 'defeated', 'in_progress') DEFAULT 'assigned',
         created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
         updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
         FOREIGN KEY (dungeon_run_id) REFERENCES dungeon_runs(id),
         FOREIGN KEY (monster_id) REFERENCES dungeon_section_monsters(id)
);

