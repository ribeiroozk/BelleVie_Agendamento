(function () {
    const dataTag = document.getElementById('bellevie-data');
    const form = document.getElementById('booking-form');
    if (!dataTag || !form) return;

    const data = JSON.parse(dataTag.textContent);
    const serviceSelect = document.getElementById('service-select');
    const doctorSelect = document.getElementById('doctor-select');
    const dateGrid = document.getElementById('date-grid');
    const timeGrid = document.getElementById('time-grid');
    const selectedDateInput = document.getElementById('selected-date');
    const selectedTimeInput = document.getElementById('selected-time');
    const feedback = document.getElementById('form-feedback');
    const calendarLabel = document.getElementById('calendar-label');
    const prevButton = document.getElementById('prev-days');
    const nextButton = document.getElementById('next-days');
    const summary = {
        service: document.querySelector('[data-summary="service"]'),
        doctor: document.querySelector('[data-summary="doctor"]'),
        date: document.querySelector('[data-summary="date"]'),
        time: document.querySelector('[data-summary="time"]'),
    };

    const dayNames = ['domingo', 'segunda', 'terca', 'quarta', 'quinta', 'sexta', 'sabado'];
    const appointmentsKey = 'bellevieAppointments';
    let weekOffset = 0;

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

    function formatDate(date) {
        return date.toISOString().slice(0, 10);
    }

    function formatDateBr(dateString) {
        const [year, month, day] = dateString.split('-');
        return `${day}/${month}/${year}`;
    }

    function selectedService() {
        return data.services.find((service) => service.id === serviceSelect.value);
    }

    function selectedDoctor() {
        return data.doctors.find((doctor) => doctor.id === doctorSelect.value);
    }

    function updateSummary() {
        const service = selectedService();
        const doctor = selectedDoctor();
        summary.service.textContent = service ? service.name : 'Não selecionado';
        summary.doctor.textContent = doctor ? doctor.name : 'Não selecionada';
        summary.date.textContent = selectedDateInput.value ? formatDateBr(selectedDateInput.value) : 'Não selecionada';
        summary.time.textContent = selectedTimeInput.value || 'Não selecionado';
    }

    function setFeedback(message, type = 'error') {
        feedback.textContent = message;
        feedback.className = `form-feedback show ${type}`;
    }

    function clearFeedback() {
        feedback.textContent = '';
        feedback.className = 'form-feedback';
    }

    function populateDoctors() {
        const service = selectedService();
        doctorSelect.innerHTML = '<option value="">Selecione</option>';
        selectedDateInput.value = '';
        selectedTimeInput.value = '';
        timeGrid.innerHTML = '';

        if (!service) {
            doctorSelect.innerHTML = '<option value="">Selecione um serviço primeiro</option>';
            renderDates();
            updateSummary();
            return;
        }

        data.doctors
            .filter((doctor) => doctor.specialties.includes(service.specialty))
            .forEach((doctor) => {
                const option = document.createElement('option');
                option.value = doctor.id;
                option.textContent = `${doctor.name} · ${doctor.role}`;
                doctorSelect.appendChild(option);
            });

        renderDates();
        updateSummary();
    }

    function renderDates() {
        dateGrid.innerHTML = '';
        const doctor = selectedDoctor();
        const today = new Date();
        today.setHours(0, 0, 0, 0);
        const start = new Date(today);
        start.setDate(today.getDate() + weekOffset * 7);
        const end = new Date(start);
        end.setDate(start.getDate() + 6);
        calendarLabel.textContent = `${start.toLocaleDateString('pt-BR')} a ${end.toLocaleDateString('pt-BR')}`;
        prevButton.disabled = weekOffset === 0;

        for (let index = 0; index < 7; index += 1) {
            const date = new Date(start);
            date.setDate(start.getDate() + index);
            const dateValue = formatDate(date);
            const dayKey = dayNames[date.getDay()];
            const isSunday = dayKey === 'domingo';
            const isAvailable = doctor ? doctor.days.includes(dayKey) && !isSunday : !isSunday;

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'date-option';
            button.disabled = !doctor || !isAvailable;
            button.dataset.date = dateValue;
            button.innerHTML = `<span>${date.toLocaleDateString('pt-BR', { weekday: 'short' })}</span><strong>${date.getDate()}</strong><small>${date.toLocaleDateString('pt-BR', { month: 'short' })}</small>`;

            if (selectedDateInput.value === dateValue) {
                button.classList.add('selected');
            }

            button.addEventListener('click', () => {
                selectedDateInput.value = dateValue;
                selectedTimeInput.value = '';
                document.querySelectorAll('.date-option').forEach((item) => item.classList.remove('selected'));
                button.classList.add('selected');
                renderTimes();
                updateSummary();
                clearFeedback();
            });

            dateGrid.appendChild(button);
        }
    }

    function renderTimes() {
        timeGrid.innerHTML = '';
        const doctor = selectedDoctor();
        const date = selectedDateInput.value;

        if (!doctor || !date) {
            timeGrid.innerHTML = '<p class="helper-text">Selecione a profissional e a data para ver horários.</p>';
            return;
        }

        const appointments = getAppointments();
        const blockedTimes = appointments
            .filter((item) => item.doctorId === doctor.id && item.date === date && item.status !== 'Cancelado')
            .map((item) => item.time);

        data.timeSlots.forEach((slot) => {
            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'time-option';
            button.textContent = slot;
            button.disabled = blockedTimes.includes(slot);
            if (blockedTimes.includes(slot)) button.title = 'Horário já ocupado';

            button.addEventListener('click', () => {
                selectedTimeInput.value = slot;
                document.querySelectorAll('.time-option').forEach((item) => item.classList.remove('selected'));
                button.classList.add('selected');
                updateSummary();
                clearFeedback();
            });

            timeGrid.appendChild(button);
        });
    }

    serviceSelect.addEventListener('change', populateDoctors);
    doctorSelect.addEventListener('change', () => {
        selectedDateInput.value = '';
        selectedTimeInput.value = '';
        renderDates();
        renderTimes();
        updateSummary();
    });

    prevButton.addEventListener('click', () => {
        if (weekOffset > 0) {
            weekOffset -= 1;
            renderDates();
        }
    });

    nextButton.addEventListener('click', () => {
        weekOffset += 1;
        renderDates();
    });

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        clearFeedback();

        if (!form.checkValidity()) {
            setFeedback('Preencha os campos obrigatórios e aceite o termo de uso de dados.');
            form.reportValidity();
            return;
        }

        if (!selectedDateInput.value || !selectedTimeInput.value) {
            setFeedback('Selecione uma data e um horário disponíveis.');
            return;
        }

        const service = selectedService();
        const doctor = selectedDoctor();
        const appointments = getAppointments();
        const alreadyExists = appointments.some((item) => (
            item.doctorId === doctor.id &&
            item.date === selectedDateInput.value &&
            item.time === selectedTimeInput.value &&
            item.status !== 'Cancelado'
        ));

        if (alreadyExists) {
            setFeedback('Esse horário acabou de ficar indisponível. Escolha outro horário.');
            renderTimes();
            return;
        }

        appointments.push({
            id: `BV-${Date.now()}`,
            serviceId: service.id,
            serviceName: service.name,
            serviceType: service.type,
            doctorId: doctor.id,
            doctorName: doctor.name,
            date: selectedDateInput.value,
            time: selectedTimeInput.value,
            patientName: document.getElementById('patient-name').value.trim(),
            phone: document.getElementById('phone').value.trim(),
            email: document.getElementById('email').value.trim(),
            notes: document.getElementById('notes').value.trim(),
            status: 'Confirmado',
            createdAt: new Date().toISOString(),
        });

        saveAppointments(appointments);
        setFeedback('Agendamento confirmado! Redirecionando para a área do paciente.', 'success');
        setTimeout(() => {
            window.location.href = 'dashboard.php?novo=1';
        }, 700);
    });

    populateDoctors();
    renderDates();
    renderTimes();
})();
