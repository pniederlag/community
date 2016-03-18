// -----------------------------------------------------------------------------
// Library objects
// -----------------------------------------------------------------------------


// [1] Hero
lib.caseStudyHero = RECORDS
lib.caseStudyHero.source.field = tx_t3themetypo3com_case_study_hero
lib.caseStudyHero.tables = pages
lib.caseStudyHero.conf.pages = COA
lib.caseStudyHero.conf.pages {
	10 = FILES
	10.maxItems = 1
	10.references {
		table = pages
		uid.field = uid
		fieldName = media
	}
	10.renderObj = COA
	10.renderObj {
		10 = IMG_RESOURCE
		10.stdWrap.wrap = <img src="|" width="100%" height="auto" />
		10 {
			file.import.data = file:current:publicUrl
		}
	}

	20 = TEXT
	20 {
		field = tx_t3themetypo3com_hero_headline
		typolink{
			parameter.field = uid
		}
		wrap = <div class="ce-bodytext"><p>|</p></div>
	}
}

lib.headerImage = COA
lib.headerImage {
	10 = FILES
	10.maxItems = 1
	10.references {
		table = pages
		uid.field = uid
		fieldName = media
	}
	10.renderObj = COA
	10.renderObj {
		10 = IMG_RESOURCE
		10.file.import.data = file:current:publicUrl
	}
}

lib.fluidContent.templateRootPaths.10 = EXT:t3theme_typo3com/Resources/Private/Templates/ContentElements
lib.fluidContent.partialRootPaths.10 = EXT:t3theme_typo3com/Resources/Private/Partials
