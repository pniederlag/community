// -----------------------------------------------------------------------------
// Library objects
// -----------------------------------------------------------------------------


// [1] Home
lib.layout1 = FLUIDTEMPLATE
lib.layout1 {
	file = EXT:t3theme_typo3com/Resources/Private/Templates/Pages/homepage.html
	partialRootPath = EXT:t3theme_typo3com/Resources/Private/Partials/
	layoutRootPath = EXT:t3theme_typo3com/Resources/Private/Layouts/

	variables {
		mainMenu < temp.mainMenu
		logo < temp.logo
		search < temp.search


		content < temp.content

		footer. < temp.footer
	}
}