// -----------------------------------------------------------------------------
// Page rendering
// -----------------------------------------------------------------------------

page = PAGE
page {

	meta {
		viewport= width=device-width, initial-scale=1.0, shrink-to-fit=no
	}

	// Force IE to use latest rendering mode
	headerData {
		3 = TEXT
		3.value = <meta http-equiv="x-ua-compatible" content="ie=edge">
	}

	includeCSS {
		main = EXT:t3theme_typo3com/Resources/Public/Styles/Main.min.css
	}

	includeJSFooterlibs {
		jQuery = EXT:t3theme_typo3com/Resources/Public/JavaScript/jQuery/jquery-2.2.1.js
		script = EXT:t3theme_typo3com/Resources/Public/JavaScript/Script.js
	}


	10 = CASE
	10 {
		key.data = levelfield:-1, backend_layout_next_level, slide
		key.override.field = backend_layout

		// [1] Home
		file__Homepage < lib.layout1

		// [2] Content
		file__Contentpage < lib.layout2
	}


	bodyTagCObject = COA
	bodyTagCObject {
		stdWrap.wrap = <body|>

		// Class
		10 = CASE
		10 {
			key.data = levelfield:-1, backend_layout_next_level, slide
			key.override.field = backend_layout

			// Default
			default = TEXT
			default {
				noTrimWrap = | class="layout-|"|
				data = levelfield:-1, backend_layout_next_level, slide
				override.field = backend_layout

				stdWrap {
					replacement {
						10 {
							search = file__
							replace =
						}
					}
					case = lower
				}
			}
		}
	}
}

