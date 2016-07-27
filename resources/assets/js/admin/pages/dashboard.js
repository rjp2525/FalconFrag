// Dashboard specific JavaScript functions
var dashboard = function() {
    // Chart.js Initialization
    var initIncomeChart = function() {
        // Get the chart container
        var $dashboardIncomeChart = jQuery('.dashboard-income-chart')[0].getContext('2d');

        // Set the chart and chart data variables
        var $incomeChart, $incomeData;

        // Chart data
        var $incomeData = {
            //labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            datasets: [
                {
                    label: 'Sales',
                    fillColor: 'rgba(113, 186, 81, .07)',
                    strokeColor: 'rgba(113, 186, 81, .25)',
                    pointColor: 'rgba(113, 186, 81, .25)',
                    pointStrokeColor: '#fff',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(113, 186, 81, 1)',
                    data: [65, 71, 88, 89, 106, 116, 144]
                },
                {
                    label: 'Clients',
                    fillColor: 'rgba(223, 85, 79, .07)',
                    strokeColor: 'rgba(223, 85, 79, .25)',
                    pointColor: 'rgba(223, 85, 79, .25)',
                    pointStrokeColor: '#fff',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(223, 85, 79, 1)',
                    data: [28, 34, 31, 26, 41, 30, 36]
                },
                {
                    label: 'Reviews',
                    fillColor: 'rgba(255, 116, 22, .07)',
                    strokeColor: 'rgba(255, 116, 22, .25)',
                    pointColor: 'rgba(255, 116, 22, .25)',
                    pointStrokeColor: '#fff',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(255, 116, 22, 1)',
                    data: [19, 9, 6, 11, 13, 16, 8]
                }
            ]
        };

        // Initialize the income chart
        $incomeChart = new Chart($dashboardIncomeChart).Line($incomeData, {
            scaleFontFamily: "'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif",
            scaleFontColor: '#999',
            scaleFontStyle: '600',
            tooltipTitleFontFamily: "'Open Sans', 'Helvetica Neue', Helvetica, Arial, sans-serif",
            tooltipCornerRadius: 3,
            maintainAspectRatio: false,
            responsive: true,
            multiTooltipTemplate: "<%= value %> <%= datasetLabel %>"
        });
    };

    // Initialize slimScroll elements
    var initSlimScroll = function() {
        jQuery('*[data-toggle="slimscroll"').slimScroll({
            width: "auto",
            height: "350px",
            size: "7px",
            color: "#000",
            position: "right",
            distance: "1px",
            start: "top",
            opacity: .4,
            alwaysVisible: !1,
            disableFadeOut: !1,
            railVisible: !1,
            railColor: "#333",
            railOpacity: .2,
            railDraggable: !0,
            railClass: "slimScrollRail",
            barClass: "slimScrollBar",
            wrapperClass: "slimScrollDiv",
            allowPageScroll: !1,
            wheelStep: 20,
            touchScrollStep: 200,
            borderRadius: "7px",
            railBorderRadius: "7px"
        }); // $('*[data-customerID="22"]');
    }

    return {
        init: function() {
            // Initialize here
            initIncomeChart();
            initSlimScroll();
        }
    };
}();

// Initialize when page loads
jQuery(function() {
    dashboard.init();
});