function updateClock() {
    const el = document.getElementById('live-clock');
    if (el) {
        const now = new Date();
        el.textContent = now.toLocaleTimeString('id-ID', {
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        }) + ' WIB';
    }
}

let count = 0;
const clickCountEl = document.getElementById('click-count');
const btnClick = document.getElementById('btn-click');
const btnReset = document.getElementById('btn-reset');
const testLog = document.getElementById('test-log');

if (btnClick && clickCountEl && testLog) {
    btnClick.addEventListener('click', () => {
        count++;
        clickCountEl.textContent = count;
        testLog.textContent = `Status: Event klik ke-${count} berhasil dieksekusi di browser.`;
    });
}

if (btnReset && clickCountEl && testLog) {
    btnReset.addEventListener('click', () => {
        count = 0;
        clickCountEl.textContent = count;
        testLog.textContent = 'Status: Hitungan di-reset ke 0.';
    });
}

setInterval(updateClock, 1000);
updateClock();
