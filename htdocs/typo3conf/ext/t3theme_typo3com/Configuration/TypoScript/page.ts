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


    10 = FLUIDTEMPLATE
    10 {
        templateName = TEXT
        templateName.stdWrap.cObject = CASE
        templateName.stdWrap.cObject {
            key.data = levelfield:-1, backend_layout_next_level, slide
            key.override.field = backend_layout

            pagets__homepage = TEXT
            pagets__homepage.value = Homepage

            default = TEXT
            default.value = Default
        }

        settings {
            contactPid = {$plugin.t3theme_typo3com.footer.contactPid}
            legalInfoPid = {$plugin.t3theme_typo3com.footer.legalInfoPid}
        }

        templateRootPaths {
            0 = EXT:t3theme_typo3com/Resources/Private/Templates/Page/
        }
        partialRootPaths {
            0 = EXT:t3theme_typo3com/Resources/Private/Partials/Page/
        }
        layoutRootPaths {
            0 = EXT:t3theme_typo3com/Resources/Private/Layouts/Page/
        }
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
							search = pagets__
							replace =
						}
					}
					case = lower
				}
			}
		}
	}
}

