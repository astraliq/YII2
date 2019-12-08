"use strict"

function parse_query_string(query) {
	query = query.replace(/^\?/gi, '');
	let lets = query.split("&");
	let query_string = {};
	for (let i = 0; i < lets.length; i++) {
		let pair = lets[i].split("=");
		let key = decodeURIComponent(pair[0]);
		let value = decodeURIComponent(pair[1]);
		// If first entry with this name
		if (typeof query_string[key] === "undefined") {
			query_string[key] = decodeURIComponent(value);
			// If second entry with this name
		} else if (typeof query_string[key] === "string") {
			let arr = [query_string[key], decodeURIComponent(value)];
			query_string[key] = arr;
			// If third or later entry with this name
		} else {
			query_string[key].push(decodeURIComponent(value));
		}
	}
	return query_string;
}

let checkBoxBlocks = {
	'.field-activity-isending': '#activity-isending',
	'.field-activity-isrepeat': '#activity-isrepeat',
	'.field-activity-usenotification': '#activity-usenotification',
}
let blockInputs = {
	'.field-activity-dateend': '#activity-dateend',
	'.field-activity-repeattype': '#activity-repeattype',
	'.field-activity-email': '#activity-email',
}

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

	checkBoxBlock[i].bind('click', function () {
		if (checkBoxInput[i].prop('checked')) {
			dateBlock[i].show();
		} else {
			dateBlock[i].hide();
			dateInput[i].val('');
		}
	});
}
let getParams = parse_query_string(document.location.search)
let activitiesArr = [];
let now = new Date();
let calendar = $('#calendar_block');
if (document.location.pathname === '/activity/view-all') {
	$.ajax({
		url: '/activity/view-all',
		data: {
			method: 'getActivities',
		},
		success: function (data) {
			activitiesArr = data;
//			console.log(activitiesArr);
			if (getParams['month'] & getParams['year']) {
				let nowDay = getParams['day'] ? getParams['day'] : '01';
				let nowDate = new Date(`${getParams['year']}-${getParams['month']}-${nowDay}`);
				createCalendar(calendar, nowDate.getFullYear(), nowDate.getMonth(),getParams['day'] ? nowDate.getDate() : null);
			} else {
				createCalendar(calendar, now.getFullYear(), now.getMonth());
			}
		}
	});
} else {
	
};

if (document.location.pathname === '/activity/view') {
	$.ajax({
		url: '/activity/view-all',
//		url: document.location.pathname + document.location.search,
		data: {
			method: 'getActivities',
		},
		success: function (data) {
			activitiesArr = data;
//			console.log(activitiesArr);
			let nowDay = getParams['day'] ? getParams['day'] : '01';
			let findActivity = activitiesArr.find(el => +el.id === +getParams['id']);
			let nowDate = new Date(findActivity['dateStart'].replace(/(\d{2})\.(\d{2})\.(\d{4})/,'$3-$2-$1'));
			createCalendar(calendar, nowDate.getFullYear(), nowDate.getMonth(),nowDate.getDate());
		}
	});
} else {
	
};
	

let currentDate = new Date($('#date_start_newaction').text() ? $('#date_start_newaction').text() : '2016-11-17');
let currentDay = currentDate.getDate();
let currentMonth = currentDate.getMonth();
let currentYear = currentDate.getFullYear();


function ifDayIsActive(date, activities) {

	for (let i = 0; i < activities.length; i++) {
		let activityDate = new Date(activities[i].dateStart.replace(/(\d{2})\.(\d{2})\.(\d{4})/,'$3-$2-$1'));
		if (date.getDate() === activityDate.getDate() && date.getMonth() === activityDate.getMonth() && date.getFullYear() === activityDate.getFullYear()) {
			return true;
		};
	}
};

function createCalendar(elem, year, month, day) {
	let months = {
		0: 'Январь',
		1: 'Февраль',
		2: 'Март',
		3: 'Апрель',
		4: 'Май',
		5: 'Июнь',
		6: 'Июль',
		7: 'Август',
		8: 'Сентябрь',
		9: 'Октябрь',
		10: 'Ноябрь',
		11: 'Декабрь',
	}
	let mon = month; // месяцы в JS идут от 0 до 11, а не от 1 до 12
	let d = new Date(year, mon);
//	console.log('d--> ' +d);
	let previousMonth = (mon === 0) ? 11 : month - 1;
	let nextMonth = (mon === 11) ? 0 : month + 1;
	let previousYear = (mon === 0) ? year - 1 : year;
	let nextYear = (mon === 11) ? year + 1 : year;
	
	let table = `<table class="cal"><caption><span class="prev" onclick="createCalendar(calendar, ${previousYear}, ${previousMonth}, ${day})">←</span><span class="next" onclick="createCalendar(calendar, ${nextYear}, ${nextMonth}, ${day})">→</span><a href="/activity/view-all?month=${month+1}&year=${year}">${months[month]} ${year}</a></caption>`;
	
	table += '<thead><tr><th>Пн</th><th>Вт</th><th>Ср</th><th>Чт</th><th>Пт</th><th>Сб</th><th>Вс</th></tr></thead><tbody><tr>';

	// пробелы для первого ряда
	// с понедельника до первого дня месяца
	// * * * 1  2  3  4
	for (let i = 0; i < getDay(d); i++) {
		table += '<td class="off"></td>';
	}

	// <td> ячейки календаря с датами
	while (d.getMonth() == mon) {
		if (day === d.getDate() && ifDayIsActive(d, activitiesArr)) {
			table += `<td class="current_active"><a href="/activity/view-all?day=${d.getDate()}&month=${month+1}&year=${year}">${d.getDate()}</a></td>`;
		} else if (ifDayIsActive(d, activitiesArr)) {
			table += `<td class="active"><a href="/activity/view-all?day=${d.getDate()}&month=${month+1}&year=${year}">${d.getDate()}</a></td>`;
		} else {
			table += '<td><a href="#">' + d.getDate() + '</a></td>';
		};
		

		if (getDay(d) % 7 == 6) { // вс, последний день - перевод строки
			table += '</tr><tr>';
		}

		d.setDate(d.getDate() + 1);
	}

	// добить таблицу пустыми ячейками, если нужно
	// 29 30 31 * * * *
	if (getDay(d) != 0) {
		for (let i = getDay(d); i < 7; i++) {
			table += '<td class="off"></td>';
		}
	}

	// закрыть таблицу
	table += '</tr></tbody></table>';
	let oldTable = $('.cal');
	if (oldTable) {
		oldTable.detach();
	}
	elem.prepend(table);
}

function getDay(date) { // получить номер дня недели, от 0 (пн) до 6 (вс)
	let day = date.getDay();
	if (day == 0) day = 7; // сделать воскресенье (0) последним днем
	return day - 1;
}


//createCalendar(calendar, currentYear, currentMonth);
