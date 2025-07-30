

        document.addEventListener("DOMContentLoaded", function () {
    // Botão de Teste de DB
    const testBtn = document.getElementById('testDbBtn');
    if (testBtn) {
        testBtn.addEventListener('click', () => {
            fetch('test_db.php')
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                })
                .catch(error => {
                    alert("Erro inesperado: " + error);
                });
        });
    }

    // Relógio
    function updatedClock() {
        const now = new Date();
        const clock = document.getElementById("clock");
        if (clock) {
            clock.textContent = now.toLocaleTimeString();
        }
    }

    updatedClock();
    setInterval(updatedClock, 1000);

    // Recarrega a página a cada 5 segundos
    setTimeout(() => {
        window.location.reload();
    }, 5000);

    // Gráfico Chart.js
    const chartEl = document.getElementById('tempChart');
    if (chartEl && window.tempData) {
        new Chart(chartEl, {
            type: 'line',
            data: {
                labels: ['T1', 'T2', 'T3', 'T4', 'T5'],
                datasets: [{
                    label: 'Temperatura',
                    data: window.tempData,
                    borderColor: 'red',
                    backgroundColor: 'rgba(255,0,0,0.1)',
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true
                    }
                }
            }
        });
    }
});