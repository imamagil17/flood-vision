function updateChart(data) {
    const labels = data.map(log => {
        const date = new Date(log.created_at);
        const hh = String(date.getHours()).padStart(2, '0');
        const mm = String(date.getMinutes()).padStart(2, '0');
        const ss = String(date.getSeconds()).padStart(2, '0');
        return `${hh}:${mm}:${ss}`;
    });
    const values = data.map(log => log.nilai_level);

    const existingChart = Chart.getChart('waterChart');

    if(existingChart) {
        existingChart.data.labels = labels;
        existingChart.data.datasets[0].data = values;
        existingChart.update('none'); 
    } else {
        const ctxEl = document.getElementById('waterChart');
        if(!ctxEl) return;
        const ctx = ctxEl.getContext('2d');
        
        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(37, 99, 235, 0.2)');
        gradient.addColorStop(1, 'rgba(37, 99, 235, 0)');

        window.waterChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Level Air (%)',
                    data: values,
                    borderColor: '#2563eb',
                    backgroundColor: gradient,
                    borderWidth: 3,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#2563eb',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    fill: true,
                    tension: 0.4 
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.9)',
                        titleColor: '#1e293b',
                        bodyColor: '#1e293b',
                        borderColor: '#e2e8f0',
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                return context.parsed.y + '% (Terukur)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 100,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.04)',
                            drawBorder: false,
                        },
                        ticks: {
                            font: { family: "'Figtree', sans-serif", size: 11 },
                            color: '#64748b',
                            stepSize: 10
                        }
                    },
                    x: {
                        grid: { display: false, drawBorder: false },
                        ticks: {
                            font: { family: "'Figtree', sans-serif", size: 11 },
                            color: '#64748b',
                            autoSkip: false,
                            maxRotation: 45,
                            minRotation: 45
                        }
                    }
                }
            }
        });
    }
}
