import './bootstrap';

import { initDashboardChart } from './chart/dashboard-chart';

document.addEventListener('DOMContentLoaded', () => {
    initDashboardChart();
});

document.addEventListener('livewire:navigated', () => {
    initDashboardChart();
});