<x-meta>
    <div style="m-4 w-full">
        <label for="yearSelect"><strong>Select Year:</strong></label>
        <select id="yearSelect" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
              @foreach($availableYears as $year)
                <option value="{{ $year }}" {{ $year == $currentYear ? 'selected' : '' }}>
                    {{ $year }}
                </option>
            @endforeach      
            
        </select>
    </div>
    <div class = " flex flex-col items-center gap-4">
<div style="width: 100%; max-width: 600px;">
        <canvas id="salesChart"></canvas>
    </div>

    <div style="width: 70%; max-width: 200px;">
        <canvas id="pieChart"></canvas>
    </div>

    </div>
    
        


<div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
    <table class="w-full text-sm text-left rtl:text-right text-body">
        <thead class="bg-neutral-secondary-soft border-b border-default">
            <tr>
                <th scope="col" class="px-6 py-3 font-medium">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3 font-medium">
                    Total sold
                </th>
                
            </tr>
        </thead>
        <tbody>
        @forelse($topProducts as $topProduct)
        <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">

            <td scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
            {{ $topProduct->product->code}}
                </td>
                <td class="px-6 py-4">
                {{$topProduct->total_sold}}
                </td>
                </tr>
            @empty
            @endforelse
                
                
                
        </tbody>
    </table>
</div>
<script>
const ctxPie = document.getElementById('pieChart').getContext('2d');
const ctxSales = document.getElementById('salesChart').getContext('2d')
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('salesChart').getContext('2d');
    const yearSelect = document.getElementById('yearSelect');
    let revenueChart = null;

    const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

    // Function to fetch data via AJAX and render/update the chart
    function loadChartData(selectedYear) {
        fetch(`/api/revenue-data?year=${selectedYear}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (revenueChart) {
                    // Update existing chart smoothly
                    revenueChart.data.datasets[0].data = data.revenue;
                    revenueChart.options.plugins.title.text = 'Monthly Revenue - ' + data.year;
                    revenueChart.update();
                } else {
                    // Create new chart instance
                    revenueChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: months,
                            datasets: [{
                                label: 'Total Revenue ($)',
                                data: data.revenue,
                                borderColor: '#10b981',           // Emerald green
                                backgroundColor: 'rgba(16, 185, 129, 0.1)', // Soft green tint
                                borderWidth: 2,
                                tension: 0.3,                    // Smooth line curve
                                fill: true,
                                pointBackgroundColor: '#10b981',
                                pointRadius: 4,
                                pointHoverRadius: 6
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Monthly Revenue - ' + data.year,
                                    font: { size: 16 }
                                },
                                tooltip: {
                                    callbacks: {
                                        // Format tooltips as currency ($1,250.00)
                                        label: function(context) {
                                            let value = context.raw || 0;
                                            return ' Revenue: $' + value.toLocaleString('en-US', {
                                                minimumFractionDigits: 2,
                                                maximumFractionDigits: 2
                                            });
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        // Format Y-axis ticks ($500, $1,000)
                                        callback: function(value) {
                                            return '$' + value.toLocaleString();
                                        }
                                    }
                                }
                            }
                        }
                    });
                }
            })
            .catch(error => console.error('Error loading chart data:', error));
    }

    // 1. Initial chart load for current year
    loadChartData(yearSelect.value);

    // 2. Fetch new data when dropdown selection changes
    yearSelect.addEventListener('change', function () {
        loadChartData(this.value);
    });
});


          /*const salesLine =  new Chart(ctxSales, {
            type: 'line',
            data: {
                
                datasets: [{
                            label: 'Monthly Sales ($)',
                            
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            fill: true,
                          }]
                },  
                 options: {
                    responsive: true,
                    scales:{
                            y: { 
                                    beginAtZero: true 
                                }
                }
               }

            });*/
    
          const catPie = new Chart(ctxPie, {
                  type: 'pie', // Defines the chart type
                  data: {
                        labels: ['Male', 'Female'],
                  datasets: [{
                      label: 'Numbers of pairs',
                      data: [{{$numberOfMale}},{{$numberOfFemale}}],
                      backgroundColor: [
                         '#3b82f6', // Blue
                         '#ef4444'  // Red
                        ],
                      borderWidth: 1,
                      borderColor: '#ffffff'
                            }]
               },
                options: {
                responsive: true,
                plugins: {
                  legend: {
                  position: 'bottom', // 'top', 'bottom', 'left', 'right'
                  },
                  
                  display: true,
                  text: 'Sales Distribution by Category'
                         }
                           }
                       });
</script>

</x-meta>