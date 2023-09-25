const relogio = document.getElementById('relogio')
const modelo = document.getElementById('modelo')

relogio.addEventListener('change', function() {
    if (relogio.value === 'sim') {
        modelo.removeAttribute('disabled')
    }
})
