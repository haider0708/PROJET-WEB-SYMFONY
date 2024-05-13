<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240511203641 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE facture');
        $this->addSql('DROP TABLE person');
        $this->addSql('ALTER TABLE activity ADD CONSTRAINT FK_AC74095AFD02F13 FOREIGN KEY (evenement_id) REFERENCES event (id)');
        $this->addSql('CREATE INDEX IDX_AC74095AFD02F13 ON activity (evenement_id)');
        $this->addSql('ALTER TABLE categorie CHANGE nomcategorie nomcategorie VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE commande MODIFY id_commande INT NOT NULL');
        $this->addSql('DROP INDEX fk_id_ab ON commande');
        $this->addSql('DROP INDEX `primary` ON commande');
        $this->addSql('ALTER TABLE commande ADD livreur_id INT DEFAULT NULL, DROP id_commande, DROP rating, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nom_client nom_client VARCHAR(255) NOT NULL, CHANGE addresse_client addresse_client VARCHAR(255) NOT NULL, CHANGE numero_client numero_client INT NOT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DF8646701 FOREIGN KEY (livreur_id) REFERENCES livreur (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DF8646701 ON commande (livreur_id)');
        $this->addSql('ALTER TABLE commande ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE event CHANGE date date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE livreur CHANGE image image VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE ordonnance ADD datedecreation DATE NOT NULL, DROP nompharmacie, CHANGE nommedecin nommedecin VARCHAR(255) NOT NULL, CHANGE nompatient nompatient VARCHAR(255) NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE pharmacie_id pharmacie_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326CBC6D351B FOREIGN KEY (pharmacie_id) REFERENCES pharmacie (id)');
        $this->addSql('DROP INDEX pharmacie_id ON ordonnance');
        $this->addSql('CREATE INDEX IDX_924B326CBC6D351B ON ordonnance (pharmacie_id)');
        $this->addSql('ALTER TABLE pharmacie ADD note INT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE adresse adresse VARCHAR(255) NOT NULL, CHANGE numerotelephone numerotelephone VARCHAR(255) NOT NULL, CHANGE img image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit ADD img_path VARCHAR(255) DEFAULT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE nom nom VARCHAR(255) NOT NULL, CHANGE prix prix DOUBLE PRECISION NOT NULL, CHANGE description description VARCHAR(255) NOT NULL, CHANGE categorie_id categorie_id INT DEFAULT NULL, CHANGE nomcategorie quantite VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('DROP INDEX categorie_id ON produit');
        $this->addSql('CREATE INDEX IDX_29A5EC27BCF5E72D ON produit (categorie_id)');
        $this->addSql('ALTER TABLE rapport CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE rapport ADD CONSTRAINT FK_BE34A09C4CCE3F86 FOREIGN KEY (rdv_id) REFERENCES rendezvous (id)');
        $this->addSql('ALTER TABLE rendezvous CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facture (id INT AUTO_INCREMENT NOT NULL, montant DOUBLE PRECISION DEFAULT NULL, description_id INT DEFAULT NULL, UNIQUE INDEX UNIQ_FE866410D9F966B (description_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE person (id INT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_general_ci`, age INT NOT NULL) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE activity DROP FOREIGN KEY FK_AC74095AFD02F13');
        $this->addSql('DROP INDEX IDX_AC74095AFD02F13 ON activity');
        $this->addSql('ALTER TABLE categorie CHANGE nomcategorie nomcategorie VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DF8646701');
        $this->addSql('DROP INDEX IDX_6EEAA67DF8646701 ON commande');
        $this->addSql('ALTER TABLE commande ADD id_commande INT AUTO_INCREMENT NOT NULL, ADD rating DOUBLE PRECISION DEFAULT NULL, DROP livreur_id, CHANGE id id INT NOT NULL, CHANGE nom_client nom_client VARCHAR(255) DEFAULT NULL, CHANGE addresse_client addresse_client VARCHAR(255) DEFAULT NULL, CHANGE numero_client numero_client VARCHAR(255) DEFAULT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id_commande)');
        $this->addSql('CREATE INDEX fk_id_ab ON commande (id)');
        $this->addSql('ALTER TABLE event CHANGE date date VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE livreur CHANGE image image VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326CBC6D351B');
        $this->addSql('ALTER TABLE ordonnance DROP FOREIGN KEY FK_924B326CBC6D351B');
        $this->addSql('ALTER TABLE ordonnance ADD nompharmacie VARCHAR(255) NOT NULL, DROP datedecreation, CHANGE pharmacie_id pharmacie_id INT NOT NULL, CHANGE nommedecin nommedecin VARCHAR(255) DEFAULT NULL, CHANGE nompatient nompatient VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL');
        $this->addSql('DROP INDEX idx_924b326cbc6d351b ON ordonnance');
        $this->addSql('CREATE INDEX pharmacie_id ON ordonnance (pharmacie_id)');
        $this->addSql('ALTER TABLE ordonnance ADD CONSTRAINT FK_924B326CBC6D351B FOREIGN KEY (pharmacie_id) REFERENCES pharmacie (id)');
        $this->addSql('ALTER TABLE pharmacie DROP note, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE adresse adresse VARCHAR(255) DEFAULT NULL, CHANGE numerotelephone numerotelephone INT DEFAULT NULL, CHANGE image img VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27BCF5E72D');
        $this->addSql('ALTER TABLE produit DROP img_path, CHANGE id id INT NOT NULL, CHANGE categorie_id categorie_id INT NOT NULL, CHANGE nom nom VARCHAR(255) DEFAULT NULL, CHANGE description description VARCHAR(255) DEFAULT NULL, CHANGE prix prix INT DEFAULT NULL, CHANGE quantite nomcategorie VARCHAR(255) NOT NULL');
        $this->addSql('DROP INDEX idx_29a5ec27bcf5e72d ON produit');
        $this->addSql('CREATE INDEX categorie_id ON produit (categorie_id)');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27BCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id)');
        $this->addSql('ALTER TABLE rapport DROP FOREIGN KEY FK_BE34A09C4CCE3F86');
        $this->addSql('ALTER TABLE rapport CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE rendezvous CHANGE id id INT NOT NULL');
    }
}
