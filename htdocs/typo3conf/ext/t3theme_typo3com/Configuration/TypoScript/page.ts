// -----------------------------------------------------------------------------
// Page rendering
// -----------------------------------------------------------------------------

page = PAGE
page {

	includeCSS {
		main = EXT:t3theme_typo3com/Resources/Public/Styles/Main.css
	}

	includeJSFooterlibs {

	}


	10 = CASE
	10 {
		key.data = levelfield:-1, backend_layout_next_level, slide
		key.override.field = backend_layout

		// [1] Home
		file__Homepage < lib.layout1
	}
}