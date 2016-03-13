// -----------------------------------------------------------------------------
// Library objects
// -----------------------------------------------------------------------------


// [1] Home
lib.layout1 = FLUIDTEMPLATE
lib.layout1 {
	file = EXT:t3theme_typo3com/Resources/Private/Templates/Pages/Homepage.html
	partialRootPath = EXT:t3theme_typo3com/Resources/Private/Partials/
	layoutRootPath = EXT:t3theme_typo3com/Resources/Private/Layouts/

	variables {
		mainMenu < temp.mainMenu

		header < styles.content.get
		header.select.where = colPos=0

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
