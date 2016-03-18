// -----------------------------------------------------------------------------
// Library objects
// -----------------------------------------------------------------------------


// [1] Home

lib.caseStudyHero = RECORDS
lib.caseStudyHero.source.field = tx_t3themetypo3com_case_study_hero
lib.caseStudyHero.tables = pages
lib.caseStudyHero.conf.pages = COA
lib.caseStudyHero.conf.pages {
	
	10 = FILES
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
			altText.data = file:current:alternative
			titleText.data = file:current:title
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




lib.layout1 = FLUIDTEMPLATE
lib.layout1 {
	file = EXT:t3theme_typo3com/Resources/Private/Templates/Pages/Homepage.html
	partialRootPath = EXT:t3theme_typo3com/Resources/Private/Partials/
	layoutRootPath = EXT:t3theme_typo3com/Resources/Private/Layouts/

	variables {
		mainMenu < temp.mainMenu

		header < lib.caseStudyHero

		content  < styles.content.get
		content.select.where = colPos=1

		footerMenu < temp.footerMenu

		contactPid = TEXT
		contactPid.value = {$plugin.t3theme_typo3com.footer.contactPid}

		legalInfoPid = TEXT
		legalInfoPid.value = {$plugin.t3theme_typo3com.footer.legalInfoPid}
	}
}

// [2] Content
lib.layout2 = FLUIDTEMPLATE
lib.layout2 < lib.layout1
lib.layout2 {
	file = EXT:t3theme_typo3com/Resources/Private/Templates/Pages/Contentpage.html
}

lib.fluidContent.templateRootPaths.10 = EXT:t3theme_typo3com/Resources/Private/Templates/ContentElements
lib.fluidContent.partialRootPaths.10 = EXT:t3theme_typo3com/Resources/Private/Partials
