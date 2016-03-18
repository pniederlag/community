CREATE TABLE tt_content (
	header_position varchar(6) DEFAULT '' NOT NULL
);

CREATE TABLE pages (
  tx_t3themetypo3com_hero_headline varchar(255) DEFAULT '' NOT NULL,
  tx_t3themetypo3com_longteaser_headline varchar(255) DEFAULT '' NOT NULL,
  tx_t3themetypo3com_longteaser_author varchar(255) DEFAULT '' NOT NULL,
  tx_t3themetypo3com_shortteaser_headline varchar(255) DEFAULT '' NOT NULL,
  tx_t3themetypo3com_testimonial_headline varchar(255) DEFAULT '' NOT NULL,
  tx_t3themetypo3com_testimonial_copytext text NOT NULL,
  tx_t3themetypo3com_case_copytext text NOT NULL,
  tx_t3themetypo3com_case_logo int(11) DEFAULT '0',
  tx_t3themetypo3com_feature_icon int(11) DEFAULT '0',
  tx_t3themetypo3com_featured_case int(11) DEFAULT '0',
);