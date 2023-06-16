document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch-top-borrowers-data.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var chartData = JSON.parse(xhr.responseText);
            var colors = ['#FF4560', '#008FFB', '#00E396', '#FEB019', '#775DD0'];

            // Prepare the chart options
            var options = {
                chart: {
                    type: 'bar',
                    height: 350,
                    width: '100%',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        distributed: true,
                    }
                },
                series: [{
                    name: 'Total Borrowed',
                    data: chartData.map(function (item) {
                        return item.data[0];
                    }),
                }],
                xaxis: {
                    categories: chartData.map(function (item) {
                        return item.name;
                    }),
                },
                colors: colors.slice(0, chartData.length), // Use a subset of colors based on the number of users
            };

            // Create the chart
            var chart = new ApexCharts(document.querySelector('#chart_1'), options);
            chart.render();
        }
    };
    xhr.send();
});

document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch-borrowings-by-month.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var chartData = JSON.parse(xhr.responseText);

            var monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

            var categories = chartData.map(function (item) {
                var monthIndex = item.month - 1;
                var monthLabel = monthNames[monthIndex];
                var yearLabel = item.year;
                return monthLabel + ' ' + yearLabel;
            });

            var options = {
                chart: {
                    type: 'bar',
                    height: 350,
                    width: '100%',
                },
                plotOptions: {
                    bar: {
                        horizontal: false,
                        distributed: true,
                    }
                },
                series: [{
                    name: 'Borrowings',
                    data: chartData.map(function (item) {
                        return item.count;
                    }),
                }],
                xaxis: {
                    type: 'category',
                    categories: categories,
                },
            };

            var chart = new ApexCharts(document.querySelector('#chart_2'), options);
            chart.render();
        }
    };
    xhr.send();
});


document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch-borrowers-per-book.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);

            var seriesData = [{
                name: 'Total Borrowers',
                data: []
            }];
            data.forEach(function (item) {
                seriesData[0].data.push(item.count);
            });

            // Generate the categories array for X-axis (months)
            var categories = [];
            data.forEach(function (item) {
                var month = getMonthName(item.month); // Call a function to get the month name
                categories.push(month);
            });

            // Create the line chart using ApexCharts
            var options = {
                chart: {
                    type: 'line',
                    height: 350
                },
                series: seriesData,
                xaxis: {
                    categories: categories
                },
                yaxis: {
                    title: {
                        text: 'Number of Borrowers'
                    }
                },
                dataLabels: {
                    enabled: false
                }
            };

            var chart = new ApexCharts(document.querySelector('#chart_3'), options);
            chart.render();
        }
    };
    xhr.send();
});


function getMonthName(monthNumber) {
    var months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];
    return months[monthNumber - 1];
}

document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'fetch-book-status.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var data = JSON.parse(xhr.responseText);

            // Prepare the chart data
            var chartData = data.map(function (item) {
                return { x: item.status, y: parseInt(item.count) };
            });

            // Create the chart using ApexCharts
            var options = {
                series: chartData.map(function (item) {
                    return item.y;
                }),
                chart: {
                    type: 'donut',
                },
                labels: chartData.map(function (item) {
                    return item.x;
                }),
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#chart_4"), options);
            chart.render();
        }
    };
    xhr.send();
});