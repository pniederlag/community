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