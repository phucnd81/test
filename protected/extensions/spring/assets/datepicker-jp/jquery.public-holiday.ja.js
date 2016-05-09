/*
* jQuery Public Holiday 1.0.1 (Japan)
*
* Copyright 2011, AUTHORS.txt (http://jqueryui.com/about)
* Dual licensed under the MIT or GPL Version 2 licenses.
* http://jquery.org/license
*
* (Based on the low at the point of 2 June, 2011)
* (2011年6月2日現在の祝日法に準ずる)
*/
(function ($) {

    var targetRegion = 'ja';

    function PublicHoliday() {
    }

    $.extend(PublicHoliday.prototype, {

        /* Get holiday name.  Referring : http://www.h3.dion.ne.jp/~sakatsu/holiday_topic.htm
        @param  date  Date - the target date 
        @param  region  String - the target region name 
        */
        getName: function (date, region) {

            if (region && targetRegion != region) { return ''; }

            if (typeof date != 'object') { return ''; }

            try { date.getTime(); }
            catch (err) { return ''; }

            var year = date.getFullYear();
            var month = date.getMonth() + 1;

            var holidayName = this._getBaseName(date, region);

            // Get holiday names of the days before the target date (if any) and set them to an array.
            // 対象日の前に祝日が1日以上ある場合、それらの名称と曜日を配列にセットする
            var prevHolidayNames = new Array();

            var i = 1;
            var prevHolidayName = '';
            do {
                var prevDate = new Date(date.getTime() - 60 * 60 * 24 * 1000 * i);
                prevHolidayName = this._getBaseName(prevDate);
                prevHolidayNames.push({ name: prevHolidayName, weekday: prevDate.getDay() });
                i++;
            } while (prevHolidayName);

            prevHolidayNames = prevHolidayNames.slice(0, prevHolidayNames.length - 1);

            // If there's no holiday before the target date, return basical name.
            if (prevHolidayNames.length == 0) {
                return holidayName;
            }

            // Get basical holiday name of the next day.
            var nextDay = new Date(date.getTime() + 60 * 60 * 24 * 1000); ;
            var nextDayHoldayName = this._getBaseName(nextDay);


            // Substitute holiday
            // 振替休日の判定
            if (new Date('1973/04/12') <= date && date <= new Date('2006/12/31')) {
                // If the previous day is Sunday and public holiday, the target date is substitute holiday.
                // 前日が日曜日かつ祝日である場合、本日を振替休日とする
                if (prevHolidayNames[0]['weekday'] == 0 && prevHolidayNames[0]['name'] && !holidayName) {
                    holidayName = '振替休日';
                }
            } else if (new Date('2007/01/01') <= date) {
                // If there're one or more holidays before the target day, and if they include a Sunday, the target date is substitute holiday.
                // 前日に祝日が1日以上連続して存在し、かつその中に日曜日が含まれる場合、本日を振替休日とする
                if (0 < prevHolidayNames.length) {
                    for (var i = 0; i < prevHolidayNames.length; i++) {
                        if (prevHolidayNames[i]['weekday'] == 0 && !holidayName) {
                            holidayName = '振替休日';
                            break;
                        }
                    }
                }
            }

            // If holiday name is set at this point, return it.
            if (holidayName) {
                return holidayName;
            }

            // Citizen's holiday in September (since 2003)
            // 9月の国民の休日（2003年～）
            if (2003 <= year && month == 9) {
                if (prevHolidayNames[0]['name'] == '敬老の日' && nextDayHoldayName == '秋分の日') {
                    holidayName = '国民の休日';
                }
            }

            return holidayName;
        },


        /* Get basical holiday name.  Referring : http://www.h3.dion.ne.jp/~sakatsu/holiday_topic.htm
        @param  date  Date - the target date 
        @param  region  String - the target region name 
        */
        _getBaseName: function (date, region) {

            if (region && targetRegion != region) { return ''; }

            if (typeof date != 'object') { return ''; }

            try { date.getTime(); }
            catch (err) { return ''; }

            var year = date.getFullYear();
            var month = date.getMonth() + 1;
            var day = date.getDate();
            var md = month + '/' + day;
            var weekday = date.getDay();

            // Week number in the month
            var weeknum = 0;
            if (day % 7 == 0) {
                weeknum = day / 7;
            } else {
                weeknum = Math.floor(day / 7) + 1;
            }

            var holidayName = '';

            // Holiday names determined simply by the date
            // 日付で固定された祝日
            switch (md) {

                case '1/1':
                    if (1949 <= year) { holidayName = '元日'; }
                    break;

                case '1/15':
                    if (1949 <= year && year <= 1999) { holidayName = '成人の日'; }
                    break;

                case '2/11':
                    if (1967 <= year) { holidayName = '建国記念の日'; }
                    break;

                case '4/29':
                    if (1949 <= year && year <= 1988) { holidayName = '天皇誕生日'; }
                    else if (1989 <= year && year <= 2006) { holidayName = 'みどりの日'; }
                    else if (2007 <= year) { holidayName = '昭和の日'; }
                    break;

                case '5/3':
                    if (1949 <= year) { holidayName = '憲法記念日'; }
                    break;

                case '5/4':
                    if (1986 <= year && year <= 2006) {
                        if (weekday == 1) { holidayName = '振替休日'; }
                        else if (2 <= weekday && weekday <= 6) { holidayName = '国民の休日'; }
                    }
                    else if (2007 <= year) { holidayName = 'みどりの日'; }
                    break;

                case '5/5':
                    if (1949 <= year) { holidayName = 'こどもの日'; }
                    break;

                case '7/20':
                    if (1996 <= year && year <= 2002) { holidayName = '海の日'; }
                    break;

                case '9/15':
                    if (1966 <= year && year <= 2002) { holidayName = '敬老の日'; }
                    break;

                case '10/10':
                    if (1966 <= year && year <= 1999) { holidayName = '体育の日'; }
                    break;

                case '11/3':
                    if (1948 <= year) { holidayName = '文化の日'; }
                    break;

                case '11/23':
                    if (1948 <= year) { holidayName = '勤労感謝の日'; }
                    break;

                case '12/23':
                    if (1989 <= year) { holidayName = '天皇誕生日'; }
                    break;

                default:
                    break;
            }

            // If holiday name is set at this point, return it.
            if (holidayName) {
                return holidayName;
            }

            // Happy mondays
            if (weekday == 1) {
                switch (month) {

                    // 成人の日                   
                    case 1:
                        if (weeknum == 2 && 2000 <= year) { holidayName = '成人の日'; }
                        break;

                    // 海の日                   
                    case 7:
                        if (weeknum == 3 && 2003 <= year) { holidayName = '海の日'; }
                        break;

                    // 敬老の日                   
                    case 9:
                        if (weeknum == 3 && 2003 <= year) { holidayName = '敬老の日'; }
                        break;

                    // 体育の日                  
                    case 10:
                        if (weeknum == 2 && 2000 <= year) { holidayName = '体育の日'; }
                        break;

                    default:
                        break;
                }
            }

            // If holiday name is set at this point, return it.
            if (holidayName) {
                return holidayName;
            }

            // Vernal Equinox Day and Autumnal Equinox Day
            // 春分の日と秋分の日
            var vernalEquinoxDay = '';
            var autumnalEquinoxDay = '';

            switch (year % 4) {

                case 0:
                    // Vernal Equinox Day
                    // 春分の日
                    if (1900 <= year && year <= 1956) {
                        vernalEquinoxDay = year + '/3/21';
                    } else if (1960 <= year && year <= 2088) {
                        vernalEquinoxDay = year + '/3/20';
                    } else if (2092 <= year && year <= 2096) {
                        vernalEquinoxDay = year + '/3/19';
                    }
                    // Autumnal Equinox Day
                    // 秋分の日
                    if (year == 1900) {
                        autumnalEquinoxDay = year + '/9/23';
                    } else if (1944 <= year && year <= 2008) {
                        autumnalEquinoxDay = year + '/9/23';
                    } else if (2012 <= year && year <= 2096) {
                        autumnalEquinoxDay = year + '/9/22';
                    }
                    break;

                case 1:
                    // Vernal Equinox Day
                    // 春分の日
                    if (1901 <= year && year <= 1989) {
                        vernalEquinoxDay = year + '/3/21';
                    } else if (1993 <= year && year <= 2097) {
                        vernalEquinoxDay = year + '/3/20';
                    }
                    // Autumnal Equinox Day
                    // 秋分の日
                    if (1901 <= year && year <= 1917) {
                        autumnalEquinoxDay = year + '/9/24';
                    } else if (1921 <= year && year <= 2041) {
                        autumnalEquinoxDay = year + '/9/23';
                    } else if (2045 <= year && year <= 2097) {
                        autumnalEquinoxDay = year + '/9/22';
                    }
                    break;

                case 2:
                    // Vernal Equinox Day
                    // 春分の日
                    if (1902 <= year && year <= 2022) {
                        vernalEquinoxDay = year + '/3/21';
                    } else if (2026 <= year && year <= 2098) {
                        vernalEquinoxDay = year + '/3/20';
                    }
                    // Autumnal Equinox Day
                    // 秋分の日
                    if (1902 <= year && year <= 1946) {
                        autumnalEquinoxDay = year + '/9/24';
                    } else if (1950 <= year && year <= 2074) {
                        autumnalEquinoxDay = year + '/9/23';
                    } else if (2078 <= year && year <= 2098) {
                        autumnalEquinoxDay = year + '/9/22';
                    }
                    break;

                case 3:
                    // Vernal Equinox Day
                    // 春分の日
                    if (1903 <= year && year <= 1923) {
                        vernalEquinoxDay = year + '/3/22';
                    } else if (1927 <= year && year <= 2039) {
                        vernalEquinoxDay = year + '/3/21';
                    } else if (2059 <= year && year <= 2099) {
                        vernalEquinoxDay = year + '/3/21';
                    }
                    // Autumnal Equinox Day
                    // 秋分の日
                    if (1903 <= year && year <= 1979) {
                        autumnalEquinoxDay = year + '/9/24';
                    } else if (1983 <= year && year <= 2099) {
                        autumnalEquinoxDay = year + '/9/23';
                    }
                    break;

                default:
                    break;
            }

            if (date.getTime() == new Date(vernalEquinoxDay).getTime()) {
                holidayName = '春分の日';
            }
            if (date.getTime() == new Date(autumnalEquinoxDay).getTime()) {
                holidayName = '秋分の日';
            }

            return holidayName;
        }
    });


    $.publicHoliday = new PublicHoliday();
    $.publicHoliday.version = '1.0.1';

})(jQuery);