CREATE TABLE IF NOT EXISTS `g5_language_code` (
  `lang_code`      VARCHAR(255)  NOT NULL                               COMMENT '국제 표준 국가 3자리 코드',
  `lang2_code`     VARCHAR(255)  NOT NULL                               COMMENT '국제 표준 국가 2자리 코드',
  `text`           VARCHAR(255)  NOT NULL                               COMMENT '국가(영어)',
  `use`            INT(11)       NOT NULL                               COMMENT '언어 사용여부',
  `sort`           INT(11)       NOT NULL                               COMMENT '언어 순서',
  PRIMARY KEY (`lang_code`)
) ENGINE = InnoDB DEFAULT CHARSET `UTF8` COMMENT='언어코드';

INSERT INTO `g5_language_code` (`lang_code`, `lang2_code`, `text`, `use`, `sort`) 
VALUES 
('eng', 'en', 'English', 0, 0),
('usa', 'us', 'English', 1, 1),
('kor', 'kr', 'Korean', 1, 2),
('fra', 'fr', 'French', 0, 0),
('rus', 'ru', 'Russian', 0, 0),
('frt', 'ft', 'Portuguese', 0, 0),
('esp', 'es', 'Spanish', 0, 0);


CREATE TABLE IF NOT EXISTS `g5_language_content` (
  `variable`       VARCHAR(255)  NOT NULL                               COMMENT '변수',
  `lang_usa`       VARCHAR(255)  NOT NULL                               COMMENT 'english',
  `lang_kor`       VARCHAR(255)  NOT NULL                               COMMENT 'korean',
  PRIMARY KEY (`variable`)
) ENGINE = InnoDB DEFAULT CHARSET `UTF8` COMMENT='언어팩(contents)';


-- 해당 언어가 있는지 검색하는 쿼리문(테스트 : kor)
SELECT EXISTS (
 SELECT 1 FROM Information_schema.columns 
 WHERE table_schema = 'barskorea_shop' 
 AND table_name = 'g5_language_content' 
 AND column_name = 'lang_kor'
) AS flag;


SELECT EXISTS (
 SELECT 1 FROM Information_schema.columns 
 WHERE table_schema = 'barskorea_shop' 
 AND table_name = 'g5_language_content' 
 AND column_name = 'lang_kr'
) AS flag;

