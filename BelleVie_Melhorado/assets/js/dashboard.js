(function () {
    const list = document.getElementById('appointments-list');
    const empty = document.getElementById('empty-state');
    const total = document.getElementById('total-appointments');
    const active = document.getElementById('active-appointments');
    const filter = document.getElementById('status-filter');
    const appointmentsKey = 'bellevieAppointments';

    if (!list || !empty || !total || !active || !filter) return;

    function getAppointments() {
        try {
            return JSON.parse(localStorage.getItem(appointmentsKey)) || [];
        } catch (error) {
            return [];
        }
    }

    function saveAppointments(items) {
        localStorage.setItem(appointmentsKey, JSON.stringify(items));
    }

    function formatDateBr(dateString) {
        const [year, month, day] = dateString.split('-');
        return `${day}/${month}/${year}`;
    }

    function render() {
        const appointments = getAppointments().sort((a, b) => `${a.date} ${a.time}`.localeCompare(`${b.date} ${b.time}`));
        const currentFilter = filter.value;
        const filtered = currentFilter === 'all'
            ? appointments
            : appointments.filter((item) => item.status === currentFilter);

        total.textContent = appointments.length;
        active.textContent = appointments.filter((item) => item.status !== 'Cancelado').length;
        list.innerHTML = '';
        empty.style.display = filtered.length ? 'none' : 'block';

        filtered.forEach((item) => {
            const card = document.createElement('article');
            card.className = `appointment-card ${item.status === 'Cancelado' ? 'is-cancelled' : ''}`;
            card.innerHTML = `
                <div>
                    <span class="status-pill">${item.status}</span>
                    <h3>${item.serviceName}</h3>
                    <p>${item.doctorName}</p>
                </div>
                <div class="appointment-info">
                    <span><strong>Data:</strong> ${formatDateBr(item.date)}</span>
                    <span><strong>Horário:</strong> ${item.time}</span>
                    <span><strong>Paciente:</strong> ${item.patientName}</span>
                </div>
                <div class="appointment-actions">
                    <button type="button" class="btn btn-secondary" data-cancel="${item.id}" ${item.status === 'Cancelado' ? 'disabled' : ''}>Cancelar</button>
                </div>
            `;
            list.appendChild(card);
        });
    }

    list.addEventListener('click', (event) => {
        const button = event.target.closest('[data-cancel]');
        if (!button) return;

        const id = button.dataset.cancel;
        const appointments = getAppointments().map((item) => {
            if (item.id !== id) return item;
            return { ...item, status: 'Cancelado', cancelledAt: new Date().toISOString() };
        });
        saveAppointments(appointments);
        render();
    });

    filter.addEventListener('change', render);
    render();
})();
