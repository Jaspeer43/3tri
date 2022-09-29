-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fetec` DEFAULT CHARACTER SET utf8 ;
USE `fetec` ;

-- -----------------------------------------------------
-- Table `fetec`.`escola`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fetec`.`campus` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `endereco` VARCHAR(250) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fetec`.`edicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fetec`.`edicao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ano` INT NOT NULL,
  `escola_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_edicao_escola`
    FOREIGN KEY (`escola_id`)
    REFERENCES `fetec`.`campus` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fetec`.`orientador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fetec`.`orientador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `sobrenome` VARCHAR(45) NULL,
  `atuacao`VARCHAR(45) NULL,
  `foto` BLOB NULL,
  `edicao_id` INT NOT NULL,
  `avor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_orientador_edicao1`
    FOREIGN KEY (`edicao_id`)
    REFERENCES `fetec`.`edicao` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fetec`.`avaliador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fetec`.`avaliador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NULL,
  `sobrenome` VARCHAR(45) NULL,
  `atuacao`VARCHAR(45) NULL,
  `foto` BLOB NULL,
  `edicao_id` INT NOT NULL,
  `avor` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_avaliador_edicao1`
    FOREIGN KEY (`edicao_id`)
    REFERENCES `fetec`.`edicao` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fetec`.`trabalho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fetec`.`trabalho` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(250) NULL,
  `descricao` VARCHAR(250) NULL,
  `banner` BLOB NULL,
  `alunos` VARCHAR(250) NULL,
  `curso` VARCHAR(45) NULL,
  `estagio` VARCHAR(45) NULL,
  `orientador_id` INT NOT NULL,
  `edicao_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_trabalho_orientador1`
    FOREIGN KEY (`orientador_id`)
    REFERENCES `fetec`.`orientador` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_trabalho_edicao1`
    FOREIGN KEY (`edicao_id`)
    REFERENCES `fetec`.`edicao` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `fetec`.`avaliacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fetec`.`avaliacao` (
  `avaliador_id` INT NOT NULL,
  `trabalho_id` INT NOT NULL,
  PRIMARY KEY (`avaliador_id`, `trabalho_id`),
  INDEX `fk_avaliacao_trabalho1_idx` (`trabalho_id` ASC),
  CONSTRAINT `fk_avaliacao_avaliador1`
    FOREIGN KEY (`avaliador_id`)
    REFERENCES `fetec`.`avaliador` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_avaliacao_trabalho1`
    FOREIGN KEY (`trabalho_id`)
    REFERENCES `fetec`.`trabalho` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;




