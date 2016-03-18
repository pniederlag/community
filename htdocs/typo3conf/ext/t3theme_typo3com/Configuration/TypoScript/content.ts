# text_only CE
# register new CE for gridelements
#tt_content.casestudy_teaser < lib.gridelements.defaultGridSetup

tt_content.casestudy_teaser = FLUIDTEMPLATE
tt_content.casestudy_teaser {
	file = EXT:t3theme_typo3com/Resources/Private/Templates/ContentElements/CaseStudyTeaser.html
	partialRootPath = EXT:t3theme_typo3com/Resources/Private/Partials/ContentElements/
	dataProcessing {
		10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
		10 {
			references.fieldName = assets
		}

		20 = TYPO3\CMS\Frontend\DataProcessing\GalleryProcessor
		20 {
			maxGalleryWidth = {$styles.content.textmedia.maxW}
			maxGalleryWidthInText = {$styles.content.textmedia.maxWInText}
			columnSpacing = {$styles.content.textmedia.columnSpacing}
			borderWidth = {$styles.content.textmedia.borderWidth}
			borderPadding = {$styles.content.textmedia.borderPadding}
		}
	}

	variables {
		caseStudyOverviewPage = TEXT
		caseStudyOverviewPage.value = {$plugin.t3theme_typo3com.caseStudy.overviewPage}

		legalInfoPid = TEXT
		legalInfoPid.value = {$plugin.t3theme_typo3com.footer.legalInfoPid}


		longTeaserHeadline = TEXT
		longTeaserHeadline {
			dataWrap = DB:pages:{field:pages}:tx_t3themetypo3com_longteaser_headline
			wrap3 = {|}
			insertData = 1
		}

		longteaserAuthor = TEXT
		longteaserAuthor {
			dataWrap = DB:pages:{field:pages}:tx_t3themetypo3com_longteaser_author
			wrap3 = {|}
			insertData = 1
		}



		teaserImage = FILES
		teaserImage.references {
			table = pages
			uid.field = pages
			fieldName = media
		}

		teaserImage.renderObj = COA
		teaserImage.renderObj {
			10 = TEXT
			10.data = file:current:uid_local
		}

		detailPage = TEXT
		detailPage.field = pages

	}

	file = EXT:t3theme_typo3com/Resources/Private/Templates/ContentElements/CaseStudyTeaser.html
}

tt_content.indented_textmedia = FLUIDTEMPLATE
tt_content.indented_textmedia {
	file = EXT:t3theme_typo3com/Resources/Private/Templates/ContentElements/IndentedTextmedia.html
	partialRootPath = EXT:t3theme_typo3com/Resources/Private/Partials/ContentElements/
	dataProcessing {
		10 = TYPO3\CMS\Frontend\DataProcessing\FilesProcessor
		10 {
			references.fieldName = assets
		}

		20 = TYPO3\CMS\Frontend\DataProcessing\GalleryProcessor
		20 {
			maxGalleryWidth = {$styles.content.textmedia.maxW}
			maxGalleryWidthInText = {$styles.content.textmedia.maxWInText}
			columnSpacing = {$styles.content.textmedia.columnSpacing}
			borderWidth = {$styles.content.textmedia.borderWidth}
			borderPadding = {$styles.content.textmedia.borderPadding}
		}
	}

	file = EXT:t3theme_typo3com/Resources/Private/Templates/ContentElements/IndentedTextmedia.html
}



tt_content {

	//add default row
	stdWrap.innerWrap.cObject.default.20.10.value = csc-default row


	textpic {
		20.text.wrap = <div class="csc-textpic-text col-md-12"> | </div>
	}

	textmedia {
		variables {
		    sectionName = CASE
		    sectionName {
				key.field = layout

				feature-1-11 = TEXT
				feature-1-11.value = feature-details

				feature-2-10 = TEXT
				feature-2-10.value = feature-details

				feature-3-9 = TEXT
				feature-3-9.value = feature-details

				feature-4-8 = TEXT
				feature-4-8.value = feature-details

				feature-5-7 = TEXT
				feature-5-7.value = feature-details

				feature-6-6 = TEXT
				feature-6-6.value = feature-details

				feature-7-5 = TEXT
				feature-7-5.value = feature-details

				feature-8-4 = TEXT
				feature-8-4.value = feature-details

				feature-9-3 = TEXT
				feature-9-3.value = feature-details

				feature-10-2 = TEXT
				feature-10-2.value = feature-details

				feature-11-1 = TEXT
				feature-11-1.value = feature-details

				default = TEXT
				default.value = default
			}

			leftColumnClass = CASE
			leftColumnClass {
				key.field = layout

				feature-1-11 = TEXT
				feature-1-11.value = col-md-1

				feature-2-10 = TEXT
				feature-2-10.value = col-md-2

				feature-3-9 = TEXT
				feature-3-9.value = col-md-3

				feature-4-8 = TEXT
				feature-4-8.value = col-md-4

				feature-5-7 = TEXT
				feature-5-7.value = col-md-5

				feature-6-6 = TEXT
				feature-6-6.value = col-md-6

				feature-7-5 = TEXT
				feature-7-5.value = col-md-7

				feature-8-4 = TEXT
				feature-8-4.value = col-md-8

				feature-9-3 = TEXT
				feature-9-3.value = col-md-9

				feature-10-2 = TEXT
				feature-10-2.value = col-md-10

				feature-11-1 = TEXT
				feature-11-1.value = col-md-11
			}

			rightColumnClass = CASE
			rightColumnClass {
				key.field = layout

				feature-1-11 = TEXT
				feature-1-11.value = col-md-11

				feature-2-10 = TEXT
				feature-2-10.value = col-md-10

				feature-3-9 = TEXT
				feature-3-9.value = col-md-9

				feature-4-8 = TEXT
				feature-4-8.value = col-md-8

				feature-5-7 = TEXT
				feature-5-7.value = col-md-7

				feature-6-6 = TEXT
				feature-6-6.value = col-md-6

				feature-7-5 = TEXT
				feature-7-5.value = col-md-5

				feature-8-4 = TEXT
				feature-8-4.value = col-md-4

				feature-9-3 = TEXT
				feature-9-3.value = col-md-3

				feature-10-2 = TEXT
				feature-10-2.value = col-md-2

				feature-11-1 = TEXT
				feature-11-1.value = col-md-1
			}

			rows = TEXT
			rows {
				current = 1
				setCurrent.field = imagecols
				setCurrent.wrap = 12 / |
				prioriCalc = 1
			}
		}
	}


	menu.8 = COA
	menu.8 {

		10 = HMENU
		10.includeNotInMenu = 1
		10.special = list
		10.special.value.field = pages
		10.1 = TMENU
		10.1.NO.doNotLinkIt = 1
		10.1.NO.stdWrap.cObject = COA
		10.1.NO.stdWrap.cObject {
			10 = FILES
			10.references {
				table = pages
				uid.field = uid
				fieldName = media
			}
			10.renderObj = COA
			10.renderObj {
				10 = IMG_RESOURCE
				10.stdWrap.wrap = <img src="|" />
				10 {
					file.import.data = file:current:publicUrl
					altText.data = file:current:alternative
					titleText.data = file:current:title
					}
				}

			20 = TEXT
			20.value.field = title
			}

		}


	}

}



lib.fluidContent {
	partialRootPaths.10 = EXT:t3theme_typo3com/Resources/Private/Partials/ContentElements/
}



tt_content.menu = CASE
tt_content.menu.key.field = menu_type
tt_content.menu.1 = COA
tt_content.menu.1 {
	10 = HMENU
	10.special = directory
	10.special.value.field = pages
	10.1 = TMENU
	10.1.NO.doNotShowLink = 1
	10.1.NO.before.cObject = COA
	10.1.NO.before.cObject.stdWrap.wrap = <div class="isotope-item">|</div>
	10.1.NO.before.cObject {
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
		10.renderObj >
		20 = TEXT
		20.field = title
		20.wrap = <h3>|</h3>
		30 = TEXT
		30.field = abstract
		30.wrap = <p>|</p>
		40 = TEXT
		40.value = Learn more
		40.typolink.parameter.field = uid
		40.typolink.ATagParams = class="btn btn-default"
		40.if.isTrue.cObject = CONTENT
		40.if.isTrue.cObject {
			table = tt_content
			select.pidInList.field = uid
			select.where = colPos = 1
			select.languageField = sys_language_uid
		}
	}
}
