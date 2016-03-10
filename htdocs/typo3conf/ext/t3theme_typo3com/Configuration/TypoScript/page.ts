// -----------------------------------------------------------------------------
// Page rendering
// -----------------------------------------------------------------------------

page = PAGE
page {


	10 = CASE
	10 {
		key.data = levelfield:-1, backend_layout_next_level, slide
		key.override.field = backend_layout

		// [1] Home
		1 < lib.layout1
	}
}