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
		logo < temp.logo
		search < temp.search


		content  < styles.content.get
		content.select.where = colPos=0

		footerMenu < temp.footerMenu

		contactPid = TEXT
		contactPid.value = {$plugin.t3theme_typo3com.footer.contactPid}

		legalInfoPid = TEXT
		legalInfoPid.value = {$plugin.t3theme_typo3com.footer.legalInfoPid}
	}
}