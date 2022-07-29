<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620210950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, activity_name VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, details LONGTEXT NOT NULL, created_at DATETIME NOT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, likes INT DEFAULT NULL, unlikes INT DEFAULT NULL, UNIQUE INDEX UNIQ_AC74095AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE activity_image (id INT AUTO_INCREMENT NOT NULL, activity_id INT NOT NULL, filename VARCHAR(255) NOT NULL, upload_at DATETIME NOT NULL, INDEX IDX_DB3F32EC81C06096 (activity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ad_images (id INT AUTO_INCREMENT NOT NULL, ad_id INT NOT NULL, image_name VARCHAR(255) NOT NULL, upload_at DATETIME NOT NULL, INDEX IDX_7DF0A99F4F34D596 (ad_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE additional_surfaces (id INT AUTO_INCREMENT NOT NULL, apartment_id INT NOT NULL, additional_surface_name VARCHAR(255) NOT NULL, INDEX IDX_B697E1C176DFE85 (apartment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, adminname VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, register_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_880E0D76654F3489 (adminname), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE admin_avatar (id INT AUTO_INCREMENT NOT NULL, user_avatar_id INT NOT NULL, filename VARCHAR(255) NOT NULL, update_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_4BBF43D686D8B6F4 (user_avatar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ads (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, ad_title VARCHAR(255) NOT NULL, ad_price VARCHAR(255) NOT NULL, ad_category VARCHAR(255) NOT NULL, ad_type VARCHAR(255) NOT NULL, brand VARCHAR(255) DEFAULT NULL, model VARCHAR(255) DEFAULT NULL, mileage VARCHAR(255) DEFAULT NULL, year VARCHAR(255) DEFAULT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(255) NOT NULL, details LONGTEXT NOT NULL, created_at DATETIME NOT NULL, vehicle_type VARCHAR(25) DEFAULT NULL, ad_state VARCHAR(30) NOT NULL, transmission_type VARCHAR(30) DEFAULT NULL, INDEX IDX_7EC9F620A76ED395 (user_id), FULLTEXT INDEX IDX_7EC9F620165622EE3411054C72260B8A (ad_title, ad_type, details), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apartment (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, property_type VARCHAR(255) NOT NULL, property_surface SMALLINT NOT NULL, appart_floor SMALLINT NOT NULL, room_number SMALLINT NOT NULL, bathroom_number SMALLINT NOT NULL, wc_number SMALLINT NOT NULL, furniture TINYINT(1) NOT NULL, proposition_type VARCHAR(255) NOT NULL, price INT NOT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, more_details_address LONGTEXT NOT NULL, other_infos LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, ad_title VARCHAR(255) NOT NULL, equipements LONGTEXT DEFAULT NULL, INDEX IDX_4D7E6854A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE apartment_images (id INT AUTO_INCREMENT NOT NULL, apartment_id INT NOT NULL, filename VARCHAR(255) NOT NULL, update_at DATETIME NOT NULL, INDEX IDX_58DC734176DFE85 (apartment_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car (id INT AUTO_INCREMENT NOT NULL, park_auto_id INT NOT NULL, car_brand VARCHAR(255) NOT NULL, car_model VARCHAR(255) NOT NULL, fuel VARCHAR(255) NOT NULL, mileage VARCHAR(7) NOT NULL, car_year VARCHAR(4) NOT NULL, car_country VARCHAR(255) NOT NULL, car_class VARCHAR(255) NOT NULL, car_nb_places INT NOT NULL, car_nb_doors INT NOT NULL, car_color VARCHAR(255) NOT NULL, car_state VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, transmission_type VARCHAR(255) NOT NULL, car_price VARCHAR(255) NOT NULL, sale_state TINYINT(1) NOT NULL, INDEX IDX_773DE69DEE70C38E (park_auto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_advantages (id INT AUTO_INCREMENT NOT NULL, car_id INT NOT NULL, advantage_name VARCHAR(255) NOT NULL, INDEX IDX_88295C45C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE car_images (id INT AUTO_INCREMENT NOT NULL, car_id INT NOT NULL, filename VARCHAR(255) NOT NULL, upload_at DATETIME NOT NULL, INDEX IDX_F8775298C3C6F69F (car_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ebook (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE exam_subject (id INT AUTO_INCREMENT NOT NULL, course_name VARCHAR(255) NOT NULL, the_mention VARCHAR(255) NOT NULL, level VARCHAR(255) NOT NULL, exam_year VARCHAR(4) NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, school_name VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house_villa (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, property_type VARCHAR(255) NOT NULL, property_surface VARCHAR(255) NOT NULL, room_number SMALLINT NOT NULL, bathroom_number SMALLINT NOT NULL, wc_number SMALLINT NOT NULL, furniture TINYINT(1) NOT NULL, courtyard TINYINT(1) NOT NULL, fenced TINYINT(1) NOT NULL, build_year SMALLINT NOT NULL, floor_number SMALLINT NOT NULL, proposition_type VARCHAR(255) NOT NULL, price INT NOT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, more_infos_address LONGTEXT NOT NULL, other_infos LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, equipements LONGTEXT DEFAULT NULL, ad_title VARCHAR(255) NOT NULL, INDEX IDX_9F4DBA22A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE house_villa_images (id INT AUTO_INCREMENT NOT NULL, house_villa_id INT NOT NULL, filename VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_BF1F2C454BCF2C3E (house_villa_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_apply (id INT AUTO_INCREMENT NOT NULL, job_id INT NOT NULL, candidate_name VARCHAR(255) NOT NULL, candidate_email VARCHAR(255) NOT NULL, candidate_phonenumber VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, application_letter LONGTEXT DEFAULT NULL, INDEX IDX_BC73316FBE04EA9 (job_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_apply_user (job_apply_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_9D84EEB72A9B6EA5 (job_apply_id), INDEX IDX_9D84EEB7A76ED395 (user_id), PRIMARY KEY(job_apply_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, compagny_name VARCHAR(255) NOT NULL, job_title VARCHAR(255) NOT NULL, category VARCHAR(255) NOT NULL, contract_type VARCHAR(255) NOT NULL, employer_gender VARCHAR(3) NOT NULL, filename VARCHAR(255) DEFAULT NULL, phone_number VARCHAR(9) NOT NULL, email VARCHAR(255) NOT NULL, salary_estimate INT NOT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, employer_profile LONGTEXT NOT NULL, required_skills LONGTEXT NOT NULL, employer_mission LONGTEXT NOT NULL, other_details LONGTEXT NOT NULL, created_at DATETIME NOT NULL, INDEX IDX_288A3A4EA76ED395 (user_id), FULLTEXT INDEX IDX_288A3A4E2A6AC51B64C19C1C9BAD3B880E26344D88A8B8B617B95E6 (job_title, category, employer_profile, required_skills, employer_mission, other_details), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE office_shop_land (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, property_type VARCHAR(255) NOT NULL, property_surface INT NOT NULL, proposition_type VARCHAR(255) NOT NULL, price INT NOT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, more_infos_address LONGTEXT NOT NULL, more_infos LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, ad_title VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, INDEX IDX_7F065A9AA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE office_shop_land_images (id INT AUTO_INCREMENT NOT NULL, osl_id INT NOT NULL, filename VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_439D1E601EE2D2AA (osl_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE park_auto (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, park_name VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, filename VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_EE92EB39A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ride (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, departure VARCHAR(255) NOT NULL, destination VARCHAR(255) NOT NULL, departure_time TIME NOT NULL, arriving_time TIME NOT NULL, departure_date DATETIME NOT NULL, arriving_at DATETIME NOT NULL, car_brand VARCHAR(255) NOT NULL, place_number INT NOT NULL, other_details LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, ride_type VARCHAR(255) NOT NULL, ride_price INT NOT NULL, INDEX IDX_9B3D7CD0A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE services_park_auto (id INT AUTO_INCREMENT NOT NULL, park_auto_id INT NOT NULL, service_name VARCHAR(255) NOT NULL, INDEX IDX_B9D96E80EE70C38E (park_auto_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, property_type VARCHAR(255) NOT NULL, property_surface SMALLINT NOT NULL, piece_number SMALLINT NOT NULL, bathroom TINYINT(1) NOT NULL, flatsharing TINYINT(1) NOT NULL, furniture TINYINT(1) NOT NULL, proposition_type VARCHAR(255) NOT NULL, price INT NOT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, more_infos_address LONGTEXT NOT NULL, other_infos LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL, phone_number VARCHAR(255) NOT NULL, email VARCHAR(255) DEFAULT NULL, ad_title VARCHAR(255) NOT NULL, equipements LONGTEXT DEFAULT NULL, district VARCHAR(255) NOT NULL, INDEX IDX_4A2B07B6A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE studio_images (id INT AUTO_INCREMENT NOT NULL, studio_id INT NOT NULL, filename VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_534B587446F285F (studio_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxi_driver (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, driver_full_name VARCHAR(255) DEFAULT NULL, registration_number VARCHAR(12) NOT NULL, phone_number VARCHAR(9) DEFAULT NULL, taxi_type VARCHAR(255) NOT NULL, state TINYINT(1) NOT NULL, city VARCHAR(255) NOT NULL, district VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, municipality VARCHAR(255) NOT NULL, taxi_brand VARCHAR(255) NOT NULL, taxi_model VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_EABF61AAA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teacher (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, age SMALLINT NOT NULL, profile VARCHAR(255) NOT NULL, years_of_experience INT NOT NULL, class_type VARCHAR(255) NOT NULL, public VARCHAR(255) NOT NULL, course VARCHAR(255) NOT NULL, price INT NOT NULL, billing_type VARCHAR(20) NOT NULL, city VARCHAR(255) NOT NULL, municipality VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, some_details LONGTEXT NOT NULL, teacher_diploma LONGTEXT NOT NULL, teaching_methodology LONGTEXT NOT NULL, teacher_background LONGTEXT NOT NULL, INDEX IDX_B0F6A6D5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, sexe SMALLINT DEFAULT NULL, state TINYINT(1) DEFAULT \'1\' NOT NULL, subscribe_at DATETIME NOT NULL, facebook_id VARCHAR(255) DEFAULT NULL, google_id VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_avatar (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, image_name VARCHAR(255) NOT NULL, update_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_73256912A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE activity_image ADD CONSTRAINT FK_DB3F32EC81C06096 FOREIGN KEY (activity_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE ad_images ADD CONSTRAINT FK_7DF0A99F4F34D596 FOREIGN KEY (ad_id) REFERENCES ads (id)');
        $this->addSql('ALTER TABLE additional_surfaces ADD CONSTRAINT FK_B697E1C176DFE85 FOREIGN KEY (apartment_id) REFERENCES apartment (id)');
        $this->addSql('ALTER TABLE admin_avatar ADD CONSTRAINT FK_4BBF43D686D8B6F4 FOREIGN KEY (user_avatar_id) REFERENCES admin (id)');
        $this->addSql('ALTER TABLE ads ADD CONSTRAINT FK_7EC9F620A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE apartment ADD CONSTRAINT FK_4D7E6854A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE apartment_images ADD CONSTRAINT FK_58DC734176DFE85 FOREIGN KEY (apartment_id) REFERENCES apartment (id)');
        $this->addSql('ALTER TABLE car ADD CONSTRAINT FK_773DE69DEE70C38E FOREIGN KEY (park_auto_id) REFERENCES park_auto (id)');
        $this->addSql('ALTER TABLE car_advantages ADD CONSTRAINT FK_88295C45C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE car_images ADD CONSTRAINT FK_F8775298C3C6F69F FOREIGN KEY (car_id) REFERENCES car (id)');
        $this->addSql('ALTER TABLE house_villa ADD CONSTRAINT FK_9F4DBA22A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE house_villa_images ADD CONSTRAINT FK_BF1F2C454BCF2C3E FOREIGN KEY (house_villa_id) REFERENCES house_villa (id)');
        $this->addSql('ALTER TABLE job_apply ADD CONSTRAINT FK_BC73316FBE04EA9 FOREIGN KEY (job_id) REFERENCES job_offer (id)');
        $this->addSql('ALTER TABLE job_apply_user ADD CONSTRAINT FK_9D84EEB72A9B6EA5 FOREIGN KEY (job_apply_id) REFERENCES job_apply (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_apply_user ADD CONSTRAINT FK_9D84EEB7A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE office_shop_land ADD CONSTRAINT FK_7F065A9AA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE office_shop_land_images ADD CONSTRAINT FK_439D1E601EE2D2AA FOREIGN KEY (osl_id) REFERENCES office_shop_land (id)');
        $this->addSql('ALTER TABLE park_auto ADD CONSTRAINT FK_EE92EB39A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE ride ADD CONSTRAINT FK_9B3D7CD0A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE services_park_auto ADD CONSTRAINT FK_B9D96E80EE70C38E FOREIGN KEY (park_auto_id) REFERENCES park_auto (id)');
        $this->addSql('ALTER TABLE studio ADD CONSTRAINT FK_4A2B07B6A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE studio_images ADD CONSTRAINT FK_534B587446F285F FOREIGN KEY (studio_id) REFERENCES studio (id)');
        $this->addSql('ALTER TABLE taxi_driver ADD CONSTRAINT FK_EABF61AAA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE teacher ADD CONSTRAINT FK_B0F6A6D5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user_avatar ADD CONSTRAINT FK_73256912A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE activity_image DROP FOREIGN KEY FK_DB3F32EC81C06096');
        $this->addSql('ALTER TABLE admin_avatar DROP FOREIGN KEY FK_4BBF43D686D8B6F4');
        $this->addSql('ALTER TABLE ad_images DROP FOREIGN KEY FK_7DF0A99F4F34D596');
        $this->addSql('ALTER TABLE additional_surfaces DROP FOREIGN KEY FK_B697E1C176DFE85');
        $this->addSql('ALTER TABLE apartment_images DROP FOREIGN KEY FK_58DC734176DFE85');
        $this->addSql('ALTER TABLE car_advantages DROP FOREIGN KEY FK_88295C45C3C6F69F');
        $this->addSql('ALTER TABLE car_images DROP FOREIGN KEY FK_F8775298C3C6F69F');
        $this->addSql('ALTER TABLE house_villa_images DROP FOREIGN KEY FK_BF1F2C454BCF2C3E');
        $this->addSql('ALTER TABLE job_apply_user DROP FOREIGN KEY FK_9D84EEB72A9B6EA5');
        $this->addSql('ALTER TABLE job_apply DROP FOREIGN KEY FK_BC73316FBE04EA9');
        $this->addSql('ALTER TABLE office_shop_land_images DROP FOREIGN KEY FK_439D1E601EE2D2AA');
        $this->addSql('ALTER TABLE car DROP FOREIGN KEY FK_773DE69DEE70C38E');
        $this->addSql('ALTER TABLE services_park_auto DROP FOREIGN KEY FK_B9D96E80EE70C38E');
        $this->addSql('ALTER TABLE studio_images DROP FOREIGN KEY FK_534B587446F285F');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AA76ED395');
        $this->addSql('ALTER TABLE ads DROP FOREIGN KEY FK_7EC9F620A76ED395');
        $this->addSql('ALTER TABLE apartment DROP FOREIGN KEY FK_4D7E6854A76ED395');
        $this->addSql('ALTER TABLE house_villa DROP FOREIGN KEY FK_9F4DBA22A76ED395');
        $this->addSql('ALTER TABLE job_apply_user DROP FOREIGN KEY FK_9D84EEB7A76ED395');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4EA76ED395');
        $this->addSql('ALTER TABLE office_shop_land DROP FOREIGN KEY FK_7F065A9AA76ED395');
        $this->addSql('ALTER TABLE park_auto DROP FOREIGN KEY FK_EE92EB39A76ED395');
        $this->addSql('ALTER TABLE ride DROP FOREIGN KEY FK_9B3D7CD0A76ED395');
        $this->addSql('ALTER TABLE studio DROP FOREIGN KEY FK_4A2B07B6A76ED395');
        $this->addSql('ALTER TABLE taxi_driver DROP FOREIGN KEY FK_EABF61AAA76ED395');
        $this->addSql('ALTER TABLE teacher DROP FOREIGN KEY FK_B0F6A6D5A76ED395');
        $this->addSql('ALTER TABLE user_avatar DROP FOREIGN KEY FK_73256912A76ED395');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE activity_image');
        $this->addSql('DROP TABLE ad_images');
        $this->addSql('DROP TABLE additional_surfaces');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE admin_avatar');
        $this->addSql('DROP TABLE ads');
        $this->addSql('DROP TABLE apartment');
        $this->addSql('DROP TABLE apartment_images');
        $this->addSql('DROP TABLE car');
        $this->addSql('DROP TABLE car_advantages');
        $this->addSql('DROP TABLE car_images');
        $this->addSql('DROP TABLE ebook');
        $this->addSql('DROP TABLE exam_subject');
        $this->addSql('DROP TABLE house_villa');
        $this->addSql('DROP TABLE house_villa_images');
        $this->addSql('DROP TABLE job_apply');
        $this->addSql('DROP TABLE job_apply_user');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE office_shop_land');
        $this->addSql('DROP TABLE office_shop_land_images');
        $this->addSql('DROP TABLE park_auto');
        $this->addSql('DROP TABLE ride');
        $this->addSql('DROP TABLE services_park_auto');
        $this->addSql('DROP TABLE studio');
        $this->addSql('DROP TABLE studio_images');
        $this->addSql('DROP TABLE taxi_driver');
        $this->addSql('DROP TABLE teacher');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_avatar');
    }
}
