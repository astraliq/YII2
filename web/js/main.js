"use strict"



let checkBoxBlock = $('.field-activity-isending');
let dateBlock = $('.field-activity-dateend');
let checkBoxInput = $('#activity-isending');
let dateInput = $('#activity-dateend');
dateBlock.hide();

checkBoxBlock.bind('click', function() {		
		if (checkBoxInput.prop('checked')) {
			dateBlock.show();
		} else {
			dateBlock.hide();
			dateInput.val('');
			
		}
	}
);