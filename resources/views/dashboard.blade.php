<x-app-layout>

    <div class ="overflow-y-auto overflow-x-hidden pt-6">
        <nav class = "flex px-5 py-3 text-gray-700  rounded-lg bg-gray-50 dark:bg-[#1E293B] " aria-label="Breadcrumb">
            <ol class = "inline-flex items-center space-x-1 md:space-x-3">
                <li class = "inline-flex items-center">
                    <a href="/"
                        class = "inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-indigo-400 dark:hover:text-white">
                        <svg class = "w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <div class = "flex items-center">
                        <svg class = "w-6 h-6 text-indigo-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fillRule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clipRule="evenodd"></path>
                        </svg>
                        <a href="{{ route('dashboard') }}"
                            class = "ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-indigo-400 dark:hover:text-white">Dashboard</a>
                    </div>
                </li>
            </ol>
        </nav>

        <section class="mt-4 bg-gray-50">

            <div class="grid gap-6 p-6 grid-cols-1">
                <div class="shadow shadow-lg rounded-lg p-4 bg-white">
                    <div class="flex justify-between items-center">
                        <span class="font-bold">Monthly Candidate Report</span>
                        @php
                            $minYear =
                                \App\Models\Candidate::selectRaw('YEAR(conducted_date) as year')
                                    ->whereNotNull('conducted_date')
                                    ->orderBy('year', 'asc')
                                    ->value('year') ?? \Carbon\Carbon::now()->year;

                            $currentYear = \Carbon\Carbon::now()->year;
                        @endphp

                        <select id="yearDropdown"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                            @for ($year = $currentYear; $year >= $minYear; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>


                    </div>

                    <div id="line-chart" class="mt-6"></div> <!-- Container for the chart -->
                </div>
            </div>

            <div class="mx-6 flex items-center justify-end gap-2">

                <form id="filter-form" class="flex items-center gap-4">
                    {{-- <div class="flex items-center gap-2">
                        <label for="from_date"
                            class="mb-2 text-sm font-medium text-gray-900 dark:text-white">From</label>
                        <input name="from_date" type="date" id="from_date"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
                    </div>
                    <div class="flex items-center gap-2">
                        <label for="to_date" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">To</label>
                        <input name="to_date" type="date" id="to_date"
                            class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5" />
                    </div> --}}
                    <select name="period" id="period"
                        class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5">
                        <option value="all_time" selected>All Time</option>
                        <option value="last_week">Last Week</option>
                        <option value="last_month">Last Month</option>
                        <option value="last_year">Last Year</option>
                    </select>
                    <button type="button" id="filter_button"
                        class="bg-green-50 border border-green-300 text-green-900 text-sm rounded-lg p-2.5 px-4 hover:bg-green-300 hover:text-white font-semibold">Apply</button>
                </form>

                <a id="remove_filter" href="{{ route('dashboard') }}" type="button"
                    class="hidden bg-red-50 border border-red-300 text-red-900 text-sm rounded-lg p-2.5 px-4 hover:bg-red-300 hover:text-white font-semibold">Remove</a>
            </div>

            <div class="grid grid-cols-2 gap-4 p-6">
                <div class="shadow shadow-lg rounded-lg p-4 bg-white" id="status-pie-chart"></div>
                <div class="shadow shadow-lg rounded-lg p-4 bg-white" id="vendor-bar-chart"></div>
                <div class="shadow shadow-lg rounded-lg p-4 bg-white" id="stacked-column-chart"></div>
                <div class="shadow shadow-lg rounded-lg p-4 bg-white" id="client-column-chart"></div>
            </div>

        </section>
    </div>



    <x-slot name="script">
        <!--Total Candidate Count -line chart-->

        <script>
            $(document).ready(function() {
                const initialYear = 2024;
                fetchAndRenderChart(initialYear);


                $('#yearDropdown').on('change', function() {
                    const selectedYear = $(this).val();
                    fetchAndRenderChart(selectedYear);
                });

                function fetchAndRenderChart(year) {

                    $.ajax({
                        url: `/api/candidates?year=${year}`,
                        method: 'GET',
                        success: function(response) {
                            const monthlyCounts = getMonthlyCounts(response);
                           
                            const labels = Object.keys(monthlyCounts);
                            const data = Object.values(monthlyCounts);


                            renderLineChart(labels, data);
                        },
                        error: function(xhr, status, error) {
                            console.error('Error fetching candidates:', error);
                        }
                    });
                }

                function getMonthlyCounts(data) {

                    const monthCounts = {
                        'January': 0,
                        'February': 0,
                        'March': 0,
                        'April': 0,
                        'May': 0,
                        'June': 0,
                        'July': 0,
                        'August': 0,
                        'September': 0,
                        'October': 0,
                        'November': 0,
                        'December': 0,
                    };

                    data.forEach(candidate => {

                        if (candidate.conducted_date) {
                            const date = new Date(candidate.conducted_date);
                            const month = date.toLocaleString('default', {
                                month: 'long'
                            });
                            monthCounts[month]++;
                        } else {
                            console.warn('Missing conducted_date for candidate:',
                                candidate);
                        }
                    });

                    return monthCounts;
                }

                function renderLineChart(labels, data) {

                    const chartContainer = document.querySelector("#line-chart");
                    chartContainer.innerHTML = '';


                    if (typeof chart !== 'undefined') {
                        chart.destroy();
                    }


                    var options = {
                        series: [{
                            name: 'Candidates',
                            data: data
                        }],
                        chart: {
                            height: 350,
                            type: 'line',
                            zoom: {
                                enabled: false
                            }
                        },
                        dataLabels: {
                            enabled: true
                        },
                        stroke: {
                            curve: 'smooth'
                        },
                        xaxis: {
                            categories: labels,
                            title: {
                                text: 'Months'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Number of Candidates'
                            }
                        },

                        grid: {
                            row: {
                                colors: ['#f3f3f3', 'transparent'],
                                opacity: 0.5
                            },
                        }
                    };


                    var chart = new ApexCharts(chartContainer, options);
                    chart.render();
                }
            });
        </script>

        <script>
            $(document).ready(function() {
                // Global variable to store fetched data
                let candidatesData = [];

                // Function to fetch data based on filters
                function fetchData(params = {}) {
                    $.ajax({
                        url: '/api/candidates', // Your API endpoint
                        method: 'GET',
                        data: params,
                        success: function(response) {
                            // Store the data globally
                            candidatesData = response;

                            // Clear existing charts
                            clearCharts();

                            // Render all charts with new data
                            renderStatusPieChart(candidatesData);
                            renderVendorBarChart(candidatesData);
                            renderStackedColumnChart(candidatesData);
                            renderClientColumnChart(candidatesData);
                        },
                        error: function(error) {
                            console.error("Error fetching data:", error);
                        }
                    });
                }

                // Fetch initial data without filters
                fetchData();

                // Function to clear existing charts
                function clearCharts() {
                    ApexCharts.exec("status-pie-chart", "destroy");
                    ApexCharts.exec("vendor-bar-chart", "destroy");
                    ApexCharts.exec("stacked-column-chart", "destroy");
                    ApexCharts.exec("client-column-chart", "destroy");
                }

                // Apply filter on button click
                $("#filter_button").on("click", function() {
                    $("#remove_filter").removeClass('hidden');
                    // Get filter values
                    const fromDate = $("#from_date").val();
                    const toDate = $("#to_date").val();
                    const period = $("select[name='period']").val();

                    // Fetch new data with the selected filters
                    fetchData({
                        fromDate,
                        toDate,
                        period
                    });
                });

                // Render Status Pie Chart
                function renderStatusPieChart(data) {
                    const orderedStatuses = ['passed', 'failed', 'on-hold', 'rescheduled'];
                    const statusCounts = data.reduce((acc, item) => {
                        acc[item.status] = (acc[item.status] || 0) + 1;
                        return acc;
                    }, {});

                    const seriesData = orderedStatuses.map(status => statusCounts[status] || 0);
                    const labels = orderedStatuses.map(status =>
                        status.replace(/\b\w/g, char => char.toUpperCase())
                    );

                    const colorMapping = {
                        'passed': '#28a745', // Green
                        'failed': '#dc3545', // Red
                        'on-hold': '#ffc107', // Yellow
                        'rescheduled': '#17a2b8' // Blue
                    };
                    const colors = orderedStatuses.map(status => colorMapping[status]);

                    const options = {
                        series: seriesData,
                        chart: {
                            type: 'pie',
                            height: 350
                        },
                        labels: labels,
                        colors: colors,
                        title: {
                            text: 'Candidate Status Distribution',
                            align: 'center'
                        },

                    };


                    const chart = new ApexCharts(document.querySelector("#status-pie-chart"), options);
                    chart.render();
                }


                // Render Vendor Bar Chart
                function renderVendorBarChart(data) {
                    const vendorCounts = data.reduce((acc, item) => {
                        acc[item.vendor.vendor_name] = (acc[item.vendor.vendor_name] || 0) + 1;
                        return acc;
                    }, {});

                    const sortedVendors = Object.entries(vendorCounts).sort((a, b) => b[1] - a[1]).slice(0, 10);
                    const vendorNames = sortedVendors.map(item => item[0]);
                    const candidateCounts = sortedVendors.map(item => item[1]);

                    const options = {
                        series: [{
                            data: candidateCounts
                        }],
                        chart: {
                            type: 'bar',
                            height: 350,
                            id: "vendor-bar-chart"
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4,
                                horizontal: true
                            }
                        },
                        title: {
                            text: 'Top 10 Vendors'
                        },
                        xaxis: {
                            categories: vendorNames
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#vendor-bar-chart"), options);
                    chart.render();
                }

               

                function renderStackedColumnChart(data) {
                    const conductedByCounts = {};
                    const statusTypes = ['passed', 'failed', 'on-hold', 'rescheduled'];

                    data.forEach(candidate => {
                        const {

                            status
                        } = candidate;
                        const conducted_by = candidate.conducted_user.name;

                        // Generate a label for the examiner name
                        const examinerName = conducted_by; // Replace with actual name if available

                        if (!conductedByCounts[examinerName]) {
                            conductedByCounts[examinerName] = {
                                passed: 0,
                                failed: 0,
                                'on-hold': 0,
                                rescheduled: 0
                            };
                        }

                        if (statusTypes.includes(status)) {
                            conductedByCounts[examinerName][status]++;
                        }
                    });

                    const categories = Object.keys(conductedByCounts);
                    const series = statusTypes.map(status => ({
                        name: status.charAt(0).toUpperCase() + status.slice(1),
                        data: categories.map(examiner => conductedByCounts[examiner][status] || 0)
                    }));

                    const options = {
                        series: series,
                        chart: {
                            type: 'bar',
                            height: 350,
                            stacked: true,
                            id: "stacked-column-chart"
                        },
                        colors: ['#28a745', '#dc3545', '#ffc107', '#17a2b8'],
                        xaxis: {
                            categories: categories,
                            title: {
                                text: 'Examiner'
                            }
                        },
                        title: {
                            text: 'Candidate Exam Status by Examiner'
                        }
                    };

                    // Render the chart
                    const chart = new ApexCharts(document.querySelector("#stacked-column-chart"), options);
                    chart.render();
                }

                // Render Client Column Chart
                function renderClientColumnChart(data) {
                    const clientCounts = data.reduce((acc, item) => {
                        acc[item.client.client_name] = (acc[item.client.client_name] || 0) + 1;
                        return acc;
                    }, {});

                    const sortedClients = Object.entries(clientCounts).sort((a, b) => b[1] - a[1]).slice(0, 10);
                    const clientNames = sortedClients.map(item => item[0]);
                    const candidateCounts = sortedClients.map(item => item[1]);

                    const options = {
                        series: [{
                            name: 'Total Candidates',
                            data: candidateCounts
                        }],
                        chart: {
                            type: 'bar',
                            height: 350,
                            id: "client-column-chart"
                        },
                        plotOptions: {
                            bar: {
                                borderRadius: 4
                            }
                        },
                        title: {
                            text: 'Top 10 Clients by Candidate Count',
                            align: 'left'
                        },
                        xaxis: {
                            categories: clientNames,
                            title: {
                                text: 'Client Name'
                            }
                        },
                        yaxis: {
                            title: {
                                text: 'Total Number of Candidates'
                            }
                        }
                    };

                    const chart = new ApexCharts(document.querySelector("#client-column-chart"), options);
                    chart.render();
                }
            });
        </script>


    </x-slot>
</x-app-layout>
