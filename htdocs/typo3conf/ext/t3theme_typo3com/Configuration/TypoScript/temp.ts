// -----------------------------------------------------------------------------
// Temp objects
// -----------------------------------------------------------------------------


// Main Menu
// -------------------------------------
temp.mainMenu {

}


// Logo
// -------------------------------------
temp.logo {

}


// Search
// -------------------------------------
temp.search {

}


// Search
// -------------------------------------
temp.search {

}


// Footer-Menu
// -------------------------------------

temp.footerMenu = COA
temp.footerMenu {

	10 = HMENU
	10 {
		special = directory
		special.value = {$plugin.t3theme_typo3com.footer.menuPid}

		1 = TMENU
		1 {
			wrap = |
			expAll = 1

			NO = 1
			NO {
				wrapItemAndSub = <div class="footer-menu-headline col-md-3">|</div>
				stdWrap.htmlSpecialChars = 1
				stdWrap.wrap = <h3>|</h3>
				doNotLinkIt = 1
			}
		}

		2 = TMENU
		2 {
			wrap = <ul class="list-unstyled">|</ul>
			expAll = 1

			NO = 1
			NO {
				wrapItemAndSub = <li>|</li>
				stdWrap.htmlSpecialChars = 1
			}

			ACT = 1
			ACT < .NO
			ACT {
				wrapItemAndSub = <li>|</li>
				ATagParams = class="active"
			}
		}
	}

	20 = TEXT
	20.value = Newsletter
	20.wrap = <div class="col-md-3"><h3>|</h3></div>
}

