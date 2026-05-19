window.globalContext = "Level: --, Status: --, Risk Score: --";

async function fetchDashboardData() {
    const refreshIcon = document.getElementById('refreshIcon');
    if(refreshIcon) refreshIcon.classList.add('animate-spin');

    let weatherDesc = '';
    try {
        const weatherRes = await fetch('/api/weather');
        const weatherJson = await weatherRes.json();
        if(weatherJson.success) {
            const d = weatherJson.data;
            const tempEl = document.getElementById('weatherTemp');
            if(tempEl) tempEl.innerText = d.temp + '°';
            const descEl = document.getElementById('weatherDesc');
            if(descEl) descEl.innerText = d.description;
            const cityEl = document.getElementById('weatherCity');
            if(cityEl) cityEl.innerText = d.city;
            const humEl = document.getElementById('weatherHumidity');
            if(humEl) humEl.innerText = d.humidity;
            weatherDesc = d.description;
            
            const wSkel = document.getElementById('weatherSkeleton');
            if(wSkel) wSkel.classList.add('hidden');
            const wCont = document.getElementById('weatherContent');
            if(wCont) wCont.classList.remove('hidden');
        }
    } catch(e) { console.error('Error fetching weather:', e); }

    try {
        const aiRes = await fetch('/api/analytics');
        const aiJson = await aiRes.json();
        if(aiJson.success) {
            const d = aiJson.data;
            const aiLev = document.getElementById('aiPredictedLevel');
            if(aiLev) aiLev.innerText = d.predicted_level;
            const aiStat = document.getElementById('aiPredictedStatus');
            if(aiStat) aiStat.innerText = d.prediction_status;
            const aiRisk = document.getElementById('aiRiskScore');
            if(aiRisk) aiRisk.innerText = d.risk_score;
            
            const card = document.getElementById('aiInsightsCard');
            if (card) {
                card.className = "bg-gradient-to-br rounded-3xl p-6 shadow-md text-white flex flex-col justify-between relative overflow-hidden transition-colors duration-500 ";
                if(d.risk_score > 70) {
                    card.className += "from-red-500 to-rose-700";
                } else if (d.risk_score > 35) {
                    card.className += "from-orange-500 to-amber-600";
                } else {
                    card.className += "from-emerald-500 to-teal-600";
                }
            }

            const aiSkel = document.getElementById('aiSkeleton');
            if(aiSkel) aiSkel.classList.add('hidden');
            const aiCont = document.getElementById('aiContent');
            if(aiCont) aiCont.classList.remove('hidden');

            window.globalContext = `Saat ini Level Air ${d.current_level}%. Prediksi 30 menit ke depan: ${d.predicted_level}% (${d.prediction_status}). Cuaca: ${weatherDesc}. Skor Risiko: ${d.risk_score}/100.`;

            if (typeof updateUserStatusPanel === 'function') {
                updateUserStatusPanel(d.current_level, d.prediction_status);
            }
        }
    } catch(e) { console.error('Error fetching analytics:', e); }

    try {
        const logsRes = await fetch('/api/logs');
        const logsJson = await logsRes.json();
        if(logsJson.data) {
            const chartSkel = document.getElementById('chartSkeleton');
            if(chartSkel) chartSkel.classList.add('hidden');
            const chartCont = document.getElementById('chartContainer');
            if(chartCont) chartCont.classList.remove('opacity-0');
            
            if (typeof updateChart === 'function') {
                updateChart(logsJson.data);
            }
        }
    } catch(e) { console.error('Error fetching logs:', e); }

    if(refreshIcon) setTimeout(() => refreshIcon.classList.remove('animate-spin'), 500);
}

document.addEventListener('DOMContentLoaded', () => {
    fetchDashboardData();
    setInterval(fetchDashboardData, 10000);
});
