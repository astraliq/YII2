"use strict"


let checkBoxBlocks = {
	'.field-activity-isending': '#activity-isending',
	'.field-activity-isrepeat' : '#activity-isrepeat',
	'.field-activity-usenotification': '#activity-usenotification',
}
let blockInputs = {
	'.field-activity-dateend': '#activity-dateend',
	'.field-activity-repeattype': '#activity-repeattype',
	'.field-activity-email': '#activity-email',
}

console.log(Object.keys(checkBoxBlocks)[0]);
console.log(Object.keys(blockInputs)[0]);

console.log(checkBoxBlocks[Object.keys(checkBoxBlocks)[0]]);
console.log(blockInputs[Object.keys(blockInputs)[0]]);				   
let checkBoxBlock = [];
let dateBlock = [];
let checkBoxInput = [];
let dateInput = [];

for (let i = 0; i < Object.keys(checkBoxBlocks).length; i++) {
	checkBoxBlock[i] = $(Object.keys(checkBoxBlocks)[i]);
	dateBlock[i] = $(Object.keys(blockInputs)[i]);
	checkBoxInput[i] = $(checkBoxBlocks[Object.keys(checkBoxBlocks)[i]]);
	dateInput[i] = $(blockInputs[Object.keys(blockInputs)[i]]);
	dateBlock[i].hide();
	
	checkBoxBlock[i].bind('click', function() {		
			if (checkBoxInput[i].prop('checked')) {
				dateBlock[i].show();
			} else {
				dateBlock[i].hide();
				dateInput[i].val('');

			}
		}
	);
}

