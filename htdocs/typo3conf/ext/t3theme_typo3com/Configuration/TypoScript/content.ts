# text_only CE
# register new CE for gridelements
tt_content.casestudy_teaser < lib.gridelements.defaultGridSetup

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
	}

	file = EXT:t3theme_typo3com/Resources/Private/Templates/ContentElements/CaseStudyTeaser.html
}


tt_content {

	//add default row
	stdWrap.innerWrap.cObject.default.20.10.value = csc-default row


	textpic {
		20.text.wrap = <div class="csc-textpic-text col-md-12"> | </div>
	}

	textmedia {
		variables {
			rows = TEXT
			rows {
				current = 1
				setCurrent.field = imagecols
				setCurrent.wrap = 12 / |
				prioriCalc = 1
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