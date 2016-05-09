/*
 * jQuery UI Global Datepicker 1.0.6
 *
 * Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://jquery.org/license
 *
 * http://docs.jquery.com/UI/Datepicker
 *
 * Depends:
 *  jquery.ui.datepicker.js
 *  jquery.ui.datepicker-(region).js
 *  jquery.global.js
 *  jquery.glob.(region).js
 */

(function ($, undefined) {

    var dpuuid = new Date().getTime();

    // add options
    $.extend($.datepicker._defaults, {
        region: 'en',
        language: 'standard',
        yearFormat: 'y',
        showAltFieldOnly: false,
        syncAltField: false,
        highlightWeekends: false,
        highlightPublicHolidays: false
    });


    // replace functions
    $.fn.extend($.datepicker, {

        setDefaults: function (settings) {
            return this;
        },

        _attachments: function (input, inst) {
            var appendText = this._get(inst, 'appendText');
            var isRTL = this._get(inst, 'isRTL');
            if (inst.append)
                inst.append.remove();
            if (appendText) {
                inst.append = $('<span class="' + this._appendClass + '">' + appendText + '</span>');
                input[isRTL ? 'before' : 'after'](inst.append);
            }
            input.unbind('focus', this._showDatepicker);
            if (inst.trigger)
                inst.trigger.remove();
            var showOn = this._get(inst, 'showOn');
            if (showOn == 'focus' || showOn == 'both') // pop-up date picker when in the marked field
                input.focus(this._showDatepicker);
            if (showOn == 'button' || showOn == 'both') { // pop-up date picker when button clicked
                var buttonText = this._get(inst, 'buttonText');
                var buttonImage = this._get(inst, 'buttonImage');
                inst.trigger = $(this._get(inst, 'buttonImageOnly') ?
				$('<img/>').addClass(this._triggerClass).
					attr({ src: buttonImage, alt: buttonText, title: buttonText }) :
				$('<button type="button"></button>').addClass(this._triggerClass).
					html(buttonImage == '' ? buttonText : $('<img/>').attr(
					{ src: buttonImage, alt: buttonText, title: buttonText })));
                input[isRTL ? 'before' : 'after'](inst.trigger);
                inst.trigger.click(function () {
                    if ($.datepicker._datepickerShowing && $.datepicker._lastInput == input[0])
                        $.datepicker._hideDatepicker();
                    else
                        $.datepicker._showDatepicker(input[0]);
                    return false;
                });
            }

            // Save specified date format.
            var specifiedDateFormat = inst.settings.dateFormat;

            // Add regional settings to current instance.
            inst.regional = this.regional[this._get(inst, 'region')] || this.regional[''];
            $.extend(inst.settings, inst.regional);

            // Set specified date format to this instance.
            if (specifiedDateFormat) {
                inst.settings.dateFormat = specifiedDateFormat;
            }

            // Hide input field.
            var showAltFieldOnly = this._get(inst, 'showAltFieldOnly');
            if (showAltFieldOnly == true) {
                input.attr('style', 'position:absolute; visibility:hidden;');
                inst.settings.syncAltField = true;
            }

            inst.altField = $('#' + this._get(inst, 'altField'));

            // Sync input field and alternate field.
            var syncAltField = this._get(inst, 'syncAltField');
            if (syncAltField == true) {
                inst.altField.click(function () { input.trigger('focus'); });
                inst.altField.change(function () {
                    input.val(eval('$.datepicker.formatDate("' + inst.settings.dateFormat + '", $.datepicker.parseDisplayingDate($(this).val()), $.datepicker.settings)'));
                });
                if (input.val()) {
                    try {
                        inst.altField.val(this.formatDateToDisplay(this.parseDate(inst.settings.dateFormat, input.val(), inst.settings), inst));
                    } catch (err) {
                        inst.altField.val('');
                    }
                }
            }
        },

        global: function (inst) {
            var g = $.global;
            g.culture = (g.findClosestCulture(this._get(inst, 'region')) || g.cultures['default']);
            g.culture.calendar = (g.culture.calendars[this._get(inst, 'language')] || g.culture.calendars['standard']);
            return g;
        },

        formatDateToDisplay: function (date, inst) {
            if (!inst) {
                inst = this._curInst;
            }
            var global = this.global(inst);
            return global.format(date, this._get(inst, 'altFormat'), global.culture);
        },

        parseDisplayingDate: function (value, inst) {
            if (!inst) {
                inst = this._curInst;
            }
            var global = this.global(inst);
            return global.parseDate(value, this._get(inst, 'altFormat'), global.culture);
        },

        _generateHTML: function (inst) {
            var global = this.global(inst);
            var region = this._get(inst, 'region');
            var highlightWeekends = this._get(inst, 'highlightWeekends');
            var highlightPublicHolidays = this._get(inst, 'highlightPublicHolidays');

            inst.d
            var today = new Date();
            today = this._daylightSavingAdjust(
			    new Date(today.getFullYear(), today.getMonth(), today.getDate())); // clear time
            var isRTL = this._get(inst, 'isRTL');
            var showButtonPanel = this._get(inst, 'showButtonPanel');
            var hideIfNoPrevNext = this._get(inst, 'hideIfNoPrevNext');
            var navigationAsDateFormat = this._get(inst, 'navigationAsDateFormat');
            var numMonths = this._getNumberOfMonths(inst);
            var showCurrentAtPos = this._get(inst, 'showCurrentAtPos');
            var stepMonths = this._get(inst, 'stepMonths');
            var isMultiMonth = (numMonths[0] != 1 || numMonths[1] != 1);
            var currentDate = this._daylightSavingAdjust((!inst.currentDay ? new Date(9999, 9, 9) :
			new Date(inst.currentYear, inst.currentMonth, inst.currentDay)));
            var minDate = this._getMinMaxDate(inst, 'min');
            var maxDate = this._getMinMaxDate(inst, 'max');
            var drawMonth = inst.drawMonth - showCurrentAtPos;
            var drawYear = inst.drawYear;
            if (drawMonth < 0) {
                drawMonth += 12;
                drawYear--;
            }
            if (maxDate) {
                var maxDraw = this._daylightSavingAdjust(new Date(maxDate.getFullYear(),
				maxDate.getMonth() - (numMonths[0] * numMonths[1]) + 1, maxDate.getDate()));
                maxDraw = (minDate && maxDraw < minDate ? minDate : maxDraw);
                while (this._daylightSavingAdjust(new Date(drawYear, drawMonth, 1)) > maxDraw) {
                    drawMonth--;
                    if (drawMonth < 0) {
                        drawMonth = 11;
                        drawYear--;
                    }
                }
            }
            inst.drawMonth = drawMonth;
            inst.drawYear = drawYear;
            var prevText = this._get(inst, 'prevText');
            prevText = (!navigationAsDateFormat ? prevText : this.formatDate(prevText,
			this._daylightSavingAdjust(new Date(drawYear, drawMonth - stepMonths, 1)),
			this._getFormatConfig(inst)));
            var prev = (this._canAdjustMonth(inst, -1, drawYear, drawMonth) ?
			    '<a class="ui-datepicker-prev ui-corner-all" onclick="DP_jQuery_' + dpuuid +
			    '.datepicker._adjustDate(\'#' + inst.id + '\', -' + stepMonths + ', \'M\');"' +
			    ' title="' + prevText + '"><span class="ui-icon ui-icon-circle-triangle-' + (isRTL ? 'e' : 'w') + '">' + prevText + '</span></a>' :
			    (hideIfNoPrevNext ? '' : '<a class="ui-datepicker-prev ui-corner-all ui-state-disabled" title="' + prevText + '"><span class="ui-icon ui-icon-circle-triangle-' + (isRTL ? 'e' : 'w') + '">' + prevText + '</span></a>'));
            var nextText = this._get(inst, 'nextText');
            nextText = (!navigationAsDateFormat ? nextText : this.formatDate(nextText,
			this._daylightSavingAdjust(new Date(drawYear, drawMonth + stepMonths, 1)),
			this._getFormatConfig(inst)));
            var next = (this._canAdjustMonth(inst, +1, drawYear, drawMonth) ?
			    '<a class="ui-datepicker-next ui-corner-all" onclick="DP_jQuery_' + dpuuid +
			    '.datepicker._adjustDate(\'#' + inst.id + '\', +' + stepMonths + ', \'M\');"' +
			    ' title="' + nextText + '"><span class="ui-icon ui-icon-circle-triangle-' + (isRTL ? 'w' : 'e') + '">' + nextText + '</span></a>' :
			    (hideIfNoPrevNext ? '' : '<a class="ui-datepicker-next ui-corner-all ui-state-disabled" title="' + nextText + '"><span class="ui-icon ui-icon-circle-triangle-' + (isRTL ? 'w' : 'e') + '">' + nextText + '</span></a>'));
            var currentText = this._get(inst, 'currentText');
            var gotoDate = (this._get(inst, 'gotoCurrent') && inst.currentDay ? currentDate : today);
            currentText = (!navigationAsDateFormat ? currentText :
			    this.formatDate(currentText, gotoDate, this._getFormatConfig(inst)));
            var controls = (!inst.inline ? '<button type="button" class="ui-datepicker-close ui-state-default ui-priority-primary ui-corner-all" onclick="DP_jQuery_' + dpuuid +
			    '.datepicker._hideDatepicker();">' + this._get(inst, 'closeText') + '</button>' : '');
            var buttonPanel = (showButtonPanel) ? '<div class="ui-datepicker-buttonpane ui-widget-content">' + (isRTL ? controls : '') +
			    (this._isInRange(inst, gotoDate) ? '<button type="button" class="ui-datepicker-current ui-state-default ui-priority-secondary ui-corner-all" onclick="DP_jQuery_' + dpuuid +
			    '.datepicker._gotoToday(\'#' + inst.id + '\');"' +
			    '>' + currentText + '</button>' : '') + (isRTL ? '' : controls) + '</div>' : '';
            var firstDay = parseInt(this._get(inst, 'firstDay'), 10);
            firstDay = (isNaN(firstDay) ? 0 : firstDay);
            var showWeek = this._get(inst, 'showWeek');
            var dayNames = this._get(inst, 'dayNames');
            var dayNamesShort = this._get(inst, 'dayNamesShort');
            var dayNamesMin = this._get(inst, 'dayNamesMin');
            var monthNames = this._get(inst, 'monthNames');
            var monthNamesShort = this._get(inst, 'monthNamesShort');
            var beforeShowDay = this._get(inst, 'beforeShowDay');
            var showOtherMonths = this._get(inst, 'showOtherMonths');
            var selectOtherMonths = this._get(inst, 'selectOtherMonths');
            var calculateWeek = this._get(inst, 'calculateWeek') || this.iso8601Week;
            var defaultDate = this._getDefaultDate(inst);
            var html = '';
            for (var row = 0; row < numMonths[0]; row++) {
                var group = '';
                for (var col = 0; col < numMonths[1]; col++) {
                    var selectedDate = this._daylightSavingAdjust(new Date(drawYear, drawMonth, inst.selectedDay));
                    var cornerClass = ' ui-corner-all';
                    var calender = '';
                    if (isMultiMonth) {
                        calender += '<div class="ui-datepicker-group';
                        if (numMonths[1] > 1)
                            switch (col) {
                            case 0: calender += ' ui-datepicker-group-first';
                                cornerClass = ' ui-corner-' + (isRTL ? 'right' : 'left'); break;
                            case numMonths[1] - 1: calender += ' ui-datepicker-group-last';
                                cornerClass = ' ui-corner-' + (isRTL ? 'left' : 'right'); break;
                            default: calender += ' ui-datepicker-group-middle'; cornerClass = ''; break;
                        }
                        calender += '">';
                    }
                    calender += '<div class="ui-datepicker-header ui-widget-header ui-helper-clearfix' + cornerClass + '">' +
					    (/all|left/.test(cornerClass) && row == 0 ? (isRTL ? next : prev) : '') +
					    (/all|right/.test(cornerClass) && row == 0 ? (isRTL ? prev : next) : '') +
					    this._generateMonthYearHeader(inst, drawMonth, drawYear, minDate, maxDate,
					    row > 0 || col > 0, monthNames, monthNamesShort) + // draw month headers
					    '</div><table class="ui-datepicker-calendar"><thead>' +
					    '<tr>';
                    var thead = (showWeek ? '<th class="ui-datepicker-week-col">' + this._get(inst, 'weekHeader') + '</th>' : '');
                    for (var dow = 0; dow < 7; dow++) { // days of the week
                        var weekday = (dow + firstDay + 6) % 7;
                        var day = (dow + firstDay) % 7;
                        thead += '<th class="' +
                            (highlightWeekends == true
                                ? ((weekday == 5 ? ' ui-datepicker-saturday' : weekday == 6 ? ' ui-datepicker-sunday' : ''))
                                : (weekday >= 5 ? ' ui-datepicker-week-end' : '')
                            ) +
                        '">';
                        thead += '<span title="' + dayNames[day] + '">' + dayNamesMin[day] + '</span></th>';
                    }
                    calender += thead + '</tr></thead><tbody>';
                    var daysInMonth = this._getDaysInMonth(drawYear, drawMonth);
                    if (drawYear == inst.selectedYear && drawMonth == inst.selectedMonth)
                        inst.selectedDay = Math.min(inst.selectedDay, daysInMonth);
                    var leadDays = (this._getFirstDayOfMonth(drawYear, drawMonth) - firstDay + 7) % 7;
                    var numRows = (isMultiMonth ? 6 : Math.ceil((leadDays + daysInMonth) / 7)); // calculate the number of rows to generate
                    var printDate = this._daylightSavingAdjust(new Date(drawYear, drawMonth, 1 - leadDays));
                    for (var dRow = 0; dRow < numRows; dRow++) { // create date picker rows
                        calender += '<tr>';
                        var tbody = (!showWeek ? '' : '<td class="ui-datepicker-week-col">' +
						this._get(inst, 'calculateWeek')(printDate) + '</td>');
                        for (var dow = 0; dow < 7; dow++) { // create date picker days
                            var holidayName = ($.publicHoliday ? $.publicHoliday.getName(printDate, region) : '');
                            var weekday = (dow + firstDay + 6) % 7;
                            var daySettings = (beforeShowDay ?
							beforeShowDay.apply((inst.input ? inst.input[0] : null), [printDate]) : [true, '']);
                            var otherMonth = (printDate.getMonth() != drawMonth);
                            var unselectable = (otherMonth && !selectOtherMonths) || !daySettings[0] ||
							(minDate && printDate < minDate) || (maxDate && printDate > maxDate);
                            tbody += '<td class="' +
							(otherMonth ? ' ui-datepicker-other-month' : '') + // highlight days from other months
							((printDate.getTime() == selectedDate.getTime() && drawMonth == inst.selectedMonth && inst._keyEvent) || // user pressed key
							(defaultDate.getTime() == printDate.getTime() && defaultDate.getTime() == selectedDate.getTime()) ?
                            // or defaultDate is current printedDate and defaultDate is selectedDate
							' ' + this._dayOverClass : '') + // highlight selected day
							(unselectable ? ' ' + this._unselectableClass + ' ui-state-disabled' : '') +  // highlight unselectable days
							(otherMonth && !showOtherMonths ? '' : ' ' + daySettings[1] + // highlight custom dates
							(printDate.getTime() == currentDate.getTime() ? ' ' + this._currentClass : '') + // highlight selected day
							(printDate.getTime() == today.getTime() ? ' ui-datepicker-today' : '')) + '"' + // highlight today (if different)
							((!otherMonth || showOtherMonths) && daySettings[2] ? ' title="' + daySettings[2] + '"' : '') + // cell title
							(unselectable ? '' : ' onclick="DP_jQuery_' + dpuuid + '.datepicker._selectDay(\'#' +
							    inst.id + '\',' + printDate.getMonth() + ',' + printDate.getFullYear() + ', this);return false;"') + '>' + // actions
							(otherMonth && !showOtherMonths ? '&#xa0;' : // display for other months
							(unselectable
                                ? '<span class="ui-state-default' +
                                    (highlightWeekends == true
                                        ? ((weekday == 5 ? ' ui-datepicker-saturday' : weekday == 6 ? ' ui-datepicker-sunday' : ''))
                                        : (weekday >= 5 ? ' ui-datepicker-week-end' : '')
                                    ) + '">' + printDate.getDate() + '</span>'
                                : '<a class="ui-state-default' +
                                    (highlightWeekends == true
                                        ? ((weekday == 5 ? ' ui-datepicker-saturday' : weekday == 6 ? ' ui-datepicker-sunday' : ''))
                                        : (weekday >= 5 ? ' ui-datepicker-week-end' : '')
                                    ) +
                                    (highlightPublicHolidays == true && holidayName ? ' ui-datepicker-public-holiday' : '') +
							(printDate.getTime() == today.getTime() ? ' ui-state-highlight' : '') +
							(printDate.getTime() == currentDate.getTime() ? ' ui-state-active' : '') + // highlight selected day
							(otherMonth ? ' ui-priority-secondary' : '') + // distinguish dates from other months
							'" href="#">' + printDate.getDate() + '</a>')) + '</td>'; // display selectable date
                            printDate.setDate(printDate.getDate() + 1);
                            printDate = this._daylightSavingAdjust(printDate);
                        }
                        calender += tbody + '</tr>';
                    }
                    drawMonth++;
                    if (drawMonth > 11) {
                        drawMonth = 0;
                        drawYear++;
                    }
                    calender += '</tbody></table>' + (isMultiMonth ? '</div>' +
							((numMonths[0] > 0 && col == numMonths[1] - 1) ? '<div class="ui-datepicker-row-break"></div>' : '') : '');
                    group += calender;
                }
                html += group;
            }
            html += buttonPanel + ($.browser.msie && parseInt($.browser.version, 10) < 7 && !inst.inline ?
			'<iframe src="javascript:false;" class="ui-datepicker-cover" frameborder="0"></iframe>' : '');
            inst._keyEvent = false;

            return html;
        },

        _generateMonthYearHeader: function (inst, drawMonth, drawYear, minDate, maxDate,
			    secondary, monthNames, monthNamesShort) {
            var global = this.global(inst);
            var changeMonth = this._get(inst, 'changeMonth');
            var changeYear = this._get(inst, 'changeYear');
            var showMonthAfterYear = this._get(inst, 'showMonthAfterYear');
            var html = '<div class="ui-datepicker-title">';
            var monthHtml = '';
            // month selection
            if (secondary || !changeMonth)
                monthHtml += '<span class="ui-datepicker-month">' + monthNames[drawMonth] + '</span>';
            else {
                var inMinYear = (minDate && minDate.getFullYear() == drawYear);
                var inMaxYear = (maxDate && maxDate.getFullYear() == drawYear);
                monthHtml += '<select class="ui-datepicker-month" ' +
				    'onchange="DP_jQuery_' + dpuuid + '.datepicker._selectMonthYear(\'#' + inst.id + '\', this, \'M\');" ' +
				    'onclick="DP_jQuery_' + dpuuid + '.datepicker._clickMonthYear(\'#' + inst.id + '\');"' +
			 	    '>';
                for (var month = 0; month < 12; month++) {
                    if ((!inMinYear || month >= minDate.getMonth()) &&
						    (!inMaxYear || month <= maxDate.getMonth()))
                        monthHtml += '<option value="' + month + '"' +
						    (month == drawMonth ? ' selected="selected"' : '') +
						    '>' + monthNamesShort[month] + '</option>';
                }
                monthHtml += '</select>';
            }
            if (!showMonthAfterYear)
                html += monthHtml + (secondary || !(changeMonth && changeYear) ? '&#xa0;' : '');
            // year selection
            if (!inst.yearshtml) {
                inst.yearshtml = '';
                if (secondary || !changeYear)
                    html += '<span class="ui-datepicker-year">' + drawYear + '</span>';
                else {
                    // determine range of years to display
                    var years = this._get(inst, 'yearRange').split(':');
                    var thisYear = new Date().getFullYear();
                    var determineYear = function (value) {
                        var year = (value.match(/c[+-].*/) ? drawYear + parseInt(value.substring(1), 10) :
						    (value.match(/[+-].*/) ? thisYear + parseInt(value, 10) :
						    parseInt(value, 10)));
                        return (isNaN(year) ? thisYear : year);
                    };
                    var year = determineYear(years[0]);
                    var endYear = Math.max(year, determineYear(years[1] || ''));
                    year = (minDate ? Math.max(year, minDate.getFullYear()) : year);
                    endYear = (maxDate ? Math.min(endYear, maxDate.getFullYear()) : endYear);
                    inst.yearshtml += '<select class="ui-datepicker-year" ' +
					    'onchange="DP_jQuery_' + dpuuid + '.datepicker._selectMonthYear(\'#' + inst.id + '\', this, \'Y\');" ' +
					    'onclick="DP_jQuery_' + dpuuid + '.datepicker._clickMonthYear(\'#' + inst.id + '\');"' +
					    '>';
                    // deteremine year format to display
                    var yearFormat = global.culture.calendar.patterns[this._get(inst, 'yearFormat')];
                    for (; year <= endYear; year++) {
                        var yearToDisplay = yearFormat ? global.format(new Date(year + "/12/31"), yearFormat) : year;
                        inst.yearshtml += '<option value="' + year + '"' +
						    (year == drawYear ? ' selected="selected"' : '') +
						    '>' + yearToDisplay + '</option>';
                    }
                    inst.yearshtml += '</select>';
                    //when showing there is no need for later update
                    if (!$.browser.mozilla) {
                        html += inst.yearshtml;
                        inst.yearshtml = null;
                    } else {
                        // will be replaced later with inst.yearshtml
                        html += '<select class="ui-datepicker-year"><option value="' + drawYear + '" selected="selected">' + drawYear + '</option></select>';
                    }
                }
            }
            html += this._get(inst, 'yearSuffix');
            if (showMonthAfterYear)
                html += (secondary || !(changeMonth && changeYear) ? '&#xa0;' : '') + monthHtml;
            html += '</div>'; // Close datepicker_header
            return html;
        },

        _getFormatConfig: function (inst) {
            var shortYearCutoffValue = this._get(inst, 'shortYearCutoff');
            shortYearCutoffValue = (typeof shortYearCutoffValue != 'string' ? shortYearCutoffValue :
			    new Date().getFullYear() % 100 + parseInt(shortYearCutoffValue, 10));
            var global = this.global(inst);
            var globalCalendar = global.culture.calendar;
            var dayNamesShortValue = (globalCalendar ? globalCalendar.days.namesShort : this._get(inst, 'dayNamesShort'));
            var dayNamesValue = (globalCalendar ? globalCalendar.days.names : this._get(inst, 'dayNames'));
            var monthNamesShortValue = (globalCalendar ? globalCalendar.months.namesAbbr : this._get(inst, 'monthNamesShort'));
            var monthNamesValue = (globalCalendar ? globalCalendar.months.names : this._get(inst, 'monthNames'));
            return { shortYearCutoff: shortYearCutoffValue,
                dayNamesShort: dayNamesShortValue, dayNames: dayNamesValue,
                monthNamesShort: monthNamesShortValue, monthNames: monthNamesValue
            };
        },

        _selectDay: function (id, month, year, td) {
            var target = $(id);
            if ($(td).hasClass(this._unselectableClass) || this._isDisabledDatepicker(target[0])) {
                return;
            }
            var inst = this._getInst(target[0]);
            inst.selectedDay = inst.currentDay = $('a', td).html();
            inst.selectedMonth = inst.currentMonth = month;
            inst.selectedYear = inst.currentYear = year;
            this._selectDate(id, this._formatDate(inst,
			inst.currentDay, inst.currentMonth, inst.currentYear));

            if (inst.altField) {
                inst.altValue = this.formatDateToDisplay(new Date(inst.currentYear, inst.currentMonth, inst.currentDay));
                inst.altField.val(inst.altValue);
            }
        },

        _updateAlternate: function (inst) {
            var altField = this._get(inst, 'altField');
            if (altField) { // update alternate field too
                var altFormat = this._get(inst, 'altFormat') || this._get(inst, 'dateFormat');
                var date = this._getDate(inst);
                var dateStr = this.formatDateToDisplay(date, inst);
                $(altField).each(function () { $(this).val(dateStr); });
            }
        }

    });

    window['DP_jQuery_' + dpuuid] = $;

})(jQuery);
